<aside class="main-sidebar">
    <section class="sidebar">
        <?php if (!\Yii::$app->user->isGuest): ?>
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
                </div>
                <div class="pull-left info">
                    <p><?= \Yii::$app->user->identity->email ?></p>

                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
        <?php endif; ?>
        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget' => 'tree'],
                'items'   => [
                    ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
                    ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                    ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
                    ['label' => 'Login', 'url' => ['user/login'], 'visible' => Yii::$app->user->isGuest],
                ],
            ]
        ) ?>

    </section>

</aside>
