<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\cytology\models\CytoOut */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cyto-out-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cn_date')->textInput() ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'surname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'birthdate')->textInput() ?>

    <?= $form->field($model, 'age')->textInput() ?>

    <?= $form->field($model, 'pid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pttype')->textInput() ?>

    <?= $form->field($model, 'pttype_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'requester')->textInput() ?>

    <?= $form->field($model, 'hospcode')->textInput() ?>

    <?= $form->field($model, 'hospname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tambol')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'amp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'prov')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cyto_type')->textInput() ?>

    <?= $form->field($model, 'smear_type')->textInput() ?>

    <?= $form->field($model, 'specimen')->textInput() ?>

    <?= $form->field($model, 'adequacy')->textInput() ?>

    <?= $form->field($model, 'cause')->textInput() ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'result_level')->textInput() ?>

    <?= $form->field($model, 'result1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'result2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'result3')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'result4')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'result_detail')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'comment')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cytist1')->textInput() ?>

    <?= $form->field($model, 'cytist2')->textInput() ?>

    <?= $form->field($model, 'result_date')->textInput() ?>

    <?= $form->field($model, 'last_updated')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
