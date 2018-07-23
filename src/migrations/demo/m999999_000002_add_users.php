<?php
/**
 * @author  Zoltan Szanto <mrbig00@gmail.com>
 * @since   2018/07/22
 *
 * @var $this yii\web\View
 */

namespace app\migrations\demo;

use app\factories\UserFactory;
use yii\db\Migration;
use app\dictionaries\Role;

/**
 * Create a default user
 */
class m999999_000002_add_users extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $userFactory = new UserFactory();
        $userFactory->createAdmin('mrbig00@gmail.com', 'mrbig00', 'testtest', 'Szántó Zoltán');
    }
}
