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
$mingjia = returnClassinfo(22, 10);

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
	<li><a href="newslist.php?mid=22">人民币</a></li>
	<li><a href="newslist.php?mid=23">欧元</a></li>
    <li><a href="newslist.php?mid=24">英镑</a></li>
    <li><a href="newslist.php?mid=25">日元</a></li>
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
            <span><?=$current['data8']['diffAmo']?></span>
            <span><?=$current['data8']['diffPer']?></span>
        </div>
    </div>
    <div class="col-xs-6 col-xs-6-r">
        <div class="cont-tt"><?=$current['data2']['currency']?></div>
        <div class="cont-tt<?=($current['data2']['diffAmo']>0)?'1':'2'?>"><?=$current['data2']['buyPic']?></div>
        <div class="cont-tt<?=($current['data2']['diffAmo']>0)?'4':'3'?>">
            <span><?=$current['data2']['diffAmo']?></span>
            <span><?=$current['data2']['diffPer']?></span>
        </div>
    </div>
</div>

<!--市场动态-->
<div class="news-list list-wh ">
    <ul class="news-ul first-ul">
        <li class="first-li">
            <a href="">
                <div class="clearfix welfare-1">
                    <div class="lianghui">有人收到了消息  美联储本周加息25个</div>
                    <div class="show-col">
                        <div class="col-xs-4 col-xs-4-f">
                            <img src="images/bao1.jpg" alt="">
                        </div>
                        <div class="col-xs-4 col-xs-4-m"><a href=""><img src="images/bao2.jpg" alt=""></a></div>
                        <div class="col-xs-4 col-xs-4-l"><a href=""><img src="images/bao3.jpg" alt=""></a></div>
                    </div>
                    <div class="clearfix left-b1">
                        <div class="pull-left house">3小时前</div>
                        <div class="pull-right news-icon">34</div>
                    </div>
                </div>
            </a>
        </li>
        <li>
            <a href="">
                <div class="clearfix welfare-1 ">
                    <div class="title-wh title-top">[两会福利]有人收到了消息  美联储本周加息25个</div>
                    <div class="show-col show-icai">
                        <img src="images/15.jpg" alt="">
                        <div class="head-r">独家</div>
                        <div class="head-b">有人收到了消息 美联储本周加息</div>
                    </div>
                    <div class="clearfix left-b1">
                        <div class="pull-left industry">国 际</div>
                        <div class="pull-left house">3小时前</div>
                        <div class="news-icon">34</div>
                    </div>
                </div>
            </a>
        </li>
        <li class="have-line">
            <a href="">
                <div class="clearfix">
                    <div class="pull-left news-img"><img src="images/01.jpg"></div>
                    <div class="news-list-txt">
                        <div class="news-tt">有人收到了消息  美联储本周加息25个</div>
                        <div class="clearfix date">
                            <div class="pull-left guoji">国 际</div>
                            <div class="pull-left date-number">3小时前</div>
                        </div>
                        <div class="news-icon icon-none">34</div>
                    </div>
                </div>
            </a>
        </li>
    </ul>
    <div class="clearfix waihui-tt">
        <div class="pull-left list-tt">市场动态</div>
    </div>
    <div class="lind"><div class="lind-b"></div></div>
    <ul class="news-ul">
        <li>
            <a href="">
                <div class="clearfix">
                    <div class="news-list-txt bao-list-text">
                        <div class="news-tt">有人收到了消息  美联储本周加息25个 有人收到了消息  美联储本周加息25个</div>
                        <div class="clearfix date bao-date">
                            <div class="pull-left date-number">3小时前</div>
                        </div>
                        <div class="news-icon">34</div>
                    </div>
                </div>
            </a>
        </li>
        <li>
            <a href="">
                <div class="clearfix">
                    <div class="news-list-txt bao-list-text">
                        <div class="news-tt">有人收到了消息  美联储本周加息25个 有人收到了消息  美联储本周加息25个</div>
                        <div class="clearfix date bao-date">
                            <div class="pull-left date-number">3小时前</div>
                        </div>
                        <div class="news-icon">34</div>
                    </div>
                </div>
            </a>
        </li>
        <li>
            <a href="">
                <div class="clearfix">
                    <div class="news-list-txt bao-list-text">
                        <div class="news-tt">有人收到了消息  美联储本周加息25个 有人收到了消息  美联储本周加息25个</div>
                        <div class="clearfix date bao-date">
                            <div class="pull-left date-number">3小时前</div>
                        </div>
                        <div class="news-icon">34</div>
                    </div>
                </div>
            </a>
        </li>
        <li>
            <a href="">
                <div class="clearfix">
                    <div class="news-list-txt bao-list-text">
                        <div class="news-tt">有人收到了消息  美联储本周加息25个 有人收到了消息  美联储本周加息25个</div>
                        <div class="clearfix date bao-date">
                            <div class="pull-left date-number">3小时前</div>
                        </div>
                        <div class="news-icon">34</div>
                    </div>
                </div>
            </a>
        </li>
        <li>
            <a href="">
                <div class="clearfix">
                    <div class="news-list-txt bao-list-text">
                        <div class="news-tt">有人收到了消息  美联储本周加息25个 有人收到了消息  美联储本周加息25个</div>
                        <div class="clearfix date bao-date">
                            <div class="pull-left date-number">3小时前</div>
                        </div>
                        <div class="news-icon">34</div>
                    </div>
                </div>
            </a>
        </li>
    </ul>
    <a href="" class="news-more more-b"><span>查看更多</span></a>
</div>
<!--汇市研究-->
<div class="news-list no-padding-top ">
    <ul class="news-ul first-ul">
        <li class="first-li">
            <a href="">
                <div class="clearfix welfare-1">
                    <div class="lianghui">有人收到了消息  美联储本周加息25个</div>
                    <div class="show-col">
                        <div class="col-xs-4 col-xs-4-f">
                            <img src="images/bao1.jpg" alt="">
                        </div>
                        <div class="col-xs-4 col-xs-4-m"><a href=""><img src="images/bao2.jpg" alt=""></a></div>
                        <div class="col-xs-4 col-xs-4-l"><a href=""><img src="images/bao3.jpg" alt=""></a></div>
                    </div>
                    <div class="clearfix left-b1">
                        <div class="pull-left house">3小时前</div>
                        <div class="pull-right news-icon">34</div>
                    </div>
                </div>
            </a>
        </li>
        <li>
            <a href="">
                <div class="clearfix welfare-1 ">
                    <div class="title-wh title-top">[两会福利]有人收到了消息  美联储本周加息25个</div>
                    <div class="show-col show-icai">
                        <img src="images/15.jpg" alt="">
                        <div class="head-r">独家</div>
                        <div class="head-b">有人收到了消息 美联储本周加息</div>
                    </div>
                    <div class="clearfix left-b1">
                        <div class="pull-left industry">国 际</div>
                        <div class="pull-left house">3小时前</div>
                        <div class="news-icon">34</div>
                    </div>
                </div>
            </a>
        </li>
        <li class="have-line">
            <a href="">
                <div class="clearfix">
                    <div class="pull-left news-img"><img src="images/01.jpg"></div>
                    <div class="news-list-txt">
                        <div class="news-tt">有人收到了消息  美联储本周加息25个</div>
                        <div class="clearfix date">
                            <div class="pull-left guoji">国 际</div>
                            <div class="pull-left date-number">3小时前</div>
                        </div>
                        <div class="news-icon icon-none">34</div>
                    </div>
                </div>
            </a>
        </li>
    </ul>
    <div class="clearfix waihui-tt">
        <div class="pull-left list-tt">汇市研究</div>
    </div>
    <div class="lind"><div class="lind-b"></div></div>
    <ul class="news-ul">
        <li>
            <a href="">
                <div class="clearfix">
                    <div class="news-list-txt bao-list-text">
                        <div class="news-tt">有人收到了消息  美联储本周加息25个 有人收到了消息  美联储本周加息25个</div>
                        <div class="clearfix date bao-date">
                            <div class="pull-left date-number">3小时前</div>
                        </div>
                        <div class="news-icon">34</div>
                    </div>
                </div>
            </a>
        </li>
        <li>
            <a href="">
                <div class="clearfix">
                    <div class="news-list-txt bao-list-text">
                        <div class="news-tt">有人收到了消息  美联储本周加息25个 有人收到了消息  美联储本周加息25个</div>
                        <div class="clearfix date bao-date">
                            <div class="pull-left date-number">3小时前</div>
                        </div>
                        <div class="news-icon">34</div>
                    </div>
                </div>
            </a>
        </li>
        <li>
            <a href="">
                <div class="clearfix">
                    <div class="news-list-txt bao-list-text">
                        <div class="news-tt">有人收到了消息  美联储本周加息25个 有人收到了消息  美联储本周加息25个</div>
                        <div class="clearfix date bao-date">
                            <div class="pull-left date-number">3小时前</div>
                        </div>
                        <div class="news-icon">34</div>
                    </div>
                </div>
            </a>
        </li>
        <li>
            <a href="">
                <div class="clearfix">
                    <div class="news-list-txt bao-list-text">
                        <div class="news-tt">有人收到了消息  美联储本周加息25个 有人收到了消息  美联储本周加息25个</div>
                        <div class="clearfix date bao-date">
                            <div class="pull-left date-number">3小时前</div>
                        </div>
                        <div class="news-icon">34</div>
                    </div>
                </div>
            </a>
        </li>
        <li>
            <a href="">
                <div class="clearfix">
                    <div class="news-list-txt bao-list-text">
                        <div class="news-tt">有人收到了消息  美联储本周加息25个 有人收到了消息  美联储本周加息25个</div>
                        <div class="clearfix date bao-date">
                            <div class="pull-left date-number">3小时前</div>
                        </div>
                        <div class="news-icon">34</div>
                    </div>
                </div>
            </a>
        </li>
    </ul>
    <a href="" class="news-more more-b"><span>查看更多</span></a>
</div>
<!--美元-->
<div class="news-list  no-padding-top">
    <ul class="news-ul first-ul">
        <li class="first-li">
            <a href="">
                <div class="clearfix welfare-1">
                    <div class="lianghui">有人收到了消息  美联储本周加息25个</div>
                    <div class="show-col">
                        <div class="col-xs-4 col-xs-4-f">
                            <img src="images/bao1.jpg" alt="">
                        </div>
                        <div class="col-xs-4 col-xs-4-m"><a href=""><img src="images/bao2.jpg" alt=""></a></div>
                        <div class="col-xs-4 col-xs-4-l"><a href=""><img src="images/bao3.jpg" alt=""></a></div>
                    </div>
                    <div class="clearfix left-b1">
                        <div class="pull-left house">3小时前</div>
                        <div class="pull-right news-icon">34</div>
                    </div>
                </div>
            </a>
        </li>
        <li>
            <a href="">
                <div class="clearfix welfare-1 ">
                    <div class="title-wh title-top">[两会福利]有人收到了消息  美联储本周加息25个</div>
                    <div class="show-col show-icai">
                        <img src="images/15.jpg" alt="">
                        <div class="head-r">独家</div>
                        <div class="head-b">有人收到了消息 美联储本周加息</div>
                    </div>
                    <div class="clearfix left-b1">
                        <div class="pull-left industry">国 际</div>
                        <div class="pull-left house">3小时前</div>
                        <div class="news-icon">34</div>
                    </div>
                </div>
            </a>
        </li>
        <li class="have-line">
            <a href="">
                <div class="clearfix">
                    <div class="pull-left news-img"><img src="images/01.jpg"></div>
                    <div class="news-list-txt">
                        <div class="news-tt">有人收到了消息  美联储本周加息25个</div>
                        <div class="clearfix date">
                            <div class="pull-left guoji">国 际</div>
                            <div class="pull-left date-number">3小时前</div>
                        </div>
                        <div class="news-icon icon-none">34</div>
                    </div>
                </div>
            </a>
        </li>
    </ul>
    <div class="clearfix waihui-tt">
        <div class="pull-left list-tt">美元</div>
    </div>
    <div class="lind"><div class="lind-b"></div></div>
    <ul class="news-ul">
        <li>
            <a href="">
                <div class="clearfix">
                    <div class="news-list-txt bao-list-text">
                        <div class="news-tt">有人收到了消息  美联储本周加息25个 有人收到了消息  美联储本周加息25个</div>
                        <div class="clearfix date bao-date">
                            <div class="pull-left date-number">3小时前</div>
                        </div>
                        <div class="news-icon">34</div>
                    </div>
                </div>
            </a>
        </li>
        <li>
            <a href="">
                <div class="clearfix">
                    <div class="news-list-txt bao-list-text">
                        <div class="news-tt">有人收到了消息  美联储本周加息25个 有人收到了消息  美联储本周加息25个</div>
                        <div class="clearfix date bao-date">
                            <div class="pull-left date-number">3小时前</div>
                        </div>
                        <div class="news-icon">34</div>
                    </div>
                </div>
            </a>
        </li>
        <li>
            <a href="">
                <div class="clearfix">
                    <div class="news-list-txt bao-list-text">
                        <div class="news-tt">有人收到了消息  美联储本周加息25个 有人收到了消息  美联储本周加息25个</div>
                        <div class="clearfix date bao-date">
                            <div class="pull-left date-number">3小时前</div>
                        </div>
                        <div class="news-icon">34</div>
                    </div>
                </div>
            </a>
        </li>
        <li>
            <a href="">
                <div class="clearfix">
                    <div class="news-list-txt bao-list-text">
                        <div class="news-tt">有人收到了消息  美联储本周加息25个 有人收到了消息  美联储本周加息25个</div>
                        <div class="clearfix date bao-date">
                            <div class="pull-left date-number">3小时前</div>
                        </div>
                        <div class="news-icon">34</div>
                    </div>
                </div>
            </a>
        </li>
        <li>
            <a href="">
                <div class="clearfix">
                    <div class="news-list-txt bao-list-text">
                        <div class="news-tt">有人收到了消息  美联储本周加息25个 有人收到了消息  美联储本周加息25个</div>
                        <div class="clearfix date bao-date">
                            <div class="pull-left date-number">3小时前</div>
                        </div>
                        <div class="news-icon">34</div>
                    </div>
                </div>
            </a>
        </li>
    </ul>
    <a href="" class="news-more more-b"><span>查看更多</span></a>
</div>
<!--人民币-->
<div class="news-list  no-padding-top">
    <ul class="news-ul first-ul">
        <li class="first-li">
            <a href="">
                <div class="clearfix welfare-1">
                    <div class="lianghui">有人收到了消息  美联储本周加息25个</div>
                    <div class="show-col">
                        <div class="col-xs-4 col-xs-4-f">
                            <img src="images/bao1.jpg" alt="">
                        </div>
                        <div class="col-xs-4 col-xs-4-m"><a href=""><img src="images/bao2.jpg" alt=""></a></div>
                        <div class="col-xs-4 col-xs-4-l"><a href=""><img src="images/bao3.jpg" alt=""></a></div>
                    </div>
                    <div class="clearfix left-b1">
                        <div class="pull-left house">3小时前</div>
                        <div class="pull-right news-icon">34</div>
                    </div>
                </div>
            </a>
        </li>
        <li>
            <a href="">
                <div class="clearfix welfare-1 ">
                    <div class="title-wh title-top">[两会福利]有人收到了消息  美联储本周加息25个</div>
                    <div class="show-col show-icai">
                        <img src="images/15.jpg" alt="">
                        <div class="head-r">独家</div>
                        <div class="head-b">有人收到了消息 美联储本周加息</div>
                    </div>
                    <div class="clearfix left-b1">
                        <div class="pull-left industry">国 际</div>
                        <div class="pull-left house">3小时前</div>
                        <div class="news-icon">34</div>
                    </div>
                </div>
            </a>
        </li>
        <li class="have-line">
            <a href="">
                <div class="clearfix">
                    <div class="pull-left news-img"><img src="images/01.jpg"></div>
                    <div class="news-list-txt">
                        <div class="news-tt">有人收到了消息  美联储本周加息25个</div>
                        <div class="clearfix date">
                            <div class="pull-left guoji">国 际</div>
                            <div class="pull-left date-number">3小时前</div>
                        </div>
                        <div class="news-icon icon-none">34</div>
                    </div>
                </div>
            </a>
        </li>
    </ul>
    <div class="clearfix waihui-tt">
        <div class="pull-left list-tt">人民币</div>
    </div>
    <div class="lind"><div class="lind-b"></div></div>
    <ul class="news-ul">
        <li>
            <a href="">
                <div class="clearfix">
                    <div class="news-list-txt bao-list-text">
                        <div class="news-tt">有人收到了消息  美联储本周加息25个 有人收到了消息  美联储本周加息25个</div>
                        <div class="clearfix date bao-date">
                            <div class="pull-left date-number">3小时前</div>
                        </div>
                        <div class="news-icon">34</div>
                    </div>
                </div>
            </a>
        </li>
        <li>
            <a href="">
                <div class="clearfix">
                    <div class="news-list-txt bao-list-text">
                        <div class="news-tt">有人收到了消息  美联储本周加息25个 有人收到了消息  美联储本周加息25个</div>
                        <div class="clearfix date bao-date">
                            <div class="pull-left date-number">3小时前</div>
                        </div>
                        <div class="news-icon">34</div>
                    </div>
                </div>
            </a>
        </li>
        <li>
            <a href="">
                <div class="clearfix">
                    <div class="news-list-txt bao-list-text">
                        <div class="news-tt">有人收到了消息  美联储本周加息25个 有人收到了消息  美联储本周加息25个</div>
                        <div class="clearfix date bao-date">
                            <div class="pull-left date-number">3小时前</div>
                        </div>
                        <div class="news-icon">34</div>
                    </div>
                </div>
            </a>
        </li>
        <li>
            <a href="">
                <div class="clearfix">
                    <div class="news-list-txt bao-list-text">
                        <div class="news-tt">有人收到了消息  美联储本周加息25个 有人收到了消息  美联储本周加息25个</div>
                        <div class="clearfix date bao-date">
                            <div class="pull-left date-number">3小时前</div>
                        </div>
                        <div class="news-icon">34</div>
                    </div>
                </div>
            </a>
        </li>
        <li>
            <a href="">
                <div class="clearfix">
                    <div class="news-list-txt bao-list-text">
                        <div class="news-tt">有人收到了消息  美联储本周加息25个 有人收到了消息  美联储本周加息25个</div>
                        <div class="clearfix date bao-date">
                            <div class="pull-left date-number">3小时前</div>
                        </div>
                        <div class="news-icon">34</div>
                    </div>
                </div>
            </a>
        </li>
    </ul>
    <a href="" class="news-more more-b"><span>查看更多</span></a>
</div>

<!--保险-->
<?php include 'foot.php'; ?>