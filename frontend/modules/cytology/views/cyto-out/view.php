<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\modules\cytology\models\CytoOut */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cyto Outs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cyto-out-view">

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
            'cn',
            'cn_date',
            'title',
            'name',
            'surname',
            'birthdate',
            'age',
            'pid',
            'pttype',
            'pttype_name',
            'requester',
            'hospcode',
            'hospname',
            'address',
            'tambol',
            'amp',
            'prov',
            'cyto_type',
            'smear_type',
            'specimen',
            'adequacy',
            'cause',
            'price',
            'result_level',
            'result1',
            'result2',
            'result3',
            'result4',
            'result_detail',
            'comment',
            'cytist1',
            'cytist2',
            'result_date',
            'last_updated',
        ],
    ]) ?>

</div>
