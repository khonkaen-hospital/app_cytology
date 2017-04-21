<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\depdrop\DepDrop;
use yii\widgets\MaskedInput;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model frontend\modules\pathology\models\Patho */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="patho-form">

    <?php $form = ActiveForm::begin(); ?>


    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">ข้อมูลผู้ป่วย</h3>
      </div>
     <div class="panel-body">

<div class="row">
  <div class="col-md-3">
    <?= $form->field($model, 'type')->radioList(['0'=>'IPD','1'=>'OPD','2'=>'รพ.อื่นๆ']) ?>
  </div>
</div>
<div class="row">
  <div class="col-md-3">
    <?php
      echo $form->field($model, 'date')->widget(MaskedInput::className(), [
          'mask' => '99-99-9999',
          'options' => ['class'=>'form-control']
        ])->label('วันที่ลงทะเบียน (Ex. 28-02-2560)')
    ?>
  </div>
  <div class="col-md-3">
    <?= $form->field($model, 'patho_no')->textInput(['maxlength' => true]) ?>
  </div>
</div>
<div class="row">
  <div class="col-md-3"><?= $form->field($model, 'hn')->textInput(['maxlength' => true]) ?></div>
  <div class="col-md-3"> <?= $form->field($model, 'vn')->textInput(['maxlength' => true]) ?></div>
  <div class="col-md-3"><?= $form->field($model, 'an')->textInput(['maxlength' => true]) ?></div>
  <div class="col-md-3"><?= $form->field($model, 'pid')->textInput(['maxlength' => true]) ?></div>
</div>
<div class="row">
  <div class="col-md-2"><?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?></div>
  <div class="col-md-4"><?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?></div>
  <div class="col-md-4"><?= $form->field($model, 'surname')->textInput(['maxlength' => true]) ?></div>
  <div class="col-md-2"><?= $form->field($model, 'age')->textInput() ?></div>
</div>
<div class="row">
  <div class="col-md-3"><?= $form->field($model, 'pttype')->textInput() ?></div>
  <div class="col-md-3"><?= $form->field($model, 'dep')->textInput(['maxlength' => true]) ?></div>
  <div class="col-md-3"><?= $form->field($model, 'ward')->textInput() ?></div>
  <div class="col-md-3"><?= $form->field($model, 'hosp')->textInput(['maxlength' => true]) ?></div>
</div>
<div class="row">
  <div class="col-md-3"><?= $form->field($model, 'patho1')->textInput() ?></div>
  <div class="col-md-3"><?= $form->field($model, 'patho2')->textInput() ?></div>
</div>

</div>
</div>


<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">ข้อมูลการตรวจ</h3>
  </div>
 <div class="panel-body">
   <div class="row">
     <div class="col-md-2"> <?= $form->field($modelPaydetail, 'r1')->textInput() ?></div>
     <div class="col-md-4"> <?= $form->field($modelPaydetail, 'r1_detail')->textInput(['maxlength' => true]) ?></div>
     <div class="col-md-2"> <?= $form->field($modelPaydetail, 'r1_cost')->textInput() ?></div>
   </div>
   <div class="row">
     <div class="col-md-2"> <?= $form->field($modelPaydetail, 'r2')->textInput() ?></div>
     <div class="col-md-4"> <?= $form->field($modelPaydetail, 'r2_detail')->textInput(['maxlength' => true]) ?></div>
     <div class="col-md-2"> <?= $form->field($modelPaydetail, 'r2_cost')->textInput() ?></div>
   </div>
   <div class="row">
     <div class="col-md-2"> <?= $form->field($modelPaydetail, 'r3')->textInput() ?></div>
     <div class="col-md-4"> <?= $form->field($modelPaydetail, 'r3_detail')->textInput(['maxlength' => true]) ?></div>
     <div class="col-md-2"> <?= $form->field($modelPaydetail, 'r3_cost')->textInput() ?></div>
   </div>

   <div class="row">
     <div class="col-md-2"> <?= $form->field($modelPaydetail, 's1')->textInput() ?></div>
     <div class="col-md-4"> <?= $form->field($modelPaydetail, 's1_detail')->textInput(['maxlength' => true]) ?></div>
     <div class="col-md-2"> <?= $form->field($modelPaydetail, 's1_cost')->textInput() ?></div>
   </div>
   <div class="row">
     <div class="col-md-2"> <?= $form->field($modelPaydetail, 's2')->textInput() ?></div>
     <div class="col-md-4"> <?= $form->field($modelPaydetail, 's2_detail')->textInput(['maxlength' => true]) ?></div>
     <div class="col-md-2"> <?= $form->field($modelPaydetail, 's2_cost')->textInput() ?></div>
   </div>
   <div class="row">
     <div class="col-md-2"> <?= $form->field($modelPaydetail, 's3')->textInput() ?></div>
     <div class="col-md-4"> <?= $form->field($modelPaydetail, 's3_detail')->textInput(['maxlength' => true]) ?></div>
     <div class="col-md-2"> <?= $form->field($modelPaydetail, 's3_cost')->textInput() ?></div>
   </div>

   <div class="row">
     <div class="col-md-2"> <?= $form->field($modelPaydetail, 'i1')->textInput() ?></div>
     <div class="col-md-4"> <?= $form->field($modelPaydetail, 'i1_detail')->textInput(['maxlength' => true]) ?></div>
     <div class="col-md-2"> <?= $form->field($modelPaydetail, 'i1_cost')->textInput() ?></div>
   </div>
   <div class="row">
     <div class="col-md-2"> <?= $form->field($modelPaydetail, 'i2')->textInput() ?></div>
     <div class="col-md-4"> <?= $form->field($modelPaydetail, 'i2_detail')->textInput(['maxlength' => true]) ?></div>
     <div class="col-md-2"> <?= $form->field($modelPaydetail, 'i2_cost')->textInput() ?></div>
   </div>
   <div class="row">
     <div class="col-md-2"> <?= $form->field($modelPaydetail, 'i3')->textInput() ?></div>
     <div class="col-md-4"> <?= $form->field($modelPaydetail, 'i3_detail')->textInput(['maxlength' => true]) ?></div>
     <div class="col-md-2"> <?= $form->field($modelPaydetail, 'i3_cost')->textInput() ?></div>
   </div>

   <div class="row">
     <div class="col-md-2"> <?= $form->field($modelPaydetail, 'f1')->textInput() ?></div>
     <div class="col-md-4"> <?= $form->field($modelPaydetail, 'f1_detail')->textInput(['maxlength' => true]) ?></div>
     <div class="col-md-2"> <?= $form->field($modelPaydetail, 'f1_cost')->textInput() ?></div>
   </div>
   <div class="row">
     <div class="col-md-2"> <?= $form->field($modelPaydetail, 'f2')->textInput() ?></div>
     <div class="col-md-4"> <?= $form->field($modelPaydetail, 'f2_detail')->textInput(['maxlength' => true]) ?></div>
     <div class="col-md-2"> <?= $form->field($modelPaydetail, 'f2_cost')->textInput() ?></div>
   </div>
   <div class="row">
     <div class="col-md-2"> <?= $form->field($modelPaydetail, 'f3')->textInput() ?></div>
     <div class="col-md-4"> <?= $form->field($modelPaydetail, 'f3_detail')->textInput(['maxlength' => true]) ?></div>
     <div class="col-md-2"> <?= $form->field($modelPaydetail, 'f3_cost')->textInput() ?></div>
   </div>

   <div class="row">
     <div class="col-md-2"> <?= $form->field($modelPaydetail, 'total')->textInput() ?></div>
    </div>



</div>
</div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'บันทึก') : Yii::t('app', 'บันทึก'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
