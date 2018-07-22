<?php
/**
 * @author  Zoltan Szanto <mrbig00@gmail.com>
 * @since   2018/07/22
 */

namespace app\factories;

use app\models\User;
use yii\base\Exception;
use Da\User\Model\Profile;
use app\dictionaries\Role;
use Da\User\Factory\MailFactory;
use Da\User\Service\UserCreateService;
use Da\User\Traits\ContainerAwareTrait;


class UserFactory
{
    use ContainerAwareTrait;

    public function createAdmin($email, $username, $password = null, $name = null, $timezone = null)
    {
        /** @var User $user */
        $user = $this->make(
            User::class,
            [],
            ['scenario' => 'create', 'email' => $email, 'username' => $username, 'password' => $password]
        );
        $mailService = MailFactory::makeWelcomeMailerService($user);
        if (!$this->make(UserCreateService::class, [$user, $mailService])->run()) {
            throw new Exception("Can't create user");
        }

        $profile = Profile::findOne(['user_id' => $user->id]);

        if (!$profile) {
            $profile = new Profile();
            $profile->user_id = $user->id;
        }

        $profile->public_email = $user->email;
        $profile->name = $name;
        $profile->timezone = ($timezone) ? $timezone : 'Europe/Bucharest';
        $profile->save();

        $auth = \Yii::$app->authManager;
        $roleObject = $auth->getRole(Role::ADMIN);
        $auth->assign($roleObject, $user->primaryKey);

        return true;
    }
}
