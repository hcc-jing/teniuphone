<?php  
require("../e/class/connect.php");
require("../e/class/db_sql.php");
require("../e/class/q_functions.php");
$link=db_connect();
$empire=new mysqlquery();
define('Is_DB',true);
require("../shareinfo/phonefunction.php");

//接收提交的mid
$mid = isset($_GET['mid']) ? $_GET['mid'] : '';
//新闻信息
$newinfo = getNewsDetail($mid);
//点击率最高的文章
$bestonclick = onclickBest($newinfo['classid']);
//频道最新的文章
$newslist    = getNewslist($newinfo['classid']);
//相关阅读
$relevant = getRelevant($newinfo['classid']);
// echo '<pre>';
// print_r(mb_substr($newslist[3]['title'], 0, 24 ,'utf-8'));exit;

?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=$newinfo['title']?> - 特牛新闻详情</title>


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
<div class="lind-color"></div>
<div class="detail-list">
    <ul>
        <li>
            <div class="title-d1"><?=$newinfo['title']?></div>
            <div class="title-d2"><?=date("Y-m-d H:i:s",$newinfo['newstime'])?>　来源: <?=$newinfo['befrom']?></div>
        </li>
        <li>
            <div class="content-tt1">
			
			<p><img src="images/bofangqi.png"></p>
			<br>
			<?=stripslashes($newinfo['newstext'])?>
        </li>
    </ul>
</div>
<div class="more-btn">
    <div class="content-dtn text-center">
        <a href="">
            <div class="content-ac1"><?=$newinfo['diggtop']?></div>
        </a>
        <a href="#">
            <div class="content-ac2" data-cmd="weixin">朋友圈</div>
        </a>
        <a href="#" target="_blank">
            <div class="content-ac3" data-cmd="tsina">微博</div>
        </a>
    </div>
</div>

<div class="posts-list">
    <ul class="detail-list">
        <li>
            <div class="clearfix">
                <div class="pull-left title-tli1">热门跟帖</div>
                <div class="pull-right title-con1"><a href="">发帖<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a></div>
            </div>
        </li>
        <li>
            <div class="clearfix">
                <div class="pull-left">
                    <div class="li-title"><a href="">大战网易键盘侠【网易陕西...</a></div>
                    <div class="li-content">怎么这样对待老领导</div>
                </div>
                <div class="pull-right li-rt"><a href="">219 顶</a></div>
            </div>
        </li>
        <li>
            <div class="clearfix">
                <div class="pull-left">
                    <div class="li-title"><a href="">大战网易键盘侠【网易陕西...</a></div>
                    <div class="li-content">怎么这样对待老领导</div>
                </div>
                <div class="pull-right li-rt"><a href="">219 顶</a></div>
            </div>
        </li>
        <li>
            <div class="clearfix">
                <div class="pull-left">
                    <div class="li-title"><a href="">大战网易键盘侠【网易陕西...</a></div>
                    <div class="li-content">怎么这样对待老领导</div>
                </div>
                <div class="pull-right li-rt"><a href="">219 顶</a></div>
            </div>
        </li>
    </ul>
    <div class="bottom-con">
        <div class="con-bt">102人跟帖，652人参与</div>
        <div class="show-col show-icai show-detail">
            <img src="images/15.jpg" alt="">
            <div class="head-r">独家</div>
        </div>
        <div class="show-bo" style="font-size:0.2rem"><a href="newsdetail.php?mid=<?=$bestonclick['id']?>"><?=$bestonclick['title']?></a></div>
    </div>
</div>


 <!--相关专题-->
<div align="center" style="background-color:#FFFFFF; padding-bottom:10px;"><img src="images/niuzai.jpg"></div>

<!--热门新闻-->
<div class="news-list">
    <div class="clearfix">
        <div class="pull-left list-tt">热门新闻</div>
    </div>
    <div class="lind"><div class="lind-b"></div></div>
    <ul class="news-ul detail-ul">
    <?php  
    if($newslist) {
    	foreach($newslist as $list) {
    		$i++;
    ?>
        <li>
            <div class="clearfix">
                <div class="news-list-txt bao-list-text">
                    <div class="news-tt"><a href="newsdetail.php?mid=<?=$list['id']?>"><?=$list['title']?></a></div>
                    <div class="clearfix date bao-date">
                        <div class="pull-left date-number"><?=getRelease($list['newstime'])?></div>
                    </div>
                    <div class="news-icon"><?=$list['plnum']?></div>
                </div>
            </div>
        </li>
    <?php if($i==3) break; } } ?>
    </ul>
</div>
<ul class="news-ul detail-ul">
    <li>
        <div class="clearfix welfare-1">
            <div class="detail-cb"><a href="newsdetail.php?mid=<?=$newslist[3]['id']?>">
            <?=(strlen($newslist[3]['title'])>72) ? mb_substr($newslist[3]['title'], 0, 24 ,'utf-8') : $newslist[3]['title'];?>
            </a></div>
            <div class="show-col">
                <div class="col-xs-4 col-xs-4-f"><a href="newsdetail.php?mid=<?=$newslist[3]['id']?>"><img src="images/bao1.jpg" alt=""></a></div>
                <div class="col-xs-4 col-xs-4-m"><a href="newsdetail.php?mid=<?=$newslist[4]['id']?>"><img src="images/bao2.jpg" alt=""></a></div>
                <div class="col-xs-4 col-xs-4-l"><a href="newsdetail.php?mid=<?=$newslist[5]['id']?>"><img src="images/bao3.jpg" alt=""></a></div>
            </div>
            <div class="clearfix left-b1">
                <div class="pull-left house-gp"><?=getRelease($newslist[3]['newstime'])?></div>
                <div class="pull-right news-icon"><?=$newslist[3]['plnum']?></div>
            </div>
        </div>
    </li>
    <li>
        <a href="">
            <div class="clearfix">
                <div class="pull-left news-img"><img src="images/01.jpg"></div>
                <div class="news-list-txt">
                    <div class="news-tt"><a href="newsdetail.php?mid=<?=$newslist[6]['id']?>"><?=$newslist[6]['title']?></a></div>
                    <div class="clearfix date">
                        <div class="pull-left guoji"><?=getClassname($newslist[6]['classid'])?></div>
                        <div class="pull-left date-number"><?=getRelease($newslist[6]['newstime'])?></div>
                    </div>
                    <div class="news-icon"><?=$newslist[6]['plnum']?></div>
                </div>
            </div>
        </a>
    </li>
</ul>
<!--相关阅读-->
<div class="news-list">
    <div class="clearfix">
        <div class="pull-left list-tt">相关阅读</div>
    </div>
    <div class="lind"><div class="lind-b"></div></div>
    <ul class="news-ul detail-ul detail-last">
    <?php
    if($relevant) {
    	foreach($relevant as $rel) {
	?>
        <li>
                <div class="clearfix">
                    <div class="news-list-txt bao-list-text">
                        <div class="news-tt"><a href="newsdetail.php?mid=<?=$rel['id']?>"><?=$rel['title']?></a></div>
                        <div class="clearfix date bao-date">
                            <div class="pull-left date-number"><?=getRelease($rel['newstime'])?></div>
                        </div>
                        <div class="news-icon"><?=$rel['plnum']?></div>
                    </div>
                </div>            
        </li>
    <?php }} ?>
    </ul>
</div>

<!--底部部分-->
<div class="foot-b text-center">
    <div class="no-more">没有更多了</div>
    <div class="clearfix text-t">
        <div class="pull-left">
            <input type="text" class="form-control text-idea" placeholder="说说你的看法...">
        </div>
        <div class="pull-right">
            <input style="margin-left:0.45rem" type="button" name="addpl" value="提交">
            <a href=""><img src="images/logo06.jpg" alt=""></a>
            <a href=""><img src="images/logo07.jpg" alt=""></a>
        </div>
    </div>
</div>


<!--保险-->
<?php include 'foot.php'; ?>>