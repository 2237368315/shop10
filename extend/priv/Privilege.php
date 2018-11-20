<?php
/**
 * Created by PhpStorm.
 * User: THINK
 * Date: 2017/11/8
 * Time: 14:38
 */

namespace priv;


use think\Db;
use think\Session;

class Privilege
{
    /**
     * 获取管理员权限
     * @param null $admin_id
     */
    public static function getAdminAction($admin_id=null)
    {
        # 确定管理员id
        if (is_null($admin_id)) {
            $admin_id = Session::get('admin.id');
        }

        if (! $admin_id) {
            return false;
        }

        # 获取对应的action的规则列表
        $rule_list = Db::name('role_admin')->alias('rad')
            ->join('__ROLE_ACTION__ rac', 'rad.role_id=rac.role_id', 'LEFT')
            ->join('__ACTION__ a', 'a.id=rac.action_id', 'LEFT')
            ->where('rad.admin_id', $admin_id)
            ->distinct(true)
            ->column('a.rule')
            ;
        return $rule_list;
    }

//    checkPriv('back/brand/set', 3);
//    checkPriv(['back/brand/set', 'brand-create'], 3);
//    checkPriv(['back/brand/set', 'brand-create'], 3, 'or');
    /**
     * 校验管理员是否具有权限
     * @param $rules
     * @param null $admin_id
     * @param string $logic
     * @return mixed bool，true，具有权限，false，没有权限
     */
    public static function checkPriv($rules, $admin_id=null, $logic='and')
    {
        # 判断是否为超级管理员
        if (is_null($admin_id)) {
            $admin_id = Session::get('admin.id');
        }
        $count = Db::name('role_admin')->alias('ra')
            ->join('__ROLE__ r', 'ra.role_id=r.id')
            ->where([
                'ra.admin_id' => $admin_id,
                'r.is_super' => '1'
            ])
            ->count()
        ;
        if ($count > 0) {
            return true;
        }


        # 获取管理员对应的权限列表
        $action_list = self::getAdminAction($admin_id);

        if(empty($action_list)) {
            return false;
        }

        # 校验是否具有权限
        ## 统一格式为数组
        if (!is_array($rules) ) {
            $rules = [$rules];
        }

        ## 依次校验规则
        // 逻辑结果的默认值
        $result_and = true;
        $result_or = false;
        foreach($rules as $rule) {
            $result = in_array($rule, $action_list);
            // 将当前的结果，合并到整体结果上
            $result_and = $result_and && $result;
            $result_or = $result_or || $result;
        }
        $return = 'result_' . $logic;
        return $$return;
    }
}