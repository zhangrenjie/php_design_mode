<?php
/**
 * Created by PhpStorm.
 * User: zhangrenjie
 * Date: 2020/7/16
 * Time: 下午6:51
 */
//组件，部件
interface Component
{
    //装饰
    public function decorator(Component $component);

    //显示
    public function display();
}


class Student implements Component
{
    protected $name = null;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function decorator(Component $component)
    {

    }

    public function display()
    {
        echo $this->name . "同学今天穿了：";
    }
}


class Equipment implements Component
{
    protected $component;

    public function decorator(Component $component)
    {
        $this->component = $component;
        return $this;
    }

    public function display()
    {
        $this->component->display();
    }
}

class Shoes extends Equipment
{
    public function display()
    {
        parent::display();
        echo "穿鞋子";
    }
}

class Clothes extends Equipment
{
    public function display()
    {
        parent::display();
        echo "穿衣服";
    }
}

class Glasses extends Equipment
{
    public function display()
    {
        parent::display();
        echo "戴眼镜";
    }
}

$zhangsan = new Student('张三');

//穿衣服
$clothes = (new Clothes)->decorator($zhangsan);

//穿鞋子
$shoes = (new Shoes)->decorator($clothes);

//戴眼睛
(new Glasses)->decorator($shoes)->display();

