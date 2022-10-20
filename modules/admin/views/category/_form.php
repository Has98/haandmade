<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Category;
use yii\bootstrap\Tabs;
/* @var $this yii\web\View */
/* @var $model app\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'parent_id')->dropdownList(
                   Category::find()->select(['title', 'id'])->indexBy('id')->column(),
                   ['prompt'=>'Select a category']) ?>
    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'file')->fileInput()->label('Icon') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
