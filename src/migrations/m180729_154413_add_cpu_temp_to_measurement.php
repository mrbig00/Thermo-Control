<?php
/**
 * @author  Zoltan Szanto <mrbig00@gmail.com>
 * @since   2018/07/29
 */

namespace app\migrations;

use yii\db\Migration;

/**
 * Class m180729_154413_add_cpu_temp_to_measurement
 */
class m180729_154413_add_cpu_temp_to_measurement extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%measurement}}', 'cpu_temperature', $this->double(2)->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%measurement}}', 'cpu_temperature');
    }
}
