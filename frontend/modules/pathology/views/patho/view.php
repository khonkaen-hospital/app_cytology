<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\modules\pathology\models\Patho */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pathos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patho-view">

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
            'vn',
            'an',
            'pid',
            'date',
            'title',
            'name',
            'surname',
            'age',
            'date_dx',
            'result',
            'price',
            'paid',
            'pttype',
            'type',
            'dep',
            'dep_name',
            'ward',
            'ward_name',
            'hosp',
            'hosp_name',
            'isresult',
            'routine',
            'frozen',
            'special',
            'immuno',
            'patho1',
            'patho2',
        ],
    ]) ?>

</div>
