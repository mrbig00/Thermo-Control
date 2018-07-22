<?php
/**
 * @author  Zoltan Szanto <mrbig00@gmail.com>
 * @since   2018/07/22
 */

namespace app\commands;

use yii\console\Controller;

/**
 * DbController controller<br>
 * Here are some useful console commands to maintain the app's db
 *
 * @package console\controllers
 */
class DbController extends Controller
{
    /**
     * This action totally clears the app's db and reinit's it
     */
    public function actionReInit()
    {
        $dbName = \Yii::$app->db->createCommand("SELECT DATABASE()")->queryScalar();
        if ($this->prompt("Please confirm reiniting {$dbName} table?")) {
            \Yii::$app->db->createCommand("SET foreign_key_checks = 0")->execute();
            $tables = \Yii::$app->db->schema->getTableNames();
            foreach ($tables as $table) {
                \Yii::$app->db->createCommand()->dropTable($table)->execute();
            }
            \Yii::$app->db->createCommand("SET foreign_key_checks = 1")->execute();

            \Yii::$app->runAction('migrate');
        }
    }
}
