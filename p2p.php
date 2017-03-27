<?php  
$cur = 'p2p';
$titlename = '网贷板块';
include 'head.php';
//一级推荐
$isgood = getGood(8, 'isgood');

$nowtime = microtime(true);
$info = file_get_contents("https://gupiao.baidu.com/api/rails/stockbasicbatch?from=pc&os_ver=1&cuid=xxx&vv=100&format=json&stock_code=us!DJI%2Cus.DJI%2Cus%40CCO%2ChkHSI%2Cus.IXIC%2Csz399001%2Csh000001&timestamp=".$nowtime."");
$indexes = json_decode($info,true);
$indes = $indexes['data'];

$index = array_reverse($indes);

//市场
$neican  = returnClassinfo(53, 9);
//政策
$ticai   = returnClassinfo(54, 9);
//公司
$zhuli   = returnClassinfo(55, 9);
//攻略
$mingjia = returnClassinfo(56, 9);
//预警
$gongsi  = returnClassinfo(57, 9);
// echo '<pre>';
// print_r($neican);exit;
?>
<!--二级菜单导航-->
<div class="nav-down-list">
	<ul class="border-nav clearfix">
	<li><a href="/">首页</a></li>
	<li><a href="newslist.php?mid=53">市场</a></li>
	<li><a href="newslist.php?mid=54">政策</a></li>
 	<li><a href="newslist.php?mid=55">公司</a></li>
	<li><a href="newslist.php?mid=56">攻略</a></li>
	<li><a href="newslist.php?mid=57">预警</a></li>
	<li><a href="newslist.php?mid=47">平台</a></li>
    <li><a href="javascript:;">平台档案</a></li>
	<li><a href="javascript:;">网贷论坛</a></li>
	</ul>
</div>
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <a href="newsdetail.php?mid=<?=$isgood[0]['id']?>">
            <img src="<?=$isgood[0]['titlepic']?>" style="width:640px;height:324px" alt="..."></a>
            <div class="carousel-caption">
                <div class="clearfix">
                    <div class="pull-left news-img-ttss">
                    <?=$isgood[0]['title']?></div>
                    <div class="pull-right"><span>1/</span>6</div>
                </div>
            </div>
        </div>
        <?php 
          for($i=1;$i<count($isgood);$i++) {
        ?>
        <div class="item">
            <a href="newsdetail.php?mid=<?=$isgood[$i]['id']?>">
            <img src="<?=$isgood[$i]['titlepic']?>" style="width:640px;height:324px" alt="..."></a>
            <div class="carousel-caption">
                <div class="clearfix">
                    <div class="pull-left news-img-ttss">
                    <?=$isgood[$i]['title']?></div>
                    <div class="pull-right"><span><?=$i+1?>/</span>6</div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
<!--市场-->
<div class="news-list wangd-list ">

    <div class="clearfix">
        <div class="pull-left list-tt list-jj">市场</div>
    </div>
    <div class="lind"><div class="lind-b"></div></div>
    <ul class="news-ul">
        <?php  
        if($neican) {
            for($nei=0;$nei<4;$nei++) {
        ?>
        <li>
            <div class="clearfix">
                <div class="pull-left news-img"><a href="newsdetail.php?mid=<?=$neican[$nei]['id']?>"><img style="width:140px;height:110px;" src="<?=($neican[$nei]['titlepic'])?$neican[$nei]['titlepic']:'images/08.jpg'?>"></a></div>
                <div class="news-list-txt">
                    <div class="news-tt"><a href="newsdetail.php?mid=<?=$neican[$nei]['id']?>"><?=$neican[$nei]['title']?></a></div>
                    <div class="clearfix date">
                        <div class="pull-left guoji"><?=getClassname($neican[$nei]['classid'])?></div>
                        <div class="pull-left date-number"><?=getRelease($neican[$nei]['newstime'])?></div>
                    </div>
                    <div class="news-icon"><?=$neican[$nei]['plnum']?></div>
                </div>
            </div>
        </li>
        <?php }} ?>
    </ul>
    <a href="newslist.php?mid=53" class="news-more more-b"><span>查看更多</span></a>
</div>
<ul class="news-ul null-top">
    <li>
            <div class="news-list-txt bao-list-text">
                <div class="news-tt"><a href="newsdetail.php?mid=<?=$neican[4]['id']?>"><?=$neican[4]['title']?></a></div>
                <div class="clearfix date bao-date">                    
                    <div class="pull-left date-number"><?=getRelease($neican[4]['newstime'])?></div>
                </div>
                <div class="news-icon"><?=($neican[4]['plnum'])?></div>
            </div>
    </li>
    <li>
            <div class="clearfix">
                <div class="pull-left news-img"><a href="newsdetail.php?mid=<?=$neican[5]['id']?>"><img style="width:140px;height:110px;" src="<?=($neican[5]['titlepic'])?$neican[5]['titlepic']:'images/08.jpg'?>"></a></div>
                <div class="news-list-txt">
                    <div class="news-tt"><a href="newsdetail.php?mid=<?=$neican[5]['id']?>"><?=$neican[5]['title']?></a></div>
                    <div class="clearfix date">
                        <div class="pull-left guoji"><?=getClassname($neican[5]['classid'])?></div>
                        <div class="pull-left date-number"><?=getRelease($neican[5]['newstime'])?></div>
                    </div>
                    <div class="news-icon"><?=$neican[5]['plnum']?></div>
                </div>
            </div>
    </li>
    <li>
            <div class="news-list-txt bao-list-text">
                <div class="news-tt"><a href="newsdetail.php?mid=<?=$neican[6]['id']?>"><?=$neican[6]['title']?></a></div>
                <div class="clearfix date bao-date">
                    <div class="pull-left date-number"><?=getRelease($neican[6]['newstime'])?></div>
                </div>
                <div class="news-icon"><?=($neican[6]['plnum'])?></div>
            </div>
    </li>
    <li>
        <div class="clearfix welfare-im ">
            <div class="col-xs-6 col-xs-6-wd1">
                <div class="adsf">
                    <a href="newsdetail.php?mid=<?=$neican[7]['id']?>">
                        <img style="width:283px;height:126px;" src="<?=($neican[7]['titlepic'])?$neican[7]['titlepic']:'images/16.jpg'?>">
                    </a>
                    <div class="news-img-ttss5"><?=$neican[7]['title']?></div>
                </div>
            </div>
            <div class="col-xs-6 col-xs-6-wd2">    
                <div class="adsf">
                    <a href="newsdetail.php?mid=<?=$neican[8]['id']?>">
                        <img style="width:283px;height:126px;" src="<?=($neican[8]['titlepic'])?$neican[8]['titlepic']:'images/16.jpg'?>">
                    </a>
                    <div class="news-img-ttss5"><?=$neican[8]['title']?></div>
                </div>
            </div>
        </div>
    </li>
</ul>
<!--政策-->
<div class="news-list wangd-list ">

    <div class="clearfix">
        <div class="pull-left list-tt list-jj">政策</div>
    </div>
    <div class="lind"><div class="lind-b"></div></div>
    <ul class="news-ul">
        <?php  
        if($ticai) {
            for($ti=0;$ti<4;$ti++) {
        ?>
        <li>
            <div class="clearfix">
                <div class="pull-left news-img"><a href="newsdetail.php?mid=<?=$ticai[$ti]['id']?>"><img style="width:140px;height:110px;" src="<?=($ticai[$ti]['titlepic'])?$ticai[$ti]['titlepic']:'images/08.jpg'?>"></a></div>
                <div class="news-list-txt">
                    <div class="news-tt"><a href="newsdetail.php?mid=<?=$ticai[$ti]['id']?>"><?=$ticai[$ti]['title']?></a></div>
                    <div class="clearfix date">
                        <div class="pull-left guoji"><?=getClassname($ticai[$ti]['classid'])?></div>
                        <div class="pull-left date-number"><?=getRelease($ticai[$ti]['newstime'])?></div>
                    </div>
                    <div class="news-icon"><?=$ticai[$ti]['plnum']?></div>
                </div>
            </div>
        </li>
        <?php }} ?>
    </ul>
    <a href="newslist.php?mid=53" class="news-more more-b"><span>查看更多</span></a>
</div>
<ul class="news-ul null-top">
    <li>
            <div class="news-list-txt bao-list-text">
                <div class="news-tt"><a href="newsdetail.php?mid=<?=$ticai[4]['id']?>"><?=$ticai[4]['title']?></a></div>
                <div class="clearfix date bao-date">
                    <div class="pull-left date-number"><?=getRelease($ticai[4]['newstime'])?></div>
                </div>
                <div class="news-icon"><?=$ticai[4]['plnum']?></div>
            </div>
    </li>
    <li>
            <div class="clearfix">
                <div class="pull-left news-img"><a href="newsdetail.php?mid=<?=$ticai[5]['id']?>"><img style="width:140px;height:110px;" src="<?=($ticai[5]['titlepic'])?$ticai[5]['titlepic']:'images/08.jpg'?>"></a></div>
                <div class="news-list-txt">
                    <div class="news-tt"><a href="newsdetail.php?mid=<?=$ticai[5]['id']?>"><?=$ticai[5]['title']?></a></div>
                    <div class="clearfix date">
                        <div class="pull-left guoji"><?=getClassname($ticai[5]['classid'])?></div>
                        <div class="pull-left date-number"><?=getRelease($ticai[5]['newstime'])?></div>
                    </div>
                    <div class="news-icon"><?=$ticai[5]['plnum']?></div>
                </div>
            </div>
    </li>
    <li>
            <div class="news-list-txt bao-list-text">
                <div class="news-tt"><a href="newsdetail.php?mid=<?=$ticai[6]['id']?>"><?=$ticai[6]['title']?></a></div>
                <div class="clearfix date bao-date">
                    <div class="pull-left date-number"><?=getRelease($ticai[6]['newstime'])?></div>
                </div>
                <div class="news-icon"><?=($ticai[6]['plnum'])?></div>
            </div>
    </li>
    <li>
        <div class="clearfix welfare-im ">
            <div class="col-xs-6 col-xs-6-wd1">
                <div class="adsf">
                    <a href="newsdetail.php?mid=<?=$ticai[7]['id']?>">
                        <img style="width:283px;height:126px;" src="<?=($ticai[7]['titlepic'])?$ticai[7]['titlepic']:'images/16.jpg'?>">
                    </a>
                    <div class="news-img-ttss5"><?=$ticai[7]['title']?></div>
                </div>
            </div>
            <div class="col-xs-6 col-xs-6-wd2">    
                <div class="adsf">
                    <a href="newsdetail.php?mid=<?=$ticai[8]['id']?>">
                        <img style="width:283px;height:126px;" src="<?=($ticai[8]['titlepic'])?$ticai[8]['titlepic']:'images/16.jpg'?>">
                    </a>
                    <div class="news-img-ttss5"><?=$ticai[8]['title']?></div>
                </div>
            </div>
        </div>
    </li>
</ul>
<!--公司-->
<div class="news-list wangd-list ">

    <div class="clearfix">
        <div class="pull-left list-tt list-jj">公司</div>
    </div>
    <div class="lind"><div class="lind-b"></div></div>
    <ul class="news-ul">
        <?php  
        if($zhuli) {
            for($zhu=0;$zhu<4;$zhu++) {
        ?>
        <li>
            <div class="clearfix">
                <div class="pull-left news-img"><a href="newsdetail.php?mid=<?=$zhuli[$zhu]['id']?>"><img style="width:140px;height:110px;" src="<?=($zhuli[$zhu]['titlepic'])?$zhuli[$zhu]['titlepic']:'images/08.jpg'?>"></a></div>
                <div class="news-list-txt">
                    <div class="news-tt"><a href="newsdetail.php?mid=<?=$zhuli[$zhu]['id']?>"><?=$zhuli[$zhu]['title']?></a></div>
                    <div class="clearfix date">
                        <div class="pull-left guoji"><?=getClassname($zhuli[$zhu]['classid'])?></div>
                        <div class="pull-left date-number"><?=getRelease($zhuli[$zhu]['newstime'])?></div>
                    </div>
                    <div class="news-icon"><?=$zhuli[$zhu]['plnum']?></div>
                </div>
            </div>
        </li>
        <?php }} ?>
    </ul>
    <a href="newslist.php?mid=53" class="news-more more-b"><span>查看更多</span></a>
</div>
<ul class="news-ul null-top">
    <li>
            <div class="news-list-txt bao-list-text">
                <div class="news-tt"><a href="newsdetail.php?mid=<?=$zhuli[4]['id']?>"><?=$zhuli[4]['title']?></a></div>
                <div class="clearfix date bao-date">
                    <div class="pull-left date-number"><?=getRelease($zhuli[4]['newstime'])?></div>
                </div>
                <div class="news-icon"><?=$zhuli[4]['plnum']?></div>
            </div>
    </li>
    <li>
            <div class="clearfix">
                <div class="pull-left news-img"><a href="newsdetail.php?mid=<?=$zhuli[5]['id']?>"><img style="width:140px;height:110px;" src="<?=($zhuli[5]['titlepic'])?$zhuli[5]['titlepic']:'images/08.jpg'?>"></a></div>
                <div class="news-list-txt">
                    <div class="news-tt"><a href="newsdetail.php?mid=<?=$zhuli[5]['id']?>"><?=$zhuli[5]['title']?></a></div>
                    <div class="clearfix date">
                        <div class="pull-left guoji"><?=getClassname($zhuli[5]['classid'])?></div>
                        <div class="pull-left date-number"><?=getRelease($zhuli[5]['newstime'])?></div>
                    </div>
                    <div class="news-icon"><?=$zhuli[5]['plnum']?></div>
                </div>
            </div>
    </li>
    <li>
            <div class="news-list-txt bao-list-text">
                <div class="news-tt"><a href="newsdetail.php?mid=<?=$zhuli[6]['id']?>"><?=$zhuli[6]['title']?></a></div>
                <div class="clearfix date bao-date">
                    <div class="pull-left date-number"><?=getRelease($zhuli[6]['newstime'])?></div>
                </div>
                <div class="news-icon"><?=($zhuli[6]['plnum'])?></div>
            </div>
    </li>
    <li>
        <div class="clearfix welfare-im ">
            <div class="col-xs-6 col-xs-6-wd1">
                <div class="adsf">
                    <a href="newsdetail.php?mid=<?=$zhuli[7]['id']?>">
                        <img style="width:283px;height:126px;" src="<?=($zhuli[7]['titlepic'])?$zhuli[7]['titlepic']:'images/16.jpg'?>">
                    </a>
                    <div class="news-img-ttss5"><?=$zhuli[7]['title']?></div>
                </div>
            </div>
            <div class="col-xs-6 col-xs-6-wd2">    
                <div class="adsf">
                    <a href="newsdetail.php?mid=<?=$zhuli[8]['id']?>">
                        <img style="width:283px;height:126px;" src="<?=($zhuli[8]['titlepic'])?$zhuli[8]['titlepic']:'images/16.jpg'?>">
                    </a>
                    <div class="news-img-ttss5"><?=$zhuli[8]['title']?></div>
                </div>
            </div>
        </div>
    </li>
</ul>
<!--攻略-->
<div class="news-list wangd-list ">

    <div class="clearfix">
        <div class="pull-left list-tt list-jj">攻略</div>
    </div>
    <div class="lind"><div class="lind-b"></div></div>
    <ul class="news-ul">
        <?php  
        if($mingjia) {
            for($ming=0;$ming<4;$ming++) {
        ?>
        <li>
            <div class="clearfix">
                <div class="pull-left news-img"><a href="newsdetail.php?mid=<?=$mingjia[$ming]['id']?>"><img style="width:140px;height:110px;" src="<?=($mingjia[$ming]['titlepic'])?$mingjia[$ming]['titlepic']:'images/08.jpg'?>"></a></div>
                <div class="news-list-txt">
                    <div class="news-tt"><a href="newsdetail.php?mid=<?=$mingjia[$ming]['id']?>"><?=$mingjia[$ming]['title']?></a></div>
                    <div class="clearfix date">
                        <div class="pull-left guoji"><?=getClassname($mingjia[$ming]['classid'])?></div>
                        <div class="pull-left date-number"><?=getRelease($mingjia[$ming]['newstime'])?></div>
                    </div>
                    <div class="news-icon"><?=$mingjia[$ming]['plnum']?></div>
                </div>
            </div>
        </li>
        <?php }} ?>
    </ul>
    <a href="newslist.php?mid=53" class="news-more more-b"><span>查看更多</span></a>
</div>
<ul class="news-ul null-top">
    <li>
            <div class="news-list-txt bao-list-text">
                <div class="news-tt"><a href="newsdetail.php?mid=<?=$mingjia[4]['id']?>"><?=$mingjia[4]['title']?></a></div>
                <div class="clearfix date bao-date">
                    <div class="pull-left date-number"><?=getRelease($mingjia[4]['newstime'])?></div>
                </div>
                <div class="news-icon"><?=$mingjia[4]['plnum']?></div>
            </div>
    </li>
    <li>
            <div class="clearfix">
                <div class="pull-left news-img"><a href="newsdetail.php?mid=<?=$mingjia[5]['id']?>"><img style="width:140px;height:110px;" src="<?=($mingjia[5]['titlepic'])?$mingjia[5]['titlepic']:'images/08.jpg'?>"></a></div>
                <div class="news-list-txt">
                    <div class="news-tt"><a href="newsdetail.php?mid=<?=$mingjia[5]['id']?>"><?=$mingjia[5]['title']?></a></div>
                    <div class="clearfix date">
                        <div class="pull-left guoji"><?=getClassname($mingjia[5]['classid'])?></div>
                        <div class="pull-left date-number"><?=getRelease($mingjia[5]['newstime'])?></div>
                    </div>
                    <div class="news-icon"><?=$mingjia[5]['plnum']?></div>
                </div>
            </div>
    </li>
    <li>
            <div class="news-list-txt bao-list-text">
                <div class="news-tt"><a href="newsdetail.php?mid=<?=$mingjia[6]['id']?>"><?=$mingjia[6]['title']?></a></div>
                <div class="clearfix date bao-date">
                    <div class="pull-left date-number"><?=getRelease($mingjia[6]['newstime'])?></div>
                </div>
                <div class="news-icon"><?=($mingjia[6]['plnum'])?></div>
            </div>
    </li>
    <li>
        <div class="clearfix welfare-im ">
            <div class="col-xs-6 col-xs-6-wd1">
                <div class="adsf">
                    <a href="newsdetail.php?mid=<?=$mingjia[7]['id']?>">
                        <img style="width:283px;height:126px;" src="<?=($mingjia[7]['titlepic'])?$mingjia[7]['titlepic']:'images/16.jpg'?>">
                    </a>
                    <div class="news-img-ttss5"><?=$mingjia[7]['title']?></div>
                </div>
            </div>
            <div class="col-xs-6 col-xs-6-wd2">    
                <div class="adsf">
                    <a href="newsdetail.php?mid=<?=$mingjia[8]['id']?>">
                        <img style="width:283px;height:126px;" src="<?=($mingjia[8]['titlepic'])?$mingjia[8]['titlepic']:'images/16.jpg'?>">
                    </a>
                    <div class="news-img-ttss5"><?=$mingjia[8]['title']?></div>
                </div>
            </div>
        </div>
    </li>
</ul>
<!--预警-->
<div class="news-list wangd-list ">

    <div class="clearfix">
        <div class="pull-left list-tt list-jj">预警</div>
    </div>
    <div class="lind"><div class="lind-b"></div></div>
    <ul class="news-ul">
        <?php  
        if($gongsi) {
            for($gong=0;$gong<4;$gong++) {
        ?>
        <li>
            <div class="clearfix">
                <div class="pull-left news-img"><a href="newsdetail.php?mid=<?=$gongsi[$gong]['id']?>"><img style="width:140px;height:110px;" src="<?=($gongsi[$gong]['titlepic'])?$gongsi[$gong]['titlepic']:'images/08.jpg'?>"></a></div>
                <div class="news-list-txt">
                    <div class="news-tt"><a href="newsdetail.php?mid=<?=$gongsi[$gong]['id']?>"><?=$gongsi[$gong]['title']?></a></div>
                    <div class="clearfix date">
                        <div class="pull-left guoji"><?=getClassname($gongsi[$gong]['classid'])?></div>
                        <div class="pull-left date-number"><?=getRelease($gongsi[$gong]['newstime'])?></div>
                    </div>
                    <div class="news-icon"><?=$gongsi[$gong]['plnum']?></div>
                </div>
            </div>
        </li>
        <?php }} ?>
    </ul>
    <a href="newslist.php?mid=53" class="news-more more-b"><span>查看更多</span></a>
</div>
<ul class="news-ul null-top">
    <li>
            <div class="news-list-txt bao-list-text">
                <div class="news-tt"><a href="newsdetail.php?mid=<?=$gongsi[4]['id']?>"><?=$gongsi[4]['title']?></a></div>
                <div class="clearfix date bao-date">
                    <div class="pull-left date-number"><?=getRelease($gongsi[4]['newstime'])?></div>
                </div>
                <div class="news-icon"><?=$gongsi[4]['plnum']?></div>
            </div>
    </li>
    <li>
            <div class="clearfix">
                <div class="pull-left news-img"><a href="newsdetail.php?mid=<?=$gongsi[5]['id']?>"><img style="width:140px;height:110px;" src="<?=($gongsi[5]['titlepic'])?$gongsi[5]['titlepic']:'images/08.jpg'?>"></a></div>
                <div class="news-list-txt">
                    <div class="news-tt"><a href="newsdetail.php?mid=<?=$gongsi[5]['id']?>"><?=$gongsi[5]['title']?></a></div>
                    <div class="clearfix date">
                        <div class="pull-left guoji"><?=getClassname($gongsi[5]['classid'])?></div>
                        <div class="pull-left date-number"><?=getRelease($gongsi[5]['newstime'])?></div>
                    </div>
                    <div class="news-icon"><?=$gongsi[5]['plnum']?></div>
                </div>
            </div>
    </li>
    <li>
            <div class="news-list-txt bao-list-text">
                <div class="news-tt"><a href="newsdetail.php?mid=<?=$gongsi[6]['id']?>"><?=$gongsi[6]['title']?></a></div>
                <div class="clearfix date bao-date">
                    <div class="pull-left date-number"><?=getRelease($gongsi[6]['newstime'])?></div>
                </div>
                <div class="news-icon"><?=$gongsi[6]['plnum']?></div>
            </div>
    </li>
    <li>
        <div class="clearfix welfare-im ">
            <div class="col-xs-6 col-xs-6-wd1">
                <div class="adsf">
                    <a href="newsdetail.php?mid=<?=$gongsi[7]['id']?>">
                        <img style="width:283px;height:126px;" src="<?=($gongsi[7]['titlepic'])?$gongsi[7]['titlepic']:'images/16.jpg'?>">
                    </a>
                    <div class="news-img-ttss5"><?=$gongsi[7]['title']?></div>
                </div>
            </div>
            <div class="col-xs-6 col-xs-6-wd2">    
                <div class="adsf">
                    <a href="newsdetail.php?mid=<?=$gongsi[8]['id']?>">
                        <img style="width:283px;height:126px;" src="<?=($gongsi[8]['titlepic'])?$gongsi[8]['titlepic']:'images/16.jpg'?>">
                    </a>
                    <div class="news-img-ttss5"><?=$gongsi[8]['title']?></div>
                </div>
            </div>
        </div>
    </li>
</ul>

<!--保险-->
<?php include 'foot.php'; ?>