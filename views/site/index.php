<?php
use yii\widgets\ActiveForm;
use yii\widgets\ListView;
use yii\widgets\Pjax;
use yii\widgets\DetailView;

$this->title = Yii::$app->name;
?>
<div class="site-index context">
    <section>
        <div class="container">
            <div class="row ">
                <div class="category-section text-center">
                    <div class="cat">
                        <span class="section-title text-center">Կատեգորիաներ</span>
                    </div>
                    <span class="line"></span>
                </div>
                <?php foreach ($category as $cat): ?>
                    <div class="col-lg-4 square">
                        <div class="thumb">
                            <div class="thumb-top">
                                <div class="thumb-image">
                                    <a href="<?=Yii::$app->request->baseUrl?>/object?ObjectSearch%5Bcat_id%5D=<?=$cat->id?>">
                                        <img src="<?=Yii::$app->request->baseUrl.'/'.$cat->icon?>" alt="<?=$cat->title?>">
                                    </a>
                                </div>
                                <div class="category">
                                    <p><a href="<?=Yii::$app->request->baseUrl?>/object?ObjectSearch%5Bcat_id%5D=<?=$cat->id?>"><?=$cat->title?></a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="obj-section">
                <div class="obj-section text-center">
                    <div class="cat">
                        <a class="section-title text-center" href="<?= Yii::$app->request->baseUrl?>/object">Ապրանքներ</a>
                    </div>
                    <span class="line"></span>
                </div>
            </div>
            <div class="owl-carousel owl-theme owl-loaded owl-drag">
                <div class="owl-stage-outer">
                    <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: 0s; width: 2376px;">
                        <?php foreach ($object as $obj): ?>
                            <div class="owl-item active" style="width: 178px; ">
                                <div class="item">
                                    <?= $this->render('partials/_item', ['model' => $obj]); ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?= $this->render('partials/_main-bottom', ['shops' => $shops])?>
</div>
