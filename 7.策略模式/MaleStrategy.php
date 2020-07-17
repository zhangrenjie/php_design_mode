<?php
namespace celvmoshi;

/**男性用户策略
 * Class MaleStrayegy
 * @package celvmoshi
 */

class MaleStrategy implements UserStrategy
{
    //显示广告
    public function showAd()
    {
        echo "新款宝马X6\r\n";
    }

    //显示分类
    public function showCategory()
    {
        echo "小汽车\r\n";
    }
}