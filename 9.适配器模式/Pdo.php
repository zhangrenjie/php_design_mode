<?php
/**
 * Created by PhpStorm.
 * User: zhangrenjie
 * Date: 2017/11/28
 * Time: 下午11:12
 */

namespace shipeiqi;


class Pdo implements DB
{
    protected $conn;

    public function connect($host, $userName, $password, $dbName)
    {
        $dsn = "mysql:host={$host};dbname={$dbName}";
        $this->conn = new \PDO($dsn, $userName, $password);
    }

    public function query($sql)
    {
        return $this->conn->query($sql);
    }

    public function close()
    {
        unset($this->conn);
    }
}