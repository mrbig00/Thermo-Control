<?php
/**
 * @author  Zoltan Szanto <mrbig00@gmail.com>
 * @since   2018/07/22
 */

namespace app\controllers\user;


class RegistrationController extends \Da\User\Controller\RegistrationController
{
    public function actionRegister()
    {
        $this->layout = '/main-simple';
        return parent::actionRegister();
    }

    public function actionResend()
    {
        $this->layout = '/main-simple';
        return parent::actionResend();
    }

    public function actionConnect($code)
    {
        $this->layout = '/main-simple';
        return parent::actionConnect($code);
    }
}
