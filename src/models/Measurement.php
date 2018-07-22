<?php
/**
 * @author  Zoltan Szanto <mrbig00@gmail.com>
 * @since   2018/07/22
 */

namespace app\models;

use app\models\query\MeasurementQuery;

/**
 * Class Measurement
 *
 * @package app\models
 */
class Measurement extends \app\models\base\Measurement
{

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::class, ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::class, ['id' => 'updated_by']);
    }

    /**
     * {@inheritdoc}
     * @return MeasurementQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MeasurementQuery(get_called_class());
    }
}
