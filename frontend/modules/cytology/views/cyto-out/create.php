<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\modules\cytology\models\CytoOut */

$this->title = 'ลงทะเบียนผู้ป่วย นอก รพ.';
$this->params['breadcrumbs'][] = ['label' => 'ทะเบียนผู้ป่วย นอก รพ.', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cyto-out-create">

  <h1><center><?= Html::encode($this->title) ?></center></h1>
  <br/>

    <?= $this->render('_form', [
        'model' => $model,
        'changwat' => $changwat
    ]) ?>

</div>
