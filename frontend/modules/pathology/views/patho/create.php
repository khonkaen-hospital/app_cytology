<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\modules\pathology\models\Patho */

$this->title = 'ลงทะเบียนผู้ป่วย';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pathos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patho-create">

  <h1><center><?= Html::encode($this->title) ?></center></h1>
  <br/>

    <?= $this->render('_form', [
        'model' => $model,
        'modelPaydetail' => $modelPaydetail,
    ]) ?>

</div>
