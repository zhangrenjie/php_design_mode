<?php

/**
 * Created by PhpStorm.
 * User: zhangrenjie
 * Date: 2020/7/16
 * Time: 上午9:45
 */
//定义DB接口，对外开放
interface DB
{
    public function conn();
}

//定义DBFactory工厂，对外开放
interface DBFactory
{
    public static function createDB():DB;

}


class mysqlDB implements DB
{
    public function conn()
    {
        echo '连接上了mysql' . PHP_EOL;
    }
}

class sqllitelDB implements DB
{
    public function conn()
    {
        echo '连接上了sqllite' . PHP_EOL;
    }
}

class mysqlDBFactory implements DBFactory
{
    public static function createDB():DB
    {
        return new mysqlDB();
    }

}

class sqlliteDBFactory implements DBFactory
{
    public static function createDB():DB
    {
        return new sqllitelDB();
    }
}

//调用数据库
$mysql = mysqlDBFactory::createDB();
$mysql->conn();

$sqllite = sqlliteDBFactory::createDB();
$sqllite->conn();


//////////////////////////////////////

//面向对象的开闭原则
//增加支持oracel扩展，不用修改上面的代码

class oracelDB implements DB
{
    public function conn()
    {
        echo '连接上了oracel' . PHP_EOL;
    }
}


class oracelDBFacoty implements DBFactory
{
    public static function createDB():DB
    {
        return new oracelDB();
    }
}

//调用oracel
$oracel = oracelDBFacoty::createDB();
$oracel->conn();


