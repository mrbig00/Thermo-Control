<?php
/**
 * @author  Zoltan Szanto <mrbig00@gmail.com>
 * @since   2018/07/23
 */

namespace app\services;

use Carbon\Carbon;
use yii\base\BaseObject;
use app\models\Measurement;
use yii\helpers\ArrayHelper;

/**
 * Handles data formatting for ChartsJS widgets
 *
 * @package app\services
 */
class ChartsJsService extends BaseObject
{
    /**
     * @var $measurements Measurement[]
     */
    public $measurements;

    /**
     * @return ChartsJsService
     */
    public static function getLastDayMeasurementService()
    {
        return new static(['measurements' => Measurement::find()->lastDay()->all()]);
    }

    public function getLabels()
    {
        $labels = ArrayHelper::getColumn($this->measurements, 'created_at');
        array_walk($labels, function (&$item) {
            $item = Carbon::createFromTimestamp($item, \Yii::$app->timeZone)->toTimeString();
        });

        return $labels;
    }

    public function getRoomTemperatureValues()
    {
        return ArrayHelper::getColumn($this->measurements, 'room_temperature');
    }

    public function getOutsideTemperatureValues()
    {
        return ArrayHelper::getColumn($this->measurements, 'outside_temperature');
    }

    public function getCpuTemperatureValues()
    {
        return ArrayHelper::getColumn($this->measurements, 'cpu_temperature');
    }

    public function getRoomHumidityValues()
    {
        return ArrayHelper::getColumn($this->measurements, 'room_humidity');
    }

    public function getOutsideHumidityValues()
    {
        return ArrayHelper::getColumn($this->measurements, 'outside_humidity');
    }

    public function getRoomAirPressureValues()
    {
        return ArrayHelper::getColumn($this->measurements, 'room_air_pressure');
    }

    public function getOutsideAirPressureValues()
    {
        return ArrayHelper::getColumn($this->measurements, 'outside_air_pressure');
    }

    public function getRoomIlluminanceValues()
    {
        return ArrayHelper::getColumn($this->measurements, 'room_lux');
    }

}
