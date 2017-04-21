<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\pathology\models\Diagnosis */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Diagnosis',
]) . $model->ref;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Diagnoses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ref, 'url' => ['view', 'id' => $model->ref]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="diagnosis-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
