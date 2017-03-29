<?php  
$cur = 'gold';
$titlename = '黄金板块';
include 'head.php';
//一级推荐
$isgood = getGood(6, 'isgood');

//市场
$neican  = returnClassinfo(36, 11);
//点评
$ticai   = returnClassinfo(38, 8);
//银铂钯
$zhuli   = returnClassinfo(39, 8);
//黄金现货
$mingjia = returnClassinfo(40, 8);
//宏观
$gongsi = returnClassinfo(37, 8);

?>
<?php  

//连续黄金
$lianurl = "http://hq.sinajs.cn/?_=". time() ."/&list=AU0";
$lunurl = "http://hq.sinajs.cn/?_=". time() ."/&list=hf_XAU";
$hf_GCurl = "http://hq.sinajs.cn/?_=". time() ."/&list=hf_GC";

$lian   = getGoldinfos($lianurl);
$lundun = getGoldinfos($lunurl);
$hf_GC  = getGoldinfos($hf_GCurl);

$xia = $lian[8] - $lian[10];

$percent = sprintf("%.2f",($xia/$lian[10])*100);
$xia = sprintf("%.2f",$xia);
// echo '<pre>';
// print_r($lianurl);exit;
?>
<!--二级菜单导航-->
<div class="nav-down-list">
	<ul class="border-nav clearfix">
	<li><a href="/">首页</a></li>
	<li><a href="newslist.php?mid=36">市场</a></li>
	<li><a href="newslist.php?mid=37">宏观</a></li>
 	<li><a href="newslist.php?mid=38">点评</a></li>
    <li><a href="newslist.php?mid=39">银铂钯</a></li>
    <li><a href="newslist.php?mid=40">黄金现货</a></li>
    <li><a href="newslist.php?mid=41">黄金ID</a></li>
	<li><a href="newslist.php?mid=42">纸黄金</a></li>
    <li><a href="javascript:;">行情中心</a></li>
	<li><a href="javascript:;">黄金论坛</a></li>
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
          for($i=1;$i<6;$i++) {
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
<div class="news-list list-hj">
    <div class="clearfix text-center bottom-hj">
        <div class="col-xs-4 col-xs-4-r">
            <div class="cont-tt">COMEX黄金</div>
            <div class="cont-tt<?=($hf_GC[1] > 0)?'1':'2'?>"><?=$hf_GC[2]?></div>
            <div class="cont-tt<?=($hf_GC[1] > 0)?'4':'3'?>">
                <span><?=sprintf("%.3f",$hf_GC[2]*$hf_GC[1]/100)?></span>
                <span><?=sprintf("%.2f",$hf_GC[1])?>%</span>
            </div>
        </div>
        <div class="col-xs-4 col-xs-4-r">
            <div class="cont-tt">伦敦金</div>
            <div class="cont-tt<?=($lundun[1] > 0)?'1':'2'?>"><?=$lundun[2]?></div>
            <div class="cont-tt<?=($lundun[1] > 0)?'4':'3'?>">
                <span><?=sprintf("%.3f",$lundun[2]*$lundun[1]/100)?></span>
                <span><?=sprintf("%.2f",$lundun[1])?>%</span>
            </div>
        </div>
        <div class="col-xs-4 col-xs-4-r">
            <div class="cont-tt">黄金连续</div>
            <div class="cont-tt<?=($xia > 0)?'1':'2'?>"><?=$lian[8]?></div>
            <div class="cont-tt<?=($xia > 0)?'4':'3'?>">
                <span><?=$xia?></span>
                <span><?=$percent?>%</span>
            </div>
        </div>
    </div>
</div>
<!--多空调查-->
<div class="news-list list-hj">
    <div class="clearfix">
        <div class="pull-left list-tt">多空调查</div>
    </div>
    <div class="text-center">
        <div class="goole-tc">
            <span>看多</span>
            <div class="progress vote-line">
                <div class="progress-bar progress-bar-success progress-c1" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
                    <!-- <span class="sr-only vote-line-value" id="present_601_1">40% Complete (success)</span> -->
                    <div class="vote-line-value sr-only" id="present_601_1" style="width: 51.5%;"></div>
                </div>
            </div>
            <a class="vote-1" href="javascript:;" onclick="voteit(601,1908,0);">投票</a>
            <div class="progress-number result" id="val_601_1">51.56%</div>
        </div>
        <div class="goole-tc2">
            <span>看空</span>
            <div class="progress vote-line">
                <div class="progress-bar progress-bar-success progress-c2" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
                    <!-- <span class="sr-only">40% Complete (success)</span> -->
                    <div class="vote-line-value sr-only" id="present_601_2" style="width: 48.5%;"></div>
                </div>
            </div>
            <a class="vote-2" href="javascript:;" onclick="voteit(601,1909,1);">投票</a>
            <div class="progress-number result" id="val_601_2">48.44%</div>
        </div>
    </div>
</div>
<!--外盘换算-->
<div class="news-list list-hj1">
    <div class="clearfix">
        <div class="pull-left list-tt">外盘换算</div>
    </div>
    <ul class="news-ul">
        <li>
            <div class="conversion text-center">
                <input type="text" id="usprice_1" class="form-control text-hj1" oninput="glodconv('usprice_1','cnprice_1',0);">
                <span>美元/盎司=</span>
                <input type="text" id="cnprice_1" class="form-control text-hj1" >
                <span>人民币/克</span>
            </div>
            <div class="conversion text-center">
                <input type="text" id="cnprice_2" class="form-control text-hj1" oninput="glodconv('cnprice_2','usprice_2',1);">
                <span>人民币/克=</span>
                <input type="text" id="usprice_2" class="form-control text-hj1" >
                <span>美元/盎司</span>
            </div>
        </li>
        <li>
                <div class="clearfix">
                    <div class="pull-left news-img"><img style="width:140px;height:110px;" src="<?=($neican[0]['titlepic'])?$neican[0]['titlepic']:'images/09.jpg'?>"></div>
                    <div class="news-list-txt">
                        <div class="news-tt"><a href="newsdetail.php?mid=<?=$neican[0]['id']?>"><?=$neican[0]['title']?></a></div>
                        <div class="news-icon"><?=($neican[0]['plnum'])?></div>
                    </div>
                </div>
        </li>
        <li>
            <div class="clearfix">
                    <div class="pull-left news-img"><img style="width:140px;height:110px;" src="<?=($neican[1]['titlepic'])?$neican[1]['titlepic']:'images/09.jpg'?>"></div>
                    <div class="news-list-txt">
                        <div class="news-tt"><a href="newsdetail.php?mid=<?=$neican[1]['id']?>"><?=$neican[1]['title']?></a></div>
                        <div class="news-icon"><?=($neican[1]['plnum'])?></div>
                    </div>
            </div>
        </li>
        <li>
                <div class="clearfix welfare-1">
                    <div class="lianghui"><a href="newsdetail.php?mid=<?=$neican[2]['id']?>"><?=$neican[2]['title']?></a></div>
                    <div class="show-col show-icai">
                        <img style="width:608px;height:218px;" src="<?=($neican[2]['titlepic'])?$neican[2]['titlepic']:'images/14.png'?>">
                        <div class="head-r">独家</div>
                    </div>
                    <div class="clearfix left-b1">
                        <div class="pull-left house"><?=getRelease($neican[2]['newstime'])?></div>
                        <div class="news-icon"><?=($neican[2]['plnum'])?></div>
                    </div>
                </div>
        </li>
    </ul>
</div>
<!--市场-->
<div class="news-list">
    <div class="clearfix">
        <div class="pull-left list-tt">市场</div>
    </div>
    <div class="lind"><div class="lind-b"></div></div>
    <ul class="news-ul">
    <?php  
    if ($neican) {
        for($nei=3;$nei<8;$nei++) {
    ?>
        <li>
                <div class="clearfix">
                    <div class="pull-left news-img"><img style="width:140px;height:110px;" src="<?=($neican[$nei]['titlepic'])?$neican[$nei]['titlepic']:'images/08.jpg'?>"></div>
                    <div class="news-list-txt">
                        <div class="news-tt"><a href="newsdetail.php?mid=<?=$neican[$nei]['id']?>"><?=$neican[$nei]['title']?></a></div>
                        <div class="clearfix date">
                            <div class="pull-left guoji"><?=getClassname($neican[$nei]['classid'])?></div>
                            <div class="pull-left date-number"><?=getRelease($neican[$nei]['newstime'])?></div>
                        </div>
                        <div class="news-icon"><?=($neican[$nei]['plnum'])?></div>
                    </div>
                </div>
        </li>
    <?php }} ?>
    </ul>
    <a href="newslist.php?mid=36" class="news-more more-b"><span>查看更多</span></a>
</div>
<div class="clearfix welfare-1 welfare-hj">
    <div class="lianghui"><a href="newsdetail.php?mid=<?=$neican[8]['id']?>"><?=$neican[8]['title']?></a></div>
    <div class="show-col">
        <div class="col-xs-4 col-xs-4-f">
            <div class="head-r">独家</div>
            <a href="newsdetail.php?mid=<?=$neican[8]['id']?>">
                <img style="width:197px;height:123px;" src="<?=($neican[8]['titlepic'])?$neican[8]['titlepic']:'images/bao1.jpg'?>">
            </a>
        </div>
        <div class="col-xs-4 col-xs-4-m"><a href="newsdetail.php?mid=<?=$neican[9]['id']?>"><img style="width:197px;height:123px;" src="<?=($neican[9]['titlepic'])?$neican[9]['titlepic']:'images/bao2.jpg'?>"></a></div>
        <div class="col-xs-4 col-xs-4-l"><a href="newsdetail.php?mid=<?=$neican[10]['id']?>"><img style="width:197px;height:123px;" src="<?=($neican[10]['titlepic'])?$neican[10]['titlepic']:'images/bao3.jpg'?>"></a></div>
    </div>
    <div class="clearfix left-b1">
        <div class="pull-left guoji"><?=getClassname($neican[8]['classid'])?></div>
        <div class="pull-left house"><?=getRelease($neican[8]['newstime'])?></div>
        <div class="pull-right news-icon"><?=$neican[8]['plnum']?></div>
    </div>
</div>
<!--点评-->
<div class="news-list">
    <div class="clearfix">
        <div class="pull-left list-tt">点评</div>
    </div>
    <div class="lind"><div class="lind-b"></div></div>
    <ul class="news-ul">
    <?php  
    if ($ticai) {
        for($ti=0;$ti<5;$ti++) {
    ?>
        <li>
                <div class="clearfix">
                    <div class="pull-left news-img"><img style="width:140px;height:110px;" src="<?=($ticai[$ti]['titlepic'])?$ticai[$ti]['titlepic']:'images/08.jpg'?>"></div>
                    <div class="news-list-txt">
                        <div class="news-tt"><a href="newsdetail.php?mid=<?=$ticai[$ti]['id']?>"><?=$ticai[$ti]['title']?></a></div>
                        <div class="clearfix date">
                            <div class="pull-left guoji"><?=getClassname($ticai[$ti]['classid'])?></div>
                            <div class="pull-left date-number"><?=getRelease($ticai[$ti]['newstime'])?></div>
                        </div>
                        <div class="news-icon"><?=($ticai[$ti]['plnum'])?></div>
                    </div>
                </div>
        </li>
    <?php }} ?>
    </ul>
    <a href="newslist.php?mid=38" class="news-more more-b"><span>查看更多</span></a>
</div>
<div class="clearfix welfare-1 welfare-hj">
    <div class="lianghui"><a href="newsdetail.php?mid=<?=$ticai[5]['id']?>"><?=$ticai[5]['title']?></a></div>
    <div class="show-col">
        <div class="col-xs-4 col-xs-4-f">
            <div class="head-r">独家</div>
            <a href="newsdetail.php?mid=<?=$ticai[5]['id']?>">
                <img style="width:197px;height:123px;" src="<?=($ticai[5]['titlepic'])?$ticai[5]['titlepic']:'images/bao1.jpg'?>">
            </a>
        </div>
        <div class="col-xs-4 col-xs-4-m"><a href="newsdetail.php?mid=<?=$ticai[6]['id']?>"><img style="width:197px;height:123px;" src="<?=($ticai[6]['titlepic'])?$ticai[6]['titlepic']:'images/bao2.jpg'?>"></a></div>
        <div class="col-xs-4 col-xs-4-l"><a href="newsdetail.php?mid=<?=$ticai[7]['id']?>"><img style="width:197px;height:123px;" src="<?=($ticai[7]['titlepic'])?$ticai[7]['titlepic']:'images/bao3.jpg'?>"></a></div>
    </div>
    <div class="clearfix left-b1">
        <div class="pull-left guoji"><?=getClassname($ticai[5]['classid'])?></div>
        <div class="pull-left house"><?=getRelease($ticai[5]['newstime'])?></div>
        <div class="pull-right news-icon"><?=$ticai[5]['plnum']?></div>
    </div>
</div>
<!--银铂钯-->
<div class="news-list">
    <div class="clearfix">
        <div class="pull-left list-tt">银铂钯</div>
    </div>
    <div class="lind"><div class="lind-b"></div></div>
    <ul class="news-ul">
    <?php  
    if ($zhuli) {
        for($zhu=0;$zhu<5;$zhu++) {
    ?>
        <li>
                <div class="clearfix">
                    <div class="pull-left news-img"><img style="width:140px;height:110px;" src="<?=($zhuli[$zhu]['titlepic'])?$zhuli[$zhu]['titlepic']:'images/08.jpg'?>"></div>
                    <div class="news-list-txt">
                        <div class="news-tt"><a href="newsdetail.php?mid=<?=$zhuli[$zhu]['id']?>"><?=$zhuli[$zhu]['title']?></a></div>
                        <div class="clearfix date">
                            <div class="pull-left guoji"><?=getClassname($zhuli[$zhu]['classid'])?></div>
                            <div class="pull-left date-number"><?=getRelease($zhuli[$zhu]['newstime'])?></div>
                        </div>
                        <div class="news-icon"><?=($zhuli[$zhu]['plnum'])?></div>
                    </div>
                </div>
        </li>
    <?php }} ?>
    </ul>
    <a href="newslist.php?mid=39" class="news-more more-b"><span>查看更多</span></a>
</div>
<div class="clearfix welfare-1 welfare-hj">
    <div class="lianghui"><a href="newsdetail.php?mid=<?=$zhuli[5]['id']?>"><?=$zhuli[5]['title']?></a></div>
    <div class="show-col">
        <div class="col-xs-4 col-xs-4-f">
            <div class="head-r">独家</div>
            <a href="newsdetail.php?mid=<?=$zhuli[5]['id']?>">
                <img style="width:197px;height:123px;" src="<?=($zhuli[5]['titlepic'])?$zhuli[5]['titlepic']:'images/bao1.jpg'?>">
            </a>
        </div>
        <div class="col-xs-4 col-xs-4-m"><a href="newsdetail.php?mid=<?=$zhuli[6]['id']?>"><img style="width:197px;height:123px;" src="<?=($zhuli[6]['titlepic'])?$zhuli[6]['titlepic']:'images/bao2.jpg'?>"></a></div>
        <div class="col-xs-4 col-xs-4-l"><a href="newsdetail.php?mid=<?=$zhuli[7]['id']?>"><img style="width:197px;height:123px;" src="<?=($zhuli[7]['titlepic'])?$zhuli[7]['titlepic']:'images/bao3.jpg'?>"></a></div>
    </div>
    <div class="clearfix left-b1">
        <div class="pull-left guoji"><?=getClassname($zhuli[5]['classid'])?></div>
        <div class="pull-left house"><?=getRelease($zhuli[5]['newstime'])?></div>
        <div class="pull-right news-icon"><?=$zhuli[5]['plnum']?></div>
    </div>
</div>
<!--黄金现货-->
<div class="news-list">
    <div class="clearfix">
        <div class="pull-left list-tt">黄金现货</div>
    </div>
    <div class="lind"><div class="lind-b"></div></div>
    <ul class="news-ul">
    <?php  
    if ($mingjia) {
        for($ming=0;$ming<5;$ming++) {
    ?>
        <li>
                <div class="clearfix">
                    <div class="pull-left news-img"><img style="width:140px;height:110px;" src="<?=($mingjia[$ming]['titlepic'])?$mingjia[$ming]['titlepic']:'images/08.jpg'?>"></div>
                    <div class="news-list-txt">
                        <div class="news-tt"><a href="newsdetail.php?mid=<?=$mingjia[$ming]['id']?>"><?=$mingjia[$ming]['title']?></a></div>
                        <div class="clearfix date">
                            <div class="pull-left guoji"><?=getClassname($mingjia[$ming]['classid'])?></div>
                            <div class="pull-left date-number"><?=getRelease($mingjia[$ming]['newstime'])?></div>
                        </div>
                        <div class="news-icon"><?=($mingjia[$ming]['plnum'])?></div>
                    </div>
                </div>
        </li>
    <?php }} ?>
    </ul>
    <a href="newslist.php?mid=40" class="news-more more-b"><span>查看更多</span></a>
</div>
<div class="clearfix welfare-1 welfare-hj">
    <div class="lianghui"><a href="newsdetail.php?mid=<?=$mingjia[5]['id']?>"><?=$mingjia[5]['title']?></a></div>
    <div class="show-col">
        <div class="col-xs-4 col-xs-4-f">
            <div class="head-r">独家</div>
            <a href="newsdetail.php?mid=<?=$mingjia[5]['id']?>">
                <img style="width:197px;height:123px;" src="<?=($mingjia[5]['titlepic'])?$mingjia[5]['titlepic']:'images/bao1.jpg'?>">
            </a>
        </div>
        <div class="col-xs-4 col-xs-4-m"><a href="newsdetail.php?mid=<?=$mingjia[6]['id']?>"><img style="width:197px;height:123px;" src="<?=($mingjia[6]['titlepic'])?$mingjia[6]['titlepic']:'images/bao2.jpg'?>"></a></div>
        <div class="col-xs-4 col-xs-4-l"><a href="newsdetail.php?mid=<?=$mingjia[7]['id']?>"><img style="width:197px;height:123px;" src="<?=($mingjia[7]['titlepic'])?$mingjia[7]['titlepic']:'images/bao3.jpg'?>"></a></div>
    </div>
    <div class="clearfix left-b1">
        <div class="pull-left guoji"><?=getClassname($mingjia[5]['classid'])?></div>
        <div class="pull-left house"><?=getRelease($mingjia[5]['newstime'])?></div>
        <div class="pull-right news-icon"><?=$mingjia[5]['plnum']?></div>
    </div>
</div>
<!--宏观-->
<div class="news-list">
    <div class="clearfix">
        <div class="pull-left list-tt">宏观</div>
    </div>
    <div class="lind"><div class="lind-b"></div></div>
    <ul class="news-ul">
        <?php  
    if ($gongsi) {
        for($gong=0;$gong<5;$gong++) {
    ?>
        <li>
                <div class="clearfix">
                    <div class="pull-left news-img"><img style="width:140px;height:110px;" src="<?=($gongsi[$gong]['titlepic'])?$gongsi[$gong]['titlepic']:'images/08.jpg'?>"></div>
                    <div class="news-list-txt">
                        <div class="news-tt"><a href="newsdetail.php?mid=<?=$gongsi[$gong]['id']?>"><?=$gongsi[$gong]['title']?></a></div>
                        <div class="clearfix date">
                            <div class="pull-left guoji"><?=getClassname($gongsi[$gong]['classid'])?></div>
                            <div class="pull-left date-number"><?=getRelease($gongsi[$gong]['newstime'])?></div>
                        </div>
                        <div class="news-icon"><?=($gongsi[$gong]['plnum'])?></div>
                    </div>
                </div>
        </li>
    <?php }} ?>
    </ul>
    <a href="newslist.php?mid=37" class="news-more more-b"><span>查看更多</span></a>
</div>
<div class="clearfix welfare-1 welfare-hj">
    <div class="lianghui"><a href="newsdetail.php?mid=<?=$gongsi[5]['id']?>"><?=$gongsi[5]['title']?></a></div>
    <div class="show-col">
        <div class="col-xs-4 col-xs-4-f">
            <div class="head-r">独家</div>
            <a href="newsdetail.php?mid=<?=$gongsi[5]['id']?>">
                <img style="width:197px;height:123px;" src="<?=($gongsi[5]['titlepic'])?$gongsi[5]['titlepic']:'images/bao1.jpg'?>">
            </a>
        </div>
        <div class="col-xs-4 col-xs-4-m"><a href="newsdetail.php?mid=<?=$gongsi[6]['id']?>"><img style="width:197px;height:123px;" src="<?=($gongsi[6]['titlepic'])?$gongsi[6]['titlepic']:'images/bao2.jpg'?>"></a></div>
        <div class="col-xs-4 col-xs-4-l"><a href="newsdetail.php?mid=<?=$gongsi[7]['id']?>"><img style="width:197px;height:123px;" src="<?=($gongsi[7]['titlepic'])?$gongsi[7]['titlepic']:'images/bao3.jpg'?>"></a></div>
    </div>
    <div class="clearfix left-b1">
        <div class="pull-left guoji"><?=getClassname($gongsi[5]['classid'])?></div>
        <div class="pull-left house"><?=getRelease($gongsi[5]['newstime'])?></div>
        <div class="pull-right news-icon"><?=$gongsi[5]['plnum']?></div>
    </div>
</div>

<!--保险-->
<?php include 'foot.php'; ?>