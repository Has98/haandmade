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

<div class="page-container header-one  wrap">
    <div class="container">
        <h3 class="text-center"><a href="<?= Yii::$app->request->baseUrl ?>/"><?=Yii::t('app', 'Home')?></a></h3>
        <?= $content ?>
    </div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
