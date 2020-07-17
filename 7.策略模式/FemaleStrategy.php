<?php
namespace celvmoshi;

/**女性用户策略
 * Class FemaleStrayegy
 * @package celvmoshi
 */
class FemaleStrategy implements UserStrategy
{
    public function showAd()
    {
        echo "2017 新潮女装\r\n";
    }

    public function showCategory()
    {
        echo "服装\r\n";
    }
}