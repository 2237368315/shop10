<?php

namespace app\back\validate;

use think\Validate;

class BrandValidate extends Validate
{
    // 规则数组
    protected $rule = [
        '__token__' => 'require|token',
        'title' => 'require|max:32|unique:brand,title',
        'site' => 'url|max:255',
        'sort' => 'require|integer',
        'logo' => 'image',
    ];

    // 字段名称翻译
    protected $field = [
        'title' => '品牌',
        'site' => '官网',
        'sort' => '排序',
        'logo' => 'Logo',
    ];
}