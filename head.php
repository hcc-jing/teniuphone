<?php  
require("../e/class/connect.php");
require("../e/class/db_sql.php");
require("../e/class/q_functions.php");
$link=db_connect();
$empire=new mysqlquery();
define('Is_DB',true);
require("../shareinfo/phonefunction.php");
?>
<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=$titlename?></title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
	<script type="text/javascript">
    
    //html root的字体计算应该放在最前面，这样计算就不会有误差了/
    //2016.3.23 wjq update 之所以要加个判断返回一个20.5，是因为当用户在谷歌等浏览器直接输入手机端网站网址时，如果用户设置模块自定义样式的高度比较小，由于这时候的clientWidth为1920px，及返回的_htmlFontSize为40，这时候就会使模块太小，展示不完全，因此先取一个较为准确的值去展示。Mobi.resetHtmlFontSize()顺便也加了
    var _htmlFontSize = (function(){
        var clientWidth = document.documentElement ? document.documentElement.clientWidth : document.body.clientWidth;
        if(clientWidth > 640) clientWidth = 640;
        document.documentElement.style.fontSize = clientWidth * 1/6.4+"px";
        return clientWidth * 1/6.4;
    })();
    
    </script>
	<body>
    <div class="img-top"><img src="images/top.jpg"></div>
    <div class="logo"><img src="images/logo.jpg"></div>
    <div>
    <div class="find_nav" id="nav-top">
        <div class="find_nav_left">
            <div class="find_nav_list">
                <ul class="nav-ul">
                    <li class="back-no <?=($cur=='index')?'find_nav_cur':'';?>"><a href="/">首页</a></li>
                    <li class="back-no <?=($cur=='finance')?'find_nav_cur':'';?>"><a href="finance.php">财经</a></li>
                    <li class="back-no <?=($cur=='stock')?'find_nav_cur':'';?>"><a href="stock.php">股票</a></li>
                    <li class="back-no <?=($cur=='funds')?'find_nav_cur':'';?>"><a href="fund.php">基金</a></li>
                    <li class="back-no <?=($cur=='p2p')?'find_nav_cur':'';?>"><a href="p2p.php">网贷</a></li>
                    <li class="back-no <?=($cur=='forex')?'find_nav_cur':'';?>"><a href="forex.php">外汇</a></li>
                    <li class="back-no <?=($cur=='bank')?'find_nav_cur':'';?>"><a href="bank.php">银行</a></li>
                    <li class="back-no <?=($cur=='gold')?'find_nav_cur':'';?>"><a href="gold.php">黄金</a></li>
                    <li class="back-no <?=($cur=='insu')?'find_nav_cur':'';?>"><a href="insurance.php">保险</a></li>
                    <li class="back-no <?=($cur=='mark')?'find_nav_cur':'';?>"><a href="mark.php">行情</a></li>
                    <li class="back-no <?=($cur=='lun')?'find_nav_cur':'';?>"><a href="javascript:;">论坛</a></li>
                </ul>
            </div>
        </div>
        <a class="search_logo" role="button"></a>
        <div class="left-nav"></div>
    </div>
    <!--导航下拉菜单-->
    <ul class="nav-down">
        <li><a href="/">首页</a></li>
        <li><a href="finance.php">财经</a></li>
        <li><a href="stock.php">股票</a></li>
        <li><a href="fund.php">基金</a></li>
        <li><a href="p2p.php">网贷</a></li>
        <li><a href="forex.php">外汇</a></li>
        <li><a href="bank.php">银行</a></li>
        <li><a href="gold.php">黄金</a></li>
        <li><a href="insurance.php">保险</a></li>
        <li><a href="mark.php">行情</a></li>
        <li><a href="javascript:;">论坛</a></li>
    </ul>