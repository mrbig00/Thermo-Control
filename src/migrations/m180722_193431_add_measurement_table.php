<?php
/**
 * @author  Zoltan Szanto <mrbig00@gmail.com>
 * @since   2018/07/22
 *
 * @var $this yii\web\View
 */

namespace app\migrations;

use yii\db\Migration;

/**
 * Class m180722_193431_add_measurement_table
 */
class m180722_193431_add_measurement_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%measurement}}', [
            'id'                   => $this->primaryKey(),
            'room_temperature'     => $this->double(2)->notNull(),
            'room_air_pressure'    => $this->double(2)->notNull(),
            'room_lux'             => $this->double(2)->notNull(),
            'room_humidity'        => $this->double(2)->notNull(),
            'outside_temperature'  => $this->double(2)->notNull(),
            'outside_air_pressure' => $this->double(2)->notNull(),
            'outside_humidity'     => $this->double(2)->notNull(),
            'outside_wind_speed'   => $this->double(2)->notNull(),
            'created_at'           => $this->integer(11)->null()->defaultValue(null),
            'updated_at'           => $this->integer(11)->null()->defaultValue(null),
            'created_by'           => $this->integer()->null()->defaultValue(null),
            'updated_by'           => $this->integer()->null()->defaultValue(null),

        ]);

        $this->addForeignKey("fk_createdby_measurement", "{{%measurement}}", "created_by", "{{%user}}", "id", 'restrict', 'cascade');
        $this->addForeignKey("fk_updatedby_measurement", "{{%measurement}}", "updated_by", "{{%user}}", "id", 'restrict', 'cascade');
    }
}
