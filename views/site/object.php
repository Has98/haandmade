<?php

use yii\helpers\Html;
use yii\widgets\ListView;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ObjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Objects')

;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="object-index">
    <div class="container">
        <h1><?= Html::encode($this->title) ?></h1>
        <div class="row">
            <div class="col-lg-3">
                <?= $this->render('partials/_search', ['category' => $category]); ?>
            </div>
            <div class="col-lg-9">
                <?= ListView::widget( [
                    'dataProvider' => $dataProvider,
                    'itemView' => 'partials/_item',
                    'itemOptions' => [
                        'class' => 'item col-md-4',
                    ],
                ] ); ?>
            </div>
        </div>
    </div>
</div>
