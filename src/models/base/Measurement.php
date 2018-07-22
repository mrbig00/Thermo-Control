<?php

namespace app\models\base;

use app\models\User;
use Yii;

/**
 * This is the model class for table "{{%measurement}}".
 *
 * @property int    $id
 * @property double $room_temperature
 * @property double $room_air_pressure
 * @property double $room_lux
 * @property double $room_humidity
 * @property double $outside_temperature
 * @property double $outside_air_pressure
 * @property double $outside_humidity
 * @property double $outside_wind_speed
 * @property int    $created_at
 * @property int    $updated_at
 * @property int    $created_by
 * @property int    $updated_by
 *
 * @property User   $createdBy
 * @property User   $updatedBy
 */
class Measurement extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%measurement}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['room_temperature', 'room_air_pressure', 'room_lux', 'room_humidity', 'outside_temperature', 'outside_air_pressure', 'outside_humidity', 'outside_wind_speed'], 'required'],
            [['room_temperature', 'room_air_pressure', 'room_lux', 'room_humidity', 'outside_temperature', 'outside_air_pressure', 'outside_humidity', 'outside_wind_speed'], 'number'],
            [['created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['updated_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id'                   => Yii::t('app', 'ID'),
            'room_temperature'     => Yii::t('app', 'Room Temperature'),
            'room_air_pressure'    => Yii::t('app', 'Room Air Pressure'),
            'room_lux'             => Yii::t('app', 'Room Lux'),
            'room_humidity'        => Yii::t('app', 'Room Humidity'),
            'outside_temperature'  => Yii::t('app', 'Outside Temperature'),
            'outside_air_pressure' => Yii::t('app', 'Outside Air Pressure'),
            'outside_humidity'     => Yii::t('app', 'Outside Humidity'),
            'outside_wind_speed'   => Yii::t('app', 'Outside Wind Speed'),
            'created_at'           => Yii::t('app', 'Created At'),
            'updated_at'           => Yii::t('app', 'Updated At'),
            'created_by'           => Yii::t('app', 'Created By'),
            'updated_by'           => Yii::t('app', 'Updated By'),
        ];
    }
}
