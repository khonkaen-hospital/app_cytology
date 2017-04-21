<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\pathology\models\Paydetail */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="paydetail-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'patho_no')->textInput() ?>

    <?= $form->field($model, 'hn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'p_type')->textInput() ?>

    <?= $form->field($model, 'r1')->textInput() ?>

    <?= $form->field($model, 'r1_cost')->textInput() ?>

    <?= $form->field($model, 'r1_detail')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'r2')->textInput() ?>

    <?= $form->field($model, 'r2_cost')->textInput() ?>

    <?= $form->field($model, 'r2_detail')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'r3')->textInput() ?>

    <?= $form->field($model, 'r3_cost')->textInput() ?>

    <?= $form->field($model, 'r3_detail')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 's1')->textInput() ?>

    <?= $form->field($model, 's1_cost')->textInput() ?>

    <?= $form->field($model, 's1_detail')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 's2')->textInput() ?>

    <?= $form->field($model, 's2_cost')->textInput() ?>

    <?= $form->field($model, 's2_detail')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 's3')->textInput() ?>

    <?= $form->field($model, 's3_cost')->textInput() ?>

    <?= $form->field($model, 's3_detail')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'i1')->textInput() ?>

    <?= $form->field($model, 'i1_cost')->textInput() ?>

    <?= $form->field($model, 'i1_detail')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'i2')->textInput() ?>

    <?= $form->field($model, 'i2_cost')->textInput() ?>

    <?= $form->field($model, 'i2_detail')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'i3')->textInput() ?>

    <?= $form->field($model, 'i3_cost')->textInput() ?>

    <?= $form->field($model, 'i3_detail')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'f1')->textInput() ?>

    <?= $form->field($model, 'f1_cost')->textInput() ?>

    <?= $form->field($model, 'f1_detail')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'f2')->textInput() ?>

    <?= $form->field($model, 'f2_cost')->textInput() ?>

    <?= $form->field($model, 'f2_detail')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'f3')->textInput() ?>

    <?= $form->field($model, 'f3_cost')->textInput() ?>

    <?= $form->field($model, 'f3_detail')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'total')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
