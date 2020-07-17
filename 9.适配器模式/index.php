<?php
/**
 * Created by PhpStorm.
 * User: zhangrenjie
 * Date: 2017/11/28
 * Time: 下午11:09
 */

$db = new shipeiqi\Mysql();
$db->connect('127.0.0.1', 'root', 'root', 'test');
$db->query('show database');
$db->close();