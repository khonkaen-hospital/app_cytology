<?php

namespace frontend\modules\cytology\controllers;

use Yii;
use frontend\modules\cytology\models\CytoIn;
use frontend\modules\cytology\models\CytoInSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use frontend\modules\cytology\models\LibSmearType;
use frontend\modules\cytology\models\LibCytoType;
use frontend\modules\cytology\models\LibSpecimen;
use frontend\modules\cytology\models\LibAdequacy;
use yii\helpers\ArrayHelper;
/**
 * CytoInController implements the CRUD actions for CytoIn model.
 */
class CytoInController extends Controller
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
     * Lists all CytoIn models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CytoInSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CytoIn model.
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
     * Creates a new CytoIn model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

        $model = new CytoIn();
        $mymax = CytoIn::find()
            ->orderBy('ref DESC')
            ->one();

        if (Yii::$app->request->post('CytoIn')) {
            $model->attributes = Yii::$app->request->post('CytoIn');
            // 600101xxxx = 60|01|01|xxxx = ปี|เดือน|ประเภทผู้ป่วย ในรพ. 01 นอกรพ. 02|autonumber
            $thaiyear = substr((integer)substr(date("Y-m-d"),0,4)+543,2,2);
            $month = substr(date("Y-m-d"),5,2);
            $running_no = sprintf('%04d',(($mymax->ref)+1));
            $cn_no = $thaiyear.$month.'01'.$running_no;

            $model->cn = $cn_no;

            $model->save();
            return $this->redirect(['index']);
            // return $this->redirect(['view', 'id' => $model->ref]);
            // return $this->refresh();

        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
        //     return $this->redirect(['view', 'id' => $model->ref]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'out' =>[],
            ]);
        }
    }

    /**
     * Updates an existing CytoIn model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $hn = $model->hn;

        $out = ArrayHelper::map($this->getVn($hn),'id','name');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
          return $this->redirect(['index']);
            // return $this->redirect(['view', 'id' => $model->ref]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'out'=>$out,
            ]);
        }
    }

    /**
     * Deletes an existing CytoIn model.
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
     * Finds the CytoIn model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CytoIn the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CytoIn::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


    public function actionPatientinfo($hn){
      $sql = '
      select
a.hn
,b.vn
,b.date as visit_date
,a.no_card as pid
,c.an
,c.admite
,c.disc
,b.dep as clinic
,f.clinic as clinic_name
,c.ward
,g.ward as ward_name
,CONCAT(a.title,a.name," ",a.surname) as fullname
,a.pttype
,a.age
,e.text as pttype_name
,a.birth
,CONCAT(a.address
,(case a.moo when "" then "" else  CONVERT(concat(" หมู่" , a.moo," ") USING utf8) end)
,(case a.road when "" then "" else CONVERT(concat(" ถนน" , a.road," ") USING utf8) end)
,(case a.tambol when "" then "" else CONVERT(concat(" ตำบล" , a.tambol," ") USING utf8) end)
,(case a.amp when "" then "" else CONVERT(concat(" อำเภอ" , a.amp," ") USING utf8) end)
,concat(" จังหวัด",d.PROVINCE_NAME)
) as address

from hospdata.patient a
left join hospdata.opd_visit b on a.hn = b.hn
left join hospdata.ipd_ipd c on b.vn = c.vn
left join hospdata.province d on a.prov = d.PROVINCE_CODE
left join hospdata.lib_pttype e on a.pttype = e.code
left join hospdata.lib_clinic f on b.dep = f.code
left join hospdata.lib_ward g on c.ward = g.code
where a.hn = "'.$hn.'"  and b.vn = (select max(vn) from hospdata.opd_visit where hn = "'.$hn.'")';

                    $command = Yii::$app->db->createCommand($sql);
                    $result = $command->queryAll();
          $fullname = '';
          $address = '';
          $pid = '';
          $vn = '';
          $an = '';
          $office = '';
          $age = '';
          $pttype = '';
          $pttype_name = '';
          $ward = '';
          $clinic = '';
          foreach ($result as $v){
            $fullname = $v['fullname'];
            $address = $v['address'];
            $pid = $v['pid'];
            $vn = $v['vn'];
            $an = $v['an'];
            $age = $v['age'];
            $pttype = $v['pttype'];
            $pttype_name = $v['pttype_name'];
            $ward = $v['ward'];
            $clinic = $v['clinic'];
            if(isset($v['an'])){
              $office = 'หอผู้ป่วย '.$v['ward_name'];
            }else{
              $office = $v['clinic_name'];
            }
          }
        return Json::encode([
        'fullname'=> $fullname,
        'address' => $address,
        'pid' => $pid,
        'vn' => $vn,
        'an' => $an,
        'age' => $age,
        'office' => $office,
        'pttype' => $pttype,
        'pttype_name' => $pttype_name,
        'ward' => $ward,
        'clinic' => $clinic,

    ]);
    }



    public function actionPatientinfobyvn($vn){
      $sql = '
      select
a.hn
,b.vn
,b.date as visit_date
,a.no_card as pid
,c.an
,c.admite
,c.disc
,b.dep as clinic
,f.clinic as clinic_name
,c.ward
,g.ward as ward_name
,CONCAT(a.title,a.name," ",a.surname) as fullname
,a.pttype
,a.age
,e.text as pttype_name
,a.birth
,CONCAT(a.address
,(case a.moo when "" then "" else  CONVERT(concat(" หมู่" , a.moo," ") USING utf8) end)
,(case a.road when "" then "" else CONVERT(concat(" ถนน" , a.road," ") USING utf8) end)
,(case a.tambol when "" then "" else CONVERT(concat(" ตำบล" , a.tambol," ") USING utf8) end)
,(case a.amp when "" then "" else CONVERT(concat(" อำเภอ" , a.amp," ") USING utf8) end)
,concat(" จังหวัด",d.PROVINCE_NAME)
) as address

from hospdata.patient a
left join hospdata.opd_visit b on a.hn = b.hn
left join hospdata.ipd_ipd c on b.vn = c.vn
left join hospdata.province d on a.prov = d.PROVINCE_CODE
left join hospdata.lib_pttype e on a.pttype = e.code
left join hospdata.lib_clinic f on b.dep = f.code
left join hospdata.lib_ward g on c.ward = g.code
where b.vn =  "'.$vn.'"';

                    $command = Yii::$app->db->createCommand($sql);
                    $result = $command->queryAll();
                    $fullname = '';
                    $address = '';
                    $pid = '';
                    $hn = '';
                    $an = '';
                    $office = '';
                    $age = '';
                    $pttype = '';
                    $pttype_name = '';
                    $ward = '';
                    $clinic = '';
          foreach ($result as $v){
            $fullname = $v['fullname'];
            $address = $v['address'];
            $pid = $v['pid'];
            $hn = $v['hn'];
            $an = $v['an'];
            $age = $v['age'];
            $pttype = $v['pttype'];
            $pttype_name = $v['pttype_name'];
            $ward = $v['ward'];
            $clinic = $v['clinic'];
            if(isset($v['an'])){
              $office = 'หอผู้ป่วย '.$v['ward_name'];
            }else{
              $office = $v['clinic_name'];
            }
          }
        return Json::encode([
          'fullname'=> $fullname,
          'address' => $address,
          'pid' => $pid,
          'hn' => $hn,
          'an' => $an,
          'age' => $age,
          'office' => $office,
          'pttype' => $pttype,
          'pttype_name' => $pttype_name,
          'ward' => $ward,
          'clinic' => $clinic,

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

public function actionSubvn() {
    $out = [];
    if (isset($_POST['depdrop_parents'])) {
        $parents = $_POST['depdrop_parents'];
        $preselected = '';
        if ($parents != null) {
            $hn = $parents[0];

            $result = $this->getVn($hn);

            $out = [];
            foreach($result as $v){
              $out[] = [
                'id' => $v['id'],
                'name' => $v['name']
              ];
            }

            echo Json::encode(['output'=>$out,'selected'=>'']);
            return;
        }
    }
    echo Json::encode(['output'=>'', 'selected'=>'']);
}

protected function getVN($hn){

  $sql = "
  select
    a.hn
    ,b.vn as 'id'
    ,b.date as visit_date
    ,CONCAT( b.vn ,' [ ',b.date,' | ',if(f.clinic !='',f.clinic,''),' ] ') as 'name'
    from hospdata.patient a
    left join hospdata.opd_visit b on a.hn = b.hn
    left join hospdata.ipd_ipd c on b.vn = c.vn
    left join hospdata.province d on a.prov = d.PROVINCE_CODE
    left join hospdata.lib_pttype e on a.pttype = e.code
    left join hospdata.lib_clinic f on b.dep = f.code
    left join hospdata.lib_ward g on c.ward = g.code
    where a.hn = :hn
    order by visit_date desc
    limit 10
  ";
  $command = Yii::$app->db->createCommand($sql);
  $command->bindValue(':hn',$hn);
  $result = $command->queryAll();

  return $result;

}


}
