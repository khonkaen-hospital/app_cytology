<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\pathology\models\PathoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Pathos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patho-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Patho'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ref',
            'patho_no',
            'hn',
            'vn',
            'an',
            // 'pid',
            // 'date',
            // 'title',
            // 'name',
            // 'surname',
            // 'age',
            // 'date_dx',
            // 'result',
            // 'price',
            // 'paid',
            // 'pttype',
            // 'type',
            // 'dep',
            // 'dep_name',
            // 'ward',
            // 'ward_name',
            // 'hosp',
            // 'hosp_name',
            // 'isresult',
            // 'routine',
            // 'frozen',
            // 'special',
            // 'immuno',
            // 'patho1',
            // 'patho2',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
