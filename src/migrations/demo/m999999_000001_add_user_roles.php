<?php
/**
 * @author  Zoltan Szanto <mrbig00@gmail.com>
 * @since   2018/07/22
 *
 * @var $this yii\web\View
 */

namespace app\migrations\demo;

use yii\db\Migration;
use app\dictionaries\Role;

/**
 * Create necessary user roles
 */
class m999999_000001_add_user_roles extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $auth = \Yii::$app->authManager;
        $adminRule = $auth->createRole(Role::ADMIN);
        $adminRule->description = Role::get(Role::ADMIN);
        $auth->add($adminRule);
    }
}
