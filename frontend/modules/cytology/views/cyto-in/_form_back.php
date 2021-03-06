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

$lib_smear_type = ArrayHelper::map(LibSmearType::find()->all(), 'code', 'name');
$lib_cyto_type = ArrayHelper::map(LibCytoType::find()->all(), 'code', 'name');
$lib_specimen = ArrayHelper::map(LibSpecimen::find()->all(), 'code', 'name');
$lib_result = ArrayHelper::map(LibResult::find()->all(), 'code', 'result');
$lib_adequacy = ArrayHelper::map(LibAdequacy::find()->all(), 'code', 'name');
$lib_adequacy_specimen = ArrayHelper::map(LibAdequacySpecimen::find()->all(), 'code', 'name');
$lib_cytist = ArrayHelper::map(LibCytist::find()->all(), 'code', 'name');
// echo $today = date("Y-m-d");
// echo $thaiyear = substr((integer)substr(date("Y-m-d"),0,4)+543,2,2);
// echo $month = substr(date("Y-m-d"),5,2);
?>

<div class="cyto-in-form">

  <?php

$this->registerJs("
  function patientInfo() {
      var hn = $('#cytoin-hn').val();
      $.ajax({
        url: '" . Url::toRoute("cyto-in/patientinfo") . "',
        dataType: 'json',
        method: 'GET',
        data: {'hn': hn},
        success: function (data) {
        console.log(data.fullname);
            $('#txt_fullname').val(data.fullname);
            $('#txt_address').val(data.address);
            $('#pid').val(data.pid);
            $('#cytoin-vn').val(data.vn);
            $('#cytoin-an').val(data.an);
            $('#txt_age').val(data.age);
            $('#txt_pttype').val(data.pttype);
            $('#dep').val(data.office);
        }
      });
    }

  function patientInfoByVn(){
    var vn = $('#cytoin-vn').val();
    $.ajax({
        url: '" . Url::toRoute("cyto-in/patientinfobyvn") . "',
        dataType: 'json',
        method: 'GET',
        data: {'vn': vn},
        success: function (data) {
        console.log(data.fullname);
            $('#txt_fullname').val(data.fullname);
            $('#txt_address').val(data.address);
            $('#pid').val(data.pid);
            $('#cytoin-hn').val(data.hn);
            $('#cytoin-an').val(data.an);
            $('#txt_age').val(data.age);
            $('#txt_pttype').val(data.pttype);
            $('#dep').val(data.office);
        }
    });
  }

  function searchSpecimen(){
    $('#search_specimen').val($('#search_specimen').val().toUpperCase());
    $('#cytoin-specimen').val($('#search_specimen').val());
    return false;
  }
  function syncSpecimen(){
    $('#search_specimen').val($('#cytoin-specimen').val());
  }

  function searchCause(){
    $('#cytoin-cause').val($('#search_cause').val());
  }
  function syncCause(){
    $('#search_cause').val($('#cytoin-cause').val());
  }

  function searchResult1(){
    $('#cytoin-result1').val($('#search_result1').val());
  }
  function syncResult1(){
    $('#search_result1').val($('#cytoin-result1').val());
  }

  function searchResult2(){
    $('#cytoin-result2').val($('#search_result2').val());
  }
  function syncResult2(){
    $('#search_result2').val($('#cytoin-result2').val());
  }

  function searchResult3(){
    $('#cytoin-result3').val($('#search_result3').val());
  }
  function syncResult3(){
    $('#search_result3').val($('#cytoin-result3').val());
  }

  function searchResult4(){
    $('#cytoin-result4').val($('#search_result4').val());
  }
  function syncResult4(){
    $('#search_result4').val($('#cytoin-result4').val());
  }

  function searchCytist1(){
    $('#cytoin-cytist1').val($('#search_cytist1').val());
  }
  function syncCytist1(){
    $('#search_cytist1').val($('#cytoin-cytist1').val());
  }

  function searchCytist2(){
    $('#cytoin-cytist2').val($('#search_cytist2').val());
  }
  function syncCytist2(){
    $('#search_cytist2').val($('#cytoin-cytist2').val());
  }

    $('#cytoin-hn').on('change', function(e) {
        patientInfo();
    });
    $('#cytoin-vn').on('change', function(e) {
        patientInfoByVn();
    });

    $('#search_specimen').on('keyup', function(e) {
        searchSpecimen();
    });
    $('#cytoin-specimen').on('change', function(e) {
        syncSpecimen();
    });

    $('#search_cause').on('keyup', function(e) {
        searchCause();
    });
    $('#cytoin-cause').on('change', function(e) {
        syncCause();
    });

    $('#search_result1').on('keyup', function(e) {
        searchResult1();
    });
    $('#cytoin-result1').on('change', function(e) {
        syncResult1();
    });

    $('#search_result2').on('keyup', function(e) {
        searchResult2();
    });
    $('#cytoin-result2').on('change', function(e) {
        syncResult2();
    });

    $('#search_result3').on('keyup', function(e) {
        searchResult3();
    });
    $('#cytoin-result3').on('change', function(e) {
        syncResult3();
    });

    $('#search_result4').on('keyup', function(e) {
        searchResult4();
    });
    $('#cytoin-result4').on('change', function(e) {
        syncResult4();
    });

    $('#search_cytist1').on('keyup', function(e) {
        searchCytist1();
    });
    $('#cytoin-cytist1').on('change', function(e) {
        syncCytist1();
    });

    $('#search_cytist2').on('keyup', function(e) {
        searchCytist2();
    });
    $('#cytoin-cytist2').on('change', function(e) {
        syncCytist2();
    });

");

if(!$model->isNewRecord){
  $this->registerJs("
          //patientInfo();
          //ใช้ Vn จะตรงกับข้อมูลมากกว่า ในกรณีที่เผื่อคนไข้มี Visit มาใหม่ช่วงแก้ไขข้อมูล
          patientInfoByVn();
          syncSpecimen();
          syncCause();
          syncResult1();
          syncResult2();
          syncResult3();
          syncResult4();
          syncCytist1();
          syncCytist2();
  ");
}

  ?>

    <?php $form = ActiveForm::begin(); ?>

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">ข้อมูลผู้ป่วย</h3>
  </div>
<div class="panel-body">
<div class="row">
  <div class="col-md-3">
    <?php
    echo $form->field($model, 'cn_date')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'เลือกวันที่'],
        'language' => 'th',
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd',
            'todayHighlight' => true
        ]
    ]);
    ?>
  </div>
</div>
<div class="row">
  <div class="col-md-3">
    <?= $form->field($model, 'hn')->textInput(['maxlength' => true,'onclick'=>'test()']) ?>
  </div>
  <div class="col-md-3">
    <?= $form->field($model, 'vn')->textInput(['maxlength' => true]) ?>
  </div>
  <div class="col-md-3">
    <?= $form->field($model, 'an')->textInput(['maxlength' => true,'readonly'=>'readonly']) ?>
  </div>
  <div class="col-md-3">
    <?= $form->field($model, 'cn')->textInput(['maxlength' => true,'disabled'=>'disabled','placeholder'=>'Automatic']) ?>
  </div>
</div>



<div class="row">
  <div class="col-md-3">
  <div class="form-group">
    <label for="pid">เลขบัตรประจำตัวประชาชน</label>
    <input type="text" id="pid" name="pid" class="form-control" placeholder="เลขบัตรประจำตัวประชาชน" readonly="readonly"/>
  </div>
</div>
  <div class="form-group">
    <div class="col-md-3"><label for="txt_fullname">ชื่อ-สกุล</label>
    <input type="text" id="txt_fullname" name="txt_fullname" class="form-control" placeholder="ชื่อ-สกุล" readonly="readonly" /></div>
    <div class="col-md-2"><label for="txt_age">อายุ(ปี)</label>
    <input type="text" id="txt_age" name="txt_age" class="form-control" placeholder="อายุ" readonly="readonly" /></div>
    <div class="col-md-4"><label for="txt_pttype">สิทธิการรักษา</label>
    <input type="text" id="txt_pttype" name="txt_pttype" class="form-control" placeholder="สิทธิการรักษา" readonly="readonly" /></div>
  </div>

</div>

<div class="row">
<div class="form-group">
  <div class="col-md-6">
      <label for="txt_address">ที่อยู่</label>
      <input type="text" id="txt_address" name="txt_address" class="form-control" placeholder="ที่อยู่"  readonly="readonly"/>
  </div>
  <div class="col-md-6">
      <label for="dep">ห้องตรวจ/หอผู้ป่วย</label>
      <input type="text" id="dep" name="dep" class="form-control" placeholder="ห้องตรวจ/หอผู้ป่วย" readonly="readonly"/>
  </div>
</div>
</div>
</div>
</div>


<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">ข้อมูลการส่งตรวจ</h3>
  </div>
<div class="panel-body">
<div class="row">
  <div class="col-md-6">
    <?= $form->field($model, 'cyto_type')->dropDownList($lib_cyto_type) ?>
  </div>
  <div class="col-md-6">
    <?= $form->field($model, 'smear_type')->dropDownList($lib_smear_type,['prompt'=>'เลือก Smear Type']) ?>
  </div>
</div>

<div class="row">
  <div class="form-group ">
    <div class="col-md-2"><label for="search_specimen">รหัส Specimen</label><input type="text" id="search_specimen" class="form-control" placeholder="รหัส Specimen"/></div>
    <div class="col-md-4"><?= $form->field($model, 'specimen')->dropDownList($lib_specimen ,['prompt'=>'เลือก Specimen']) ?></div>
    <div class="col-md-6"><?= $form->field($model, 'adequacy')->dropDownList($lib_adequacy_specimen ,['prompt'=>'เลือก Adequacy of Specimen']) ?></div>
  </div>
</div>

<div class="row">
  <div class="form-group ">
    <div class="col-md-2"><label for="search_cause">รหัส สาเหตุ</label><input type="number" id="search_cause" class="form-control" placeholder="รหัส สาเหตุ"/></div>
    <div class="col-md-4"><?= $form->field($model, 'cause')->dropDownList($lib_adequacy ,['prompt'=>'เลือก สาเหตุ']) ?></div>
  <div class="col-md-6">
    <?= $form->field($model, 'price')->textInput() ?>
  </div>
</div>
</div>
</div>
</div>
<?php
if(!$model->isNewRecord){
?>


<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">ผลการตรวจ</h3>
  </div>
<div class="panel-body">

<div class="row">
  <!-- <div class="form-group"> -->
  <div class="col-md-6">
<div class="col-md-3"><label for="search_result1">รหัส ผลตรวจ1</label><input type="number" id="search_result1" class="form-control" placeholder="รหัส"/></div>
<div class="col-md-9"><?= $form->field($model, 'result1')->dropDownList($lib_result ,['prompt'=>'เลือก ผลตรวจ']) ?></div>
<div class="col-md-3"><label for="search_result2">รหัส ผลตรวจ2</label><input type="number" id="search_result2" class="form-control" placeholder="รหัส"/></div>
<div class="col-md-9"><?= $form->field($model, 'result2')->dropDownList($lib_result ,['prompt'=>'เลือก ผลตรวจ']) ?></div>
<div class="col-md-3"><label for="search_result3">รหัส ผลตรวจ3</label><input type="number" id="search_result3" class="form-control" placeholder="รหัส"/></div>
<div class="col-md-9"><?= $form->field($model, 'result3')->dropDownList($lib_result ,['prompt'=>'เลือก ผลตรวจ']) ?></div>
<div class="col-md-3"><label for="search_result4">รหัส ผลตรวจ4</label><input type="number" id="search_result4" class="form-control" placeholder="รหัส"/></div>
<div class="col-md-9"><?= $form->field($model, 'result4')->dropDownList($lib_result ,['prompt'=>'เลือก ผลตรวจ']) ?></div>
</div>

<div class="col-md-6">
<?= $form->field($model, 'result_detail')->textarea(['rows' => 12]) ?>
</div>
</div>

<div class="row">
  <div class="col-md-12">
<div class="col-md-2"><?= $form->field($model, 'result_level')->dropDownList([1=>1,2=>2,3=>3,4=>4],['prompt'=>'เลือกระดับความรุนแรง']) ?></div>
<div class="col-md-10"><?= $form->field($model, 'comment')->textInput(['maxlength' => true]) ?></div>
  </div>
</div>
<br/>
<div class="row">
  <div class="col-md-6">
    <div class="col-md-3"><label for="search_cytist1">รหัส ผู้อ่านผล1</label><input type="number" id="search_cytist1" class="form-control" placeholder="รหัส"/></div>
    <div class="col-md-9"><?= $form->field($model, 'cytist1')->dropDownList($lib_cytist ,['prompt'=>'เลือก ผู้อ่านผล1']) ?></div>
    <div class="col-md-3"><label for="search_cytist2">รหัส ผู้อ่านผล2</label><input type="number" id="search_cytist2" class="form-control" placeholder="รหัส"/></div>
    <div class="col-md-9"><?= $form->field($model, 'cytist2')->dropDownList($lib_cytist ,['prompt'=>'เลือก ผู้อ่านผล2']) ?></div>
  </div>
  <div class="col-md-6">
    <?php
    echo $form->field($model, 'result_date')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'เลือกวันที่'],
        'language' => 'th',
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd',
            'todayHighlight' => true
        ]
    ]);
    ?>
  </div>
</div>






</div>
</div>


<?php
}

?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'บันทึก' : 'แก้ไข', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
</div>
</div>
