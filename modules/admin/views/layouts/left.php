<aside class="main-sidebar">

    <section class="sidebar">

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => Yii::t('app', 'Menu'), 'options' => ['class' => 'header']],
                    ['label' =>  Yii::t('app', 'Users'), 'icon' => ' fa-users', 'url' => ['/admin/user/index']],
                    ['label' =>  Yii::t('app', 'Categories'), 'icon' => ' fa-tags', 'url' => ['/admin/category/index']],
                    ['label' =>  Yii::t('app', 'Objects'), 'icon' => ' fa-object-group', 'url' => ['/admin/object/index']],
                ],
            ]
        ) ?>

    </section>

</aside>
