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

class mysqlDB implements DB
{
    public function conn()
    {
        echo '连接上了mysql';
    }
}

class sqllitelDB implements DB
{
    public function conn()
    {
        echo '连接上了sqllite';
    }
}

//定义创建数据库工厂
class DBFactory
{
    public static function createDB(string $dbType):DB
    {
        $obj = null;
        if ($dbType == 'mysql') {
            $obj = new mysqlDB();
        } elseif ($dbType == 'sqllite') {
            $obj = new sqllitelDB();
        } else {
            throw new \Exception('不支持' . $dbType . '类型数据库');
        }
        return $obj;
    }
}

$mysql=DBFactory::createDB('mysql');
$sqllite=DBFactory::createDB('sqllite');


//这时候想要增加创建oracel连接实例
class oracelDB implements DB
{
    public function conn()
    {
        echo '连接上了oracel';
    }
}

//还需要去修改 DBFactory


//违背了面向对象的开闭原则
//对修改封闭，对扩展开放

