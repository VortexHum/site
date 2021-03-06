<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\CarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Все машины';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="car-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>
    <p>
        <?= Html::a('Создать новую', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            'name',
            'model',
            'description',
            'typemachine',       
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>