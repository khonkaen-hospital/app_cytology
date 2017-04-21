<?php

namespace frontend\modules\pathology\controllers;

use Yii;
use frontend\modules\pathology\models\Patho;
use frontend\modules\pathology\models\PathoSearch;
use frontend\modules\pathology\models\Paydetail;
use yii\base\Model;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PathoController implements the CRUD actions for Patho model.
 */
class PathoController extends Controller
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
     * Lists all Patho models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PathoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Patho model.
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
     * Creates a new Patho model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

        $modelPatho = new Patho();
        $modelPaydetail = new Paydetail();

        if ($modelPatho->load(Yii::$app->request->post()) &&
            $modelPaydetail->load(Yii::$app->request->post()) &&
            Model::validateMultiple([$modelPatho,$modelPaydetail])
        ) {
            if($modelPatho->save()){
              $modelPaydetail->patho_ref = $modelPatho->ref;
              $modelPaydetail->patho_no = $modelPatho->patho_no;
              $modelPaydetail->save();
            }
            return $this->redirect(['view', 'id' => $modelPatho->ref]);
        } else {
            return $this->render('create', [
                'model' => $modelPatho,
                'modelPaydetail'=>$modelPaydetail,
            ]);
        }


    }

    /**
     * Updates an existing Patho model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ref]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Patho model.
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
     * Finds the Patho model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Patho the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Patho::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
