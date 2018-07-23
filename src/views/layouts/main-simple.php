<?php
/**
 * @author  Zoltan Szanto <mrbig00@gmail.com>
 * @since   2018/07/22
 *
 * @var $this    \yii\web\View
 * @var $content string
 */

use yii\helpers\Html;
use yii\helpers\Url;

dmstr\web\AdminLteAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link rel="apple-touch-icon" sizes="180x180"
          href="<?= Url::to('/img/favicon/apple-touch-icon.png?v=Gvk4ajbyL5') ?>">
    <link rel="icon" type="image/png" sizes="32x32"
          href="<?= Url::to('/img/favicon/favicon-32x32.png?v=Gvk4ajbyL5') ?>">
    <link rel="icon" type="image/png" sizes="16x16"
          href="<?= Url::to('/img/favicon/favicon-16x16.png?v=Gvk4ajbyL5') ?>">
    <link rel="manifest" href="<?= Url::to('/img/favicon/site.webmanifest?v=Gvk4ajbyL5') ?>">
    <link rel="mask-icon" href="<?= Url::to('/img/favicon/safari-pinned-tab.svg?v=Gvk4ajbyL5') ?>" color="#5bbad5">
    <link rel="shortcut icon" href="<?= Url::to('') ?>/img/favicon/favicon.ico?v=Gvk4ajbyL5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-TileImage" content="<?= Url::to('/img/favicon/mstile-144x144.png?v=Gvk4ajbyL5') ?>">
    <meta name="msapplication-config" content="<?= Url::to('/img/favicon/browserconfig.xml?v=Gvk4ajbyL5') ?>">
    <meta name="theme-color" content="#ffffff">
</head>
<body class="login-page">
<?php $this->beginBody() ?>
<?= $content ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
