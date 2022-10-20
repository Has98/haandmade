<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\User;
use app\models\Category;

/* @var $this yii\web\View */
/* @var $model app\models\Object */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Objects'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="object-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
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
            'id',
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
            'status',
            'price',
            'sale_price',
        ],
    ]) ?>

</div>
