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
        <div class="info-box">
            <span class="info-box-icon bg-blue">
                <?= FA::i(FA::_TACHOMETER_ALT) ?>
            </span>

            <div class="info-box-content">
                <span class="info-box-text"><?= \Yii::t('app', 'Room temperature') ?></span>
                <span class="info-box-number">
                    <?= $measurement->room_temperature ?>
                    <sup>
                        &#8451;
                    </sup>
                </span>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-aqua">
                <?= FA::i(FA::_TINT) ?>
            </span>

            <div class="info-box-content">
                <span class="info-box-text"><?= \Yii::t('app', 'Room humidity') ?></span>
                <span class="info-box-number">
                    <?= $measurement->room_humidity ?>
                    <sup>
                        %
                    </sup>
                </span>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-teal">
                <?= FA::i(FA::_TACHOMETER_ALT) ?>
            </span>

            <div class="info-box-content">
                <span class="info-box-text"><?= \Yii::t('app', 'Room air pressure') ?></span>
                <span class="info-box-number">
                    <?= $measurement->room_air_pressure ?>
                    <sup>
                        mmHg
                    </sup>
                </span>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-yellow-active">
                <?= FA::i(FA::_LIGHTBULB) ?>
            </span>

            <div class="info-box-content">
                <span class="info-box-text"><?= \Yii::t('app', 'Room illuminance') ?></span>
                <span class="info-box-number">
                    <?= $measurement->room_lux ?>
                    <sup>
                        lux
                    </sup>
                </span>
            </div>
        </div>
    </div>
</div>