<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\cytology\models\CytoOut */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Cyto Out',
]) . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cyto Outs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->ref]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="cyto-out-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'changwat' => $changwat,
        'fullage' => $fullage,
    ]) ?>

</div>
