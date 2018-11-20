<?php
/**
 * Created by PhpStorm.
 * User: THINK
 * Date: 2017/11/17
 * Time: 16:25
 */

namespace shipping;


use contract\I_Shipping;

class ShopSelf implements I_Shipping
{
    public function title()
    {
        return '商城自营';
    }

    public function intro()
    {
        return '商城自己的配送团队';
    }

    public function price()
    {
        return 0.01;
    }

}