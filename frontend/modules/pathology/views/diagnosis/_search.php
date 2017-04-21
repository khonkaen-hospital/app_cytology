<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\pathology\models\DiagnosisSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="diagnosis-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ref') ?>

    <?= $form->field($model, 'patho_no') ?>

    <?= $form->field($model, 'hn') ?>

    <?= $form->field($model, 'date') ?>

    <?= $form->field($model, 'spc1') ?>

    <?php // echo $form->field($model, 'spc2') ?>

    <?php // echo $form->field($model, 'spc3') ?>

    <?php // echo $form->field($model, 'dx1') ?>

    <?php // echo $form->field($model, 'dx2') ?>

    <?php // echo $form->field($model, 'dx3') ?>

    <?php // echo $form->field($model, 'diagnosis') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
