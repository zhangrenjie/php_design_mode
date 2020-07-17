<?php


//事件
class EventDemo
{
    //触发了新事件
    public function trigger()
    {
        echo "Event happening\r";

        //侵入式，业务耦合
        echo "后续业务更新逻辑1\r\n";

        echo "后续业务更新逻辑2\r\n";

        echo "后续业务更新逻辑3\r\n";
    }
}


/**
 * 事件产生者(抽象类)
 * Class EventGenerator
 */
abstract class EventGenerator
{
    private $observers = [];//事件的所有观察者

    /**
     * 增加观察者
     * @return mixed
     */
    public function addObserver(Observer $observer)
    {
        $this->observers[] = $observer;
    }

    /**
     * 通知事件发生了，其他观察者接到通知后更新业务逻辑
     * @return mixed
     */
    public function notify($eventInfo)
    {
        foreach ($this->observers as $observer) {
            $observer->update($eventInfo);
        }
    }
}

/**
 * 定义观察者接口(观察对象为事件发生者)
 *Interface Observer
 */
interface Observer
{
    /**
     * 事件发生时，进行更新操作
     * @param null $eventInfo 发生事件的信息
     * @return mixed
     */
    public function update($eventInfo = null);
}

/**
 * 定义事件类（继承事件产生者类）
 * Class Event
 */
class Event extends EventGenerator
{
    public function trigger($eventInfo)
    {
        echo "事件 :{$eventInfo} 即将发生，通知观察者们做好更新准备<br>\r\n";
        $this->notify($eventInfo);
        echo "<br/>";
    }
}

class Observer1 implements Observer
{
    public function update($eventInfo = null)
    {
        echo "观察者1：准备开始{$eventInfo}<br> \r\n";
    }
}

class Observer2 implements Observer
{
    public function update($eventInfo = null)
    {
        echo "观察者2：准备开始{$eventInfo}<br> \r\n";
    }
}

$event = new Event();

/**
 * 此处可以动态添加、删除观察者
 */
$event->addObserver(new Observer1());
//$event->addObserver(new Observer2());

$event->trigger('吃饭');
$event->trigger('喝水');
$event->trigger('走路');

