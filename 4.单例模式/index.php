<?php
/**
 * Created by PhpStorm.
 * User: zhangrenjie
 * Date: 2017/11/26
 * Time: 下午7:14
 */

define('ROOT', __DIR__ . '/');
spl_autoload_register('autoload');

function autoload($className)
{
    require ROOT . $className . '.php';
}

$db = Factory::createDatabase();

