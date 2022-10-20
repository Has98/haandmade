<aside class="main-sidebar">

    <section class="sidebar">

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' =>  Yii::t('app', 'Profile'), 'icon' => 'fa fa-pie-chart', 'url' => ['/cabinet/default/index']],
                    ['label' => Yii::t('app', 'Objects'),  'icon' => 'fa fa-object-group', 'url' => ['/cabinet/object/index']],
                ],
            ]
        ) ?>

    </section>

</aside>
