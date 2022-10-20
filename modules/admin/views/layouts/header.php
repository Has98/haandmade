<?php
use yii\helpers\Html;
use app\models\User;

/* @var $this \yii\web\View */
/* @var $content string */
?>

<header class="main-header">
    <nav class="navbar navbar-static-top" role="navigation">
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <?php if (!Yii::$app->user->isGuest): ?>
                <ul class="nav navbar-nav">
                    <li class="user user-menu">
                        <a href="#" class="text-uppercase">
                            <span class="hidden-xs"><?= Yii::$app->user->identity->first_name ?></span>
                        </a>
                    </li>
                    <li class="user user-menu">
                        <?= Html::a(
                            Yii::t('app', 'Logout'),
                            ['/admin/default/logout'],
                            ['data-method' => 'post', 'class' => 'btn btn-primary btn-flat']
                        ) ?>
                    </li>
                </ul>
            <?php endif; ?>
        </div>
    </nav>
</header>
