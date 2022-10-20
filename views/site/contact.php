<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use app\models\User;

$user = User::findOne(['role_id'=>1]);
$this->title = 'Հետադարձ կապ';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container">
    <div class="site-contact">
        <h1><?= Html::encode($this->title) ?></h1>

        <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

            <div class="alert alert-success">
                Thank you for contacting us. We will respond to you as soon as possible.
            </div>

            <p>
                Note that if you turn on the Yii debugger, you should be able
                to view the mail message on the mail panel of the debugger.
                <?php if (Yii::$app->mailer->useFileTransport): ?>
                    Because the application is in development mode, the email is not sent but saved as
                    a file under <code><?= Yii::getAlias(Yii::$app->mailer->fileTransportPath) ?></code>.
                    Please configure the <code>useFileTransport</code> property of the <code>mail</code>
                    application component to be false to enable email sending.
                <?php endif; ?>
            </p>

        <?php else: ?>

            <div class="store motive">
                <span class="text-center"><h3>Եթե դուք ունեք բիզնես֊առաջարկներ կամ այլ հարցեր,<br> խնդրում ենք կապ հաստատել մեզ հետ։</h3></span>
            </div>
            <div class="row">
                <div class="col-lg-5">

                    <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                        <?= $form->field($model, 'name')->textInput(['autofocus' => true])->label(Yii::t('yii', 'Անուն')) ?>

                        <?= $form->field($model, 'email')->label(Yii::t('yii', 'Էլ․ հասցե')) ?>

                        <?= $form->field($model, 'body')->textarea(['rows' => 6])->label(Yii::t('yii', 'Հաղորդագրություն')) ?>

                        <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                            'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                        ])->label(Yii::t('yii', 'Ստուգման կոդ'))   ?>

                        <div class="form-group">
                            <?= Html::submitButton('Ուղարկել', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                        </div>

                    <?php ActiveForm::end(); ?>

                </div>
                <div class="col-lg-7 kap">
                    <img src="<?= Yii::$app->request->baseUrl ?>/img/landing-parallax-new.jpg" alt="">
                    <div class="contact text-center">
                        <p><?= $user->phone?><?= $user->email?></p>
                    </div>
                </div>
            </div>

        <?php endif; ?>
    </div>
</div>
