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
use frontend\modules\cytology\models\LibPttype;
use frontend\modules\cytology\models\LibHospcode;
use yii\helpers\ArrayHelper;
use kartik\depdrop\DepDrop;
use yii\widgets\MaskedInput;
use kartik\select2\Select2;
use kartik\checkbox\CheckboxX;
use yii\web\JsExpression;
use yii\Date;

//echo $fullage;
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
$lib_pttype = ArrayHelper::map(LibPttype::find()->all(), 'code', 'text');
$lib_titles = $model->getTitles();
// $lib_hospcode = ArrayHelper::map(LibHospcode::find()->all(), 'code5', 'name');

// $date = new DateTime('first Monday of this month');
// $thisMonth = $date->format('m');
//
// while ($date->format('m') === $thisMonth) {
//     echo $date->format('Y-m-d'), "\n";
//     $date->modify('next Monday');
// }


?>

<div class="cyto-out-form">

  <?php

  $this->registerJs("

    function CytoPrice() {
        var code = $('#cytoout-cyto_type').val();
        $.ajax({
          url: '" . Url::toRoute("cyto-out/cytoprice") . "',
          dataType: 'json',
          method: 'GET',
          data: {'code': code},
          success: function (data) {
          console.log(data.code);
              $('#cytoout-price').val(data.price);
          }
        });
      }

      CytoPrice();

      $('#cytoout-cyto_type').on('change', function(e) {
          CytoPrice();
      });

    function searchSpecimen(){
      $('#search_specimen').val($('#search_specimen').val().toUpperCase());
      $('#cytoout-specimen').val($('#search_specimen').val());
      return false;
    }
    function syncSpecimen(){
      $('#search_specimen').val($('#cytoout-specimen').val());
    }

    function searchCause(){
      $('#cytoout-cause').val($('#search_cause').val());
    }
    function syncCause(){
      $('#search_cause').val($('#cytoout-cause').val());
    }

    function searchResult1(){
      $('#cytoout-result1').val($('#search_result1').val()).trigger('change');
      //$('#cytoout-result1').val($('#search_result1').val()).change();
      //$('#cytoout-result1').val($('#search_result1').val());
    }
    function syncResult1(){
      $('#search_result1').val($('#cytoout-result1').val());
    }

    function searchResult2(){
      $('#cytoout-result2').val($('#search_result2').val()).trigger('change');
      //$('#cytoout-result2').val($('#search_result2').val());
    }
    function syncResult2(){
      $('#search_result2').val($('#cytoout-result2').val());
    }

    function searchResult3(){
      $('#cytoout-result3').val($('#search_result3').val()).trigger('change');
      //$('#cytoout-result3').val($('#search_result3').val());
    }
    function syncResult3(){
      $('#search_result3').val($('#cytoout-result3').val());
    }

    function searchResult4(){
      $('#cytoout-result4').val($('#search_result4').val()).trigger('change');
      //$('#cytoout-result4').val($('#search_result4').val());
    }
    function syncResult4(){
      $('#search_result4').val($('#cytoout-result4').val());
    }

    function searchCytist1(){
      $('#cytoout-cytist1').val($('#search_cytist1').val());
    }
    function syncCytist1(){
      $('#search_cytist1').val($('#cytoout-cytist1').val());
    }

    function searchCytist2(){
      $('#cytoout-cytist2').val($('#search_cytist2').val());
    }
    function syncCytist2(){
      $('#search_cytist2').val($('#cytoout-cytist2').val());
    }


      $('#search_specimen').on('keyup', function(e) {
          searchSpecimen();
      });
      $('#cytoout-specimen').on('change', function(e) {
          syncSpecimen();
      });

      $('#search_cause').on('keyup', function(e) {
          searchCause();
      });
      $('#cytoout-cause').on('change', function(e) {
          syncCause();
      });

      $('#search_result1').on('change', function(e) {
          searchResult1();
      });
      $('#cytoout-result1').on('change', function(e) {
          syncResult1();
      });

      $('#search_result2').on('change', function(e) {
          searchResult2();
      });
      $('#cytoout-result2').on('change', function(e) {
          syncResult2();
      });

      $('#search_result3').on('change', function(e) {
          searchResult3();
      });
      $('#cytoout-result3').on('change', function(e) {
          syncResult3();
      });

      $('#search_result4').on('change', function(e) {
          searchResult4();
      });
      $('#cytoout-result4').on('change', function(e) {
          syncResult4();
      });

      $('#search_cytist1').on('keyup', function(e) {
          searchCytist1();
      });
      $('#cytoout-cytist1').on('change', function(e) {
          syncCytist1();
      });

      $('#search_cytist2').on('keyup', function(e) {
          searchCytist2();
      });
      $('#cytoout-cytist2').on('change', function(e) {
          syncCytist2();
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
    </div>
    <div class="col-md-3">
      <?= $form->field($model, 'cn')->textInput(['tabIndex'=>'-1','maxlength' => true,'disabled'=>'disabled','placeholder'=>'Automatic']) ?>
    </div>

</div>

<div class="row">
  <div class="col-md-3">
    <?= $form->field($model, 'pid_flag', [
        'template' => '{input}{label}{error}{hint}',
        'labelOptions' => ['class' => 'cbx-label']
        ])->widget(CheckboxX::classname(), [
            'autoLabel'=>false,
            'pluginOptions'=>[
                'threeState'=>false
            ]
        ]);?>
  </div>
</div>

<div class="row">
  <div class="col-md-3">
  <div class="form-group">

        <?= $form->field($model, 'pid')->widget(MaskedInput::className(), [
            'mask' => '9-9999-99999-99-9',
            'options'=>[
                'class' => 'form-control',
                'data'=>['key'=>$model->getRendomKey()]
             ]
        ]) ?>

  </div>
  </div>
  <div class="form-group">
    <div class="col-md-2">
      <?= $form->field($model, 'title')->dropDownList(['นาง'=>'นาง','นางสาว'=>'นางสาว','ด.ญ.'=>'ด.ญ.','นาย'=>'นาย','ด.ช.'=>'ด.ช.']) ?>
    </div>
    <div class="col-md-3">
      <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-md-4">
      <?= $form->field($model, 'surname')->textInput(['maxlength' => true]) ?>
    </div>

</div>
</div>


<div class="row">

    <div class="col-md-3">
      <?php
        echo $form->field($model, 'birthdate')->widget(MaskedInput::className(), [
            'mask' => '99-99-9999',
            'options' => ['class'=>'form-control']
          ])->label('วันเกิด (Ex. 28-02-2560)')
      ?>
    </div>
    <div class="col-md-2">
        <?= $form->field($model, 'age')->textInput(['type' => 'number'])->label('อายุ(ปี)') ?>
    </div>
    <div class="col-md-3">
    <?=
      $form->field($model, 'pttype')->widget(Select2::classname(), [
        'data' => $lib_pttype,
        'language' => 'th',
        'options' => ['placeholder' => 'เลือก สิทธิการรักษา'],
        'pluginOptions' => [
            'allowClear' => true
        ],
      ]);
    ?>
    </div>
    <div class="col-md-4">

      <?php
        $url = Url::to(['cyto-out/hosp-list']);
        $hospDesc = empty($model->hospcode) ? '' : LibHospcode::findOne(['code5' =>$model->hospcode])->name;

        echo $form->field($model, 'hospcode')->widget(Select2::classname(), [
            'initValueText' => $hospDesc, // set the initial display text
            'options' => ['placeholder' => 'ค้นหา สถานพยาบาล'],
        'pluginOptions' => [
            'allowClear' => true,
            'minimumInputLength' => 3,
            'language' => [
                'errorLoading' => new JsExpression("function () { return 'Waiting for results...'; }"),
            ],
            'ajax' => [
                'url' => $url,
                'dataType' => 'json',
                'data' => new JsExpression('function(params) { return {q:params.term}; }')
            ],
            'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
            'templateResult' => new JsExpression('function(city) { return city.text; }'),
            'templateSelection' => new JsExpression('function (city) { return city.text; }'),
        ],
        ]);

       ?>

    </div>
  </div>


<div class="row">
<div class="form-group">
  <div class="col-md-3">
      <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>
  </div>
  <div class="col-sm-3">
      <?= $form->field($model, 'prov')->widget(Select2::classname(), [
        'data' => $changwat,
        'options' => ['id'=>'dd-changwat','placeholder' => 'เลือกจังหวัด ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>
  </div>
  <div class="col-sm-3">
      <?= $form->field($model, 'amp')->widget(DepDrop::classname(), [
         'options' => ['id'=>'dd-ampur'],
         'type'=>DepDrop::TYPE_SELECT2,
         'data' => $model->isNewRecord ? [] : $model->loadInitAddress($model->prov,'ampur'),
         'pluginOptions'=>[
             'depends'=>['dd-changwat'],
             'placeholder' => 'เลือกอำเภอ...',
             'url' => Url::to(['/cytology/cyto-out/get-ampur'])
         ]
     ]) ?>
  </div>
  <div class="col-sm-3">
    <?= $form->field($model, 'tambol')->widget(DepDrop::classname(), [
       'options' => ['id'=>'dd-tambon'],
       'type'=>DepDrop::TYPE_SELECT2,
       'data' => $model->isNewRecord ? [] : $model->loadInitAddress($model->prov.$model->amp,'tambon'),
       'pluginOptions'=>[
           'initialize' => true,
           'depends'=>['dd-changwat','dd-ampur'],
           'placeholder' => 'เลือกตำบล...',
           'url' => Url::to(['/cytology/cyto-out/get-tambon'])
       ]
   ]) ?>
  </div>
</div>
</div>
</div>
</div>



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
</div>
<?php
if(!$model->isNewRecord){
?>

<div class="panel panel-primary" id="result_panel" name = "result_panel" >
  <div class="panel-heading">
    <h3 class="panel-title">ผลการตรวจ [ CN: <?= $model->cn ?> ] </h3>
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
      echo $form->field($model, 'result_date')->widget(MaskedInput::className(), [
          'mask' => '99-99-9999',
          'options' => ['class'=>'form-control']
        ])->label('วันที่ลงผลตรวจ (Ex. 28-02-2560)')
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

<?php $this->registerJs("
    if($('#cytoout-pid_flag').val() == 1){
        $('#cytoout-pid').prop('readonly',true);
    }
    $('#cytoout-pid_flag').on('change', function (e) {
        if($(this).val()==1){
            $('#cytoout-pid').prop('readonly', true);
            $('#cytoout-pid').val($('#cytoout-pid').data('key'));
        }else{
            $('#cytoout-pid').prop('readonly', false);
            $('#cytoout-pid').val(null);
        }
    });
"); ?>
