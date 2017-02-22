<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\modules\cytology\models\CytoIn */

$this->title = 'ลงทะเบียนผู้ป่วย';
$this->params['breadcrumbs'][] = ['label' => 'ทะเบียนผู้ป่วย', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cyto-in-create">

    <h1><center><?= Html::encode($this->title) ?></center></h1>
    <br/>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
