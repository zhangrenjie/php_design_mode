<?php
/**
 * Created by PhpStorm.
 * User: zhangrenjie
 * Date: 2020/7/16
 * Time: 下午5:38
 */
//定义装饰器接口
interface Decorator
{
    public function before();

    public function after();
}

class EchoText
{
    public $decorators;
    public $text = '';

    public function __construct(string $text)
    {
        $this->decorators = new SplObjectStorage();
        $this->text = $text;

    }

    public function index()
    {
        $this->beforeEcho();
        echo $this->text;
        $this->afterEcho();
    }


    //添加装饰器
    public function addDecorator(Decorator $decorator)
    {
        $this->decorators->attach($decorator);
    }

    //执行装饰器前置操作 先进先出原则
    protected function beforeEcho()
    {
        $this->decorators->rewind();
        while ($this->decorators->valid()) {
            $decorator = $this->decorators->current();

            $decorator->before();
            $this->decorators->next();
        }
    }

    //执行装饰器后置操作 先进后出原则
    protected function afterEcho()
    {

        $this->decorators->rewind();
        while ($this->decorators->valid()) {
            $decorator = $this->decorators->current();
            $decorator->after();
            $this->decorators->next();
        }
    }
}



////////////
/**
 * 颜色装饰器实现
 * Class ColorDecorator
 */
class ColorDecorator implements Decorator
{
    protected $color;

    public function __construct($color)
    {
        $this->color = $color;
    }

    public function before()
    {
        echo "<div style='color: {$this->color}'>";
    }

    public function after()
    {
        echo "</div>";
    }
}

/**
 * 字体大小装饰器实现
 * Class SizeDecorator
 */
class SizeDecorator implements Decorator
{
    protected $size;
    public function __construct($size)
    {
        $this->size = $size;
    }

    public function before()
    {
        echo "<div style='font-size: {$this->size}px'>";
    }

    public function after()
    {
        echo "</div>";
    }
}

//实例化输出类
$echo = new EchoText('hello world');
//增加装饰器
$echo->addDecorator(new ColorDecorator('red'));
//增加装饰器
$echo->addDecorator(new SizeDecorator('22'));
//输出
$echo->Index();


