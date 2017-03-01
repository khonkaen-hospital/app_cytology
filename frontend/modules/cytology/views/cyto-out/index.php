<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\cytology\models\CytoOutSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Cyto Outs');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cyto-out-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Cyto Out'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ref',
            'cn',
            'cn_date',
            'title',
            'name',
            // 'surname',
            // 'birthdate',
            // 'age',
            // 'pid',
            // 'pttype',
            // 'pttype_name',
            // 'requester',
            // 'hospcode',
            // 'hospname',
            // 'address',
            // 'tambol',
            // 'amp',
            // 'prov',
            // 'cyto_type',
            // 'smear_type',
            // 'specimen',
            // 'adecuacy',
            // 'cause',
            // 'price',
            // 'result_level',
            // 'result1',
            // 'result2',
            // 'result3',
            // 'result4',
            // 'result_detail',
            // 'comment',
            // 'cytist1',
            // 'cytist2',
            // 'result_date',
            // 'last_updated',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
