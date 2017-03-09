<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\cytology\models\CytoOutSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cyto-out-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="row">
      <div class="col-md-2">
        <?= $form->field($model, 'cn')->textInput(['placeholder'=>'CN'])->label(false) ?>
      </div>
      <div class="col-md-2">
        <?= $form->field($model, 'pid')->textInput(['placeholder'=>'PID'])->label(false) ?>
      </div>
      <div class="col-md-2">
        <?= $form->field($model, 'name')->textInput(['placeholder'=>'name'])->label(false) ?>
      </div>

    <?php // echo $form->field($model, 'surname') ?>

    <?php // echo $form->field($model, 'birthdate') ?>

    <?php // echo $form->field($model, 'age') ?>



    <?php // echo $form->field($model, 'pttype') ?>

    <?php // echo $form->field($model, 'pttype_name') ?>

    <?php // echo $form->field($model, 'requester') ?>

    <?php // echo $form->field($model, 'hospcode') ?>

    <?php // echo $form->field($model, 'hospname') ?>

    <?php // echo $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'tambol') ?>

    <?php // echo $form->field($model, 'amp') ?>

    <?php // echo $form->field($model, 'prov') ?>

    <?php // echo $form->field($model, 'cyto_type') ?>

    <?php // echo $form->field($model, 'smear_type') ?>

    <?php // echo $form->field($model, 'specimen') ?>

    <?php // echo $form->field($model, 'adecuacy') ?>

    <?php // echo $form->field($model, 'cause') ?>

    <?php // echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'result_level') ?>

    <?php // echo $form->field($model, 'result1') ?>

    <?php // echo $form->field($model, 'result2') ?>

    <?php // echo $form->field($model, 'result3') ?>

    <?php // echo $form->field($model, 'result4') ?>

    <?php // echo $form->field($model, 'result_detail') ?>

    <?php // echo $form->field($model, 'comment') ?>

    <?php // echo $form->field($model, 'cytist1') ?>

    <?php // echo $form->field($model, 'cytist2') ?>

    <?php // echo $form->field($model, 'result_date') ?>

    <?php // echo $form->field($model, 'last_updated') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'ค้นหา'), ['class' => 'btn btn-primary']) ?>
        <?php // Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
        <?= Html::a('<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> ลงทะเบียนผู้ป่วยใหม่ นอก รพ.', ['create'], ['class' => 'btn btn-success']) ?>

    </div>
  </div>

    <?php ActiveForm::end(); ?>

</div>
