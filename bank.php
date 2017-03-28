<?php  
$cur = 'bank';
$titlename = '银行板块';
include 'head.php';
//一级推荐
$isgood = getGood(7, 'isgood');

//点击率最高的文章
$hang    = getBestClick(29);
$dian    = getBestClick(30);
$licai   = getBestClick(31);
$jian    = getBestClick(32);
$guozi   = getBestClick(33);

//行业
$neican  = returnClassinfo(29, 13);
//点评
$ticai   = returnClassinfo(30, 6);
//理财
$zhuli   = returnClassinfo(31, 6);
//监管
$mingjia = returnClassinfo(32, 6);

// echo '<pre>';
// print_r($guozi);exit;
?>
<!--二级菜单导航-->
<div class="nav-down-list">
	<ul class="border-nav clearfix">
	<li><a href="/">首页</a></li>
	<li><a href="newslist.php?mid=29">行业</a></li>
	<li><a href="newslist.php?mid=30">点评</a></li>
 	<li><a href="newslist.php?mid=31">理财</a></li>
	<li><a href="newslist.php?mid=32">监管</a></li>
	<li><a href="newslist.php?mid=33">国资</a></li>
    <li><a href="newslist.php?mid=34">人物</a></li>
    <li><a href="newslist.php?mid=35">IT银行</a></li>
	<li><a href="javascript:;">银行论坛</a></li>
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
<div class="bank-list">
    <ul class="all-ul">
        <li><a href="">
            <div class="title-li">行业</div>
            <div class="cont-lit"><a href="newsdetail.php?mid=<?=$hang['id']?>"><?=$hang['title']?></a></div>
        </a></li>
        <li><a href="">
            <div class="title-li">点评</div>
            <div class="cont-lit"><a href="newsdetail.php?mid=<?=$dian['id']?>"><?=$dian['title']?></a></div>
        </a></li>
        <li><a href="">
            <div class="title-li">理财</div>
            <div class="cont-lit"><a href="newsdetail.php?mid=<?=$licai['id']?>"><?=$licai['title']?></a></div>
        </a></li>
        <li><a href="">
            <div class="title-li">监管</div>
            <div class="cont-lit"><a href="newsdetail.php?mid=<?=$jian['id']?>"><?=$jian['title']?></a></div>
        </a></li>
        <li><a href="">
            <div class="title-li">国资</div>
            <div class="cont-lit"><a href="newsdetail.php?mid=<?=$guozi['id']?>"><?=$guozi['title']?></a></div>
        </a></li>
        <li>
            <div class="clearfix">
                <div class="pull-left icon-lil">推荐</div>
                <div class="pull-right icon-lir"><img src="images/icon03.png" alt=""></div>
            </div>
        </li>
        <li>
                <div class="clearfix">
                    <div class="pull-left news-img"><img style="width:140px;height:110px;" src="<?=($neican[0]['titlepic'])?$neican[0]['titlepic']:'images/09.jpg'?>"></div>
                    <div class="news-list-txt">
                        <div class="news-tt"><a href="newsdetail.php?mid=<?=$neican[0]['id']?>"><?=$neican[0]['title']?></a></div>
                        <div class="clearfix date">
                            <div class="pull-left date-number"><?=getRelease($neican[0]['newstime'])?></div>
                        </div>
                        <div class="news-icon"><?=$neican[0]['plnum']?></div>
                    </div>
                </div>
            </a>
        </li>
    </ul>
</div>


<div class="news-list list-wh">
    <div class="clearfix bank-fix">
        <div class="pull-left bank-tt">精品推荐</div>
    </div>
    <div class="lind bank-line"><div class="lind-b"></div></div>
    <ul class="news-ul">
    <?php  
    if($neican) {
        for ($nei=1;$nei<4;$nei++) {
    ?>
        <li>
                <div class="clearfix">
                    <div class="pull-left news-img"><img style="width:140px;height:110px;" src="<?=($neican[$nei]['titlepic'])?$neican[$nei]['titlepic']:'images/08.jpg'?>"></div>
                    <div class="news-list-txt">
                        <div class="news-tt"><a href="newsdetail.php?mid=<?=$neican[$nei]['id']?>"><?=$neican[$nei]['title']?></a></div>
                        <div class="news-icon"><?=$neican[$nei]['plnum']?></div>
                    </div>
                </div>
        </li>
    <?php }} ?>
    </ul>
    <div class="clearfix welfare-im ">
        <div class="bank-tl"><a href="newsdetail.php?mid=<?=$neican[4]['id']?>"><?=$neican[4]['title']?></a></div>
            <div class="col-xs-6 col-xs-6-wd1">
                <div class="adsf">
                    <a href="newsdetail.php?mid=<?=$neican[5]['id']?>">
                    <img style="width:297px;height:132px;" src="<?=($neican[$nei]['titlepic'])?$neican[$nei]['titlepic']:'images/16.jpg'?>"></a>
                    <div class="col-xs-6-b66"><?=$neican[5]['title']?></div>
                </div>
            </div>
            <div class="col-xs-6 col-xs-6-wd2">
                <div class="adsf">
                    <a href="newsdetail.php?mid=<?=$neican[6]['id']?>">
                    <img style="width:297px;height:132px;" src="<?=($neican[$nei]['titlepic'])?$neican[$nei]['titlepic']:'images/17.jpg'?>"></a>
                    <div class="col-xs-6-b66"><?=$neican[6]['title']?></div>
                </div>
            </div>
    </div>
</div>
<!--行业-->
<div class="news-list">
    <div class="clearfix">
        <div class="pull-left list-tt">行业</div>
    </div>
    <div class="lind"><div class="lind-b"></div></div>
    <ul class="news-ul">
    <?php  
    if ($neican) {
        for($nei2=7;$nei2<12;$nei2++) {
    ?>
        <li>
                <div class="clearfix">
                    <div class="pull-left news-img"><img style="width:140px;height:110px;" src="<?=($neican[$nei2]['titlepic'])?$neican[$nei2]['titlepic']:'images/08.jpg'?>"></div>
                    <div class="news-list-txt">
                        <div class="news-tt"><a href="newsdetail.php?mid=<?=$neican[$nei2]['id']?>"><?=$neican[$nei2]['title']?></a></div>
                        <div class="clearfix date">
                            <div class="pull-left guoji"><?=getClassname($neican[$nei2]['classid'])?></div>
                            <div class="pull-left date-number"><?=getRelease($neican[$nei2]['newstime'])?></div>
                        </div>
                        <div class="news-icon"><?=$neican[$nei2]['plnum']?></div>
                    </div>
                </div>
        </li>
    <?php }} ?>
    </ul>
    <a href="newslist.php?mid=29" class="news-more more-b"><span>查看更多</span></a>
</div>
<div class="clearfix welfare-1 welfare-cai">
    <div class="lianghui"><a href="newsdetail.php?mid=<?=$neican[12]['id']?>"><?=$neican[12]['title']?></a></div>
    <div class="show-col show-icai">
        <a href="newsdetail.php?mid=<?=$neican[12]['id']?>">
        <img style="width:608px;height:271px;" src="<?=($neican[12]['titlepic'])?$neican[12]['titlepic']:'images/13.png'?>"></a>
        <div class="head-r">独家</div>
    </div>
    <div class="clearfix left-b1">
        <div class="pull-left industry"><?=getClassname($neican[12]['classid'])?></div>
        <div class="pull-left house"><?=getRelease($neican[12]['newstime'])?></div>
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
                        <div class="news-icon"><?=$ticai[$ti]['plnum']?></div>
                    </div>
                </div>
        </li>
    <?php }} ?>
    </ul>
    <a href="newslist.php?mid=30" class="news-more more-b"><span>查看更多</span></a>
</div>
<div class="clearfix welfare-1 welfare-cai">
    <div class="lianghui"><a href="newsdetail.php?mid=<?=$ticai[5]['id']?>"><?=$ticai[5]['title']?></a></div>
    <div class="show-col show-icai">
        <a href="newsdetail.php?mid=<?=$ticai[5]['id']?>">
        <img style="width:608px;height:271px;" src="<?=($ticai[5]['titlepic'])?$ticai[5]['titlepic']:'images/13.png'?>"></a>
        <div class="head-r">独家</div>
    </div>
    <div class="clearfix left-b1">
        <div class="pull-left industry"><?=getClassname($ticai[5]['classid'])?></div>
        <div class="pull-left house"><?=getRelease($ticai[5]['newstime'])?></div>
    </div>
</div>
<!--理财-->
<div class="news-list">
    <div class="clearfix">
        <div class="pull-left list-tt">理财</div>
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
                        <div class="news-icon"><?=$zhuli[$zhu]['plnum']?></div>
                    </div>
                </div>
        </li>
    <?php }} ?>
    </ul>
    <a href="newslist.php?mid=31" class="news-more more-b"><span>查看更多</span></a>
</div>
<div class="clearfix welfare-1 welfare-cai">
    <div class="lianghui"><a href="newsdetail.php?mid=<?=$zhuli[5]['id']?>"><?=$zhuli[5]['title']?></a></div>
    <div class="show-col show-icai">
        <a href="newsdetail.php?mid=<?=$zhuli[5]['id']?>">
        <img style="width:608px;height:271px;" src="<?=($zhuli[5]['titlepic'])?$zhuli[5]['titlepic']:'images/13.png'?>"></a>
        <div class="head-r">独家</div>
    </div>
    <div class="clearfix left-b1">
        <div class="pull-left industry"><?=getClassname($zhuli[5]['classid'])?></div>
        <div class="pull-left house"><?=getRelease($zhuli[5]['newstime'])?></div>
    </div>
</div>
<!--监管-->
<div class="news-list">
    <div class="clearfix">
        <div class="pull-left list-tt">监管</div>
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
                        <div class="news-icon"><?=$mingjia[$ming]['plnum']?></div>
                    </div>
                </div>
        </li>
    <?php }} ?>
    </ul>
    <a href="newslist.php?mid=32" class="news-more more-b"><span>查看更多</span></a>
</div>
<div class="clearfix welfare-1 welfare-cai">
    <div class="lianghui"><a href="newsdetail.php?mid=<?=$mingjia[5]['id']?>"><?=$mingjia[5]['title']?></a></div>
    <div class="show-col show-icai">
        <a href="newsdetail.php?mid=<?=$mingjia[5]['id']?>">
        <img style="width:608px;height:271px;" src="<?=($mingjia[5]['titlepic'])?$mingjia[5]['titlepic']:'images/13.png'?>"></a>
        <div class="head-r">独家</div>
    </div>
    <div class="clearfix left-b1">
        <div class="pull-left industry"><?=getClassname($mingjia[5]['classid'])?></div>
        <div class="pull-left house"><?=getRelease($mingjia[5]['newstime'])?></div>
    </div>
</div>
<!--保险-->
<?php include 'foot.php'; ?>