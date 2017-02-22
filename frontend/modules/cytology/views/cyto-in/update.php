<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\cytology\models\CytoIn */

$this->title = 'ลงผลการตรวจ CN : ' . $model->cn;
$this->params['breadcrumbs'][] = ['label' => 'Cyto Ins', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ref, 'url' => ['view', 'id' => $model->ref]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cyto-in-update">

    <h1><center><?= Html::encode($this->title) ?></center></h1>
    <br/>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
