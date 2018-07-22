<?php
/**
 * @author  Zoltan Szanto <mrbig00@gmail.com>
 * @since   2018/07/22
 */

namespace app\controllers\user;

/**
 * Class SecurityController
 *
 * @package app\controllers
 */
class SecurityController extends \Da\User\Controller\SecurityController
{
    public function actionLogin()
    {
        $this->layout = '/main-login';
        return parent::actionLogin();
    }
}
