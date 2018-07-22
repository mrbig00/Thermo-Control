<?php
/**
 * @author  Zoltan Szanto <mrbig00@gmail.com>
 * @since   2018/07/22
 */

namespace app\models\query;

use app\models\Measurement;

/**
 * This is the ActiveQuery class for [[Measurement]].
 *
 * @see Measurement
 */
class MeasurementQuery extends \yii\db\ActiveQuery
{
    /**
     * {@inheritdoc}
     * @return Measurement[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Measurement|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
