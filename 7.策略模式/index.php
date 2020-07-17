<?php
define('ROOT', __DIR__ . '/');

spl_autoload_register('autoload');
function autoload($className)
{
    $arr = explode('\\', $className);
    require_once ROOT . ucfirst($arr[1]) . '.php';
}

class Page
{
    protected $strategy;//显示策略

    public function index()
    {
        echo "显示广告：";
        $this->strategy->showAd();

        echo "<hr>";

        echo "显示分类：";
        $this->strategy->showCategory();


    }

    //设置显示策略(约定接口类型)
    public function setStrategy(celvmoshi\UserStrategy $strategy)//(约定接口类型)
    {
        $this->strategy = $strategy;
    }
}

$page = new Page();
if (isset($_GET['female'])) {
    $userStrategy = new celvmoshi\FemaleStrategy();
} else if (isset($_GET['male'])) {
    $userStrategy = new celvmoshi\MaleStrategy();
} else {
    return;
}

$page->setStrategy($userStrategy);
$page->index();