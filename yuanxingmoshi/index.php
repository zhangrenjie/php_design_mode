<?php
/**
 * Created by PhpStorm.
 * User: zhangrenjie
 * Date: 2017/12/2
 * Time: 下午10:41
 */

define('ROOT', __DIR__ . '/');
require_once ROOT.'Canvas.php';

$prototypeObj=new \yuanxingmoshi\Canvas();
$prototypeObj->init();

$canvas1=clone $prototypeObj;
$canvas1->rect(2,6,4,12);
$canvas1->draw();
echo "<p/><p/>";
$canvas2=clone $prototypeObj;
$canvas2->rect(4,12,8,24);
$canvas2->draw();