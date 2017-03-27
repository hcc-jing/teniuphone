<?php  
$cur = 'stock';
$titlename = '股票板块';
include 'head.php';
//一级推荐
$isgood = getGood(2, 'isgood');

$nowtime = microtime(true);
$info = file_get_contents("https://gupiao.baidu.com/api/rails/stockbasicbatch?from=pc&os_ver=1&cuid=xxx&vv=100&format=json&stock_code=us!DJI%2Cus.DJI%2Cus%40CCO%2ChkHSI%2Cus.IXIC%2Csz399001%2Csh000001&timestamp=".$nowtime."");
$indexes = json_decode($info,true);
$indes = $indexes['data'];

$index = array_reverse($indes);

//内参
$neican  = returnClassinfo(48, 9);
//题材
$ticai   = returnClassinfo(49, 8);
//主力
$zhuli   = returnClassinfo(50, 8);
//名家
$mingjia = returnClassinfo(51, 8);
//公司
$gongsi  = returnClassinfo(52, 8);
// echo '<pre>';
// print_r($neican);exit;
?>
<!--二级菜单导航-->
<div class="nav-down-list">
	<ul class="border-nav clearfix">
	<li><a href="/">首页</a></li>
	<li><a href="newslist.php?mid=48">内参</a></li>
	<li><a href="newslist.php?mid=49">题材</a></li>
 	<li><a href="newslist.php?mid=50">主力</a></li>
	<li><a href="newslist.php?mid=51">名家</a></li>
	<li><a href="newslist.php?mid=52">公司</a></li>
	<li><a href="newslist.php?mid=53">滚动播报</a></li>
	<li><a href="javascript:;">股票论坛</a></li>
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
<!--内参-->
<div class="news-list none-top">
    <div class="clearfix">
        <div class="clearfix welfare-1 welfare-gu">
            <div class="clearfix bottom-v">
            <?php  
            if($index) {
                for($in=0;$in<3;$in++) {
                    $high = sprintf("%.2f",$index[$in]['high']);
                    $netChange = sprintf("%.2f",$index[$in]['netChange']);
                    $Ratio = sprintf("%.2f",$index[$in]['netChangeRatio']);
            ?>
                <div class="col-xs-4 col-xs-4-r">
                    <div class="cont-tt"><?=$index[$in]['stockName']?></div>
                    <div class="cont-tt<?=($netChange > 0)?'1':'2'?>"><?=$high?></div>
                    <div class="cont-tt<?=($netChange > 0)?'4':'3'?>">
                        <span><?=$netChange?></span>
                        <span><?=$Ratio?>%</span>
                    </div>
                </div>
            <?php }} ?>
            </div>
        </div>
        <div class="pull-left list-tt">内参</div>
    </div>
    <div class="lind"><div class="lind-b"></div></div>
    <ul class="news-ul">
        <?php  
        if($neican) {
            for($nei=0;$nei<5;$nei++) {
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
    <a href="newslist.php?mid=48" class="news-more more-b"><span>查看更多</span></a>
</div>
<!--题材-->
<div class="news-list ">
    <ul class="news-ul gupiao-ul">
        <li>
            <div class="clearfix welfare-1">
                <div class="lianghui"><a href="newsdetail.php?mid=<?=$neican[5]['id']?>"><?=$neican[5]['title']?></a></div>
                <div class="show-col">
                    <div class="col-xs-4 col-xs-4-f">
                        <div class="head-r">独家</div>
                        <a href="newsdetail.php?mid=<?=$neican[5]['id']?>">
                        <img style="width:197px;height:123px;" src="<?=($neican[5]['titlepic'])?$neican[5]['titlepic']:'images/bao1.jpg'?>"></a>
                    </div>
                    <div class="col-xs-4 col-xs-4-m"><a href="newsdetail.php?mid=<?=$neican[6]['id']?>"><img style="width:197px;height:123px;" src="<?=($neican[6]['titlepic'])?$neican[6]['titlepic']:'images/bao2.jpg'?>"></a></div>
                    <div class="col-xs-4 col-xs-4-l"><a href="newsdetail.php?mid=<?=$neican[7]['id']?>"><img style="width:197px;height:123px;" src="<?=($neican[7]['titlepic'])?$neican[7]['titlepic']:'images/bao3.jpg'?>"></a></div>
                </div>
                <div class="clearfix left-b1">
                        <div class="pull-left house-gp"><?=getRelease($neican[5]['newstime'])?></div>
                        <div class="pull-right news-icon"><?=$neican[5]['plnum']?></div>
                </div>
            </div>
        </li>
        <li>
                <div class="clearfix">
                    <div class="pull-left news-img">
                    <a href="newsdetail.php?mid=<?=$neican[8]['id']?>"><img src="images/01.jpg"></a></div>
                    <div class="news-list-txt">
                        <div class="news-tt"><a href="newsdetail.php?mid=<?=$neican[8]['id']?>"><?=$neican[8]['title']?></a></div>
                        <div class="clearfix date">
                            <div class="pull-left guoji"><?=getClassname($neican[8]['classid'])?></div>
                            <div class="pull-left date-number"><?=getRelease($neican[8]['newstime'])?></div>
                        </div>
                        <div class="news-icon "><?=$neican[8]['plnum']?></div>
                    </div>
                </div>
        </li>
    </ul>
    <div class="clearfix">
        <div class="pull-left list-tt">题材</div>
    </div>
    <div class="lind"><div class="lind-b"></div></div>
    <ul class="news-ul">
        <?php  
        if($ticai) {
            for($ti=0;$ti<4;$ti++) {
        ?>
        <li>
            <div class="clearfix">
                <div class="pull-left news-img"><a href="newsdetail.php?mid=<?=$ticai[$ti]['id']?>"><img style="width:140px;height:110px;" src="<?=($ticai[$ti]['titlepic'])?$ticai[$ti]['titlepic']:'images/01.jpg'?>"></a></div>
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
                        <img style="width:197px;height:123px;" src="<?=($ticai[4]['titlepic'])?$ticai[4]['titlepic']:'images/bao1.jpg'?>"></a>
                    </div>
                    <div class="col-xs-4 col-xs-4-m"><a href="newsdetail.php?mid=<?=$ticai[5]['id']?>"><img style="width:197px;height:123px;" src="<?=($ticai[5]['titlepic'])?$ticai[5]['titlepic']:'images/bao2.jpg'?>"></a></div>
                    <div class="col-xs-4 col-xs-4-l"><a href="newsdetail.php?mid=<?=$ticai[6]['id']?>"><img style="width:197px;height:123px;" src="<?=($ticai[6]['titlepic'])?$ticai[6]['titlepic']:'images/bao3.jpg'?>"></a></div>
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
                <div class="pull-left news-img"><a href="newsdetail.php?mid=<?=$zhuli[$zhu]['id']?>"><img style="width:140px;height:110px;" src="<?=($zhuli[$zhu]['titlepic'])?$zhuli[$zhu]['titlepic']:'images/01.jpg'?>"></a></div>
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
                        <img style="width:197px;height:123px;" src="<?=($zhuli[4]['titlepic'])?$zhuli[4]['titlepic']:'images/bao1.jpg'?>"></a>
                    </div>
                    <div class="col-xs-4 col-xs-4-m"><a href="newsdetail.php?mid=<?=$zhuli[5]['id']?>"><img style="width:197px;height:123px;" src="<?=($zhuli[5]['titlepic'])?$zhuli[5]['titlepic']:'images/bao2.jpg'?>"></a></div>
                    <div class="col-xs-4 col-xs-4-l"><a href="newsdetail.php?mid=<?=$zhuli[6]['id']?>"><img style="width:197px;height:123px;" src="<?=($zhuli[6]['titlepic'])?$zhuli[6]['titlepic']:'images/bao3.jpg'?>"></a></div>
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
                <div class="pull-left news-img"><a href="newsdetail.php?mid=<?=$mingjia[$ming]['id']?>"><img style="width:140px;height:110px;" src="<?=($mingjia[$ming]['titlepic'])?$mingjia[$ming]['titlepic']:'images/01.jpg'?>"></a></div>
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
                        <img style="width:197px;height:123px;" src="<?=($mingjia[4]['titlepic'])?$mingjia[4]['titlepic']:'images/bao1.jpg'?>"></a>
                    </div>
                    <div class="col-xs-4 col-xs-4-m"><a href="newsdetail.php?mid=<?=$mingjia[5]['id']?>"><img style="width:197px;height:123px;" src="<?=($mingjia[5]['titlepic'])?$mingjia[5]['titlepic']:'images/bao2.jpg'?>"></a></div>
                    <div class="col-xs-4 col-xs-4-l"><a href="newsdetail.php?mid=<?=$mingjia[6]['id']?>"><img style="width:197px;height:123px;" src="<?=($mingjia[6]['titlepic'])?$mingjia[6]['titlepic']:'images/bao3.jpg'?>"></a></div>
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
                <div class="pull-left news-img"><a href="newsdetail.php?mid=<?=$gongsi[$gong]['id']?>"><img style="width:140px;height:110px;" src="<?=($gongsi[$gong]['titlepic'])?$gongsi[$gong]['titlepic']:'images/01.jpg'?>"></a></div>
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
                        <img style="width:197px;height:123px;" src="<?=($gongsi[4]['titlepic'])?$gongsi[4]['titlepic']:'images/bao1.jpg'?>"></a>
                    </div>
                    <div class="col-xs-4 col-xs-4-m"><a href="newsdetail.php?mid=<?=$gongsi[5]['id']?>"><img style="width:197px;height:123px;" src="<?=($gongsi[5]['titlepic'])?$gongsi[5]['titlepic']:'images/bao2.jpg'?>"></a></div>
                    <div class="col-xs-4 col-xs-4-l"><a href="newsdetail.php?mid=<?=$gongsi[6]['id']?>"><img style="width:197px;height:123px;" src="<?=($gongsi[6]['titlepic'])?$gongsi[6]['titlepic']:'images/bao3.jpg'?>"></a></div>
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