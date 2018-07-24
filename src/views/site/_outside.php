<?php
/**
 * @author  Zoltan Szanto <mrbig00@gmail.com>
 * @since   2018/07/23
 *
 * @var $this        yii\web\View
 * @var $measurement \app\models\Measurement
 */

use rmrevin\yii\fontawesome\FAS as FA;
?>
<div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-blue">
            <span class="info-box-icon">
                <?= FA::i(FA::_TACHOMETER_ALT) ?>
            </span>

            <div class="info-box-content">
                <span class="info-box-text"><?= \Yii::t('app', 'Outside temperature') ?></span>
                <span class="info-box-number">
                    <?= $measurement->outside_temperature ?>
                    <sup>
                        &#8451;
                    </sup>
                </span>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-aqua">
            <span class="info-box-icon">
                <?= FA::i(FA::_TINT) ?>
            </span>

            <div class="info-box-content">
                <span class="info-box-text"><?= \Yii::t('app', 'Outside humidity') ?></span>
                <span class="info-box-number">
                    <?= $measurement->outside_humidity ?>
                    <sup>
                        %
                    </sup>
                </span>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-teal">
            <span class="info-box-icon">
                <?= FA::i(FA::_TACHOMETER_ALT) ?>
            </span>

            <div class="info-box-content">
                <span class="info-box-text"><?= \Yii::t('app', 'Outside air pressure') ?></span>
                <span class="info-box-number">
                    <?= $measurement->outside_air_pressure ?>
                    <sup>
                        mmHg
                    </sup>
                </span>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-orange">
            <span class="info-box-icon">
                <?= FA::i(FA::_LEAF) ?>
            </span>

            <div class="info-box-content">
                <span class="info-box-text"><?= \Yii::t('app', 'Outside wind speed') ?></span>
                <span class="info-box-number">
                    <?= $measurement->outside_wind_speed ?>
                    <sup>
                        km/h
                    </sup>
                </span>
            </div>
        </div>
    </div>
</div>
