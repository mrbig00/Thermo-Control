<?php
/**
 * @author  Zoltan Szanto <mrbig00@gmail.com>
 * @since   2018/07/23
 */

namespace app\commands;

use app\services\MeasurementService;
use yii\console\Controller;

/**
 * Class MeasurementController
 *
 * @package app\commands
 */
class MeasurementController extends Controller
{
    public function actionIndex()
    {
        $measurementService = new MeasurementService();
        $measurementService->measure();
        $measurementService->store();
    }
}
