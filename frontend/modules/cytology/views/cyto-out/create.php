<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\modules\cytology\models\CytoOut */

$this->title = Yii::t('app', 'Create Cyto Out');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cyto Outs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cyto-out-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'changwat' => $changwat
    ]) ?>

</div>
