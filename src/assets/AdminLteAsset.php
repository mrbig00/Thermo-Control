<?php

namespace app\assets;

use yii\base\Exception;
use yii\web\AssetBundle as BaseAdminLteAsset;

/**
 * AdminLte AssetBundle
 *
 * @since 0.1
 */
class AdminLteAsset extends BaseAdminLteAsset
{
    public $sourcePath = '@vendor/mrbig00/adminlte/dist';
    public $css        = [
        'css/AdminLTE.min.css',
        'css/bootstrap-material-design.min.css',
        'css/ripples.min.css',
        'css/MaterialAdminLTE.min.css',
        'css/skins/skin-md-purple.css',
    ];
    public $js         = [
        'js/adminlte.min.js',
        'js/material.min.js',
        'js/ripples.min.js',
    ];
    public $depends    = [
        'rmrevin\yii\fontawesome\AssetBundle',
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}
