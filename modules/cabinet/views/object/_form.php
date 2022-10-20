<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Tabs;
use yii\helpers\Url;
use dosamigos\tinymce\TinyMce;
use app\models\User;
use app\models\Category;

/* @var $this yii\web\View */
/* @var $model app\models\Object */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="object-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model, 'user_id')->hiddenInput(['value' => Yii::$app->user->identity->id])->label(false) ?>
            <?= $form->field($model, 'cat_id')->dropdownList(
                   Category::find()->select(['title', 'id'])->indexBy('id')->column(),
                   ['prompt'=>Yii::t('app', 'Select a category')]) ?>

            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

            <div class="row">
                <div class="col-lg-6">
                    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-lg-6">
                    <?= $form->field($model, 'sale_price')->textInput() ?>
                </div>
            </div>

            <?php if (Html::encode($model->image)!=''): ?>
                <?= Html::img(Url::to(Html::encode(Yii::$app->request->baseUrl.'/'. $model->image)),  ['width' => '160px'], ['alt' => Html::encode($model->title), 'class'=>"clasadimage"]); ?>
            <?php endif; ?>

            <?= $form->field($model, 'file')->fileInput()->label(Yii::t('app', 'Image'))?>
        </div>
        <div class="col-lg-6">
            <?php echo Tabs::widget([
                'items' => [
                    [
                        'label' => Yii::t('app', 'Description'),
                        'content' => $form->field($model, 'description')->widget(TinyMce::className(), [
                            'options' => ['rows' => 6],
                            'language' => 'es',
                            'clientOptions' => [
                                'plugins' => [
                                    "advlist autolink lists link charmap print preview anchor",
                                    "searchreplace visualblocks code fullscreen",
                                    "insertdatetime media table contextmenu paste"
                                ],
                                'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
                            ]
                            ])->label(false),
                            'active' => true
                        ],
                                ],
                                ]);?>
        </div>
    </div>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
