<div class="item-top">
    <a href="<?= Yii::$app->request->baseUrl?>/object/view/<?=$model->id?>" >
        <img src="<?=Yii::$app->request->baseUrl.'/'.$model->image?>" >
    </a>
    <div class="price text-center">
        <p><?=$model->price?>դր․</p>
    </div>
</div>
<div class="about">
    <div class="item-text">
        <h4>
            <a href="<?= Yii::$app->request->baseUrl?>/object/<?=$model->id?>" ><?=$model->title?></a>
        </h4>
        <div class="description"><?=$model->description?> <a href="<?= Yii::$app->request->baseUrl?>/object/<?=$model->id?>" class="more"><?=Yii::t('app', 'More')?></a></div>
    </div>
</div>
