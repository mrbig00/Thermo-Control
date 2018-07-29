<?php
/**
 * @author  Zoltan Szanto <mrbig00@gmail.com>
 * @since   2018/07/22
 */

namespace app\controllers;

use app\dictionaries\Role;
use app\models\Measurement;
use app\services\ChartsJsService;
use app\services\MeasurementService;
use Carbon\Carbon;
use VertigoLabs\Overcast\ValueObjects\DataBlock;
use yii\filters\AccessControl;
use yii\httpclient\Client;
use yii\httpclient\Response;
use yii\web\Controller;

/**
 * Class SiteController
 *
 * @package app\controllers
 */
class SiteController extends BaseController
{
    public function behaviors()
    {
        return [
            'access' => [
                'class'  => AccessControl::class,
                'except' => ['error'],
                'rules'  => [
                    [
                        'allow' => true,
                        'roles' => [Role::ADMIN],
                    ],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class'  => 'yii\web\ErrorAction',
                'layout' => 'main-simple',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render(
            'index',
            [
                'forecast'          => $this->getForecastData(),
                'sunrise'           => $this->getSunData()['sunrise'],
                'sunset'            => $this->getSunData()['sunset'],
                'measurement'       => MeasurementService::measureOnly(),
                'lastDayCollection' => ChartsJsService::getLastDayMeasurementService(),
            ]
        );
    }

    protected function getSunData()
    {
        $data = \Yii::$app->cache->getOrSet(
            self::class . "_sunDataCache",
            function () {
                $client = new Client(['baseUrl' => 'https://api.sunrise-sunset.org']);
                $response = $client->createRequest()
                    ->setFormat(Client::FORMAT_URLENCODED)
                    ->setUrl('json')
                    ->setData([
                        'date'      => 'today',
                        'formatted' => '0',
                        'lat'       => \Yii::$app->params['sensor_location']['lat'],
                        'lng'       => \Yii::$app->params['sensor_location']['lon'],
                    ])
                    ->send();

                $result = [
                    'sunrise'    => null,
                    'sunset'     => null,
                    'day_length' => null,
                ];

                if ($response->data['status'] === 'OK') {

                    $sunrise = Carbon::createFromFormat(\DateTime::ATOM, $response->data['results']['sunrise'], 'UTC');
                    $sunrise->setTimezone(\Yii::$app->timeZone);
                    $sunset = Carbon::createFromFormat(\DateTime::ATOM, $response->data['results']['sunset'], 'UTC');
                    $sunset->setTimezone(\Yii::$app->timeZone);

                    $result['sunrise'] = $sunrise;
                    $result['sunset'] = $sunset;
                    $result['day_length'] = $response->data['results']['day_length'];
                }

                return $result;
            },
            3600
        );

        return $data;
    }

    /**
     * Return DarkSky forecast data
     *
     * @return DataBlock
     */
    protected function getForecastData()
    {
        $data = \Yii::$app->cache->getOrSet(
            self::class . "_forecastCache",
            function () {
                $overcast = new \VertigoLabs\Overcast\Overcast(\Yii::$app->params['dark_sky_api_key']);
                $forecast = $overcast->getForecast(
                    \Yii::$app->params['sensor_location']['lat'],
                    \Yii::$app->params['sensor_location']['lon']
                );
                return $forecast->getHourly();
            },
            3600
        );

        return $data;
    }
}
