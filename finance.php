<?php  
$cur = 'finance';
$titlename = '财经板块';
include 'head.php';
//一级推荐
$isgood = getGood(1, 'isgood', 7);

$nowtime = microtime(true);
$info = file_get_contents("https://gupiao.baidu.com/api/rails/stockbasicbatch?from=pc&os_ver=1&cuid=xxx&vv=100&format=json&stock_code=us!DJI%2Cus.DJI%2Cus%40CCO%2ChkHSI%2Cus.IXIC%2Csz399001%2Csh000001&timestamp=".$nowtime."");
$indexes = json_decode($info,true);
$indes = $indexes['data'];

$index = array_reverse($indes);

//国际
$neican  = returnClassinfo(9, 6);
//产业
$ticai   = returnClassinfo(10, 6);
//宏观
$zhuli   = returnClassinfo(11, 6);
//公司
$mingjia = returnClassinfo(12, 6);
//创投
$gongsi  = returnClassinfo(13, 6);
// echo '<pre>';
// print_r($index);exit;
?>
<!--二级菜单导航-->
<div class="nav-down-list">
    <ul class="border-nav clearfix">
    <li><a href="/">首页</a></li>
    <li><a href="newslist.php?mid=9">国际</a></li>
    <li><a href="newslist.php?mid=10">产业</a></li>
    <li><a href="newslist.php?mid=11">宏观</a></li>
    <li><a href="newslist.php?mid=12">公司</a></li>
    <li><a href="newslist.php?mid=13">创投</a></li>
    <li><a href="newslist.php?mid=14">评论</a></li>
    <li><a href="newslist.php?mid=15">人物</a></li>
    <li><a href="javascript:;">行情中心</a></li>
    <li><a href="javascript:;">财经论坛</a></li>
    </ul>
</div>
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <a href="newsdetail.php?mid=<?=$isgood[1]['id']?>">
            <img src="<?=$isgood[1]['titlepic']?>" style="width:640px;height:324px" alt="..."></a>
            <div class="carousel-caption">
                <div class="clearfix">
                    <div class="pull-left news-img-ttss">
                    <?=$isgood[1]['title']?></div>
                    <div class="pull-right"><span>1/</span>6</div>
                </div>
            </div>
        </div>
        <?php 
          for($i=2;$i<count($isgood);$i++) {
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
<div class="clearfix news">
    <div class="pull-left label-back">直播</div>
    <div class="pull-left news-txt"><a href="newsdetail.php?mid=<?=$isgood[0]['id']?>"><?=$isgood[0]['title']?></a></div>
</div>
<!--国际-->
<div class="news-list none-top">
    <div class="clearfix">
        <div class="headcon">
            <div class="head-c">
                <div style="float:left">
                    <div class="head-cln-1">
                        <span>上证</span>
                        <span style="color:<?=($index[0]['netChange']>0)?'#fe0000':'#008f0d'?>;"><?=sprintf("%.2f",$index[0]['high'])?></span>
                        <span style="color:<?=($index[0]['netChange']>0)?'#fe0000':'#008f0d'?>;"><?=sprintf("%.2f",$index[0]['netChangeRatio'])?>% </span>
                    </div>
                    <div class="head-cln2 head-cln-2">
                        <span>深成</span>
                        <span style="color:<?=($index[1]['netChange']>0)?'#fe0000':'#008f0d'?>;"><?=sprintf("%.2f",$index[1]['high'])?></span>
                        <span style="color:<?=($index[1]['netChange']>0)?'#fe0000':'#008f0d'?>;"><?=sprintf("%.2f",$index[1]['netChangeRatio'])?>% </span>
                    </div>
                </div>

                <div class="col-xs-6 head-cl2">
                    <div class="head-cln-1">
                        <span>恒指</span>
                        <span style="color:<?=($index[2]['netChange']>0)?'#fe0000':'#008f0d'?>;"><?=sprintf("%.2f",$index[2]['high'])?></span>
                        <span style="color:<?=($index[2]['netChange']>0)?'#fe0000':'#008f0d'?>;"><?=sprintf("%.2f",$index[2]['netChangeRatio'])?>%</span>
                    </div>
                    <div class="head-cln-2">
                        <span>纳指</span>
                        <span style="color:<?=($index[3]['netChange']>0)?'#fe0000':'#008f0d'?>;"><?=sprintf("%.2f",$index[3]['high'])?></span>
                        <span style="color:<?=($index[3]['netChange']>0)?'#fe0000':'#008f0d'?>;"><?=sprintf("%.2f",$index[3]['netChangeRatio'])?>% </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="pull-left list-tt">国际</div>
    </div>
    <div class="lind"><div class="lind-b"></div></div>
    <ul class="news-ul">
        <?php  
        if($neican) {
            for($nei=0;$nei<4;$nei++) {
        ?>
        <li>
            <div class="clearfix">
                <div class="pull-left news-img"><a href="newsdetail.php?mid=<?=$neican[$nei]['id']?>"><img src="images/01.jpg"></a></div>
                <div class="news-list-txt">
                    <div class="news-tt"><a href="newsdetail.php?mid=<?=$neican[$nei]['id']?>"><?=$neican[$nei]['title']?></a></div>
                    <div class="clearfix date">
                        <div class="pull-left date-number"><?=getRelease($neican[$nei]['newstime'])?></div>
                    </div>
                    <div class="news-icon"><?=$neican[$nei]['plnum']?></div>
                </div>
            </div>
        </li>
        <?php }} ?>
    </ul>
    <a href="newslist.php?mid=9" class="news-more more-b"><span>查看更多</span></a>
</div>
<div class="clearfix welfare-1 welfare-cai">
    <div class="lianghui"><a href="newsdetail.php?mid=<?=$neican[5]['id']?>"><?=$neican[5]['title']?></a></div>
    <div class="show-col show-icai">
        <img src="images/13.png" alt="">
        <div class="head-r">独家</div>
        <div class="welfare-bottom"><?=$neican[5]['title']?></div>
    </div>
    <div class="clearfix left-b1">
        <div class="pull-left industry industry-l20"><?=getClassname($neican[5]['classid'])?></div>
        <div class="pull-left house"><?=getRelease($neican[5]['newstime'])?></div>
    </div>
</div>
<!--产业-->
<div class="news-list ">
    <div class="clearfix">
        <div class="pull-left list-tt">产业</div>
    </div>
    <div class="lind"><div class="lind-b"></div></div>
    <ul class="news-ul">
        <?php  
        if($ticai) {
            for($ti=0;$ti<4;$ti++) {
        ?>
        <li>
            <div class="clearfix">
                <div class="pull-left news-img"><a href="newsdetail.php?mid=<?=$ticai[$ti]['id']?>"><img src="images/08.jpg"></a></div>
                <div class="news-list-txt">
                    <div class="news-tt"><a href="newsdetail.php?mid=<?=$ticai[$ti]['id']?>"><?=$ticai[$ti]['title']?></a></div>
                    <div class="clearfix date">
                        <div class="pull-left date-number"><?=getRelease($ticai[$ti]['newstime'])?></div>
                    </div>
                    <div class="news-icon"><?=$ticai[$ti]['plnum']?></div>
                </div>
            </div>
        </li>
        <?php }} ?>
    </ul>
    <a href="newslist.php?mid=49" class="news-more more-b"><span>查看更多</span></a>
</div>
<!--主力-->
<div class="news-list">
    <ul class="news-ul gupiao-ul">
        <li>
              <div class="mystyle clearfix welfare-1">
                <div class="lianghui"><a href="newsdetail.php?mid=<?=$ticai[4]['id']?>"><?=$ticai[4]['title']?></a></div>
                <div class="show-col">
                    <div class="col-xs-4 col-xs-4-f">
                        <div class="head-r">独家</div>
                        <a href="newsdetail.php?mid=<?=$ticai[4]['id']?>">
                        <img src="images/bao1.jpg" alt=""></a>
                    </div>
                    <div class="col-xs-4 col-xs-4-m"><a href="newsdetail.php?mid=<?=$ticai[5]['id']?>"><img src="images/bao2.jpg" alt=""></a></div>
                    <div class="col-xs-4 col-xs-4-l"><a href="newsdetail.php?mid=<?=$ticai[6]['id']?>"><img src="images/bao3.jpg" alt=""></a></div>
                </div>
                <div class="clearfix left-b1">
                        <div class="pull-left house-gp"><?=getRelease($ticai[4]['newstime'])?></div>
                        <div class="pull-right news-icon"><?=$ticai[4]['plnum']?></div>
                </div>
            </div>
        </li>
        <li>
                 <div class="clearfix">
                    <div class="pull-left news-img">
                    <a href="newsdetail.php?mid=<?=$ticai[7]['id']?>"><img src="images/01.jpg"></a></div>
                    <div class="news-list-txt">
                        <div class="news-tt"><a href="newsdetail.php?mid=<?=$ticai[7]['id']?>"><?=$ticai[7]['title']?></a></div>
                        <div class="clearfix date">
                            <div class="pull-left guoji"><?=getClassname($ticai[7]['classid'])?></div>
                            <div class="pull-left date-number"><?=getRelease($ticai[7]['newstime'])?></div>
                        </div>
                        <div class="news-icon "><?=$ticai[7]['plnum']?></div>
                    </div>
                </div>
        </li>
    </ul>
    <div class="clearfix">
        <div class="pull-left list-tt">主力</div>
    </div>
    <div class="lind"><div class="lind-b"></div></div>
    <ul class="news-ul">
        <?php  
        if($zhuli) {
            for($zhu=0;$zhu<4;$zhu++) {
        ?>
        <li>
            <div class="clearfix">
                <div class="pull-left news-img"><a href="newsdetail.php?mid=<?=$zhuli[$zhu]['id']?>"><img src="images/08.jpg"></a></div>
                <div class="news-list-txt">
                    <div class="news-tt"><a href="newsdetail.php?mid=<?=$zhuli[$zhu]['id']?>"><?=$zhuli[$zhu]['title']?></a></div>
                    <div class="clearfix date">
                        <div class="pull-left date-number"><?=getRelease($zhuli[$zhu]['newstime'])?></div>
                    </div>
                    <div class="news-icon"><?=$zhuli[$zhu]['plnum']?></div>
                </div>
            </div>
        </li>
        <?php }} ?>
    </ul>
    <a href="newslist.php?mid=50" class="news-more more-b"><span>查看更多</span></a>
</div>
<!--名家-->
<div class="news-list">
    <ul class="news-ul gupiao-ul">
        <li>
            <div class="mystyle clearfix welfare-1">
                <div class="lianghui"><a href="newsdetail.php?mid=<?=$zhuli[4]['id']?>"><?=$zhuli[4]['title']?></a></div>
                <div class="show-col">
                    <div class="col-xs-4 col-xs-4-f">
                        <div class="head-r">独家</div>
                        <a href="newsdetail.php?mid=<?=$zhuli[4]['id']?>">
                        <img src="images/bao1.jpg" alt=""></a>
                    </div>
                    <div class="col-xs-4 col-xs-4-m"><a href="newsdetail.php?mid=<?=$zhuli[5]['id']?>"><img src="images/bao2.jpg" alt=""></a></div>
                    <div class="col-xs-4 col-xs-4-l"><a href="newsdetail.php?mid=<?=$zhuli[6]['id']?>"><img src="images/bao3.jpg" alt=""></a></div>
                </div>
                <div class="clearfix left-b1">
                        <div class="pull-left house-gp"><?=getRelease($zhuli[4]['newstime'])?></div>
                        <div class="pull-right news-icon"><?=$zhuli[4]['plnum']?></div>
                </div>
            </div>
        </li>
        <li>
            <div class="clearfix">
                    <div class="pull-left news-img">
                    <a href="newsdetail.php?mid=<?=$zhuli[7]['id']?>"><img src="images/01.jpg"></a></div>
                    <div class="news-list-txt">
                        <div class="news-tt"><a href="newsdetail.php?mid=<?=$zhuli[7]['id']?>"><?=$zhuli[7]['title']?></a></div>
                        <div class="clearfix date">
                            <div class="pull-left guoji"><?=getClassname($zhuli[7]['classid'])?></div>
                            <div class="pull-left date-number"><?=getRelease($zhuli[7]['newstime'])?></div>
                        </div>
                        <div class="news-icon "><?=$zhuli[7]['plnum']?></div>
                    </div>
            </div>
        </li>
    </ul>
    <div class="clearfix">
        <div class="pull-left list-tt">名家</div>
    </div>
    <div class="lind"><div class="lind-b"></div></div>
    <ul class="news-ul">
        <?php  
        if($mingjia) {
            for($ming=0;$ming<4;$ming++) {
        ?>
        <li>
            <div class="clearfix">
                <div class="pull-left news-img"><a href="newsdetail.php?mid=<?=$mingjia[$ming]['id']?>"><img src="images/08.jpg"></a></div>
                <div class="news-list-txt">
                    <div class="news-tt"><a href="newsdetail.php?mid=<?=$mingjia[$ming]['id']?>"><?=$mingjia[$ming]['title']?></a></div>
                    <div class="clearfix date">
                        <div class="pull-left date-number"><?=getRelease($mingjia[$ming]['newstime'])?></div>
                    </div>
                    <div class="news-icon"><?=$mingjia[$ming]['plnum']?></div>
                </div>
            </div>
        </li>
        <?php }} ?>
    </ul>
    <a href="newslist.php?mid=51" class="news-more more-b"><span>查看更多</span></a>
</div>
<!--公司-->
<div class="news-list">
    <ul class="news-ul gupiao-ul">
        <li>
            <div class="mystyle clearfix welfare-1">
                <div class="lianghui"><a href="newsdetail.php?mid=<?=$mingjia[4]['id']?>"><?=$mingjia[4]['title']?></a></div>
                <div class="show-col">
                    <div class="col-xs-4 col-xs-4-f">
                        <div class="head-r">独家</div>
                        <a href="newsdetail.php?mid=<?=$mingjia[4]['id']?>">
                        <img src="images/bao1.jpg" alt=""></a>
                    </div>
                    <div class="col-xs-4 col-xs-4-m"><a href="newsdetail.php?mid=<?=$mingjia[5]['id']?>"><img src="images/bao2.jpg" alt=""></a></div>
                    <div class="col-xs-4 col-xs-4-l"><a href="newsdetail.php?mid=<?=$mingjia[6]['id']?>"><img src="images/bao3.jpg" alt=""></a></div>
                </div>
                <div class="clearfix left-b1">
                        <div class="pull-left house-gp"><?=getRelease($mingjia[4]['newstime'])?></div>
                        <div class="pull-right news-icon"><?=$mingjia[4]['plnum']?></div>
                </div>
            </div>
        </li>
        <li>
            <div class="clearfix">
                    <div class="pull-left news-img">
                    <a href="newsdetail.php?mid=<?=$mingjia[7]['id']?>"><img src="images/01.jpg"></a></div>
                    <div class="news-list-txt">
                        <div class="news-tt"><a href="newsdetail.php?mid=<?=$mingjia[7]['id']?>"><?=$mingjia[7]['title']?></a></div>
                        <div class="clearfix date">
                            <div class="pull-left guoji"><?=getClassname($mingjia[7]['classid'])?></div>
                            <div class="pull-left date-number"><?=getRelease($mingjia[7]['newstime'])?></div>
                        </div>
                        <div class="news-icon "><?=$mingjia[7]['plnum']?></div>
                    </div>
            </div>
        </li>
    </ul>
    <div class="clearfix">
        <div class="pull-left list-tt">公司</div>
    </div>
    <div class="lind"><div class="lind-b"></div></div>
    <ul class="news-ul">
        <?php  
        if($gongsi) {
            for($gong=0;$gong<4;$gong++) {
        ?>
        <li>
            <div class="clearfix">
                <div class="pull-left news-img"><a href="newsdetail.php?mid=<?=$gongsi[$gong]['id']?>"><img src="images/08.jpg"></a></div>
                <div class="news-list-txt">
                    <div class="news-tt"><a href="newsdetail.php?mid=<?=$gongsi[$gong]['id']?>"><?=$gongsi[$gong]['title']?></a></div>
                    <div class="clearfix date">
                        <div class="pull-left date-number"><?=getRelease($gongsi[$gong]['newstime'])?></div>
                    </div>
                    <div class="news-icon"><?=$gongsi[$gong]['plnum']?></div>
                </div>
            </div>
        </li>
        <?php }} ?>
    </ul>
    <a href="newslist.php?mid=52" class="news-more more-b"><span>查看更多</span></a>
</div>
<!---->
<div class="news-list">
    <ul class="news-ul gupiao-ul">
        <li>
            <div class="mystyle clearfix welfare-1">
                <div class="lianghui"><a href="newsdetail.php?mid=<?=$gongsi[4]['id']?>"><?=$gongsi[4]['title']?></a></div>
                <div class="show-col">
                    <div class="col-xs-4 col-xs-4-f">
                        <div class="head-r">独家</div>
                        <a href="newsdetail.php?mid=<?=$gongsi[4]['id']?>">
                        <img src="images/bao1.jpg" alt=""></a>
                    </div>
                    <div class="col-xs-4 col-xs-4-m"><a href="newsdetail.php?mid=<?=$gongsi[5]['id']?>"><img src="images/bao2.jpg" alt=""></a></div>
                    <div class="col-xs-4 col-xs-4-l"><a href="newsdetail.php?mid=<?=$gongsi[6]['id']?>"><img src="images/bao3.jpg" alt=""></a></div>
                </div>
                <div class="clearfix left-b1">
                        <div class="pull-left house-gp"><?=getRelease($gongsi[4]['newstime'])?></div>
                        <div class="pull-right news-icon"><?=$gongsi[4]['plnum']?></div>
                </div>
            </div>
        </li>
        <li>
            <div class="clearfix">
                    <div class="pull-left news-img">
                    <a href="newsdetail.php?mid=<?=$gongsi[7]['id']?>"><img src="images/01.jpg"></a></div>
                    <div class="news-list-txt">
                        <div class="news-tt"><a href="newsdetail.php?mid=<?=$gongsi[7]['id']?>"><?=$gongsi[7]['title']?></a></div>
                        <div class="clearfix date">
                            <div class="pull-left guoji"><?=getClassname($gongsi[7]['classid'])?></div>
                            <div class="pull-left date-number"><?=getRelease($gongsi[7]['newstime'])?></div>
                        </div>
                        <div class="news-icon "><?=$gongsi[7]['plnum']?></div>
                    </div>
            </div>
        </li>
    </ul>
</div>


<!--保险-->
<?php include 'foot.php'; ?>