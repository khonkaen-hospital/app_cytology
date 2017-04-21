<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\pathology\models\Paydetail */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Paydetail',
]) . $model->ref;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Paydetails'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ref, 'url' => ['view', 'id' => $model->ref]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="paydetail-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
