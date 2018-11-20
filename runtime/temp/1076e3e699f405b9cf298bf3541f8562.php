<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:60:"D:\WWW\shop10\public/../application/back\view\brand\set.html";i:1541647758;s:64:"D:\WWW\shop10\public/../application/back\view\common\layout.html";i:1511170805;s:64:"D:\WWW\shop10\public/../application/back\view\common\header.html";i:1511170604;s:61:"D:\WWW\shop10\public/../application/back\view\common\nav.html";i:1511170654;s:64:"D:\WWW\shop10\public/../application/back\view\common\footer.html";i:1511170470;}*/ ?>
<!DOCTYPE html>
<html dir="ltr" lang="zh-CN">
<head>
    <meta charset="UTF-8" />
    <title>品牌<?php if($id): ?>编辑<?php else: ?>创建<?php endif; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <link href="__STATIC__/bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
    <link href="__STATIC__/font-awesome/css/font-awesome.min.css" type="text/css" rel="stylesheet" />
    <link href="__STATIC__/back/css/stylesheet.css" type="text/css" rel="stylesheet" media="screen" />
    


    <script type="text/javascript" src="__STATIC__/jquery/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="__STATIC__/bootstrap/js/bootstrap.min.js"></script>
</head>

<body>
    <div id="container">
        <header id="header" class="navbar navbar-static-top">
    <div class="navbar-header">
        <a type="button" id="button-menu" class="pull-left"> <i class="fa fa-indent fa-lg"></i>
        </a>
        <a href="" class="navbar-brand">
            <img src="__STATIC__/back/image/logo.png" alt="" title="" />
        </a>
    </div>
    <ul class="nav pull-right">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown">
                <span class="label label-danger pull-left">0</span> <i class="fa fa-bell fa-lg"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-right alerts-dropdown">
                <li class="dropdown-header">订单管理</li>
                <li>
                    <a href="" style="display: block; overflow: auto;">
                        <span class="label label-warning pull-right">0</span>
                        处理中订单
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="label label-success pull-right">0</span>
                        已完成订单
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="label label-danger pull-right">0</span>
                        退货
                    </a>
                </li>
                <li class="divider"></li>
                <li class="dropdown-header">客户列表</li>
                <li>
                    <a href="">
                        <span class="label label-success pull-right">0</span>
                        在线客户
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="label label-danger pull-right">0</span>
                        待审批
                    </a>
                </li>
                <li class="divider"></li>
                <li class="dropdown-header">商品</li>
                <li>
                    <a href="">
                        <span class="label label-danger pull-right">0</span>
                        缺货
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="label label-danger pull-right">0</span>
                        评论
                    </a>
                </li>
                <li class="divider"></li>
                <li class="dropdown-header">加盟</li>
                <li>
                    <a href="">
                        <span class="label label-danger pull-right">0</span>
                        待审批
                    </a>
                </li>
            </ul>
        </li>
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-life-ring fa-lg"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-right">
                <li class="dropdown-header">
                    网店名称
                    <i class="fa fa-shopping-cart"></i>
                </li>
                <li>
                    <a href="" target="_blank">BuyPlus(败家Shopping)</a>
                </li>
                <li class="divider"></li>
                <li class="dropdown-header">
                    帮助
                    <i class="fa fa-life-ring"></i>
                </li>
                <li>
                    <a href="" target="_blank">技术支持</a>
                </li>
                <li>
                    <a href="" target="_blank">支持文档</a>
                </li>
                <li>
                    <a href="" target="_blank">应用商店</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="<?php echo url('admin/logout'); ?>">
                <span class="hidden-xs hidden-sm hidden-md">注销</span>
                <i class="fa fa-sign-out fa-lg"></i>
            </a>
        </li>
    </ul>
</header>

        <nav id="column-left">
    <div id="profile">
        <div>
            <!-- <i class="fa fa-opencart"></i>
          -->
            <img src="__STATIC__/back/image/avatar.png" style="max-width:42px; max-height: 42px;" ></div>
        <div>
            <h4><?php echo \think\Session::get('admin.username'); ?></h4>
            <small>Administrator</small>
        </div>
    </div>
    <ul id="menu">
        <li id="dashboard">
            <a href="">
                <i class="fa fa-dashboard fa-fw"></i>
                <span>管理首页</span>
            </a>
        </li>
        <li id="catalog">
            <a class="parent">
                <i class="fa fa-tags fa-fw"></i>
                <span>商品目录</span>
            </a>
            <ul>
                <li>
                    <a onclick="<?php if(!checkPriv('back/category/index')): ?>alert('无权操作');return false;<?php endif; ?>" href="<?php echo url('back/category/index'); ?>">商品分类</a>
                </li>
                <li>
                    <a href="">商品管理</a>
                </li>
                <li class="hidden">
                    <a href="">分期付款</a>
                </li>
                <li>
                    <a href="">筛选过滤</a>
                </li>
                <li>
                    <a class="parent">商品属性</a>
                    <ul>
                        <li>
                            <a href="">商品属性</a>
                        </li>
                        <li>
                            <a href="">属性组</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="">商品选项</a>
                </li>
                <li>
                    <a onclick="<?php if(!checkPriv('back/brand/index')): ?>alert('无权操作');return false;<?php endif; ?>" href="<?php echo url('back/brand/index'); ?>">品牌管理</a>
                </li>
                <li>
                    <a href="">下载设置</a>
                </li>
                <li>
                    <a href="">商品评论</a>
                </li>
                <li>
                    <a href="">信息管理</a>
                </li>
            </ul>
        </li>
        <li id="extension">
            <a class="parent">
                <i class="fa fa-puzzle-piece fa-fw"></i>
                <span>扩展功能</span>
            </a>
            <ul>
                <li>
                    <a href="">扩展安装</a>
                </li>
                <li>
                    <a href="">扩展配置</a>
                </li>
                <li>
                    <a href="">流量分析</a>
                </li>
                <li>
                    <a href="">验证码</a>
                </li>
                <li>
                    <a href="">插件扩展</a>
                </li>
                <li>
                    <a href="">反欺诈</a>
                </li>
                <li>
                    <a href="">模块配置</a>
                </li>
                <li>
                    <a href="">支付管理</a>
                </li>
                <li>
                    <a href="">配送管理</a>
                </li>
                <li>
                    <a href="">订单配置</a>
                </li>
            </ul>
        </li>
        <li id="design">
            <a class="parent">
                <i class="fa fa-television fa-fw"></i>
                <span>页面生成</span>
            </a>
            <ul>
                <li>
                    <a href="<?php echo url('back/page/index'); ?>">首页</a>
                </li>
                <li>
                    <a href="">横幅</a>
                </li>
            </ul>
        </li>
        <li id="sale">
            <a class="parent">
                <i class="fa fa-shopping-cart fa-fw"></i>
                <span>营销推广</span>
            </a>
            <ul>
                <li>
                    <a href="">订单管理</a>
                </li>
                <li class="hidden">
                    <a href="">分期付款订单</a>
                </li>
                <li>
                    <a href="">商品退换</a>
                </li>
                <li>
                    <a class="parent">礼品券</a>
                    <ul>
                        <li>
                            <a href="">礼品券</a>
                        </li>
                        <li>
                            <a href="">礼品券主题</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="parent hidden">PayPal</a>
                    <ul>
                        <li>
                            <a href="">搜寻交易记录</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
        <li id="customer">
            <a class="parent">
                <i class="fa fa-user fa-fw"></i>
                <span>客户列表</span>
            </a>
            <ul>
                <li>
                    <a href="">客户列表</a>
                </li>
                <li>
                    <a href="">客户群组</a>
                </li>
                <li>
                    <a href="">自定义区</a>
                </li>
            </ul>
        </li>
        <li>
            <a class="parent">
                <i class="fa fa-share-alt fa-fw"></i>
                <span>市场营销</span>
            </a>
            <ul>
                <li>
                    <a href="">市场营销</a>
                </li>
                <li>
                    <a href="">加盟会员</a>
                </li>
                <li>
                    <a href="">优惠券设置</a>
                </li>
                <li>
                    <a href="">Mail</a>
                </li>
            </ul>
        </li>
        <li id="system">
            <a class="parent">
                <i class="fa fa-cog fa-fw"></i>
                <span>系统设置</span>
            </a>
            <ul>
                <li>
                    <a href="">网店设置</a>
                </li>
                <li>
                    <a class="parent">用户管理</a>
                    <ul>
                        <li>
                            <a href="">用户管理</a>
                        </li>
                        <li>
                            <a href="">用户群组</a>
                        </li>
                        <li>
                            <a href="">API</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="parent">参数设置</a>
                    <ul>
                        <li>
                            <a href="">店铺地址</a>
                        </li>
                        <li>
                            <a href="">语言设置</a>
                        </li>
                        <li>
                            <a href="">货币设置</a>
                        </li>
                        <li>
                            <a href="">库存状态</a>
                        </li>
                        <li>
                            <a href="">订单状态</a>
                        </li>
                        <li>
                            <a class="parent">商品退换</a>
                            <ul>
                                <li>
                                    <a href="">退换状态</a>
                                </li>
                                <li>
                                    <a href="">退换管理</a>
                                </li>
                                <li>
                                    <a href="">退换原因</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="">省/直辖市设置</a>
                        </li>
                        <li>
                            <a href="">城市设置</a>
                        </li>
                        <li>
                            <a href="">区县</a>
                        </li>
                        <li>
                            <a href="">区域群组</a>
                        </li>
                        <li>
                            <a class="parent">商品税种</a>
                            <ul>
                                <li>
                                    <a href="">税率类别</a>
                                </li>
                                <li>
                                    <a href="">商品税率</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="">尺寸单位</a>
                        </li>
                        <li>
                            <a href="">重量单位</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="parent">相关工具</a>
                    <ul>
                        <li>
                            <a href="">上传文件</a>
                        </li>
                        <li>
                            <a href="">备份/恢复</a>
                        </li>
                        <li>
                            <a href="">错误日志</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
        <li id="reports">
            <a class="parent">
                <i class="fa fa-bar-chart-o fa-fw"></i>
                <span>统计报表</span>
            </a>
            <ul>
                <li>
                    <a class="parent">营销推广</a>
                    <ul>
                        <li>
                            <a href="">商品销售统计</a>
                        </li>
                        <li>
                            <a href="">商品销售税费统计</a>
                        </li>
                        <li>
                            <a href="">运费统计</a>
                        </li>
                        <li>
                            <a href="">退换商品统计</a>
                        </li>
                        <li>
                            <a href="">折扣商品统计</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="parent">商品管理</a>
                    <ul>
                        <li>
                            <a href="">商品浏览统计</a>
                        </li>
                        <li>
                            <a href="">商品购买统计</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="parent">客户列表</a>
                    <ul>
                        <li>
                            <a href="">在线客户统计</a>
                        </li>
                        <li>
                            <a href="">客户活动统计</a>
                        </li>
                        <li>
                            <a href="">客户订单统计</a>
                        </li>
                        <li>
                            <a href="">奖励积分统计</a>
                        </li>
                        <li>
                            <a href="">客户余额统计</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="parent">市场营销</a>
                    <ul>
                        <li>
                            <a href="">市场营销</a>
                        </li>
                        <li>
                            <a href="">加盟会员</a>
                        </li>
                        <li>
                            <a href="">加盟会员活动统计</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
    </ul>
    <div id="stats">
        <ul>
            <li>
                <div>
                    订单已经完成
                    <span class="pull-right">0%</span>
                </div>
                <div class="progress">
                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                        <span class="sr-only">0%</span>
                    </div>
                </div>
            </li>
            <li>
                <div>
                    订单待处理
                    <span class="pull-right">0%</span>
                </div>
                <div class="progress">
                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                        <span class="sr-only">0%</span>
                    </div>
                </div>
            </li>
            <li>
                <div>
                    其它状态
                    <span class="pull-right">0%</span>
                </div>
                <div class="progress">
                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                        <span class="sr-only">0%</span>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</nav>

        
<div id="content">

    <div class="page-header">
        <div class="container-fluid">
            <div class="pull-right">
                <button type="submit" form="form-create" data-toggle="tooltip" title="保存" class="btn btn-primary">
                    <i class="fa fa-save"></i>
                </button>
                <a href="<?php echo url('index'); ?>" data-toggle="tooltip" title="取消" class="btn btn-default">
                    <i class="fa fa-reply"></i>
                </a>
            </div>
            <h1>品牌<?php if($id): ?>编辑<?php else: ?>创建<?php endif; ?></h1>
            <ul class="breadcrumb">
                <li>
                    <a href="<?php echo url('site/index'); ?>">首页</a>
                </li>
                <li>
                    <a href="<?php echo url('index'); ?>">品牌</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-pencil"></i>
                    品牌<?php if($id): ?>编辑<?php else: ?>创建<?php endif; ?>
                </h3>
            </div>
            <div class="panel-body">
                <form action="<?php echo url('set', ['id'=>$id]); ?>" method="post" enctype="multipart/form-data" id="form-create" class="form-horizontal">
                    <?php echo token(); if($id): ?>
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <?php endif; ?>
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#tab-general" data-toggle="tab">基本信息</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab-general">

                            <div class="form-group required">
                                <label class="col-sm-2 control-label" for="input-title">品牌</label>
                                <div class="col-sm-10">
                                    <input type="text" name="title" value="<?php echo (isset($data['title']) && ($data['title'] !== '')?$data['title']:''); ?>" placeholder="品牌" id="input-title" class="form-control" />
                                    <?php if(isset($message['title'])): ?>
                                    <label for="input-title" class="text-danger"><?php echo $message['title']; ?></label>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="input-logo">Logo</label>
                                <?php if(isset($data['logo'])): ?>
                                <div class="col-sm-2">
                                    <img src="/upload/brand/<?php echo $data['logo']; ?>" alt="Logo" class="img-thumbnail" style="max-width: 60px"/>
                                    <label for="input-logo_delete">
                                        <input id="input-logo_delete" type="checkbox" name="logo_delete" value="1">
                                        删除
                                    </label>
                                </div>
                                <?php endif; ?>
                                <div class="col-sm-8">
                                    <input type="file" name="logo" id="input-logo"/>
                                    <?php if(isset($message['logo'])): ?>
                                    <label for="input-logo" class="text-danger"><?php echo $message['logo']; ?></label>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="input-site">官网</label>
                                <div class="col-sm-10">
                                    <input type="text" name="site" value="<?php echo (isset($data['site']) && ($data['site'] !== '')?$data['site']:''); ?>" placeholder="官网" id="input-site" class="form-control" />
                                    <?php if(isset($message['site'])): ?>
                                    <label for="input-site" class="text-danger"><?php echo $message['site']; ?></label>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="input-sort">排序</label>
                                <div class="col-sm-10">
                                    <input type="text" name="sort" value="<?php echo (isset($data['sort']) && ($data['sort'] !== '')?$data['sort']:'0'); ?>" placeholder="排序" id="input-sort" class="form-control" />
                                    <?php if(isset($message['sort'])): ?>
                                    <label for="input-sort" class="text-danger"><?php echo $message['sort']; ?></label>
                                    <?php endif; ?>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


        <footer id="footer">
    <a href="">BuyPlus(败家Shopping) HelloKang</a>
    <br>
    &copy; 2009-2016 All Rights Reserved.
    <br>Version 1.0</footer>
    </div>

    <script src="__STATIC__/back/js/common.js" type="text/javascript"></script>
    
<script src="__STATIC__/validate/jquery.validate.min.js"></script>
<script src="__STATIC__/validate/additional-methods.min.js"></script>
<script src="__STATIC__/validate/localization/messages_zh.min.js"></script>

<script>
    $(function() {
        $('#form-create').validate({
            rules: {
                title: {
                    required: true,
                    maxlength: 32,
                    remote: {
                        url: "<?php echo url('back/brand/titleUniqueCheck'); ?>",
                        data: {
                            id: <?php if($id): ?><?php echo $id; else: ?>null<?php endif; ?>
                        }
                    }
                },
                site: {
                    url: true
                },
                sort: {
                    digits: true
                }
            },
            messages: {
                title: {
                    required: '品牌不能为空',
                    maxlength: '品牌长度不能超过 32',
                    remote: '品牌已存在'
                },
                site: {
                    url: '官网不是有效的URL地址'
                },
                sort: {
                    digits: '排序必须是整数'
                }
            },
            errorClass: 'text-danger',
        });
    });
</script>

</body>
</html>