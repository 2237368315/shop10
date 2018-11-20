<?php
/**
 * Created by PhpStorm.
 * User: THINK
 * Date: 2017/11/17
 * Time: 16:16
 */

namespace shipping;


use contract\I_Shipping;

class ShunFeng implements I_Shipping
{

    public function title()
    {
        return '顺风快递';
    }

    public function intro()
    {
        return '顺风';
    }

    /**
     * 计算价格
     */
    public function price()
    {
        return 0.02;
        return mt_rand(10, 30);
        $weight = mt_rand(1, 10);
        $time = rawurlencode(date('Y-m-d') . 'T17:30:00+08:00');//2017-11-17T17:30:00+08:00
        $result = httpRequest([
            'type' => 'get',
            'url' => "http://www.sf-express.com/sf-service-owf-web/service/rate?origin=A110114000&dest=A310101000&parentOrigin=A110114000&parentDest=A310101000&weight=$weight&time=$time&volume=0&queryType=2&lang=sc&region=cn&translate=",
            'data' => [],
            'dataType' => 'json',
        ]);
//        "http://www.sf-express.com/sf-service-owf-web/service/rate?origin=A110114000&dest=A310101000&parentOrigin=A110114000&parentDest=A310101000&weight=2&time=2017-11-17T17%3A30%3A00%2B08%3A00&volume=0&queryType=2&lang=sc&region=cn&translate="
        // 标快的价格
        return $result[0]['freight'];
    }
}