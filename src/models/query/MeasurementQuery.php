<?php
/**
 * @author  Zoltan Szanto <mrbig00@gmail.com>
 * @since   2018/07/22
 */

namespace app\models\query;

use Carbon\Carbon;

/**
 * This is the ActiveQuery class for [[Measurement]].
 */
class MeasurementQuery extends \yii\db\ActiveQuery
{
    public function lastDay()
    {
        $current = Carbon::now(\Yii::$app->timeZone);
        $yesterday = (clone $current)->subDay(1);

        return $this->orderBy(['created_at' => SORT_ASC])
            ->andWhere(['between', 'created_at', $yesterday->timestamp, $current->timestamp]);
    }
}
