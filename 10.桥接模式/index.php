<?php
/**
 * Created by PhpStorm.
 * User: zhangrenjie
 * Date: 2020/7/17
 * Time: 上午9:45
 */

//本实验实现两个维度的消息发送：1.不同消息等级，2.不同消息发送方式


//消息构造器
abstract class MessageBuilder
{
    protected $sender;
    public function __construct(MessageSender $sender)
    {
        $this->sender=$sender;

    }

    abstract public function message(string $content);

    //调用发送起发送消息
    public function send(string $to,string $message){
        $this->sender->send($to,$this->message($message));
    }
}

//发送器
abstract class MessageSender
{
    abstract public function send(string $to, string $content);
}

//发送短信
class SMS extends MessageSender
{
    public function send(string $to, string $content)
    {
        echo "发生短信给{$to},内容是:{$content}".PHP_EOL;
    }

}

//发送邮件
class Email extends MessageSender
{
    public function send(string $to, string $content)
    {
        echo "发生邮件给{$to},内容是:{$content}".PHP_EOL;
    }

}

//短消息
class ShortInfo extends MessageSender
{
    public function send(string $to, string $content)
    {
        echo "发生站内信息给{$to},内容是:{$content}".PHP_EOL;
    }
}


class CommonMessage extends MessageBuilder{
    public function message(string $message)
    {
        return "普通消息:".$message;
    }

}

class NoticeMessage extends MessageBuilder{
    public function message(string $message)
    {
        return "通知消息:".$message;
    }
}

class WarnMessage extends MessageBuilder{
    public function message(string $message)
    {
        return "警告消息:".$message;
    }
}

class DangerMessage extends MessageBuilder{
    public function message(string $message)
    {
        return "危险:".$message;
    }
}


(new NoticeMessage(new Email))->send('张三','作业');
(new DangerMessage(new SMS))->send('张三','游泳');
(new WarnMessage(new SMS))->send('张三','上课睡觉');


