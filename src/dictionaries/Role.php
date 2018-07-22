<?php
/**
 * @author  Zoltan Szanto <mrbig00@gmail.com>
 * @since   2018/07/22
 */

namespace app\dictionaries;

use Yii;

/**
 * Role dictionary class to describe user roles
 *
 * @package app\dictionaries
 */
abstract class Role
{
    const ADMIN = 'admin';

    public static function all()
    {
        return [
            self::ADMIN => Yii::t('app', 'Admin'),
        ];
    }

    public static function get($role)
    {
        $all = self::all();

        if (isset($all[$role])) {
            return $all[$role];
        }

        return Yii::t('app', 'Not set');
    }
}
