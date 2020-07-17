<?php
namespace shipeiqi;

//定义接口
interface DB
{
    //连接操作
    public function connect($host, $userName, $password, $dbName);

    //请求
    public function query($sql);

    //关闭
    public function close();
}