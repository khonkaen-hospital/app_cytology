<?php

use yii\helpers\Html;
// use yii\grid\GridView;
use yii\widgets\Pjax;
use kartik\grid\GridView;
use kartik\grid\DataColumn;
use frontend\modules\cytology\models\CytoIn;
use frontend\modules\cytology\models\ViewPatientInfo;
/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\cytology\models\CytoInSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ทะเบียนผู้ป่วย';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cyto-in-index">

    <center><h1><?= Html::encode($this->title) ?></h1></center>


    <!-- <div class="col-md-offset-10">

        <?php //echo Html::a('<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> ลงทะเบียนใหม่', ['create'], ['class' => 'btn btn-success']) ?>
      </div> -->

      <br/>
      <br/>
      <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

<?php Pjax::begin(); ?>

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
                $pt_info = ViewPatientInfo::find()->where(['cn'=>$model->cn])->one();
                return Yii::$app->controller->renderPartial('_detailview',[
                  'model' =>$pt_info
                ]);
              }
            ],
            'cn_date',
            'cn',
            'hn',
            'fullname',
            'pttype_name',
            // 'cyto_type',
            [
              'label'=>'การตรวจ',
              'options' => ['class'=> 'col-md-1'],
              'attribute'=>'cytotypeName',
              'value'=>function($model){
                return $model->cytotypeName;
              }
            ],
            // 'smear_type',
            // 'specimen',
            // 'adecuacy',
            // 'cause',
            // 'price',
            // 'result_level',
            // 'result1',
            // 'result2',
            // 'result3',
            // 'result4',
            // 'result_detail',
            // 'comment',
            // 'cytist1',
            // 'cytist2',
            // 'result_date',
            // 'last_updated',

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


<?php Pjax::end(); ?></div>
