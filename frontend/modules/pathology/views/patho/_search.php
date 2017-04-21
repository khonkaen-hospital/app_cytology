<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\pathology\models\PathoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="patho-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ref') ?>

    <?= $form->field($model, 'patho_no') ?>

    <?= $form->field($model, 'hn') ?>

    <?= $form->field($model, 'vn') ?>

    <?= $form->field($model, 'an') ?>

    <?php // echo $form->field($model, 'pid') ?>

    <?php // echo $form->field($model, 'date') ?>

    <?php // echo $form->field($model, 'title') ?>

    <?php // echo $form->field($model, 'name') ?>

    <?php // echo $form->field($model, 'surname') ?>

    <?php // echo $form->field($model, 'age') ?>

    <?php // echo $form->field($model, 'date_dx') ?>

    <?php // echo $form->field($model, 'result') ?>

    <?php // echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'paid') ?>

    <?php // echo $form->field($model, 'pttype') ?>

    <?php // echo $form->field($model, 'type') ?>

    <?php // echo $form->field($model, 'dep') ?>

    <?php // echo $form->field($model, 'dep_name') ?>

    <?php // echo $form->field($model, 'ward') ?>

    <?php // echo $form->field($model, 'ward_name') ?>

    <?php // echo $form->field($model, 'hosp') ?>

    <?php // echo $form->field($model, 'hosp_name') ?>

    <?php // echo $form->field($model, 'isresult') ?>

    <?php // echo $form->field($model, 'routine') ?>

    <?php // echo $form->field($model, 'frozen') ?>

    <?php // echo $form->field($model, 'special') ?>

    <?php // echo $form->field($model, 'immuno') ?>

    <?php // echo $form->field($model, 'patho1') ?>

    <?php // echo $form->field($model, 'patho2') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
