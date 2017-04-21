<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\modules\pathology\models\Paydetail */

$this->title = Yii::t('app', 'Create Paydetail');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Paydetails'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paydetail-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
