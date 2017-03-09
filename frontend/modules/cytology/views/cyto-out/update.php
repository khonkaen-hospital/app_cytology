<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\cytology\models\CytoOut */

$this->title = 'ลงผลการตรวจ CN : ' . $model->cn;
$this->params['breadcrumbs'][] = ['label' => 'ทะเบียนผู้ป่วย นอก รพ.', 'url' => ['index']];
// $this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->ref]];
$this->params['breadcrumbs'][] = 'ลงผลการตรวจ CN : ' . $model->cn;
?>
<div class="cyto-out-update">

  <h1><center><?= Html::encode($this->title) ?></center></h1>
  <br/>
    <?= $this->render('_form', [
        'model' => $model,
        'changwat' => $changwat,
        'fullage' => $fullage,
    ]) ?>

</div>
