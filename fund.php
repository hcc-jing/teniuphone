<?php  
$cur = 'funds';
$titlename = '基金板块';
include 'head.php';
//一级推荐
$isgood = getGood(2, 'isgood', 7);

//上证基金
$sh = getShareinfo('sh000011');
//深证基金
$sz = getShareinfo('sz399305');

//要闻
$neican  = returnClassinfo(16, 8);
//观点
$ticai   = returnClassinfo(17, 8);
//学院
$zhuli   = returnClassinfo(18, 8);

// echo '<pre>';
// print_r($sz);exit;
?>
<!--二级菜单导航-->
<div class="nav-down-list">
    <ul class="border-nav clearfix">
    <li><a href="/">首页</a></li>
    <li><a href="newslist.php?mid=16">要闻</a></li>
    <li><a href="newslist.php?mid=17">观点</a></li>
    <li><a href="newslist.php?mid=18">学院</a></li>
    <li><a href="javascript:;">净值</a></li>
    <li><a href="javascript:;">基金超市</a></li>
    <li><a href="javascript:;">行情中心</a></li>
    <li><a href="javascript:;">基金论坛</a></li>
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
                    <div class="pull-right"><span><?=$i?>/</span>6</div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div><div class="cont-th">
    <div class="label-tc"><a href="newsdetail.php?mid=<?=$isgood[0]['id']?>"><?=$isgood[0]['title']?></a></div>
</div>
<div class="clearfix bottom-jj">
    <div class="col-xs-6 col-xs-6-r">
        <div class="cont-tt">上证基金</div>
        <div class="cont-tt<?=($sh['rate']>0)?'1':'2'?>"><?=$sh['dot']?></div>
        <div class="cont-tt<?=($sh['rate']>0)?'4':'3'?>">
            <span><?=$sh['nowPic']?></span>&nbsp;&nbsp;
            <span><?=$sh['rate']?>%</span>
        </div>
    </div>
    <div class="col-xs-6 col-xs-6-r">
        <div class="cont-tt">深证基金</div>
        <div class="cont-tt<?=($sz['rate']>0)?'1':'2'?>"><?=$sz['dot']?></div>
        <div class="cont-tt<?=($sz['rate']>0)?'4':'3'?>">
            <span><?=$sz['nowPic']?></span>&nbsp;&nbsp;
            <span><?=$sz['rate']?>%</span>
        </div>
    </div>
</div>

<!--要闻-->
<div class="news-list none-top">
    <ul class="news-ulj">
        <li>
                <div class="clearfix welfare-1 ">
                    <div class="title-jj"><a href="newsdetail.php?mid=<?=$neican[0]['id']?>"><?=$neican[0]['title']?></a></div>
                    <div class="show-col show-icai">
                    <a href="newsdetail.php?mid=<?=$neican[0]['id']?>">
                       <img style="width:608px;height:210px;" src="<?=($neican[0]['titlepic'])?$neican[0]['titlepic']:'images/15.jpg'?>">
                    </a>
                        <div class="head-r">独家</div>
                        <div class="news-img-ttss"><?=$neican[0]['title']?></div>
                    </div>
                    <div class="clearfix left-b1">
                        <div class="pull-left industry"><?=getClassname($neican[0]['classid'])?></div>
                        <div class="pull-left house"><?=getRelease($neican[0]['newstime'])?></div>
                        <div class="news-icon"><?=$neican[0]['plnum']?></div>
                    </div>
                </div>
        </li>
        <li>
                <div class="clearfix welfare-1 ">
                    <div class="lianghui-jj mystyle"><a href="newsdetail.php?mid=<?=$neican[1]['id']?>"><?=$neican[1]['title']?></a></div>
                    <div class="show-col">
                        <div class="col-xs-4 col-xs-4-f">
                        <a href="newsdetail.php?mid=<?=$neican[1]['id']?>">
                            <img style="width:197px;height:123px;" src="<?=($neican[1]['titlepic'])?$neican[1]['titlepic']:'images/bao1.jpg'?>">
                        </a>
                        </div>
                        <div class="col-xs-4 col-xs-4-m"><a href="newsdetail.php?mid=<?=$neican[2]['id']?>"><img style="width:197px;height:123px;" src="<?=($neican[2]['titlepic'])?$neican[2]['titlepic']:'images/bao2.jpg'?>"></a></div>
                    <div class="col-xs-4 col-xs-4-l"><a href="newsdetail.php?mid=<?=$neican[3]['id']?>"><img style="width:197px;height:123px;" src="<?=($neican[3]['titlepic'])?$neican[3]['titlepic']:'images/bao3.jpg'?>"></a></div>
                    </div>
                    <div class="clearfix left-b1">
                        <div class="pull-left house"><?=getRelease($neican[1]['newstime'])?></div>
                        <div class="pull-right news-icon"><?=$neican[1]['plnum']?></div>
                    </div>
                </div>
        </li>
    </ul>
    <div class="clearfix">
        <div class="pull-left list-tt list-jj">要闻</div>
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
    <a href="newslist.php?mid=16" class="news-more more-b"><span>查看更多</span></a>
</div>
<!--观点-->
<div class="news-list">
    <ul class="news-ulj">
        <li>
                <div class="clearfix welfare-1 ">
                    <div class="title-jj"><a href="newsdetail.php?mid=<?=$ticai[0]['id']?>"><?=$ticai[0]['title']?></a></div>
                    <div class="show-col show-icai">
                    <a href="newsdetail.php?mid=<?=$ticai[0]['id']?>">
                       <img style="width:608px;height:210px;" src="<?=($ticai[0]['titlepic'])?$ticai[0]['titlepic']:'images/15.jpg'?>">
                    </a>
                        <div class="head-r">独家</div>
                        <div class="news-img-ttss"><?=$ticai[0]['title']?></div>
                    </div>
                    <div class="clearfix left-b1">
                        <div class="pull-left industry"><?=getClassname($ticai[0]['classid'])?></div>
                        <div class="pull-left house"><?=getRelease($ticai[0]['newstime'])?></div>
                        <div class="news-icon"><?=$ticai[0]['plnum']?></div>
                    </div>
                </div>
        </li>
        <li>
                <div class="clearfix welfare-1 ">
                    <div class="lianghui-jj mystyle"><a href="newsdetail.php?mid=<?=$ticai[1]['id']?>"><?=$ticai[1]['title']?></a></div>
                    <div class="show-col">
                        <div class="col-xs-4 col-xs-4-f">
                        <a href="newsdetail.php?mid=<?=$ticai[1]['id']?>">
                            <img style="width:197px;height:123px;" src="<?=($ticai[1]['titlepic'])?$ticai[1]['titlepic']:'images/bao1.jpg'?>">
                        </a>
                        </div>
                        <div class="col-xs-4 col-xs-4-m"><a href="newsdetail.php?mid=<?=$ticai[2]['id']?>"><img style="width:197px;height:123px;" src="<?=($ticai[2]['titlepic'])?$ticai[2]['titlepic']:'images/bao2.jpg'?>"></a></div>
                    <div class="col-xs-4 col-xs-4-l"><a href="newsdetail.php?mid=<?=$ticai[3]['id']?>"><img style="width:197px;height:123px;" src="<?=($ticai[3]['titlepic'])?$ticai[3]['titlepic']:'images/bao3.jpg'?>"></a></div>
                    </div>
                    <div class="clearfix left-b1">
                        <div class="pull-left house"><?=getRelease($ticai[1]['newstime'])?></div>
                        <div class="pull-right news-icon"><?=$ticai[1]['plnum']?></div>
                    </div>
                </div>
        </li>
    </ul>
    <div class="clearfix">
        <div class="pull-left list-tt list-jj">观点</div>
    </div>
    <div class="lind"><div class="lind-b"></div></div>
    <ul class="news-ul">
        <?php  
        if($ticai) {
            for($ti=0;$ti<5;$ti++) {
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
    <a href="newslist.php?mid=17" class="news-more more-b"><span>查看更多</span></a>
</div>
<!--学院-->
<div class="news-list">
    <ul class="news-ulj">
        <li>
                <div class="clearfix welfare-1 ">
                    <div class="title-jj"><a href="newsdetail.php?mid=<?=$zhuli[0]['id']?>"><?=$zhuli[0]['title']?></a></div>
                    <div class="show-col show-icai">
                    <a href="newsdetail.php?mid=<?=$zhuli[0]['id']?>">
                       <img style="width:608px;height:210px;" src="<?=($zhuli[0]['titlepic'])?$zhuli[0]['titlepic']:'images/15.jpg'?>">
                    </a>
                        <div class="head-r">独家</div>
                        <div class="news-img-ttss"><?=$zhuli[0]['title']?></div>
                    </div>
                    <div class="clearfix left-b1">
                        <div class="pull-left industry"><?=getClassname($zhuli[0]['classid'])?></div>
                        <div class="pull-left house"><?=getRelease($zhuli[0]['newstime'])?></div>
                        <div class="news-icon"><?=$zhuli[0]['plnum']?></div>
                    </div>
                </div>
        </li>
        <li>
                <div class="clearfix welfare-1 ">
                    <div class="lianghui-jj mystyle"><a href="newsdetail.php?mid=<?=$zhuli[1]['id']?>"><?=$zhuli[1]['title']?></a></div>
                    <div class="show-col">
                        <div class="col-xs-4 col-xs-4-f">
                        <a href="newsdetail.php?mid=<?=$zhuli[1]['id']?>">
                            <img style="width:197px;height:123px;" src="<?=($zhuli[1]['titlepic'])?$zhuli[1]['titlepic']:'images/bao1.jpg'?>">
                        </a>
                        </div>
                        <div class="col-xs-4 col-xs-4-m"><a href="newsdetail.php?mid=<?=$zhuli[2]['id']?>"><img style="width:197px;height:123px;" src="<?=($zhuli[2]['titlepic'])?$zhuli[2]['titlepic']:'images/bao2.jpg'?>"></a></div>
                    <div class="col-xs-4 col-xs-4-l"><a href="newsdetail.php?mid=<?=$zhuli[3]['id']?>"><img style="width:197px;height:123px;" src="<?=($zhuli[3]['titlepic'])?$zhuli[3]['titlepic']:'images/bao3.jpg'?>"></a></div>
                    </div>
                    <div class="clearfix left-b1">
                        <div class="pull-left house"><?=getRelease($zhuli[1]['newstime'])?></div>
                        <div class="pull-right news-icon"><?=$zhuli[1]['plnum']?></div>
                    </div>
                </div>
        </li>
    </ul>
    <div class="clearfix">
        <div class="pull-left list-tt list-jj">学院</div>
    </div>
    <div class="lind"><div class="lind-b"></div></div>
    <ul class="news-ul">
        <?php  
        if($zhuli) {
            for($zhu=0;$zhu<5;$zhu++) {
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
    <a href="newslist.php?mid=18" class="news-more more-b"><span>查看更多</span></a>
</div>

<!--保险-->
<?php include 'foot.php'; ?>