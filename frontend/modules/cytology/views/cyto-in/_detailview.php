<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\date\DatePicker;
use yii\helpers\Url; //include for Url
use frontend\modules\cytology\models\LibSmearType;
use frontend\modules\cytology\models\LibCytoType;
use frontend\modules\cytology\models\LibSpecimen;
use frontend\modules\cytology\models\LibAdequacy;
use frontend\modules\cytology\models\LibResult;
use frontend\modules\cytology\models\LibAdequacySpecimen;
use frontend\modules\cytology\models\LibCytist;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model frontend\modules\cytology\models\CytoIn */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="cyto-in-form">

<div class="row">
<div class="col-md-6">
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">ข้อมูลผู้ป่วย</h3>
  </div>
<div class="panel-body">
<table class="table table-hover">
  <tr>
    <td colspan="2">HN: <?= $model->hn?>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; CN: <?= $model->cn?></td>
  </tr>
  <tr>
    <td>ชื่อ-สกุล</td>
    <td><?= $model->fullname ?></td>
  </tr>
  <tr>
    <td>อายุ</td>
    <td><?= $model->age ?> ปี</td>
  </tr>
  <tr>
    <td>PID</td>
    <td><?= $model->pid ?></td>
  </tr>
  <tr>
    <td>ที่อยู่</td>
    <td><?= $model->address ?></td>
  </tr>

</table>

</div>
</div>
</div>
<div class="col-md-6">
<div class="panel panel-default ">
  <div class="panel-heading">
    <h3 class="panel-title">ผลการตรวจ <?= $model->cytotype_name ?>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       <?= Html::a('ลงผลตรวจ', ['update', 'id' => $model->ref], ['class' => 'btn btn-default']) ?>
    </h3>

  </div>
<div class="panel-body">
<table class="table table-hover">
  <tr>
      <td>ผลตรวจ 1</td><td><?= $model->result1 ?></td><td><?= $model->r1_detail ?></td>
  </tr>
  <tr>
      <td>ผลตรวจ 2</td><td><?= $model->result2 ?></td><td><?= $model->r2_detail ?></td>
  </tr>
  <tr>
      <td>ผลตรวจ 3</td><td><?= $model->result3 ?></td><td><?= $model->r3_detail ?></td>
  </tr>
  <tr>
      <td>ผลตรวจ 4</td><td><?= $model->result4 ?></td><td><?= $model->r4_detail ?></td>
  </tr>
  <tr class="warning" >
      <td colspan="3"><center><b>ราคา</b>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <u><?= $model->price ?></u>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <b>บาท</b></center></td>
  </tr>
</table>


</div>
</div>
</div>
</div>

</div>
