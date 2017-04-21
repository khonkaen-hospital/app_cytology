<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\modules\pathology\models\Paydetail */

$this->title = $model->ref;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Paydetails'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paydetail-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->ref], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->ref], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ref',
            'patho_no',
            'hn',
            'p_type',
            'r1',
            'r1_cost',
            'r1_detail',
            'r2',
            'r2_cost',
            'r2_detail',
            'r3',
            'r3_cost',
            'r3_detail',
            's1',
            's1_cost',
            's1_detail',
            's2',
            's2_cost',
            's2_detail',
            's3',
            's3_cost',
            's3_detail',
            'i1',
            'i1_cost',
            'i1_detail',
            'i2',
            'i2_cost',
            'i2_detail',
            'i3',
            'i3_cost',
            'i3_detail',
            'f1',
            'f1_cost',
            'f1_detail',
            'f2',
            'f2_cost',
            'f2_detail',
            'f3',
            'f3_cost',
            'f3_detail',
            'total',
        ],
    ]) ?>

</div>
