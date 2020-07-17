<?php

/**
 * Created by PhpStorm.
 * User: zhangrenjie
 * Date: 2017/12/2
 * Time: 下午10:42
 */
namespace yuanxingmoshi;

class Canvas
{
    public $data;//画布数据
    protected $decotors = [];//装饰师(装饰器)

    /**初始化画布
     * @param int $width
     * @param int $height
     */
    public function init(int $width = 40, int $height = 20)
    {
        $data = [];
        for ($i = 0; $i < $height; $i++) {
            for ($j = 0; $j < $width; $j++) {
                $data[$i][$j] = '*';
            }
        }
        $this->data = $data;
    }

    //添加装饰器
    public function addDecorator(DrawDecorator $decorator)
    {
        $this->decotors[] = $decorator;
    }

    //画之前
    public function beforeDraw()
    {
        foreach ($this->decorators as $decorator) {
            $decorator->beforeDraw();
        }
    }


    public function afterDraw()
    {
        $decorators = array_reverse($this->decorators);//先后顺序倒置
        foreach ($decorators as $decorator) {
            $decorator->afterDraw();
        }
    }

    //画图
    public function draw()
    {
        //$this->beforeDraw();
        foreach ($this->data as $line) {
            foreach ($line as $char) {
                echo $char;
            }
            echo "<br />\n";
        }
        //$this->afterDraw();
    }

    function rect($a1, $a2, $b1, $b2)
    {
        foreach ($this->data as $k1 => $line) {
            if ($k1 < $a1 or $k1 > $a2) continue;
            foreach ($line as $k2 => $char) {
                if ($k2 < $b1 or $k2 > $b2) continue;
                $this->data[$k1][$k2] = '&nbsp;';
            }
        }
    }
}