<?php
/**
 * @author  Zoltan Szanto <mrbig00@gmail.com>
 * @since   2018/07/29
 *
 * @var $forecast \VertigoLabs\Overcast\ValueObjects\DataPoint
 */
use rmrevin\yii\fontawesome\FAS as FA;
?>

<div class="info-box">
    <span class="info-box-icon bg-green">
        <?php if ($forecast->getIcon() === 'clear-day'): ?>
            <?= FA::i(FA::_SUN) ?>
        <?php elseif ($forecast->getIcon() === 'clear-night'): ?>
            <?= FA::i(FA::_MOON) ?>
        <?php elseif ($forecast->getIcon() === 'rain'): ?>
            <?= FA::i(FA::_UMBRELLA) ?>
        <?php elseif ($forecast->getIcon() === 'snow'): ?>
            <?= FA::i(FA::_SNOWFLAKE) ?>
        <?php elseif ($forecast->getIcon() === 'sleet'): ?>
            <?= FA::i(FA::_UMBRELLA) ?>
        <?php elseif ($forecast->getIcon() === 'wind'): ?>
            <?= FA::i(FA::_SNOWFLAKE) ?>
        <?php elseif ($forecast->getIcon() === 'fog'): ?>
            <?= FA::i(FA::_BLIND) ?>
        <?php elseif ($forecast->getIcon() === 'cloudy'): ?>
            <?= FA::i(FA::_CLOUD) ?>
        <?php elseif ($forecast->getIcon() === 'partly-cloudy-day'): ?>
            <?= FA::i(FA::_CLOUD) ?>
        <?php elseif ($forecast->getIcon() === 'partly-cloudy-night'): ?>
            <?= FA::i(FA::_CLOUD) ?>
        <?php endif; ?>
    </span>

    <div class="info-box-content">
        <span class="info-box-number">
            <?= $forecast->getSummary()?>
        </span>
    </div>
    <!-- /.info-box-content -->
</div>