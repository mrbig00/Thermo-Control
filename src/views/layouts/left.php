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
            <?php $accountUrl = \yii\helpers\Url::to(['/user/settings/profile']); ?>
            <div class="user-panel">
                <a class="pull-left image" href="<?= $accountUrl ?>" title="<?= \Yii::t('app', 'My profile'); ?>">
                    <img src="<?= \Yii::$app->user->identity->profile->getAvatarUrl() ?>" class="img-circle"
                         alt="User Image"/>
                </a>
                <div class="pull-left info">
                    <p>
                        <a href="<?= $accountUrl ?>" title="<?= \Yii::t('app', 'My profile'); ?>">
                            <?= \Yii::$app->user->identity->profile->name ?>
                        </a>
                    </p>

                    <a href="<?= $accountUrl ?>" title="<?= \Yii::t('app', 'My profile'); ?>">
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
