<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\pathology\models\PaydetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Paydetails');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paydetail-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Paydetail'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ref',
            'patho_no',
            'hn',
            'p_type',
            'r1',
            // 'r1_cost',
            // 'r1_detail',
            // 'r2',
            // 'r2_cost',
            // 'r2_detail',
            // 'r3',
            // 'r3_cost',
            // 'r3_detail',
            // 's1',
            // 's1_cost',
            // 's1_detail',
            // 's2',
            // 's2_cost',
            // 's2_detail',
            // 's3',
            // 's3_cost',
            // 's3_detail',
            // 'i1',
            // 'i1_cost',
            // 'i1_detail',
            // 'i2',
            // 'i2_cost',
            // 'i2_detail',
            // 'i3',
            // 'i3_cost',
            // 'i3_detail',
            // 'f1',
            // 'f1_cost',
            // 'f1_detail',
            // 'f2',
            // 'f2_cost',
            // 'f2_detail',
            // 'f3',
            // 'f3_cost',
            // 'f3_detail',
            // 'total',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
