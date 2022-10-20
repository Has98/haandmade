<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="site-error">


    <div class="alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>

    </div>
    <div class="container">
        <div class="error">
            <img src="<?= Yii::$app->request->baseUrl ?>/img/prods-404.jpg" alt="image">

        </div>
    </div>



</div>
