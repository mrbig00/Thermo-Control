<?php
/**
 * @author  Zoltan Szanto <mrbig00@gmail.com>
 * @since   2018/07/22
 *
 * @var $this               yii\web\View
 * @var $measurement        \app\models\Measurement
 * @var $lastDayCollection  \app\services\ChartsJsService
 */

use dosamigos\chartjs\ChartJs;

$this->title = \Yii::t('app', 'Dashboard');
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('_outside', ['measurement' => $measurement]); ?>
<?= $this->render('_room', ['measurement' => $measurement]); ?>

<div class="row" style="height: 200px">
    <div class="col-md-4 col-xs-12">
        <div class="box box-primary">
            <div class="box-body">
                <div class="chart">
                    <?= ChartJs::widget([
                        'type'          => 'line',
                        'options'       => [
                            'height' => 400,
                        ],
                        'clientOptions' => [
                            'scales'   => [
                                'xAxes' => [
                                    'display' => true,
                                    'type'    => 'logarithmic',
                                ],
                            ],
                            'tooltips' => [
                                'mode'      => 'index',
                                'intersect' => false,
                            ],
                            'hover'    => [
                                'mode'      => 'nearest',
                                'intersect' => true,
                            ],
                        ],
                        'data'          => [
                            'labels'   => $lastDayCollection->getLabels(),
                            'datasets' => [
                                // Temperature
                                [
                                    'label'                     => \Yii::t('app', 'Room temperature'),
                                    'backgroundColor'           => "rgba(255, 133, 27,0.2)",
                                    'borderColor'               => "rgba(255, 133, 27,1)",
                                    'pointBackgroundColor'      => "rgba(255, 133, 27,1)",
                                    'pointBorderColor'          => "#fff",
                                    'pointHoverBackgroundColor' => "#fff",
                                    'pointHoverBorderColor'     => "rgba(255, 133, 27,1)",
                                    'data'                      => $lastDayCollection->getRoomTemperatureValues(),
                                ],
                                [
                                    'label'                     => \Yii::t('app', 'Outside temperature'),
                                    'backgroundColor'           => "rgba(255,99,132,0.2)",
                                    'borderColor'               => "rgba(255,99,132,1)",
                                    'pointBackgroundColor'      => "rgba(255,99,132,1)",
                                    'pointBorderColor'          => "#fff",
                                    'pointHoverBackgroundColor' => "#fff",
                                    'pointHoverBorderColor'     => "rgba(255,99,132,1)",
                                    'data'                      => $lastDayCollection->getOutsideTemperatureValues(),
                                ],
                                // Humidity
                                [
                                    'label'                     => \Yii::t('app', 'Room humidity'),
                                    'backgroundColor'           => "rgba(62, 149, 205,0.2)",
                                    'borderColor'               => "rgba(62, 149, 205,1)",
                                    'pointBackgroundColor'      => "rgba(62, 149, 205,1)",
                                    'pointBorderColor'          => "#fff",
                                    'pointHoverBackgroundColor' => "#fff",
                                    'pointHoverBorderColor'     => "rgba(62, 149, 205,1)",
                                    'data'                      => $lastDayCollection->getRoomHumidityValues(),
                                ],
                                [
                                    'label'                     => \Yii::t('app', 'Outside humidity'),
                                    'backgroundColor'           => "rgba(142, 94, 162,0.2)",
                                    'borderColor'               => "rgba(142, 94, 162,1)",
                                    'pointBackgroundColor'      => "rgba(142, 94, 162,1)",
                                    'pointBorderColor'          => "#fff",
                                    'pointHoverBackgroundColor' => "#fff",
                                    'pointHoverBorderColor'     => "rgba(142, 94, 162,1)",
                                    'data'                      => $lastDayCollection->getOutsideHumidityValues(),
                                ],
                            ],
                        ],
                    ]);
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-xs-12">
        <div class="box box-primary">
            <div class="box-body">
                <div class="chart">
                    <?= ChartJs::widget([
                        'type'          => 'line',
                        'options'       => [
                            'height' => 400,
                        ],
                        'clientOptions' => [
                            'scales'   => [
                                'xAxes' => [
                                    'display' => true,
                                    'type'    => 'logarithmic',
                                ],
                            ],
                            'tooltips' => [
                                'mode'      => 'index',
                                'intersect' => false,
                            ],
                            'hover'    => [
                                'mode'      => 'nearest',
                                'intersect' => true,
                            ],
                        ],
                        'data'          => [
                            'labels'   => $lastDayCollection->getLabels(),
                            'datasets' => [
                                // Air pressure
                                [
                                    'label'                     => \Yii::t('app', 'Room air pressure'),
                                    'backgroundColor'           => "rgba(60, 186, 159,0.2)",
                                    'borderColor'               => "rgba(60, 186, 159,1)",
                                    'pointBackgroundColor'      => "rgba(60, 186, 159,1)",
                                    'pointBorderColor'          => "#fff",
                                    'pointHoverBackgroundColor' => "#fff",
                                    'pointHoverBorderColor'     => "rgba(60, 186, 159,1)",
                                    'data'                      => $lastDayCollection->getRoomAirPressureValues(),
                                ],
                                [
                                    'label'                     => \Yii::t('app', 'Outside air pressure'),
                                    'backgroundColor'           => "rgba(196, 88, 80,0.2)",
                                    'borderColor'               => "rgba(196, 88, 80,1)",
                                    'pointBackgroundColor'      => "rgba(196, 88, 80,1)",
                                    'pointBorderColor'          => "#fff",
                                    'pointHoverBackgroundColor' => "#fff",
                                    'pointHoverBorderColor'     => "rgba(196, 88, 80,1)",
                                    'data'                      => $lastDayCollection->getOutsideAirPressureValues(),
                                    'hidden'                    => true,
                                ],
                            ],
                        ],
                    ]);
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-xs-12">
        <div class="box box-primary">
            <div class="box-body">
                <div class="chart">
                    <?= ChartJs::widget([
                        'type'          => 'line',
                        'options'       => [
                            'height' => 400,
                        ],
                        'clientOptions' => [
                            'scales'   => [
                                'xAxes' => [
                                    'display' => true,
                                    'type'    => 'logarithmic',
                                ],
                            ],
                            'tooltips' => [
                                'mode'      => 'index',
                                'intersect' => false,
                            ],
                            'hover'    => [
                                'mode'      => 'nearest',
                                'intersect' => true,
                            ],
                        ],
                        'data'          => [
                            'labels'   => $lastDayCollection->getLabels(),
                            'datasets' => [
                                // Air pressure
                                [
                                    'label'                     => \Yii::t('app', 'Room illuminance'),
                                    'backgroundColor'           => "rgba(255,171,0,0.4)",
                                    'borderColor'               => "rgba(255,171,0,1)",
                                    'pointBackgroundColor'      => "rgba(255,171,0,1)",
                                    'pointBorderColor'          => "#fff",
                                    'pointHoverBackgroundColor' => "#fff",
                                    'pointHoverBorderColor'     => "rgba(255,171,0,1)",
                                    'data'                      => $lastDayCollection->getRoomIlluminanceValues(),
                                ],
                            ],
                        ],
                    ]);
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>