<?php
/**
 * @author  Zoltan Szanto <mrbig00@gmail.com>
 * @since   2018/07/22
 */

namespace app\controllers;

use app\dictionaries\Role;
use yii\filters\AccessControl;
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
        return $this->render('index');
    }
}
