<?php
/**
 * @author  Zoltan Szanto <mrbig00@gmail.com>
 * @since   2018/07/22
 *
 * @var $this    \yii\web\View
 * @var $content string
 */
?>
<aside class="main-sidebar">
    <section class="sidebar">
        <?php if (!\Yii::$app->user->isGuest): ?>
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?= \Yii::$app->user->identity->profile->getAvatarUrl() ?>" class="img-circle" alt="User Image"/>
                </div>
                <div class="pull-left info">
                    <p><?= \Yii::$app->user->identity->profile->name ?></p>

                    <a href="#">
                        <i class="fas fa-circle text-success"></i>
                        Online
                    </a>
                </div>
            </div>
        <?php endif; ?>
        <?= \app\widgets\Menu::widget(
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
