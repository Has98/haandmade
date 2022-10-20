<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\ListView;
use yii\widgets\Pjax;
use yii\widgets\DetailView;
use app\models\User;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = "Ստեղծել խանութ";
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
    <div class="store">
        <span class="makeit text-center">Ստեղծիր քո խանութը</span>
    </div>
    <div class="row">
        <div class="col-md-8">
            <?php $form = ActiveForm::begin([
                'options' => [
                    'class' => 'make'
                ]
            ]); ?>
            <div class="row">

                <?= $form->field($model, 'role_id')->hiddenInput(['value' => User::SHOP_ROLE])->label(false) ?>

                <div class="col-md-6">
                    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'age')->input('number', ['min' => 10, 'max' =>100]) ?>

                    <?= $form->field($model, 'gender')->dropDownList(
                        [''=>Yii::t('app', 'Select a gender'), 'male' => Yii::t('app', 'Male'), 'female' => Yii::t('app', 'Female')]
                    ); ?>

                    <div class="form-group field-signupform-file">
                        <input type="hidden" name="SignupForm[file]" value=""><input type="file" id="signupform-file" name="SignupForm[file]">
                        <label for="signupform-file" class="btn-3"><span><?=Yii::t('app', 'Choose Avatar')?></span></label>
                        <div class="help-block"></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'phone')->textInput(['maxlength' => true , 'class' => 'phone']) ?>

                    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-md-offset-6">
                    <?= Html::submitButton('Պահպանել', ['class' => 'btn btn-primary btn-block']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
        <div class="col-md-4">
            <img src="<?= Yii::$app->request->baseUrl ?>/img/Translations-Webshop-en.svg" alt="image">
        </div>
    </div>
</div>
