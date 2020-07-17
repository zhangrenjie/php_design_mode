<?php

namespace celvmoshi;

/**用户策略接口
 * Interface UserStategy
 * @package celvmoshi
 */
interface UserStrategy
{
    //显示广告
    public function showAd();

    //显示分类
    public function showCategory();

}
