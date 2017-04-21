<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\pathology\models\Patho */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Patho',
]) . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pathos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->ref]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="patho-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
