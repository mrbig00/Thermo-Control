<?php

namespace app\models;
/**
 * Class User
 *
 * @package app\models
 */
class User extends \Da\User\Model\User
{
    public function getAvatarUrl()
    {
        $username = urlencode($this->username);
        return "https://ui-avatars.com/api/?size=128&rounded=true&color=F5F5F5&background=8BC34A&name={$username}";
    }
}
