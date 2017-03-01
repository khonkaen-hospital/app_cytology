<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\modules\cytology\models\LibCytoType;
/* @var $this yii\web\View */
/* @var $model frontend\modules\cytology\models\CytoInSearch */
/* @var $form yii\widgets\ActiveForm */

$lib_cyto_type = ArrayHelper::map(LibCytoType::find()->all(), 'code', 'name');

?>



<div class="cyto-in-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

<div class="row">
  <div class="col-md-2">
    <?= $form->field($model, 'cn')->textInput(['placeholder'=>'CN'])->label(false) ?>
  </div>
  <div class="col-md-2">
    <?= $form->field($model, 'hn')->textInput(['placeholder'=>'HN'])->label(false) ?>
  </div>
  <div class="col-md-2">
    <?= $form->field($model, 'cyto_type')->dropDownList($lib_cyto_type,['prompt'=>'เลือก ประเภทการตรวจ'])->label(false) ?>
  </div>
  <!-- <div class="col-md-2">
    <?php // $form->field($model, 'an')->textInput(['placeholder'=>'AN'])->label(false) ?>
  </div> -->
  <div class="form-group">
      <?= Html::submitButton('<span class="glyphicon glyphicon-search" aria-hidden="true"></span> ค้นหา', ['class' => 'btn btn-primary']) ?>
      <?= Html::a('<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Pap Smear', ['create', 'cyto_type' => '1' ], ['class' => 'btn btn-success']) ?>
      <?= Html::a('<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Non-Gyne', ['create', 'cyto_type' => '2' ], ['class' => 'btn btn-success']) ?>
      <?= Html::a('<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Thin Prep', ['create', 'cyto_type' => '3' ], ['class' => 'btn btn-success']) ?>

  </div>

</div>
<?php ActiveForm::end(); ?>
</div>
