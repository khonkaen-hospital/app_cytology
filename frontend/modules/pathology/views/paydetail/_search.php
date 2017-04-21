<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\pathology\models\PaydetailSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="paydetail-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ref') ?>

    <?= $form->field($model, 'patho_no') ?>

    <?= $form->field($model, 'hn') ?>

    <?= $form->field($model, 'p_type') ?>

    <?= $form->field($model, 'r1') ?>

    <?php // echo $form->field($model, 'r1_cost') ?>

    <?php // echo $form->field($model, 'r1_detail') ?>

    <?php // echo $form->field($model, 'r2') ?>

    <?php // echo $form->field($model, 'r2_cost') ?>

    <?php // echo $form->field($model, 'r2_detail') ?>

    <?php // echo $form->field($model, 'r3') ?>

    <?php // echo $form->field($model, 'r3_cost') ?>

    <?php // echo $form->field($model, 'r3_detail') ?>

    <?php // echo $form->field($model, 's1') ?>

    <?php // echo $form->field($model, 's1_cost') ?>

    <?php // echo $form->field($model, 's1_detail') ?>

    <?php // echo $form->field($model, 's2') ?>

    <?php // echo $form->field($model, 's2_cost') ?>

    <?php // echo $form->field($model, 's2_detail') ?>

    <?php // echo $form->field($model, 's3') ?>

    <?php // echo $form->field($model, 's3_cost') ?>

    <?php // echo $form->field($model, 's3_detail') ?>

    <?php // echo $form->field($model, 'i1') ?>

    <?php // echo $form->field($model, 'i1_cost') ?>

    <?php // echo $form->field($model, 'i1_detail') ?>

    <?php // echo $form->field($model, 'i2') ?>

    <?php // echo $form->field($model, 'i2_cost') ?>

    <?php // echo $form->field($model, 'i2_detail') ?>

    <?php // echo $form->field($model, 'i3') ?>

    <?php // echo $form->field($model, 'i3_cost') ?>

    <?php // echo $form->field($model, 'i3_detail') ?>

    <?php // echo $form->field($model, 'f1') ?>

    <?php // echo $form->field($model, 'f1_cost') ?>

    <?php // echo $form->field($model, 'f1_detail') ?>

    <?php // echo $form->field($model, 'f2') ?>

    <?php // echo $form->field($model, 'f2_cost') ?>

    <?php // echo $form->field($model, 'f2_detail') ?>

    <?php // echo $form->field($model, 'f3') ?>

    <?php // echo $form->field($model, 'f3_cost') ?>

    <?php // echo $form->field($model, 'f3_detail') ?>

    <?php // echo $form->field($model, 'total') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
