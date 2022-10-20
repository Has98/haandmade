<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use dmstr\widgets\Alert;

AppAsset::register($this);

$controller = Yii::$app->controller;
$default_controller = Yii::$app->defaultRoute;
$isHome = (($controller->id === $default_controller) && ($controller->action->id === $controller->defaultAction)) ? true : false;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Yii::$app->name . ' - ' . Html::encode($this->title) ?></title>
    <link rel="shortcut icon" href="<?= Yii::$app->request->baseUrl ?>/sewing_taylor-15-512.png" type="image/x-icon" />
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="page-container <?=($isHome)?'header-one ':'header-content '?>wrap">
    <header class="site-header">
        <nav class="navbar navbar-inverse navbar-static-top">
            <div class="container">
                <div class="navbar-header ">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar3">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/">
                        <img src="<?= Yii::$app->request->baseUrl ?>/img/logo6.png" alt="image">
                    </a>
                </div>
                <div id="navbar3" class="navbar-collapse collapse">
                    <div class="nav navbar-nav navbar-right">
                        <ul id="w0" class="navbar-nav menu-top-menu nav">
                            <?php if (Yii::$app->user->isGuest): ?>
                                <li class="login-link menu-item border-right">
                                    <a href="<?= Yii::$app->request->baseUrl ?>/login">Մուտք</a>
                                </li>
                                <li class="menu-item last-item">
                                    <a href="#" data-toggle="modal" data-target="#choose-register">Գրանցում</a>
                                </li>
                            <?php else: ?>
                                <?php if (Yii::$app->user->identity->role_id == 1): ?>
                                    <li class="login-link menu-item border-right">
                                        <a href="<?= Yii::$app->request->baseUrl ?>/admin">Ադմինիստրատոր</a>
                                    </li>
                                <?php else: ?>
                                    <li class="login-link menu-item border-right">
                                        <a href="<?= Yii::$app->request->baseUrl ?>/cabinet">Անձնական էջ</a>
                                    </li>
                                <?php endif; ?>
                                <?= '<li>'
                                . Html::beginForm(['/logout'], 'post')
                                . Html::submitButton(
                                    'Ելք',
                                    ['class' => 'menu-item last-item']
                                )
                                . Html::endForm()
                                . '</li>' ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <ul class="nav navbar-nav navbar-left">
                        <li><a href="/about">Մեր մասին</a></li>
                        <li><a href="/contact">Հետադարձ կապ</a></li>
                    </ul>
                 </div>
            </div>
            <?php if ($isHome): ?>
                <div class=" text-center motive">
                    <div class="text">
                        <h3>Не продаётся вдохновенье, но можно рукопись продать.</h3>
                        <h3>-А.С. Пушкин-</h3>
                    </div>
                </div>
            <?php endif; ?>
        </nav>
    </header>
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
    </div>
    <?= $content ?>
    <footer class="content-footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <h2 class="logo"><a href="<?= Yii::$app->request->baseUrl ?>"> <img src="<?= Yii::$app->request->baseUrl ?>/img/logo.png" alt=""> </a></h2>
                </div>
                <div class="col-sm-2">
                    <h5>Գլխավոր</h5>
                    <ul>
                        <li><a href="#">Մեր Մասին</a></li>
                        <li><a href="#">Գրանցվել</a></li>
                        <li><a href="#">Ստեղծել խանութ</a></li>
                    </ul>
                </div>
                <div class="col-sm-2">
                    <h5>ՍՊԱՍԱՐԿՈՒՄ</h5>
                    <ul>
                        <li><a href="#">Հետադարձ կապ</a></li>
                        <li><a href="#">Խորհրդատվություն</a></li>
                    </ul>
                </div>
                <div class="col-sm-2">
                    <h5>ԼՐԱՑՈՒՑԻՉ</h5>
                    <ul>
                        <li><a href="#">Վարպետներ</a></li>
                        <li><a href="#">Զեղչեր</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <div class="social-networks">
                        <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                        <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <p>© <?=date('Y') . ' ' . Yii::$app->name?> </p>
        </div>
    </footer>
</div>

<?= $this->render('partials/_register-modal')?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
