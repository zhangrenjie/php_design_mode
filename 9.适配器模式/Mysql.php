<?php
namespace shipeiqi;

class Mysql implements DB
{
    protected $conn;
    public function connect($host, $userName, $password, $dbName)
    {
        $this->conn=mysql_connect($host,$userName,$password);
        mysql_select_db($dbName,$this->conn);
    }

    public function query($sql)
    {
        return mysql_query($sql,$this->conn);
    }

    public function close()
    {
        mysql_close($this->conn);
    }
}