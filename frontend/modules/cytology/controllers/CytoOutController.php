<?php

namespace frontend\modules\cytology\controllers;

use Yii;
use frontend\modules\cytology\models\CytoOut;
use frontend\modules\cytology\models\CytoOutSearch;
use frontend\modules\cytology\models\LibCytoType;
use frontend\modules\cytology\models\LibHospcode;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\modules\cytology\models\Changwat;
use frontend\modules\cytology\models\Amphoe;
use frontend\modules\cytology\models\Tambon;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\caching\TagDependency;
use yii\db\Exception;
use yii\helpers\Json;
use yii\Date;
/**
 * CytoOutController implements the CRUD actions for CytoOut model.
 */
class CytoOutController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all CytoOut models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CytoOutSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CytoOut model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new CytoOut model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($cyto_type)
    {
        $model = new CytoOut();
        $current_year = (integer)date("Y")+543;
        $current_cm = date("d-m");
        $current_date = $current_cm.'-'.$current_year;

        $model = new CytoOut(['cyto_type'=>$cyto_type,'cn_date'=>$current_date]);
        $mymax = CytoOut::find()
            ->orderBy('ref DESC')
            ->one();

        if ($model->load(Yii::$app->request->post())) {

          $model->attributes = Yii::$app->request->post('CytoOut');
          // 600101xxxx = 60|01|01|xxxx = ปี|เดือน|ประเภทผู้ป่วย ในรพ. 01 นอกรพ. 02|autonumber
          $thaiyear = substr((integer)substr(date("Y-m-d"),0,4)+543,2,2);
          $month = substr(date("Y-m-d"),5,2);
          $running_no = sprintf('%04d',(isset($mymax))?(($mymax->ref)+1):1);
          $cn_no = $thaiyear.$month.'02'.$running_no;

          if(($_POST['CytoOut']['age'] == '')){
            $model->age = $this->getAge($_POST['CytoOut']['birthdate'],$_POST['CytoOut']['cn_date']);
          }

          $model->cn = $cn_no;
          $model->save();
          return $this->redirect(['index']);
            //return $this->redirect(['view', 'id' => $model->ref]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'changwat' => $this->getChangwat(),
            ]);
        }
    }

    /**
     * Updates an existing CytoOut model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $fullage = $model->getCurrentAgeOnCN('birthdate','cn_date');

        if ($model->load(Yii::$app->request->post())) {

          $model->attributes = Yii::$app->request->post('CytoOut');

          $model->age = $this->getAge($_POST['CytoOut']['birthdate'],$_POST['CytoOut']['cn_date']);
          $model->save();
          return $this->redirect(['index']);
            //return $this->redirect(['view', 'id' => $model->ref]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'changwat' => $this->getChangwat(),
                'fullage' => $fullage,
            ]);
        }
    }

    /**
     * Deletes an existing CytoOut model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the CytoOut model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CytoOut the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CytoOut::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


    public function getChangwat()
    {
        return Changwat::getDb()->cache(function ($db) {
            return Changwat::find()->select(['abbr'])->indexBy('left(code,2)')->orderBy('abbr ASC')->column();
        }, 0, new TagDependency(['tags' => 'lib_data']));
    }



    public function actions()
    {
        return ArrayHelper::merge(parent::actions(), [
            'get-ampur' => [
                'class' => \kartik\depdrop\DepDropAction::className(),
                'outputCallback' => function ($selectedId, $params) {
                    return Amphoe::find()->getAmphoeByChangwatID($selectedId)->all();
                }
            ],
            'get-tambon' => [
                'class' => \kartik\depdrop\DepDropAction::className(),
                'otherParam' => 'depdrop_parents',
                'outputCallback' => function ($selectedId, $params) {
                    return Tambon::find()->getTambonByAmphoeID($params[0].$params[1])->all();
                }
            ]
        ]);
    }



    public function actionCytoprice($code){
        $model = LibCytoType::find()->where(['code'=>$code])->one();
        return Json::encode([
          'code'=> $model->code,
          'name'=> $model->name,
          'price'=> $model->price,


          ]);
    }

    public function getAge($birthdate,$curdate){
      $age = date_diff(date_create($birthdate), date_create($curdate))->y;
      return $age;
    }

    public function actionHospList($q = null, $id = null) {
    \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    $out = ['results' => ['id' => '', 'text' => '']];
    if (!is_null($q)) {

      $sql = 'select code5 as id,name as text
        from lib_hospcode
        where name like "%'.$q.'%"
        limit 20
      ';
      $command = Yii::$app->db->createCommand($sql);
      //$result = $command->queryAll();
        // $query = new Query;
        // $query->select('code5 as id, name AS text')
        //     ->from('lib_hospcode')
        //     ->where(['like', 'name', $q])
        //     ->limit(20);
        // $command = $query->createCommand();
        $data = $command->queryAll();
        $out['results'] = array_values($data);
    }
    elseif ($id > 0) {
        $out['results'] = ['id' => $id, 'text' => LibHospcode::find($id)->name];
    }
    return $out;
}


}
