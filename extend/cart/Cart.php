<?php
/**
 * Created by PhpStorm.
 * User: THINK
 * Date: 2017/11/14
 * Time: 11:02
 */

namespace cart;

use think\Config;
use think\Cookie;
use think\Db;
use think\Session;

class Cart
{
    private static $instance;




    // 购物车中商品
    private $product_list = [];

    /**
     * @param $product_id
     * @param int $buy_quantity
     * 添加购物车
     */
    public function add($product_id=null, $buy_quantity=1)
    {
        # 完整性判断

        if (isset($this->product_list[$product_id])) {
            // 已经存在
            // 累加购买数量即可
            ++ $this->product_list[$product_id];
        } else {
            $this->product_list[$product_id] = $buy_quantity;
        }

        return $this;
    }

    /**
     * @param $product_id删除某个产品
     */
    public function remove($product_id)
    {
        unset($this->product_list[$product_id]);
        return $this;
    }

    /**
     * 清空购物车
     */
    public function clear()
    {
        $this->product_list = [];

        return $this;
    }

    /**
     * 更新购买数量
     */
    public function update($product_id, $buy_quantity=1)
    {
        if (isset($this->product_list[$product_id])) {
            $this->product_list[$product_id] = $buy_quantity;
        }
        return $this;
    }

    /**
     * 获取购物车中全部商品
     */
    public function export($filter=[])
    {
        if (empty($filter)) {
            return $this->product_list;
        } else {
            $rows = [];
            foreach($filter as $product_id) {
                $rows[$product_id] = $this->product_list[$product_id];
            }
            return $rows;
        }
    }


    /**
     * 获取购物车商品信息，同时包含商品详细信息
     */
    public function exportInfo($filter=[])
    {
        # 获取 id和购买数量
        $product_list = $this->export($filter);

        # 完善信息
//        $rows = Db::name('product')
//            ->where('id', 'in', array_keys($product_list))
//            ->select()
//            ;
        # 向数据层，获取数据，http协议
        $resp = httpRequest([
            'type' => 'get',
            'url' => 'http://shop10.cn/products.html',
            'data' => [
                'type' => 'id',
                'id' => array_keys($product_list),
            ],
            // get http://shop.kang.com/products.html?type=id&id[0]=12&id[1]=13
            'dataType' => 'json',// 'assoc'
        ]);//$.ajax

        # 整合结果
        # 将购买数量，加入到产品信息
        $totalQuantity = $totalPrice = 0;
        foreach($resp['data'] as $key=>$product) {
            $resp['data'][$key]['buy_quantity'] = $product_list[$product['id']];
            $resp['data'][$key]['total_price'] = $product['price'] * $resp['data'][$key]['buy_quantity'];

            // 总数量
            $totalQuantity += $resp['data'][$key]['buy_quantity'];
            // 总金额
            $totalPrice += $resp['data'][$key]['total_price'];
        }

        return [
            'data' => $resp['data'],
            'total_quantity'=>$totalQuantity,
            'total_price' => $totalPrice
            ];
    }

    /**
     * 同步购物车
     */
    public function sync()
    {
        # 从cookie中读取
        $data = Cookie::get('cart_product');
        # 合并到$this->product_list
        if ($data) {
            foreach(unserialize($data) as $product_id => $buy_quantity) {
                if (! isset($this->product_list[$product_id])) {
                    $this->product_list[$product_id] = $buy_quantity;
                }
            }
        }

        return $this;

    }


    /**
     * 持久存储
     */
    public function save()
    {
        # 序列化购物车中产品信息
        $data = serialize($this->product_list);

        if(Session::has('member')) {
            # 登录
            $row = [
                'member_id' => Session::get('member.id'),
                'content' => $data,
            ];
            // 由api完成会员购物车表更新
            httpRequest([
                'type' => 'post',
                'url' => Config::get('api_url_base') . 'member-cart-update.html',
                'data' => $row,
                'dataType' => 'json'
            ]);
        } else {
            # 未登录
            Cookie::set('cart_product', $data, [
                'expire' => 30*24*3600,
            ]);
        }

        return $this;
    }

    /**
     * 获取购物车数据
     */
    public function fetch()
    {
        if(Session::has('member')) {
            # 登录
            $resp = httpRequest([
                'type'=>'get',
                'url' => Config::get('api_url_base') . 'member-cart-info.html',
                'data' => [
                    'member_id' => Session::get('member.id'),
                ],
                'dataType' => 'json',
            ]);
            $data = $resp ? $resp['content'] : '';
        } else {
            # 未登录
            $data = Cookie::get('cart_product');
        }

        # 反序列化
        if ($data) {
           $this->product_list = unserialize($data);
        }

        return $this;
    }

    public static function instance()
    {
        if (! self::$instance instanceof self) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    private function __construct()
    {
        $this->fetch();
    }
    private function __clone()
    {
        // TODO: Implement __clone() method.
    }

    public function __destruct()
    {
        // TODO: Implement __destruct() method.
        $this->save();
    }

}