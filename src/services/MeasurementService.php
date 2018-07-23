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
    /**
     * @var int Cache duration in seconds
     */
    protected $cacheDuration = 10;

    /**
     * @var string $sensorApiEndpoint sensor api endpoint
     */
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
        $this->measurement->setAttributes($this->getRoomData());
    }

    protected function measureWorld()
    {
        try {
            $this->measurement->setAttributes($this->getWorldData());
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

    /**
     * Measure and store the measurement
     *
     * @return Measurement
     */
    public static function measureAndStore()
    {
        $measurementService = new static();
        $measurementService->measure();
        $measurementService->store();

        return $measurementService->getMeasurement();
    }

    /**
     * Make a quick measurement
     *
     * @return Measurement
     */
    public static function measureOnly()
    {
        $measurementService = new static();
        $measurementService->measure();

        return $measurementService->getMeasurement();
    }

    protected function getWorldData()
    {
        $data = \Yii::$app->cache->getOrSet(
            self::class . "_worldDataCache",
            function () {
                $owm = new OpenWeatherMap(\Yii::$app->params['open_weather_map_api_key']);
                $weather = $owm->getWeather(
                    \Yii::$app->params['sensor_location']['city'],
                    'metric',
                    \Yii::$app->language
                );

                return [
                    'outside_temperature'  => $weather->temperature->now->getValue(),
                    'outside_air_pressure' => $weather->pressure->getValue(),
                    'outside_humidity'     => $weather->humidity->getValue(),
                    'outside_wind_speed'   => $weather->wind->speed->getValue(),
                ];
            },
            $this->cacheDuration
        );

        return $data;
    }

    protected function getRoomData()
    {
        $data = \Yii::$app->cache->getOrSet(
            self::class . "_roomDataCache",
            function () {
                $client = new Client();
                $response = $client->createRequest()
                    ->setMethod('GET')
                    ->setUrl($this->sensorApiEndpoint)
                    ->send();
                if ($response->isOk) {
                    return [
                        'room_lux'          => $response->data['lux'],
                        'room_air_pressure' => $response->data['pressure'],
                        'room_temperature'  => $response->data['temperature'],
                        'room_humidity'     => $response->data['humidity'],
                    ];
                } else {
                    throw new \Exception("Error during getting room data");
                }
            },
            $this->cacheDuration
        );

        return $data;
    }
}
