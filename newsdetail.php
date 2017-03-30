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
if($mid == '') {
    exit('No article');
}
//新闻信息
$newinfo = getNewsDetail($mid);
//点击率最高的文章
$bestonclick = onclickBest($newinfo['classid']);
//频道最新的文章
$newslist    = getNewslist($newinfo['classid']);
//相关阅读
$relevant = getRelevant($newinfo['classid']);

//热门跟帖
$hotpl = hotpl($mid);

//客户端ip
$sayip=egetip();
$address = GetIpLookup($sayip);
//判断是否存在cookie
if(!isset($_COOKIE['uname'])) {
    $uname = getUsername($address);
    setcookie('uname', $uname, time()+86400);
}

//获取点赞情况
$dian = getDianzan($sayip, $mid);

//mp3
$content = strip_tags($newinfo['newstext']);
$s=str_replace('&ldquo;', '', $content);
//$mp3 = getMp3($content, $sayip);
//file_put_contents('1.mp3', $mp3, FILE_APPEND);
// echo '<pre>';
// print_r($s);exit;

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
    <link rel="stylesheet" href="css/reveal.css">
    <script type="text/javascript" src="/phone/js/myfunction.js"></script>
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
    <script>
        function CheckPl(obj)
  {
    if(obj.saytext.value=="")
    {
        alert("错误，评论不能为空");
        obj.saytext.focus();
        return false;
    }
    return true;
  }
  function CheckPlj(obj)
  {
    if(obj.mydon.value=="")
    {
        alert("错误，评论不能为空");
        obj.mydon.focus();
        return false;
    }
    return true;
  }
    </script>
    <style>
    h1 { font-size:32px; font-weight: bold; }
    h2 { color: #1e3a9e; font-size: 25px; font-weight: bold;  }
    .you { color: #1f3a87; font-size: 14px; }
    .text { font-size: 14px; padding-left: 5px; padding-right: 5px; line-height: 20px}
    .re a { color: #1f3a87; }
    .name { color: #1f3a87; }
    .name a { color: #1f3a87; text-decoration: underline;}
    .retext { background-color: #f3f3f3; width: 100%; float: left; padding-top: 22px; padding-bottom: 22px; border-top: 1px solid #ccc; }
    .retext textarea { width: 300px; height: 130px; float: left; margin-left: 60px; border-top-style: inset; border-top-width: 2px; border-left-style: inset; border-left-width: 2px; }
    .hrLine{BORDER-BOTTOM: #807d76 1px dotted;}

    .ecomment {margin:0;padding:0;}
    .ecomment {margin-bottom:12px;overflow-x:hidden;overflow-y:hidden;padding-bottom:3px;padding-left:3px;padding-right:3px;padding-top:3px;background:#FFFFEE;padding:3px;border:solid 1px #999;}
    .ecommentauthor {float:left; color:#F96; font-weight:bold;}
    .ecommenttext {clear:left;margin:0;padding:0;}
    </style>
<script src="/e/data/js/ajax.js"></script>
</head>
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
        <a href="javascipt:;" onclick="thumbsup()">
            <div class="<?=($dian)?'content-ac11':'content-ac1'?>"><?=$newinfo['diggtop']?></div>
            <input type="hidden" value="<?=$mid?>" id="articleid">
        </a>
        <div class="bdsharebuttonbox shareWrap">
        <a href="#" data-cmd="weixin">
            <div class="content-ac2">朋友圈</div>
        </a>
        <a href="#" target="_blank" data-cmd="tsina">
            <div class="content-ac3">微博</div>
        </a>
        </div>
    </div>
</div>
<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"2","bdSize":"32"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>

<div class="posts-list">
    <ul class="detail-list">
        <li>
            <div class="clearfix">
                <div class="pull-left title-tli1">热门跟帖</div>
                <div class="pull-right title-con1"><a href="#" data-reveal-id="myModal" data-animation="fade">发帖<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a></div>
            </div>
        </li>
        <?php  
        if($hotpl['info']) {
            foreach($hotpl['info'] as $hotval) {
                $hot++;
        ?>
        <li>
            <div class="clearfix">
                <div class="pull-left">
                    <div class="li-title"><a href=""><?=($hotval['username'])?$hotval['username']:'匿名用户'?></a></div>
                    <div class="li-content"><?=$hotval['saytext']?></div>
                </div>
                <div class="pull-right li-rt"><a href="javascript:;" aid="<?=$hotval['plid']?>" onclick="dingtop(this)"><?=$hotval['zcnum']?> 顶</a></div>
            </div>
        </li>
        <?php if($hot==3)break; }} ?>
    </ul>
    <div class="bottom-con">
        <div class="con-bt"><?=($hotpl['num'])?$hotpl['num']:0?>人跟帖，<?=($hotpl['tonum'])?$hotpl['tonum']:0?>人参与</div>
        <div class="show-col show-icai show-detail">
            <a href="newsdetail.php?mid=<?=$bestonclick['id']?>">
                <img style="width:608px;height:210px;" src="<?=($bestonclick['titlepic'])?$bestonclick['titlepic']:'images/15.jpg'?>">
            </a>
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
                <div class="col-xs-4 col-xs-4-f"><a href="newsdetail.php?mid=<?=$newslist[3]['id']?>"><img style="width:197px;height:123px;" src="<?=($newslist[3]['titlepic'])?$newslist[3]['titlepic']:'images/bao1.jpg'?>"></a></div>
                <div class="col-xs-4 col-xs-4-m"><a href="newsdetail.php?mid=<?=$newslist[4]['id']?>"><img style="width:197px;height:123px;" src="<?=($newslist[4]['titlepic'])?$newslist[4]['titlepic']:'images/bao2.jpg'?>"></a></div>
                <div class="col-xs-4 col-xs-4-l"><a href="newsdetail.php?mid=<?=$newslist[5]['id']?>"><img style="width:197px;height:123px;" src="<?=($newslist[5]['titlepic'])?$newslist[5]['titlepic']:'images/bao3.jpg'?>"></a></div>
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
                <div class="pull-left news-img"><img style="width:140px;height:110px;" src="<?=($newslist[6]['titlepic'])?$newslist[6]['titlepic']:'images/01.jpg'?>"></div>
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
        <form action="myfunction.php?act=say" method="post" name="gooddon" id="gooddon" onsubmit="return CheckPlj(document.gooddon)">
        <div class="pull-left">
            <input type="text" name="mydon" class="form-control text-idea" placeholder="说说你的看法...">
        </div>
        <div class="pull-right">
            <input name="yid" type="hidden" id="yid" value="<?=$mid?>" />
            <input name="classids" type="hidden" id="classids" value="<?=$newinfo['classid']?>" />
            <input style="margin-left:0.45rem" type="submit" name="addpl" value="提交">
        </form>
            <a href="javascript:;" onclick="thumbsup()"><img src="images/logo06.jpg" alt=""></a>
            <a href=""><img src="images/logo07.jpg" alt=""></a>
        </div>
    </div>
</div>

<div id="myModal" class="reveal-modal">

<table width="50%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">

  <form action="myfunction.php?act=say" method="post" name="saypl" id="saypl" onsubmit="return CheckPl(document.saypl)">
  <tr> 
    <td bgcolor="#f8fcff"> <table width="100%" border="0" cellspacing="1" cellpadding="3" class="retext">
        <tr> 
          <td width="78%"><div align="center"> 
              <textarea name="saytext" cols="58" rows="6" id="saytext"></textarea>
            </div></td>
          <td width="22%" rowspan="2"> <div align="center">
              <input name="imageField" type="submit" id="imageField" value=" 提 交 " />
          </td>
        </tr>
        <tr> 
          <td><div align="center"> 
              <script src="/d/js/js/plface.js"></script>
            </div></td>
        </tr>
      </table> </td>
  </tr>
  <a class="close-reveal-modal">&#215;</a>
  <input name="mid" type="hidden" id="mid" value="<?=$mid?>" />
  <input name="classid" type="hidden" id="classid" value="<?=$newinfo['classid']?>" />
  </form>
</table>

</div>

<script src="http://www.jq22.com/jquery/jquery-1.6.2.js"></script>
<script type="text/javascript" src="./js/jquery.reveal.js"></script>
<script src="http://www.jq22.com/js/jq.js"></script>

<!--保险-->
<?php include 'foot.php'; ?>>