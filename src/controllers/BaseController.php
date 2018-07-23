<?php
/**
 * @author  Zoltan Szanto <mrbig00@gmail.com>
 * @since   2018/07/23
 */

namespace app\controllers;

use yii\web\Controller;
use app\dictionaries\Role;
use yii\filters\AccessControl;

/**
 * Class BaseController
 *
 * @package app\controllers
 */
abstract class BaseController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => [Role::ADMIN],
                    ],
                ],
            ],
        ];
    }
}
