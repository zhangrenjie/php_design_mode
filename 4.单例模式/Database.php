<?php

/**
 * Created by PhpStorm.
 * User: zhangrenjie
 * Date: 2017/11/26
 * Time: 下午7:13
 */
//final防止被继承
final class Database
{
    private $db = null;

    //私有方法，不能被new
    private function __construct()
    {

    }

    //获取连接属性
    public static function getInstance()
    {
        if (!(self::$db instanceof self)) {
            self::$db = new self;
        }

        return self::$db;
    }

    //不能被克隆
    private function __clone()
    {
        // TODO: Implement __clone() method.
    }
}