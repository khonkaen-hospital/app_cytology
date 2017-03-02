
<?php
/* @var $this yii\web\View */
/* @var $model frontend\modules\nb\models\Person */
/* @var $form yii\widgets\ActiveForm */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\JsExpression;
use kartik\select2\Select2;

$access_token = isset($setting['access_token']) ? $setting['access_token'] : '';
$api_url      = isset($setting['api_url']) ? $setting['api_url'] : '';
$api_type     = isset($setting['api_type']) ? $setting['api_type'] : '';
$version      = isset($setting['version']) ? $setting['version'] : '';
$url          = $api_url.'/'.$api_type.'/'.$version.'/patient/list?expand=ipdinf,ipdobs&access-token='. $access_token;

$kkhOption = "function (data, params) {
        var datas = $.map(data.items, function (obj) {
        obj.id = obj.ref;
        /*  var title = obj.patient? obj.patient.title : '';
            var name = obj.patient? obj.patient.name : '';
            var surname = obj.patient? obj.patient.surname : '';
            obj.text =  ('('+obj.hn+') ' + title+name + ' ' + surname);
        */
        obj.text =  ('('+obj.hn+') '+obj.title+obj.name+obj.surname);
        return obj;
        });

        params.page = params.page || 1;

        return {
        results: datas,
        pagination: {
            more: (params.page * data._meta.perPage) < data._meta.totalCount
        }
        };
    },
";

?>
<div class="xpanel" id="person-search">

  <div class="xpanel-heading-sm">
      <span class="xpanel-title">
        ค้นข้อมูลจากฐานโรงพยาบาล
      </span>
  </div>

<div class="panel-body person-form" >
<?= $form->field($model, 'q')->widget(Select2::className(),[
          'options' => ['placeholder' => 'ค้นหาประวัติเด็ก..'],
          'pluginOptions' => [
            'allowClear' => true,
            'language' => [
                'errorLoading' => new JsExpression("function () { return 'Waiting for results...'; }"),
            ],
            'ajax' => [
                'url' => $url,
                'dataType' => 'json',
                'cache' => true,
                //'beforeSend'=> new JsExpression("function(xhr, settings) { xhr.setRequestHeader('Authorization','Bearer ".$access_token."'); }"),
                'data' => new JsExpression('function(params) { return {q:params.term,page:params.page}; }'),
                'processResults' => new JsExpression($kkhOption)
            ]
          ]
        ])->label(false) ?>

 </div>
</div>

  <?php
  $this->registerJs("
  $('#person-q').on('select2:select', function(data) {
      var obj = data.params.data;
      $('#person-pid').val(obj.hn);
      $('#person-prename').val(obj.title);
      $('#person-name').val(obj.name);
      $('#person-lname').val(obj.surname);
      $('#person-cid').val(obj.no_card);

      var birth = new Date(obj.birth);
      var day   = ('0' + birth.getDate()).slice(-2);
      var month = ('0' + (birth.getMonth() + 1)).slice(-2);
      var year  = parseInt(543 + birth.getFullYear());
      $('#person-birth').val(day +'-'+ month +'-'+ year);

      $('input[name=\"Person[sex]\"][value=' + obj.sex + ']').prop('checked', true);

      $('#person-add_houseno').val(obj.address);
      $('#person-add_village').val(obj.moo);
      $('#person-add_road').val(obj.road);
      $('#person-add_soimain').val(obj.soi);
      $('#person-add_zip').val(obj.zip);
      $('#person-add_mobile').val(obj.tel);
      console.info('address',obj.add);
      $('#dd-changwat').val(obj.add.substr(0,2)).trigger('change').trigger('depdrop.change');
      $('#dd-ampur').on('depdrop.afterChange', function(event, id, value, count) {
          setTimeout(function(){
            $('#dd-ampur').val(obj.add.substr(2,2)).trigger('change').trigger('depdrop.change');
          }, 300);
      });
      $('#dd-tambon').on('depdrop.afterChange', function(event, id, value, count) {
          setTimeout(function(){
              $('#dd-tambon').val(obj.add.substr(4,2)).trigger('change');
          }, 300);
      });

      if(obj.ipdobs != undefined){
          console.log(obj.ipdobs)
          $('#person-mother_name').val(obj.ipdobs.name);
          $('#person-mother').val(obj.ipdobs.mpid);
          $('#person-father_name').val(obj.ipdobs.husband);
          $('#person-father').val(obj.ipdobs.fpid);
      }

  }).on('select2:unselecting', function(data) {
      document.getElementById('person-form').reset();
      $('#dd-changwat').val(null).trigger('change');
      $('#dd-ampur').val(null).trigger('change');
      $('#dd-tambon').val(null).trigger('change');
  });

  ");
  ?>
