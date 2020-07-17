<?php
/**
 * Created by PhpStorm.
 * User: zhangrenjie
 * Date: 2020/7/16
 * Time: 上午9:12
 */

//定义抽象类
abstract class Person {
    //定义抽象方法
    public abstract function work();
}


class Teacher extends Person{
    public function work(){
        echo "教书";
    }
}

class Student extends Person{
    public function work(){
        echo "学习";
    }
}

class Client{
    public static function call_person(Person $obj){
        echo $obj->work().PHP_EOL;
    }
}

//人的实例化对象表现出来不同的形态
Client::call_person(new Teacher());
Client::call_person(new Student());
