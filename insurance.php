<?php  
$cur = 'insu';
$titlename = '保险板块';
include 'head.php';
//一级推荐
$isgood = getGood(4, 'isgood', 11);

//行业
$neican  = returnClassinfo(43, 12);
//公司
$ticai   = returnClassinfo(44, 5);
//攻略
$zhuli   = returnClassinfo(45, 5);
//新品
$mingjia = returnClassinfo(46, 5);

// echo '<pre>';
// print_r($zhuli);exit;
?>
<!--二级菜单导航-->
<div class="nav-down-list">
	<ul class="border-nav clearfix">
	<li><a href="/">首页</a></li>
	<li><a href="newslist.php?mid=43">行业</a></li>
	<li><a href="newslist.php?mid=44">公司</a></li>
 	<li><a href="newslist.php?mid=45">攻略</a></li>
	<li><a href="newslist.php?mid=46">新品</a></li>
	<li><a href="javascript:;">保险论坛</a></li>
	</ul>
</div>
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <a href="newsdetail.php?mid=<?=$isgood[0]['id']?>">
            <img src="http://www.teniunet.com<?=$isgood[0]['titlepic']?>" style="width:6.4rem;height:3.24rem" alt="..."></a>
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
            <img src="http://www.teniunet.com<?=$isgood[$i]['titlepic']?>" style="width:6.4rem;height:3.24rem" alt="..."></a>
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
<div class="news-list ">
    <ul class="news-ul first-ul">
        <li class="">
                <div class="clearfix welfare-1">
                    <div class="lianghui"><a href="newsdetail.php?mid=<?=$neican[0]['id']?>"><?=$neican[0]['title']?></a></div>
                    <div class="show-col">
                        <div class="col-xs-4 col-xs-4-f">
                            <div class="head-r">独家</div>
                            <a href="newsdetail.php?mid=<?=$neican[0]['id']?>">
                                <img style="width:1.97rem;height:1.23rem;" src="<?=($neican[0]['titlepic'])?'http://www.teniunet.com'.$neican[0]['titlepic']:'images/16.jpg'?>">
                            </a>
                        </div>
                        <div class="col-xs-4 col-xs-4-m"><a href="newsdetail.php?mid=<?=$neican[1]['id']?>"><img style="width:1.97rem;height:1.23rem;" src="<?=($neican[1]['titlepic'])?'http://www.teniunet.com'.$neican[1]['titlepic']:'images/bao2.jpg'?>"></a></div>
                        <div class="col-xs-4 col-xs-4-l"><a href="newsdetail.php?mid=<?=$neican[2]['id']?>"><img style="width:1.97rem;height:1.23rem;" src="<?=($neican[2]['titlepic'])?'http://www.teniunet.com'.$neican[2]['titlepic']:'images/bao3.jpg'?>"></a></div>
                    </div>
                    <div class="clearfix left-b1">
                        <div class="pull-left industry"><?=getClassname($neican[0]['classid'])?></div>
                        <div class="pull-left house"><?=getRelease($neican[0]['newstime'])?></div>
                        <div class="pull-right news-icon"><?=($neican[0]['plnum'])?></div>
                    </div>
                </div>
        </li>
        <li>
                <div class="clearfix">
                    <div class="pull-left news-img"><img src="<?=($neican[3]['titlepic'])?'http://www.teniunet.com'.$neican[3]['titlepic']:'images/01.jpg'?>"></div>
                    <div class="news-list-txt">
                        <div class="news-tt"><a href="newsdetail.php?mid=<?=$neican[3]['id']?>"><?=$neican[3]['title']?></a></div>
                        <div class="news-icon icon-none"><?=($neican[3]['plnum'])?></div>
                    </div>
                </div>
        </li>
        <li class="">
                <div class="clearfix welfare-166">
                    <div class="lianghui"><a href="newsdetail.php?mid=<?=$neican[4]['id']?>"><?=$neican[4]['title']?></a></div>
                    <div class="show-col">
                        <div class="col-xs-4 col-xs-4-f">
                            <div class="head-r">独家</div>
                            <a href="newsdetail.php?mid=<?=$neican[4]['id']?>">
                                <img style="width:1.97rem;height:1.23rem;" src="<?=($neican[4]['titlepic'])?'http://www.teniunet.com'.$neican[4]['titlepic']:'images/16.jpg'?>">
                            </a>
                        </div>
                        <div class="col-xs-4 col-xs-4-m"><a href="newsdetail.php?mid=<?=$neican[5]['id']?>"><img style="width:1.97rem;height:1.23rem;" src="<?=($neican[5]['titlepic'])?'http://www.teniunet.com'.$neican[1]['titlepic']:'images/bao2.jpg'?>"></a></div>
                        <div class="col-xs-4 col-xs-4-l"><a href="newsdetail.php?mid=<?=$neican[6]['id']?>"><img style="width:1.97rem;height:1.23rem;" src="<?=($neican[6]['titlepic'])?'http://www.teniunet.com'.$neican[2]['titlepic']:'images/bao3.jpg'?>"></a></div>
                    </div>
                    <div class="clearfix left-b1">
                        <div class="pull-left industry"><?=getClassname($neican[4]['classid'])?></div>
                        <div class="pull-left house"><?=getRelease($neican[4]['newstime'])?></div>
                        <div class="pull-right news-icon"><?=($neican[4]['plnum'])?></div>
                    </div>
                </div>
        </li>
    </ul>
</div>
<!--推荐-->
<div class="news-list ">
    <div class="clearfix">
        <div class="pull-left list-tt">推荐</div>
    </div>
    <div class="lind"><div class="lind-b"></div></div>
    <ul class="news-ul">
    <?php  
    if ($isgood) {
        for($is=6;$is<count($isgood);$is++) {
    ?>
        <li>
                <div class="clearfix">
                    <div class="pull-left news-img"><img src="<?=($isgood[$is]['titlepic'])?'http://www.teniunet.com'.$isgood[$is]['titlepic']:'images/08.jpg'?>"></div>
                    <div class="news-list-txt">
                        <div class="news-tt"><a href="newsdetail.php?mid=<?=$isgood[$is]['id']?>"><?=$isgood[$is]['title']?></a></div>
                        <div class="clearfix date">
                            <div class="pull-left guoji"><?=getClassname($isgood[$is]['classid'])?></div>
                            <div class="pull-left date-number"><?=getRelease($isgood[$is]['newstime'])?></div>
                        </div>
                        <div class="news-icon"><?=($isgood[$is]['plnum'])?></div>
                    </div>
                </div>
        </li>
    <?php }} ?>
    </ul>
    <a href="newslist.php?mid=43" class="news-more more-b"><span>查看更多</span></a>
</div>
<!--行业-->
<div class="news-list">
    <div class="clearfix">
        <div class="pull-left list-tt">行业</div>
    </div>
    <div class="lind"><div class="lind-b"></div></div>
    <ul class="news-ul">
    <?php  
    if($neican) {
        for($nei=7;$nei<count($neican);$nei++) {
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
    <a href="newslist.php?mid=43" class="news-more more-b"><span>查看更多</span></a>
</div>
<!--公司-->
<div class="news-list">
    <div class="clearfix">
        <div class="pull-left list-tt">公司</div>
    </div>
    <div class="lind"><div class="lind-b"></div></div>
    <ul class="news-ul">
        <?php  
    if($ticai) {
        for($ti=0;$ti<count($ticai);$ti++) {
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
    <a href="newslist.php?mid=44" class="news-more more-b"><span>查看更多</span></a>
</div>
<!--攻略-->
<div class="news-list">
    <div class="clearfix">
        <div class="pull-left list-tt">攻略</div>
    </div>
    <div class="lind"><div class="lind-b"></div></div>
    <ul class="news-ul">
        <?php  
    if($zhuli) {
        for($zhu=0;$zhu<count($zhuli);$zhu++) {
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
    <a href="newslist.php?mid=45" class="news-more more-b"><span>查看更多</span></a>
</div>
<!--新品-->
<div class="news-list">
    <div class="clearfix">
        <div class="pull-left list-tt">新品</div>
    </div>
    <div class="lind"><div class="lind-b"></div></div>
    <ul class="news-ul">
        <?php  
    if($mingjia) {
        for($ming=0;$ming<count($mingjia);$ming++) {
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
    <a href="newslist.php?mid=46" class="news-more more-b"><span>查看更多</span></a>
</div>
<!--保险-->
<?php include 'foot.php'; ?>