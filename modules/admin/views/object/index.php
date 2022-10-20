<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\User;
use app\models\Category;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ObjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Objects');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="object-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a($this->title =  Yii::t('app', 'Create Object') , ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
               'attribute' => 'user_id',
               'value' => function ($data) {
                   if (!empty($data['user_id'])) {
                       return User::findOne(['id'=>$data['user_id']])->first_name;
                   }

               },
            ],
            [
               'attribute' => 'cat_id',
               'value' => function ($data) {
                   if (!empty($data['cat_id'])) {
                       return Category::findOne(['id'=>$data['cat_id']])->title;
                   }

               },
            ],
            'title',
            [
               'attribute' => 'description',
               'value' => function ($data) {
                   return strip_tags($data->description, "");
               },
            ],
            [
               'attribute' => 'image',
               'format' => 'html',
               'value' => function ($data) {
                   if (!empty($data['image'])) {
                       return Html::img(Yii::$app->request->baseUrl.'/'.$data['image'],
                           ['width' => '60px']);
                   }

               },
            ],
            //'status',
            //'price',
            //'sale_price',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
