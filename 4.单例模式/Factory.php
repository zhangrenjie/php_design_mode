<?php

/**
 * Created by PhpStorm.
 * User: zhangrenjie
 * Date: 2017/11/26
 * Time: 下午7:12
 */
class Factory
{
    public static function createDatabase()
    {
        $db = Database::getInstance();
        return $db;
    }
}