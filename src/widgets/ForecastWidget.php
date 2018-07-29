<?php
/**
 * @author  Zoltan Szanto <mrbig00@gmail.com>
 * @since   2018/07/29
 */

namespace app\widgets;

use yii\bootstrap\Widget;
use VertigoLabs\Overcast\ValueObjects\DataBlock;

/**
 * Class ForecastWidget, widget to display DarkSky forecast
 *
 * @package app\widgets
 */
class ForecastWidget extends Widget
{
    /**
     * @var $forecast DataBlock
     */
    public $forecast;

    public function run()
    {
        return $this->render(
            'forecast',
            ['forecast' => $this->forecast]
        );
    }
}
