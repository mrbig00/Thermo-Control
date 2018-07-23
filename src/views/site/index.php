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
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-body">
                <div class="chart">
                    <?= ChartJs::widget([
                        'type'    => 'line',
                        'options' => [
                            'height' => 400,
                        ],
                        'data'    => [
                            'labels'   => $lastDayCollection->getLabels(),
                            'datasets' => [
                                [
                                    'label'                     => \Yii::t('app', 'Room temperature'),
                                    'backgroundColor'           => "rgba(179,181,198,0.2)",
                                    'borderColor'               => "rgba(179,181,198,1)",
                                    'pointBackgroundColor'      => "rgba(179,181,198,1)",
                                    'pointBorderColor'          => "#fff",
                                    'pointHoverBackgroundColor' => "#fff",
                                    'pointHoverBorderColor'     => "rgba(179,181,198,1)",
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
                            ],
                        ],
                    ]);
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-body">
                <div class="chart">
                    <?= ChartJs::widget([
                        'type'    => 'line',
                        'options' => [
                            'height' => 400,
                        ],
                        'data'    => [
                            'labels'   => $lastDayCollection->getLabels(),
                            'datasets' => [
                                [
                                    'label'                     => \Yii::t('app', 'Room humidity'),
                                    'backgroundColor'           => "rgba(179,181,198,0.2)",
                                    'borderColor'               => "rgba(179,181,198,1)",
                                    'pointBackgroundColor'      => "rgba(179,181,198,1)",
                                    'pointBorderColor'          => "#fff",
                                    'pointHoverBackgroundColor' => "#fff",
                                    'pointHoverBorderColor'     => "rgba(179,181,198,1)",
                                    'data'                      => $lastDayCollection->getRoomHumidityValues(),
                                ],
                                [
                                    'label'                     => \Yii::t('app', 'Outside humidity'),
                                    'backgroundColor'           => "rgba(255,99,132,0.2)",
                                    'borderColor'               => "rgba(255,99,132,1)",
                                    'pointBackgroundColor'      => "rgba(255,99,132,1)",
                                    'pointBorderColor'          => "#fff",
                                    'pointHoverBackgroundColor' => "#fff",
                                    'pointHoverBorderColor'     => "rgba(255,99,132,1)",
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
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-body">
                <div class="chart">
                    <?= ChartJs::widget([
                        'type'    => 'line',
                        'options' => [
                            'height' => 400,
                        ],
                        'data'    => [
                            'labels'   => $lastDayCollection->getLabels(),
                            'datasets' => [
                                [
                                    'label'                     => \Yii::t('app', 'Room air pressure'),
                                    'backgroundColor'           => "rgba(179,181,198,0.2)",
                                    'borderColor'               => "rgba(179,181,198,1)",
                                    'pointBackgroundColor'      => "rgba(179,181,198,1)",
                                    'pointBorderColor'          => "#fff",
                                    'pointHoverBackgroundColor' => "#fff",
                                    'pointHoverBorderColor'     => "rgba(179,181,198,1)",
                                    'data'                      => $lastDayCollection->getRoomAirPressureValues(),
                                ],
                                [
                                    'label'                     => \Yii::t('app', 'Outside air pressure'),
                                    'backgroundColor'           => "rgba(255,99,132,0.2)",
                                    'borderColor'               => "rgba(255,99,132,1)",
                                    'pointBackgroundColor'      => "rgba(255,99,132,1)",
                                    'pointBorderColor'          => "#fff",
                                    'pointHoverBackgroundColor' => "#fff",
                                    'pointHoverBorderColor'     => "rgba(255,99,132,1)",
                                    'data'                      => $lastDayCollection->getOutsideAirPressureValues(),
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