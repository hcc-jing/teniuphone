<?php  
$cur = 'forex';
$titlename = '外汇板块';
include 'head.php';
//一级推荐
$isgood = getGood(5, 'isgood');

//外汇
$current = current_return();

//市场动态
$neican  = returnClassinfo(19, 10);
//汇市研究
$ticai   = returnClassinfo(20, 10);
//美元
$zhuli   = returnClassinfo(21, 10);
//人民币
$mingjia = returnClassinfo(24, 10);

// echo '<pre>';
// print_r($current);exit;
?>
<!--二级菜单导航-->
<div class="nav-down-list">
	<ul class="border-nav clearfix">
	<li><a href="/">首页</a></li>
	<li><a href="newslist.php?mid=19">市场动态</a></li>
	<li><a href="newslist.php?mid=20">汇市研究</a></li>
 	<li><a href="newslist.php?mid=21">美元</a></li>
	<li><a href="newslist.php?mid=24">人民币</a></li>
	<li><a href="newslist.php?mid=23">欧元</a></li>
    <li><a href="newslist.php?mid=25">英镑</a></li>
    <li><a href="newslist.php?mid=22">日元</a></li>
    <li><a href="newslist.php?mid=26">加元</a></li>
	<li><a href="newslist.php?mid=27">澳元</a></li>
    <li><a href="newslist.php?mid=28">韩元</a></li>
	<li><a href="javascript:;">外汇论坛</a></li>
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

<div class="clearfix bottom-jj">
    <div class="col-xs-6 col-xs-6-r">
        <div class="cont-tt"><?=$current['data8']['currency']?></div>
        <div class="cont-tt<?=($current['data8']['diffAmo']>0)?'1':'2'?>"><?=$current['data8']['buyPic']?></div>
        <div class="cont-tt<?=($current['data8']['diffAmo']>0)?'4':'3'?>">
            <span><?=$current['data8']['diffAmo']?></span>&nbsp;&nbsp;
            <span><?=$current['data8']['diffPer']?></span>
        </div>
    </div>
    <div class="col-xs-6 col-xs-6-r">
        <div class="cont-tt"><?=$current['data2']['currency']?></div>
        <div class="cont-tt<?=($current['data2']['diffAmo']>0)?'1':'2'?>"><?=$current['data2']['buyPic']?></div>
        <div class="cont-tt<?=($current['data2']['diffAmo']>0)?'4':'3'?>">
            <span><?=$current['data2']['diffAmo']?></span>&nbsp;&nbsp;
            <span><?=$current['data2']['diffPer']?></span>
        </div>
    </div>
</div>

<!--市场动态-->
<div class="news-list list-wh ">
    <ul class="news-ul first-ul">
        <li class="first-li">
                <div class="clearfix welfare-1">
                    <div class="lianghui"><a href="newsdetail.php?mid=<?=$neican[0]['id']?>"><?=$neican[0]['title']?></a></div>
                    <div class="show-col">
                        <div class="col-xs-4 col-xs-4-f">
                            <a href="newsdetail.php?mid=<?=$neican[0]['id']?>">
                                <img style="width:197px;height:123px;" src="<?=($neican[0]['titlepic'])?$neican[0]['titlepic']:'images/16.jpg'?>">
                            </a>
                        </div>
                        <div class="col-xs-4 col-xs-4-m"><a href="newsdetail.php?mid=<?=$neican[1]['id']?>"><img style="width:197px;height:123px;" src="<?=($neican[1]['titlepic'])?$neican[1]['titlepic']:'images/bao2.jpg'?>"></a></div>
                        <div class="col-xs-4 col-xs-4-l"><a href="newsdetail.php?mid=<?=$neican[2]['id']?>"><img style="width:197px;height:123px;" src="<?=($neican[2]['titlepic'])?$neican[2]['titlepic']:'images/bao3.jpg'?>"></a></div>
                    </div>
                    <div class="clearfix left-b1">
                        <div class="pull-left house"><?=getRelease($neican[0]['newstime'])?></div>
                        <div class="pull-right news-icon"><?=($neican[0]['plnum'])?></div>
                    </div>
                </div>
        </li>
        <li>
                <div class="clearfix welfare-1 ">
                    <div class="title-wh title-top"><a href="newsdetail.php?mid=<?=$neican[3]['id']?>"><?=$neican[3]['title']?></a></div>
                    <div class="show-col show-icai">
                        <a href="newsdetail.php?mid=<?=$neican[3]['id']?>">
                            <img style="width:608px;height:210px;" src="<?=($neican[3]['titlepic'])?$neican[3]['titlepic']:'images/15.jpg'?>">
                        </a>
                        <div class="head-r">独家</div>
                        <div class="news-img-ttss"><?=$neican[3]['title']?></div>
                    </div>
                    <div class="clearfix left-b1">
                        <div class="pull-left industry"><?=getClassname($neican[0]['classid'])?></div>
                        <div class="pull-left house"><?=getRelease($neican[0]['newstime'])?></div>
                        <div class="news-icon"><?=$neican[0]['plnum']?></div>
                    </div>
                </div>
        </li>
        <li class="have-line">
                <div class="clearfix">
                    <div class="pull-left news-img"><img style="width:140px;height:110px;" src="<?=($neican[4]['titlepic'])?$neican[4]['titlepic']:'images/01.jpg'?>"></div>
                    <div class="news-list-txt">
                        <div class="news-tt"><a href="newsdetail.php?mid=<?=$neican[4]['id']?>"><?=$neican[4]['title']?></a></div>
                        <div class="clearfix date">
                            <div class="pull-left guoji"><?=getClassname($neican[4]['classid'])?></div>
                            <div class="pull-left date-number"><?=getRelease($neican[4]['newstime'])?></div>
                        </div>
                        <div class="news-icon icon-none"><?=$neican[4]['plnum']?></div>
                    </div>
                </div>
        </li>
    </ul>
    <div class="clearfix waihui-tt">
        <div class="pull-left list-tt">市场动态</div>
    </div>
    <div class="lind"><div class="lind-b"></div></div>
    <ul class="news-ul">
        <?php  
        if($neican) {
            for($nei=5;$nei<count($neican);$nei++) {
        
        ?>
        <li>
                <div class="clearfix">
                    <div class="news-list-txt bao-list-text">
                        <div class="news-tt"><a href="newsdetail.php?mid=<?=$neican[$nei]['id']?>"><?=$neican[$nei]['title']?></a></div>
                        <div class="clearfix date bao-date">
                            <div class="pull-left date-number"><?=getRelease($neican[$nei]['newstime'])?></div>
                        </div>
                        <div class="news-icon"><?=$neican[$nei]['plnum']?></div>
                    </div>
                </div>
        </li>
        <?php }} ?>
    </ul>
    <a href="newslist.php?mid=19" class="news-more more-b"><span>查看更多</span></a>
</div>
<!--汇市研究-->
<div class="news-list no-padding-top ">
    <ul class="news-ul first-ul">
        <li class="first-li">
                <div class="clearfix welfare-1">
                    <div class="lianghui"><a href="newsdetail.php?mid=<?=$ticai[0]['id']?>"><?=$ticai[0]['title']?></a></div>
                    <div class="show-col">
                        <div class="col-xs-4 col-xs-4-f">
                            <a href="newsdetail.php?mid=<?=$ticai[0]['id']?>">
                                <img style="width:197px;height:123px;" src="<?=($ticai[0]['titlepic'])?$ticai[0]['titlepic']:'images/16.jpg'?>">
                            </a>
                        </div>
                        <div class="col-xs-4 col-xs-4-m"><a href="newsdetail.php?mid=<?=$ticai[1]['id']?>"><img style="width:197px;height:123px;" src="<?=($ticai[1]['titlepic'])?$ticai[1]['titlepic']:'images/bao2.jpg'?>"></a></div>
                        <div class="col-xs-4 col-xs-4-l"><a href="newsdetail.php?mid=<?=$ticai[2]['id']?>"><img style="width:197px;height:123px;" src="<?=($ticai[2]['titlepic'])?$ticai[2]['titlepic']:'images/bao3.jpg'?>"></a></div>
                    </div>
                    <div class="clearfix left-b1">
                        <div class="pull-left house"><?=getRelease($ticai[0]['newstime'])?></div>
                        <div class="pull-right news-icon"><?=($ticai[0]['plnum'])?></div>
                    </div>
                </div>
        </li>
        <li>
                <div class="clearfix welfare-1 ">
                    <div class="title-wh title-top"><a href="newsdetail.php?mid=<?=$ticai[3]['id']?>"><?=$ticai[3]['title']?></a></div>
                    <div class="show-col show-icai">
                        <a href="newsdetail.php?mid=<?=$ticai[3]['id']?>">
                            <img style="width:608px;height:210px;" src="<?=($ticai[3]['titlepic'])?$ticai[3]['titlepic']:'images/15.jpg'?>">
                        </a>
                        <div class="head-r">独家</div>
                        <div class="news-img-ttss"><?=$ticai[3]['title']?></div>
                    </div>
                    <div class="clearfix left-b1">
                        <div class="pull-left industry"><?=getClassname($ticai[0]['classid'])?></div>
                        <div class="pull-left house"><?=getRelease($ticai[0]['newstime'])?></div>
                        <div class="news-icon"><?=$ticai[0]['plnum']?></div>
                    </div>
                </div>
        </li>
        <li class="have-line">
                <div class="clearfix">
                    <div class="pull-left news-img"><img style="width:140px;height:110px;" src="<?=($ticai[4]['titlepic'])?$ticai[4]['titlepic']:'images/01.jpg'?>"></div>
                    <div class="news-list-txt">
                        <div class="news-tt"><a href="newsdetail.php?mid=<?=$ticai[4]['id']?>"><?=$ticai[4]['title']?></a></div>
                        <div class="clearfix date">
                            <div class="pull-left guoji"><?=getClassname($ticai[4]['classid'])?></div>
                            <div class="pull-left date-number"><?=getRelease($ticai[4]['newstime'])?></div>
                        </div>
                        <div class="news-icon icon-none"><?=$ticai[4]['plnum']?></div>
                    </div>
                </div>
        </li>
    </ul>
    <div class="clearfix waihui-tt">
        <div class="pull-left list-tt">汇市研究</div>
    </div>
    <div class="lind"><div class="lind-b"></div></div>
    <ul class="news-ul">
        <?php  
        if($ticai) {
            for($ti=5;$ti<count($ticai);$ti++) {
        
        ?>
        <li>
                <div class="clearfix">
                    <div class="news-list-txt bao-list-text">
                        <div class="news-tt"><a href="newsdetail.php?mid=<?=$ticai[$ti]['id']?>"><?=$ticai[$ti]['title']?></a></div>
                        <div class="clearfix date bao-date">
                            <div class="pull-left date-number"><?=getRelease($ticai[$ti]['newstime'])?></div>
                        </div>
                        <div class="news-icon"><?=$ticai[$ti]['plnum']?></div>
                    </div>
                </div>
        </li>
        <?php }} ?>
    </ul>
    <a href="newslist.php?mid=20" class="news-more more-b"><span>查看更多</span></a>
</div>
<!--美元-->
<div class="news-list  no-padding-top">
    <ul class="news-ul first-ul">
        <li class="first-li">
                <div class="clearfix welfare-1">
                    <div class="lianghui"><a href="newsdetail.php?mid=<?=$zhuli[0]['id']?>"><?=$zhuli[0]['title']?></a></div>
                    <div class="show-col">
                        <div class="col-xs-4 col-xs-4-f">
                            <a href="newsdetail.php?mid=<?=$zhuli[0]['id']?>">
                                <img style="width:197px;height:123px;" src="<?=($zhuli[0]['titlepic'])?$zhuli[0]['titlepic']:'images/16.jpg'?>">
                            </a>
                        </div>
                        <div class="col-xs-4 col-xs-4-m"><a href="newsdetail.php?mid=<?=$zhuli[1]['id']?>"><img style="width:197px;height:123px;" src="<?=($zhuli[1]['titlepic'])?$zhuli[1]['titlepic']:'images/bao2.jpg'?>"></a></div>
                        <div class="col-xs-4 col-xs-4-l"><a href="newsdetail.php?mid=<?=$zhuli[2]['id']?>"><img style="width:197px;height:123px;" src="<?=($zhuli[2]['titlepic'])?$zhuli[2]['titlepic']:'images/bao3.jpg'?>"></a></div>
                    </div>
                    <div class="clearfix left-b1">
                        <div class="pull-left house"><?=getRelease($zhuli[0]['newstime'])?></div>
                        <div class="pull-right news-icon"><?=($zhuli[0]['plnum'])?></div>
                    </div>
                </div>
        </li>
        <li>
                <div class="clearfix welfare-1 ">
                    <div class="title-wh title-top"><a href="newsdetail.php?mid=<?=$zhuli[3]['id']?>"><?=$zhuli[3]['title']?></a></div>
                    <div class="show-col show-icai">
                        <a href="newsdetail.php?mid=<?=$zhuli[3]['id']?>">
                            <img style="width:608px;height:210px;" src="<?=($zhuli[3]['titlepic'])?$zhuli[3]['titlepic']:'images/15.jpg'?>">
                        </a>
                        <div class="head-r">独家</div>
                        <div class="news-img-ttss"><?=$zhuli[3]['title']?></div>
                    </div>
                    <div class="clearfix left-b1">
                        <div class="pull-left industry"><?=getClassname($zhuli[0]['classid'])?></div>
                        <div class="pull-left house"><?=getRelease($zhuli[0]['newstime'])?></div>
                        <div class="news-icon"><?=$zhuli[0]['plnum']?></div>
                    </div>
                </div>
        </li>
        <li class="have-line">
                <div class="clearfix">
                    <div class="pull-left news-img"><img style="width:140px;height:110px;" src="<?=($zhuli[4]['titlepic'])?$zhuli[4]['titlepic']:'images/01.jpg'?>"></div>
                    <div class="news-list-txt">
                        <div class="news-tt"><a href="newsdetail.php?mid=<?=$zhuli[4]['id']?>"><?=$zhuli[4]['title']?></a></div>
                        <div class="clearfix date">
                            <div class="pull-left guoji"><?=getClassname($zhuli[4]['classid'])?></div>
                            <div class="pull-left date-number"><?=getRelease($zhuli[4]['newstime'])?></div>
                        </div>
                        <div class="news-icon icon-none"><?=$zhuli[4]['plnum']?></div>
                    </div>
                </div>
        </li>
    </ul>
    <div class="clearfix waihui-tt">
        <div class="pull-left list-tt">美元</div>
    </div>
    <div class="lind"><div class="lind-b"></div></div>
    <ul class="news-ul">
        <?php  
        if($zhuli) {
            for($zhu=5;$zhu<count($zhuli);$zhu++) {
        
        ?>
        <li>
                <div class="clearfix">
                    <div class="news-list-txt bao-list-text">
                        <div class="news-tt"><a href="newsdetail.php?mid=<?=$zhuli[$zhu]['id']?>"><?=$zhuli[$zhu]['title']?></a></div>
                        <div class="clearfix date bao-date">
                            <div class="pull-left date-number"><?=getRelease($zhuli[$zhu]['newstime'])?></div>
                        </div>
                        <div class="news-icon"><?=$zhuli[$zhu]['plnum']?></div>
                    </div>
                </div>
        </li>
        <?php }} ?>
    </ul>
    <a href="newslist.php?mid=21" class="news-more more-b"><span>查看更多</span></a>
</div>
<!--人民币-->
<div class="news-list  no-padding-top">
    <ul class="news-ul first-ul">
        <li class="first-li">
                <div class="clearfix welfare-1">
                    <div class="lianghui"><a href="newsdetail.php?mid=<?=$mingjia[0]['id']?>"><?=$mingjia[0]['title']?></a></div>
                    <div class="show-col">
                        <div class="col-xs-4 col-xs-4-f">
                            <a href="newsdetail.php?mid=<?=$mingjia[0]['id']?>">
                                <img style="width:197px;height:123px;" src="<?=($mingjia[0]['titlepic'])?$mingjia[0]['titlepic']:'images/16.jpg'?>">
                            </a>
                        </div>
                        <div class="col-xs-4 col-xs-4-m"><a href="newsdetail.php?mid=<?=$mingjia[1]['id']?>"><img style="width:197px;height:123px;" src="<?=($mingjia[1]['titlepic'])?$mingjia[1]['titlepic']:'images/bao2.jpg'?>"></a></div>
                        <div class="col-xs-4 col-xs-4-l"><a href="newsdetail.php?mid=<?=$mingjia[2]['id']?>"><img style="width:197px;height:123px;" src="<?=($mingjia[2]['titlepic'])?$mingjia[2]['titlepic']:'images/bao3.jpg'?>"></a></div>
                    </div>
                    <div class="clearfix left-b1">
                        <div class="pull-left house"><?=getRelease($mingjia[0]['newstime'])?></div>
                        <div class="pull-right news-icon"><?=($mingjia[0]['plnum'])?></div>
                    </div>
                </div>
        </li>
        <li>
                <div class="clearfix welfare-1 ">
                    <div class="title-wh title-top"><a href="newsdetail.php?mid=<?=$mingjia[3]['id']?>"><?=$mingjia[3]['title']?></a></div>
                    <div class="show-col show-icai">
                        <a href="newsdetail.php?mid=<?=$mingjia[3]['id']?>">
                            <img style="width:608px;height:210px;" src="<?=($mingjia[3]['titlepic'])?$mingjia[3]['titlepic']:'images/15.jpg'?>">
                        </a>
                        <div class="head-r">独家</div>
                        <div class="news-img-ttss"><?=$mingjia[3]['title']?></div>
                    </div>
                    <div class="clearfix left-b1">
                        <div class="pull-left industry"><?=getClassname($mingjia[0]['classid'])?></div>
                        <div class="pull-left house"><?=getRelease($mingjia[0]['newstime'])?></div>
                        <div class="news-icon"><?=$mingjia[0]['plnum']?></div>
                    </div>
                </div>
        </li>
        <li class="have-line">
                <div class="clearfix">
                    <div class="pull-left news-img"><img style="width:140px;height:110px;" src="<?=($mingjia[4]['titlepic'])?$mingjia[4]['titlepic']:'images/01.jpg'?>"></div>
                    <div class="news-list-txt">
                        <div class="news-tt"><a href="newsdetail.php?mid=<?=$mingjia[4]['id']?>"><?=$mingjia[4]['title']?></a></div>
                        <div class="clearfix date">
                            <div class="pull-left guoji"><?=getClassname($mingjia[4]['classid'])?></div>
                            <div class="pull-left date-number"><?=getRelease($mingjia[4]['newstime'])?></div>
                        </div>
                        <div class="news-icon icon-none"><?=$mingjia[4]['plnum']?></div>
                    </div>
                </div>
        </li>
    </ul>
    <div class="clearfix waihui-tt">
        <div class="pull-left list-tt">人民币</div>
    </div>
    <div class="lind"><div class="lind-b"></div></div>
    <ul class="news-ul">
        <?php  
        if($mingjia) {
            for($ming=5;$ming<count($mingjia);$ming++) {
        
        ?>
        <li>
                <div class="clearfix">
                    <div class="news-list-txt bao-list-text">
                        <div class="news-tt"><a href="newsdetail.php?mid=<?=$mingjia[$ming]['id']?>"><?=$mingjia[$ming]['title']?></a></div>
                        <div class="clearfix date bao-date">
                            <div class="pull-left date-number"><?=getRelease($mingjia[$ming]['newstime'])?></div>
                        </div>
                        <div class="news-icon"><?=$mingjia[$ming]['plnum']?></div>
                    </div>
                </div>
        </li>
        <?php }} ?>
    </ul>
    <a href="newslist.php?mid=24" class="news-more more-b"><span>查看更多</span></a>
</div>

<!--保险-->
<?php include 'foot.php'; ?>