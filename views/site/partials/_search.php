<?php
/* @var $this yii\web\View */
/* @var $model app\models\ObjectSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="object-search">
    <span class="line"> </span>
    <?php foreach ($category as $cat): ?>
        <h4><a href="<?=Yii::$app->request->baseUrl?>/object?ObjectSearch%5Bcat_id%5D=<?=$cat->id?>"><?=$cat->title?></a></h4>
        <span class="line"> </span>
    <?php endforeach; ?>
</div>
