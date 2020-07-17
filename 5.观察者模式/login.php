<?php

/**
 * Created by PhpStorm.
 * User: zhangrenjie
 * Date: 2020/7/16
 * Time: 下午3:11
 */
class UserLogin implements SplSubject
{
    protected $observers = null;//用于观察者对象的集合
    public $loginNum = 0;


    public function __construct()
    {
        $this->observers = new SplObjectStorage();
        $this->loginNum = rand(1, 10);
    }

    //添加观察者对象
    public function attach(SplObserver $observer)
    {
        $this->observers->attach($observer);
    }

    //删除观察者对象
    public function detach(SplObserver $observer)
    {
        $this->observers->detach($observer);
    }

    //通知观察者对象
    public function notify()
    {
        //对象集合指针重置
        $this->observers->rewind();

        //遍历对象集合
        while ($this->observers->valid()) {
            //获取观察者
            $observer = $this->observers->current();

            //触发观察者修改事件
            $observer->update($this);

            //指针后移
            $this->observers->next();
        }
    }
}

//定义观察者--发邮件
class sendEmail implements SplObserver
{
    public function update(SplSubject $subject)
    {
        if ($subject->loginNum >= 3) {
            echo "第{$subject->loginNum}次登录，邮件通知登录次数过多" . PHP_EOL;
        } else {
            echo "第{$subject->loginNum}次登录，邮件通知成功登录" . PHP_EOL;
        }
    }
}

//发短信
class sendMessage implements SplObserver
{
    public function update(SplSubject $subject)
    {
        if ($subject->loginNum >= 3) {
            echo "第{$subject->loginNum}次登录，短信通知登录异常" . PHP_EOL;
        } else {
            echo "第{$subject->loginNum}次登录，短信通知登录正常" . PHP_EOL;
        }
    }
}

//更新分数
class updateScore implements SplObserver
{
    public function update(SplSubject $subject)
    {
        if ($subject->loginNum >= 3) {
            echo "本次登录无积分" . PHP_EOL;
        } else {
            echo "本次登录有积分" . PHP_EOL;
        }
    }
}

$login = new UserLogin();
$login->attach(new sendEmail());//发邮件
$login->attach(new sendMessage());//发消息
$login->attach(new updateScore());//发消息

//增加其他
class updateLog implements SplObserver
{
    public function update(SplSubject $subject)
    {
        echo "记录登录日志" . PHP_EOL;
    }
}

$login->attach(new updateLog());

$login->notify();



