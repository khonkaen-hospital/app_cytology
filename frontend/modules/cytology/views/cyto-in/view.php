<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\modules\cytology\models\CytoIn */

$this->title = $model->ref;
$this->params['breadcrumbs'][] = ['label' => 'Cyto Ins', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cyto-in-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ref], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ref], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ref',
            'cn',
            'hn',
            'vn',
            'an',
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
