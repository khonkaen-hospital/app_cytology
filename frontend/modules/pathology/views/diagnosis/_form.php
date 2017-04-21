<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\pathology\models\Diagnosis */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="diagnosis-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'patho_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'spc1')->textInput() ?>

    <?= $form->field($model, 'spc2')->textInput() ?>

    <?= $form->field($model, 'spc3')->textInput() ?>

    <?= $form->field($model, 'dx1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dx2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dx3')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'diagnosis')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
