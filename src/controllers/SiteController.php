<?php

namespace app\controllers;

use app\services\MeasurementService;
use yii\web\Controller;
use app\models\Measurement;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class'  => 'yii\web\ErrorAction',
                'layout' => 'main-login',
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
        $measurementService = new MeasurementService();
        $measurementService->measure();
        $measurementService->store();
        return $this->render('index');
    }
}
