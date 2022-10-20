<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = Yii::t('app', 'About us');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-about context">
    <section>
        <div class="container">
            <h1><?= Html::encode($this->title) ?></h1>
            <p>
                Մեր Մասին
                Handy- բացառիկ ապրանքների առաջին  օնլայն խանութը Հայաստանում

                Այստեղ դուք կարող եք գտնել ինքնատիպ եւ հետաքրքիր նվերներ բոլորի համար:

                Եթե ​​դուք գնահատում եք վարպետների ձեռքի ջերմությունը, հոգին, տրամադրությունը, ապա կարող եք կատարել ճիշտ ընտրություն, այցելելով մեր ինտերնետային կայք:

                hand-made.am կայքում դուք կարող եք գնել ապրանքներ տանից կամ աշխատանքի վայրից, եւ այն կառաքեն ձեզ հնարավորինս արագ: Ձեզ միայն անհրաժեշտ է գրանցել ձեր պատվերը:

                Հարցերի դեպքում, դուք միշտ կարող եք կապնվել մեզ հետ:
            </p>
        </div>
    </section>
    <?= $this->render('partials/_main-bottom', ['shops' => $shops])?>
</div>
