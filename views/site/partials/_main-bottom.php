<div class="row banner">
    <div class="obj-section">
        <div class="obj-section text-center">
            <div class="cat">
                <span class="create section-title text-center">Ստեղծիր քո խանութը հենց հիմա</span>
            </div>
            <span class="line"> </span>
            <div class="make">
                <button class="btn-1"><span>Եթե Դու</span></button>
                <button class="btn-1"><span>Ստեղծագործում ես</span></button>
                <button class="btn-1"><span>Ունես կրեատիվ մտքեր</span></button>
                <button class="btn-1"><span>Ցանկանում ես կիսվել քո գործով</span></button>
                <button class="btn-1"><span>Գրանցվիր և Ստեղծիր քո սեփական օնլայն խանութը</span></button>
                <button class="btn-1 create1"><span><a href="<?= Yii::$app->request->baseUrl ?>/create">Ստեղծել</a></span></button>
            </div>
        </div>
    </div>
</div>
<section class="user"  >
    <div class="container">
        <div class="user-section ">
            <div class="obj-section text-center">
                <div class="cat">
                    <a class="section-title text-center" href="<?= Yii::$app->request->baseUrl?>/object">Թոփ վարպետներ</a>
                </div>
                <i class="fa fa-users" style=" color:#f34325 ;     font-size: 2pc; padding-top: 15px;";></i>    <br>
                <span class="line"></span>
            </div>
        </div>
        <div class="owl-carousel owl-theme owl-loaded owl-drag">
            <div class="owl-stage-outer">
                <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: 0s; width: 1500px;">
                    <?php foreach ($shops as $shop): ?>
                      <div class="owl-item active" style="width: 100px; ">
                          <div class="item">
                              <div class="item-top">
                                  <a href="<?= Yii::$app->request->baseUrl?>/shop/view/<?=$shop->id?>" >
                                  <img src="<?=Yii::$app->request->baseUrl.'/'.$shop->avatar?>" >
                              </div>
                              <div class="row about">
                                  <div class="col-lg-8 item-text">
                                      <p><?=$shop->first_name?></p>
                                  </div>
                                  </a>
                              </div>
                          </div>
                      </div>
                  <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
