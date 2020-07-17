<?php
/**
 * Created by PhpStorm.
 * User: zhangrenjie
 * Date: 2017/11/28
 * Time: 下午11:12
 */

namespace shipeiqi;


class Mysqli implements DB
{
    protected $conn;

    public function connect($host, $userName, $password, $dbName)
    {
        $this->conn = mysqli_connect($host, $userName, $password, $dbName);
    }

    public function query($sql)
    {
        return mysqli_query($this->conn, $sql);
    }

    public function close()
    {
        mysqli_close($this->conn);
    }
}