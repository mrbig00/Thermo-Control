<?php
/**
 * @author  Zoltan Szanto <mrbig00@gmail.com>
 * @since   2018/07/22
 */

namespace app\services;

use yii\base\BaseObject;
use yii\httpclient\Client;
use Cmfcmf\OpenWeatherMap;
use app\models\Measurement;

/**
 * Class MeasurementService
 *
 * @package app\services
 */
class MeasurementService extends BaseObject
{
    public $sensorApiEndpoint;
    /**
     * @var Measurement $measurement
     */
    protected $measurement;

    public function init()
    {
        if (!$this->sensorApiEndpoint) {
            $this->sensorApiEndpoint = env('SENSOR_API_URL');
        }
        $this->measurement = new Measurement();
    }

    public function measure()
    {
        $this->measureRoom();
        $this->measureWorld();
    }

    protected function measureRoom()
    {
        $client = new Client();
        $response = $client->createRequest()
            ->setMethod('GET')
            ->setUrl($this->sensorApiEndpoint)
            ->send();
        if ($response->isOk) {
            $this->measurement->room_lux = $response->data['lux'];
            $this->measurement->room_air_pressure = $response->data['pressure'];
            $this->measurement->room_temperature = $response->data['temperature'];
            $this->measurement->room_humidity = $response->data['humidity'];
        }
        unset($client);
    }

    protected function measureWorld()
    {
        $owm = new OpenWeatherMap(\Yii::$app->params['open_weather_map_api_key']);

        try {
            $weather = $owm->getWeather(
                \Yii::$app->params['sensor_location']['city'],
                'metric',
                \Yii::$app->language
            );
            $this->measurement->outside_temperature = $weather->temperature->now->getValue();
            $this->measurement->outside_air_pressure = $weather->pressure->getValue();
            $this->measurement->outside_humidity = $weather->humidity->getValue();
            $this->measurement->outside_wind_speed = $weather->wind->speed->getValue();
        } catch (\Exception $e) {
            echo 'General exception: ' . $e->getMessage() . ' (Code ' . $e->getCode() . ').';
        }
    }

    public function store()
    {
        return $this->measurement->save();
    }

    public function getMeasurement()
    {
        return $this->measurement;
    }

    public static function measureAndStore()
    {
        $measurementService = new static();
        $measurementService->measure();
        $measurementService->store();

        return $measurementService->getMeasurement();
    }
}
