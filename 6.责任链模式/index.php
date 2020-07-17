<?php
/**
 * Created by PhpStorm.
 * User: zhangrenjie
 * Date: 2020/7/16
 * Time: 下午4:11
 */

//责任链模式解决BBS论坛违规问题

$reason = [
    '1' => '帖子里辱骂',
    '2' => '帖子里涉黄',
    '3' => '帖子里反共言论',
];

//----定义角色指责----

//版主
class Borad
{
    protected $power = 1;
    protected $leader = 'admin';

    public function process(int $level)
    {
        if ($level <= $this->power) {
            echo '删除帖子' . PHP_EOL;
        } else {
            $leaderObjName = ucfirst($this->leader);
            (new $leaderObjName)->process($level);
        }
    }
}

//版主
class Admin
{
    protected $power = 2;
    protected $leader = 'police';

    public function process(int $level)
    {
        if ($level <= $this->power) {
            echo '禁用账号' . PHP_EOL;
        } else {
            $leaderObjName = ucfirst($this->leader);
            (new $leaderObjName)->process($level);
        }
    }
}

//警察
class Police
{
    protected $power = 100;
    protected $leader = null;

    public function process(int $level)
    {
        echo "抓人坐牢" . PHP_EOL;

//        if ($level <= $this->power) {
//            echo '禁用账号' . PHP_EOL;
//        } else {
//            $leaderObjName = ucfirst($this->leader);
//            (new $leaderObjName)->process($level);
//        }
    }
}

$level = rand(1, 3);
echo "违规原因:" . $reason[$level] . PHP_EOL;
echo "处理方式:" . PHP_EOL;

//交给权利最低的人，没有权限处理则交给上级处理
(new Borad())->process($level);
