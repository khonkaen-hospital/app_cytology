<?php

use yii\helpers\Html;
// use yii\grid\GridView;
use yii\widgets\Pjax;
use kartik\grid\GridView;
use kartik\grid\DataColumn;
use frontend\modules\cytology\models\CytoOut;
use frontend\modules\cytology\models\ViewPatientInfoOut;
/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\cytology\models\CytoOutSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ทะเบียนผู้ป่วย นอก รพ.';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cyto-out-index">

      <center><h1><?= Html::encode($this->title) ?></h1></center>

      <br/>
      <br/>
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>


        <?php // Html::a(Yii::t('app', 'Create Cyto Out'), ['create'], ['class' => 'btn btn-success']) ?>

    <?=

    GridView::widget([
            'dataProvider' => $dataProvider,
                  'responsive'=>true,
                  'responsiveWrap' => false,
            //'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                [
                  'class' => 'kartik\grid\ExpandRowColumn',
                  'expandOneOnly' =>true,
                  'value' => function ($model,$key,$index,$column){
                    return GridView::ROW_COLLAPSED;
                  },
                  'detail' => function($model,$key,$index,$column){
                    $pt_info = ViewPatientInfoOut::find()->where(['cn'=>$model->cn])->one();
                    return Yii::$app->controller->renderPartial('_detailview',[
                      'model' =>$pt_info
                    ]);
                  }
                ],

                'cn_date:date',
                'cn',
                //'pid',
                'title',
                'name',
                'surname',
                
                // 'cyto_type',
                [
                  'label'=>'การตรวจ',
                  'options' => ['class'=> 'col-md-1'],
                  'attribute'=>'cytotypeName',
                  'value'=>function($model){
                    return $model->cytotypeName;
                  }
                ],
                [
                  'label'=>'สถานพยาบาล',
                  'options' => ['class'=> 'col-md-2'],
                  'attribute'=>'HospName',
                ],

                // ['class' => 'yii\grid\ActionColumn'],
                [
                  'class' => 'yii\grid\ActionColumn',
                  'header'=>'ลงผล',
                  'template'=>'{update}',
                  'buttons'=>[
                    'update' => function($url,$model,$key){
                      return Html::a('<button type="button" class="btn btn-default"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button>',$url);
                    }
                  ]
                ]
            ],
        ]);

        ?>

</div>
