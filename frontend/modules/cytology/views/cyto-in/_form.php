<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
// use yii\bootstrap\ActiveForm;
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
use kartik\depdrop\DepDrop;
use yii\widgets\MaskedInput;
use kartik\select2\Select2;

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


?>

<div class="cyto-in-form">

  <?php

$this->registerJs("



// $('input,option').keydown(function (e) {
//      if (e.which === 13) {
//         e.preventDefault();
//          var index = $('input,option').index(this) + 1;
//          $('input,option').eq(index).focus();
//      }
//  });





  function patientInfo() {
      var hn = $('#cytoin-hn').val();
      $.ajax({
        url: '" . Url::toRoute("cyto-in/patientinfo") . "',
        dataType: 'json',
        method: 'GET',
        data: {'hn': hn},
        success: function (data) {
        console.log(data.fullname);
            $('#cytoin-fullname').val(data.fullname);
            $('#cytoin-address').val(data.address);
            $('#cytoin-pid').val(data.pid);
            $('#cytoin-vn').val(data.vn);
            $('#cytoin-an').val(data.an);
            $('#cytoin-age').val(data.age);
            $('#cytoin-pttype_name').val(data.pttype_name);
            $('#cytoin-pttype').val(data.pttype);
            $('#cytoin-clinic_ward').val(data.office);
            $('#cytoin-clinic').val(data.clinic);
            $('#cytoin-ward').val(data.ward);
        }
      });
    }

  function patientInfoByVn(){
    var vn = $('#depdrop_vn').val();
    $.ajax({
        url: '" . Url::toRoute("cyto-in/patientinfobyvn") . "',
        dataType: 'json',
        method: 'GET',
        data: {'vn': vn},
        success: function (data) {
        console.log(data.fullname);
          $('#cytoin-fullname').val(data.fullname);
          $('#cytoin-address').val(data.address);
          $('#cytoin-pid').val(data.pid);
          $('#cytoin-hn').val(data.hn);
          $('#cytoin-an').val(data.an);
          $('#cytoin-age').val(data.age);
          $('#cytoin-pttype_name').val(data.pttype_name);
          $('#cytoin-pttype').val(data.pttype);
          $('#cytoin-clinic_ward').val(data.office);
          $('#cytoin-clinic').val(data.clinic);
          $('#cytoin-ward').val(data.ward);
        }
    });
  }

  function CytoPrice() {
      var code = $('#cytoin-cyto_type').val();
      $.ajax({
        url: '" . Url::toRoute("cyto-in/cytoprice") . "',
        dataType: 'json',
        method: 'GET',
        data: {'code': code},
        success: function (data) {
        console.log(data.code);
            $('#cytoin-price').val(data.price);
        }
      });
    }

    CytoPrice();

    $('#cytoin-cyto_type').on('change', function(e) {
        CytoPrice();
    });

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
    $('#cytoin-result1').val($('#search_result1').val()).trigger('change');
    //$('#cytoin-result1').val($('#search_result1').val()).change();
    //$('#cytoin-result1').val($('#search_result1').val());
  }
  function syncResult1(){
    $('#search_result1').val($('#cytoin-result1').val());
  }

  function searchResult2(){
    $('#cytoin-result2').val($('#search_result2').val()).trigger('change');
    //$('#cytoin-result2').val($('#search_result2').val());
  }
  function syncResult2(){
    $('#search_result2').val($('#cytoin-result2').val());
  }

  function searchResult3(){
    $('#cytoin-result3').val($('#search_result3').val()).trigger('change');
    //$('#cytoin-result3').val($('#search_result3').val());
  }
  function syncResult3(){
    $('#search_result3').val($('#cytoin-result3').val());
  }

  function searchResult4(){
    $('#cytoin-result4').val($('#search_result4').val()).trigger('change');
    //$('#cytoin-result4').val($('#search_result4').val());
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

    // $('#cytoin-hn').on('change', function(e) {
    //     patientInfo();
    // });

    // $('#cytoin-vn').on('change', function(e) {
    //     patientInfoByVn();
    // });

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

    $('#search_result1').on('change', function(e) {
        searchResult1();
    });
    $('#cytoin-result1').on('change', function(e) {
        syncResult1();
    });

    $('#search_result2').on('change', function(e) {
        searchResult2();
    });
    $('#cytoin-result2').on('change', function(e) {
        syncResult2();
    });

    $('#search_result3').on('change', function(e) {
        searchResult3();
    });
    $('#cytoin-result3').on('change', function(e) {
        syncResult3();
    });

    $('#search_result4').on('change', function(e) {
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


    $('#depdrop_vn').on('change', function(e) {
      patientInfoByVn();
      //$('#search_specimen').focus();
      console.log($(this).val());

});

");

if(!$model->isNewRecord){
  $this->registerJs("

  $('html, body').animate({
    scrollTop: $('#result_panel').offset().top
  }, 1000);
  $('#search_result1').focus();

        //patientInfo();
          //ใช้ Vn จะตรงกับข้อมูลมากกว่า ในกรณีที่เผื่อคนไข้มี Visit มาใหม่ช่วงแก้ไขข้อมูล
          // patientInfoByVn();
          syncSpecimen();
          syncCause();
          syncResult1();
          syncResult2();
          syncResult3();
          syncResult4();
          syncCytist1();
          syncCytist2();
          CytoPrice();

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
      echo $form->field($model, 'cn_date')->widget(MaskedInput::className(), [
          'mask' => '99-99-9999',
          'options' => ['class'=>'form-control']
        ])->label('วันที่ลงทะเบียน (Ex. 28-02-2560)')
    ?>
    <?php
    // echo $form->field($model, 'cn_date')->widget(DatePicker::classname(), [
    //     'options' => ['placeholder' => 'เลือกวันที่'],
    //     'language' => 'th',
    //     'pluginOptions' => [
    //         'autoclose' => true,
    //         'format' => 'dd-mm-yyyy',
    //         'masked' => '99-99-9999',
    //         'todayHighlight' => true
    //     ]
    // ]);
    ?>
  </div>
</div>
<div class="row">
  <div class="col-md-3">

    <?= $form->field($model, 'hn')->textInput(['maxlength' => true]) ?>
  </div>



  <div class="col-md-3">
    <?= $form->field($model, 'vn')->widget(DepDrop::classname(), [
       'options' => ['id'=>'depdrop_vn'],
       'data'=> $out,
       'pluginOptions'=>[
          //  'initialize' => true,
           'depends'=>['cytoin-hn'],
           'placeholder' => 'เลือก VN',
           'url' => Url::to(['/cytology/cyto-in/subvn'])
       ]
      ]);



     ?>
  </div>
  <div class="col-md-3">
    <?= $form->field($model, 'an')->textInput(['maxlength' => true,'readonly'=>'readonly']) ?>
  </div>
  <div class="col-md-3">
    <?= $form->field($model, 'cn')->textInput(['tabIndex'=>'-1','maxlength' => true,'disabled'=>'disabled','placeholder'=>'Automatic']) ?>
  </div>
</div>


<div class="row">
  <div class="col-md-3">
  <div class="form-group">
    <?= $form->field($model, 'pid')->widget(MaskedInput::className(), [
        'mask' => '9-9999-99999-99-9',
        'options'=>[
            'class' => 'form-control',
            'readonly'=>'readonly'
         ]
    ]) ?>
    <?php // $form->field($model, 'pid')->textInput(['tabIndex'=>'-1','maxlength' => true,'readonly'=>'readonly']) ?>
  </div>
</div>
  <div class="form-group">
    <div class="col-md-3">
      <?= $form->field($model, 'fullname')->textInput(['tabIndex'=>'-1','maxlength' => true,'readonly'=>'readonly']) ?>
    </div>
    <div class="col-md-2">
      <?= $form->field($model, 'age')->textInput(['tabIndex'=>'-1','maxlength' => true,'readonly'=>'readonly']) ?>
    </div>


    <div class="col-md-4">
      <?= $form->field($model, 'pttype_name')->textInput(['tabIndex'=>'-1','maxlength' => true,'readonly'=>'readonly']) ?>
    </div>
  </div>

</div>

<div class="row">
<div class="form-group">
  <div class="col-md-6">
      <?= $form->field($model, 'address')->textInput(['tabIndex'=>'-1','maxlength' => true,'readonly'=>'readonly']) ?>
  </div>
  <div class="col-md-6">


      <?= $form->field($model, 'clinic_ward')->textInput(['tabIndex'=>'-1','maxlength' => true,'readonly'=>'readonly']) ?>
    </div>
</div>
</div>
</div>
</div>
<?= $form->field($model, 'pttype')->hiddenInput()->label(false) ?>
<?= $form->field($model, 'clinic')->hiddenInput()->label(false) ?>
<?= $form->field($model, 'ward')->hiddenInput()->label(false) ?>
<?= $form->field($model, 'vn')->hiddenInput()->label(false) ?>

<div class="panel panel-default" >
  <div class="panel-heading">
    <h3 class="panel-title">ข้อมูลการส่งตรวจ</h3>
  </div>
<div class="panel-body">
<div class="row">
  <div class="col-md-6">
    <?= $form->field($model, 'cyto_type')->dropDownList($lib_cyto_type,['tabIndex'=>'-1',]) ?>
  </div>
  <div class="col-md-6">
    <?= $form->field($model, 'smear_type')->dropDownList($lib_smear_type,['tabIndex'=>'-1','prompt'=>'เลือก Smear Type']) ?>
  </div>
</div>

<div class="row">
  <div class="form-group ">
    <div class="col-md-2"><label for="search_specimen">รหัส Specimen</label><input type="text" id="search_specimen" class="form-control" placeholder="รหัส Specimen"/></div>
    <div class="col-md-4"><?= $form->field($model, 'specimen')->dropDownList($lib_specimen ,['prompt'=>'เลือก Specimen']) ?></div>
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

<div class="panel panel-primary" id="result_panel" name = "result_panel" >
  <div class="panel-heading">
    <h3 class="panel-title">ผลการตรวจ [ CN: <?= $model->cn ?> ] <?= $model->fullname ?></h3>
  </div>
<div class="panel-body">

<div class="row">

  <div class="form-group">
  <div class ="col-md-6">
  <div class="col-md-12"><?= $form->field($model, 'adequacy')->dropDownList($lib_adequacy_specimen ,['prompt'=>'เลือก Adequacy of Specimen']) ?></div>
  </div>
  <div class ="col-md-6">
  <div class="col-md-4"><label for="search_cause">รหัส สาเหตุ</label><input type="number" id="search_cause" class="form-control" placeholder="รหัส สาเหตุ"/></div>
  <div class="col-md-8"><?= $form->field($model, 'cause')->dropDownList($lib_adequacy ,['prompt'=>'เลือก สาเหตุ']) ?></div>
</div>
</div>

</div>
<div class="row">
  <!-- <div class="form-group"> -->
  <div class="col-md-6">
<div class="col-md-3"><label for="search_result1">รหัส ผลตรวจ1</label><input type="text" id="search_result1" class="form-control" placeholder="รหัส"/></div>
<div class="col-md-9">
<?=
  $form->field($model, 'result1')->widget(Select2::classname(), [
    'data' => $lib_result,
    'language' => 'th',
    'options' => ['placeholder' => 'เลือก ผลตรวจ'],
    'pluginOptions' => [
        'allowClear' => true
    ],
  ]);
?>
<?php // $form->field($model, 'result1')->dropDownList($lib_result ,['prompt'=>'เลือก ผลตรวจ']) ?></div>
<div class="col-md-3"><label for="search_result2">รหัส ผลตรวจ2</label><input type="text" id="search_result2" class="form-control" placeholder="รหัส"/></div>
<div class="col-md-9">

  <?=
    $form->field($model, 'result2')->widget(Select2::classname(), [
      'data' => $lib_result,
      'language' => 'th',
      'options' => ['placeholder' => 'เลือก ผลตรวจ'],
      'pluginOptions' => [
          'allowClear' => true
      ],
    ]);
  ?>
  <?php  //$form->field($model, 'result2')->dropDownList($lib_result ,['prompt'=>'เลือก ผลตรวจ']) ?>
</div>
<div class="col-md-3"><label for="search_result3">รหัส ผลตรวจ3</label><input type="text" id="search_result3" class="form-control" placeholder="รหัส"/></div>
<div class="col-md-9">
  <?=
    $form->field($model, 'result3')->widget(Select2::classname(), [
      'data' => $lib_result,
      'language' => 'th',
      'options' => ['placeholder' => 'เลือก ผลตรวจ'],
      'pluginOptions' => [
          'allowClear' => true
      ],
    ]);
  ?>
  <?php  //$form->field($model, 'result3')->dropDownList($lib_result ,['prompt'=>'เลือก ผลตรวจ']) ?>
</div>
<div class="col-md-3"><label for="search_result4">รหัส ผลตรวจ4</label><input type="text" id="search_result4" class="form-control" placeholder="รหัส"/></div>
<div class="col-md-9">
  <?=
    $form->field($model, 'result4')->widget(Select2::classname(), [
      'data' => $lib_result,
      'language' => 'th',
      'options' => ['placeholder' => 'เลือก ผลตรวจ'],
      'pluginOptions' => [
          'allowClear' => true
      ],
    ]);
  ?>
  <?php  //$form->field($model, 'result4')->dropDownList($lib_result ,['prompt'=>'เลือก ผลตรวจ']) ?>
</div>
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
    //echo $current_date;
    // $date_value = '';
    // if($model->result_date = '01-01-1970'){
    //   $date_value = $current_date;
    // }else{
    //   $data_value = $model->result_date;
    // }
      echo $form->field($model, 'result_date')->widget(MaskedInput::className(), [
          'mask' => '99-99-9999',
          'options' => ['class'=>'form-control'
                        //,'value'=>$date_value
                        ]
        ])->label('วันที่ลงผลตรวจ (Ex. 28-02-2560)')
    ?>
    <?php
    // echo $form->field($model, 'result_date')->widget(DatePicker::classname(), [
    //     'options' => ['placeholder' => 'เลือกวันที่'],
    //     'language' => 'th',
    //     'pluginOptions' => [
    //         'autoclose' => true,
    //         'format' => 'yyyy-mm-dd',
    //         'todayHighlight' => true
    //     ]
    // ]);
    ?>
  </div>
</div>






</div>
</div>


<?php
}

?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'บันทึก' : 'บันทึก', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
</div>
</div>
