<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-lg-4">
            <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
        <br>
            <?= $form->field($model, 'file')->fileInput()->label('Avatar') ?>

        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'age')->textInput() ?>

            <?= $form->field($model, 'gender')->dropDownList(
    			[''=>'Select a gender', 'male' => Yii::t('app', 'Male'), 'female' => Yii::t('app', 'Female')]
			); ?>

            <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'role_id')->textInput() ?>

            <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'status')->textInput() ?>

        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
