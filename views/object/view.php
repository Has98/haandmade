<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\models\Object */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Objects'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="object-view">

    <div class="container">
        <h1><?= Html::encode($this->title) ?></h1>
        <div class="row">
            <div class="col-lg-8 obj ">
                <img src="<?= Yii::$app->request->baseUrl.'/'.$model->image ?>" alt="image">
            </div>
            <div class="col-lg-4">
                <div class="alert alert-danger">Գին - <?=$model->price?>
                </div>
            </div>
            <br>
            <div class="col-lg-4">
                <div class="desc">
                    <h1><?Yii::t('app', 'description')?></h1>
                    <p><?=$model->description?> </p>
                </div>
            </div>


        </div>
    </div>
</div>
