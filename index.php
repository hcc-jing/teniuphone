<?php  
$cur = 'index';
$titlename = '首页';
include 'head.php';
//一级头条
$firsttitle = getNews('firsttitle', 7);
//财经新闻
$finance = getClassinfo(1, 4);
//股票新闻
$stock   = getClassinfo(3, 6);
//基金新闻
$funds   = getClassinfo(2, 6);
//网贷新闻
$p2p     = getClassinfo(8, 6);
//外汇新闻
$forex   = getClassinfo(5, 6);
//银行新闻
$bank    = getClassinfo(7, 6);
//银行新闻
$insu    = getClassinfo(4, 6);
// echo '<pre>';
// print_r($finance);exit;
?>
</div>
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">
          <div class="item active">
          <a href="newsdetail.php?mid=<?=$firsttitle[1]['id']?>">
          <img src="<?=$firsttitle[1]['titlepic']?>"  style="width:640px;height:324px">
          <div class="carousel-caption">
            <div class="clearfix">
                <div class="pull-right"><span>1/</span>6</div>
            	<div class="pull-left news-img-ttss"><?=$firsttitle[1]['title']?></div>                
            </div>
          </div>
          </a>
          </div>
          <?php 
          for($i=2;$i<7;$i++) {
          ?>
          <div class="item">
          <a href="newsdetail.php?mid=<?=$firsttitle[$i]['id']?>">
          <img src="<?=$firsttitle[$i]['titlepic']?>"  style="width:640px;height:324px">
          <div class="carousel-caption">
            <div class="clearfix">
                <div class="pull-left news-img-ttss"><?=$firsttitle[$i]['title']?></div>
                <div class="pull-right"><span><?=$i?>/</span>6</div>
            </div>
          </div>
          </a>
          </div>
          <?php } ?>
      </div>
    </div>
    <div class="clearfix news">
    	<div class="pull-left label-back">直播</div>
        <div class="pull-left news-txt" style="font-size:0.18rem;"><a href="newsdetail.php?mid=<?=$firsttitle[0]['id']?>">
        <?=(strlen($firsttitle[0]['title'])>88) ? mb_substr($firsttitle[0]['title'], 0,26,'utf-8') : $firsttitle[0]['title']?>
        </a></div>
    </div>
    <div class="news-list">
    	<div class="clearfix">
            <div class="pull-left list-tt">财经</div>
            <div class="pull-right list-tt-lind"><a href="newslist.php?mid=9">国际</a><a href="newslist.php?mid=10">产业</a><a href="newslist.php?mid=11">宏观</a><a href="newslist.php?mid=13">创投</a></div>
        </div>
        <ul class="news-ul">
        <?php  
        if($finance) {
            foreach($finance as $finval) {
        ?>
        	<li>            	
                <div class="clearfix">
                    <div class="pull-left news-img"><a href="newsdetail.php?mid=<?=$finval['id']?>"><img src="images/01.jpg"></a></div>
                    <div class="news-list-txt">
                    <div class="news-tt"><a href="newsdetail.php?mid=<?=$finval['id']?>"><?=$finval['title']?></a></div>
                        <div class="clearfix date">
                            <div class="pull-left guoji"><?=getClassname($finval['classid'])?></div>
                            <div class="pull-left date-number"><?=getRelease($finval['newstime'])?></div>
                        </div>
                        <div class="news-icon"><?=$finval['plnum']?></div>
                    </div>
                </div>                
            </li>
        <?php }} ?>
        </ul>
    </div>
    <!--股票-->
    <div class="news-list">
    	<div class="clearfix">
            <div class="pull-left list-tt">股票</div>
            <div class="pull-right list-tt-lind"><a href="newslist.php?mid=50">主力</a><a href="newslist.php?mid=48">内参</a><a href="newslist.php?mid=49">题材</a><a href="newslist.php?mid=52">公司</a></div>
        </div>
        <div class="lind"><div class="lind-b"></div></div>
        <div class="news-figure clearfix">
        	<div class="col-xs-6 col-xs-6-one"><a href="newsdetail.php?mid=<?=$stock[0]['id']?>"><img src="images/02.jpg"><div class="news-img-tt"><?=$stock[0]['title']?></div></a></div>
            <div class="col-xs-6 col-xs-6-tow"><a href="newsdetail.php?mid=<?=$stock[1]['id']?>"><img src="images/03.jpg"><div class="news-img-tt"><?=$stock[1]['title']?></div></a></div>
        </div>
        <ul class="news-ul">
        <?php  
        if($stock) {
            for($s=2;$s<6;$s++) {
        ?>
            <li>                
                <div class="clearfix">
                    <div class="pull-left news-img"><a href="newsdetail.php?mid=<?=$stock[$s]['id']?>"><img src="images/01.jpg"></a></div>
                    <div class="news-list-txt">
                    <div class="news-tt"><a href="newsdetail.php?mid=<?=$stock[$s]['id']?>"><?=$stock[$s]['title']?></a></div>
                        <div class="clearfix date">
                            <div class="pull-left guoji"><?=getClassname($stock[$s]['classid'])?></div>
                            <div class="pull-left date-number"><?=getRelease($stock[$s]['newstime'])?></div>
                        </div>
                        <div class="news-icon"><?=$stock[$s]['plnum']?></div>
                    </div>
                </div>                
            </li>
        <?php }} ?>
        </ul>
        <a href="stock.php" class="news-more"><span>查看更多</span></a>
    </div>
    <!--基金-->
    <div class="news-list">
    	<div class="clearfix">
            <div class="pull-left list-tt">基金</div>
            <div class="pull-right list-tt-lind"><a href="newslist.php?mid=16">要闻</a><a href="newslist.php?mid=17">观点</a><a href="newslist.php?mid=18">学院</a><a href="javascript:;">超市</a></div>
        </div>
        <div class="news-figure clearfix">
            <div class="col-xs-6 col-xs-6-one"><a href="newsdetail.php?mid=<?=$funds[0]['id']?>"><img src="images/02.jpg"><div class="news-img-tt"><?=$funds[0]['title']?></div></a></div>
            <div class="col-xs-6 col-xs-6-tow"><a href="newsdetail.php?mid=<?=$funds[1]['id']?>"><img src="images/03.jpg"><div class="news-img-tt"><?=$funds[1]['title']?></div></a></div>
        </div>
        <ul class="news-ul">
        <?php  
        if($funds) {
            for($f=2;$f<6;$f++) {
        ?>
            <li>                
                <div class="clearfix">
                    <div class="pull-left news-img"><a href="newsdetail.php?mid=<?=$funds[$f]['id']?>"><img src="images/01.jpg"></a></div>
                    <div class="news-list-txt">
                    <div class="news-tt"><a href="newsdetail.php?mid=<?=$funds[$f]['id']?>"><?=$funds[$f]['title']?></a></div>
                        <div class="clearfix date">
                            <div class="pull-left guoji"><?=getClassname($funds[$f]['classid'])?></div>
                            <div class="pull-left date-number"><?=getRelease($funds[$f]['newstime'])?></div>
                        </div>
                        <div class="news-icon"><?=$funds[$f]['plnum']?></div>
                    </div>
                </div>                
            </li>
        <?php }} ?>
        </ul>
        <a href="fund.php" class="news-more"><span>查看更多</span></a>
    </div>
    <!--网贷-->
    <div class="news-list">
    	<div class="clearfix">
            <div class="pull-left list-tt">网贷</div>
            <div class="pull-right list-tt-lind"><a href="newslist.php?mid=53">市场</a><a href="newslist.php?mid=54">政策</a><a href="newslist.php?mid=55">公司</a><a href="newslist.php?mid=47">平台</a></div>
        </div>
        <div class="news-figure clearfix">
            <div class="col-xs-6 col-xs-6-one"><a href="newsdetail.php?mid=<?=$p2p[0]['id']?>"><img src="images/02.jpg"><div class="news-img-tt"><?=$p2p[0]['title']?></div></a></div>
            <div class="col-xs-6 col-xs-6-tow"><a href="newsdetail.php?mid=<?=$p2p[1]['id']?>"><img src="images/03.jpg"><div class="news-img-tt"><?=$p2p[1]['title']?></div></a></div>
        </div>
        <ul class="news-ul">
        <?php  
        if($p2p) {
            for($p2=2;$p2<6;$p2++) {
        ?>
            <li>                
                <div class="clearfix">
                    <div class="pull-left news-img"><a href="newsdetail.php?mid=<?=$p2p[$p2]['id']?>"><img src="images/01.jpg"></a></div>
                    <div class="news-list-txt">
                    <div class="news-tt"><a href="newsdetail.php?mid=<?=$p2p[$p2]['id']?>"><?=$p2p[$p2]['title']?></a></div>
                        <div class="clearfix date">
                            <div class="pull-left guoji"><?=getClassname($p2p[$p2]['classid'])?></div>
                            <div class="pull-left date-number"><?=getRelease($p2p[$p2]['newstime'])?></div>
                        </div>
                        <div class="news-icon"><?=$p2p[$p2]['plnum']?></div>
                    </div>
                </div>                
            </li>
        <?php }} ?>
        </ul>
        <a href="" class="news-more"><span>查看更多</span></a>
    </div>
    <!--外汇-->
    <div class="news-list">
    	<div class="clearfix">
            <div class="pull-left list-tt">外汇</div>
            <div class="pull-right list-tt-lind"><a href="newslist.php?mid=19">动态</a><a href="newslist.php?mid=20">研究</a><a href="newslist.php?mid=21">美元</a><a href="newslist.php?mid=24">人民币</a></div>
        </div>
        <div class="news-figure clearfix">
            <div class="col-xs-6 col-xs-6-one"><a href="newsdetail.php?mid=<?=$forex[0]['id']?>"><img src="images/02.jpg"><div class="news-img-tt"><?=$forex[0]['title']?></div></a></div>
            <div class="col-xs-6 col-xs-6-tow"><a href="newsdetail.php?mid=<?=$forex[1]['id']?>"><img src="images/03.jpg"><div class="news-img-tt"><?=$forex[1]['title']?></div></a></div>
        </div>
        <ul class="news-ul">
        <?php  
        if($forex) {
            for($fo=2;$fo<6;$fo++) {
        ?>
            <li>                
                <div class="clearfix">
                    <div class="pull-left news-img"><a href="newsdetail.php?mid=<?=$forex[$fo]['id']?>"><img src="images/01.jpg"></a></div>
                    <div class="news-list-txt">
                    <div class="news-tt"><a href="newsdetail.php?mid=<?=$forex[$fo]['id']?>"><?=$forex[$fo]['title']?></a></div>
                        <div class="clearfix date">
                            <div class="pull-left guoji"><?=getClassname($forex[$fo]['classid'])?></div>
                            <div class="pull-left date-number"><?=getRelease($forex[$fo]['newstime'])?></div>
                        </div>
                        <div class="news-icon"><?=$forex[$fo]['plnum']?></div>
                    </div>
                </div>                
            </li>
        <?php }} ?>
        </ul>
        <a href="forex.php" class="news-more"><span>查看更多</span></a>
    </div>
    <!--银行-->
    <div class="news-list">
    	<div class="clearfix">
            <div class="pull-left list-tt">银行</div>
            <div class="pull-right list-tt-lind"><a href="newslist.php?mid=32">监管</a><a href="newslist.php?mid=29">行业</a><a href="newslist.php?mid=30">点评</a><a href="newslist.php?mid=31">理财</a></div>
        </div>
        <div class="news-figure clearfix">
            <div class="col-xs-6 col-xs-6-one"><a href="newsdetail.php?mid=<?=$bank[0]['id']?>"><img src="images/02.jpg"><div class="news-img-tt"><?=$bank[0]['title']?></div></a></div>
            <div class="col-xs-6 col-xs-6-tow"><a href="newsdetail.php?mid=<?=$bank[1]['id']?>"><img src="images/03.jpg"><div class="news-img-tt"><?=$bank[1]['title']?></div></a></div>
        </div>
        <ul class="news-ul">
        <?php  
        if($bank) {
            for($b=2;$b<6;$b++) {
        ?>
            <li>                
                <div class="clearfix">
                    <div class="pull-left news-img"><a href="newsdetail.php?mid=<?=$bank[$b]['id']?>"><img src="images/01.jpg"></a></div>
                    <div class="news-list-txt">
                    <div class="news-tt"><a href="newsdetail.php?mid=<?=$bank[$b]['id']?>"><?=$bank[$b]['title']?></a></div>
                        <div class="clearfix date">
                            <div class="pull-left guoji"><?=getClassname($bank[$b]['classid'])?></div>
                            <div class="pull-left date-number"><?=getRelease($bank[$b]['newstime'])?></div>
                        </div>
                        <div class="news-icon"><?=$bank[$b]['plnum']?></div>
                    </div>
                </div>                
            </li>
        <?php }} ?>
        </ul>
        <a href="bank.php" class="news-more"><span>查看更多</span></a>
    </div>
	<!--保险-->
    <div class="news-list">
    	<div class="clearfix">
            <div class="pull-left list-tt">保险</div>
            <div class="pull-right list-tt-lind"><a href="newslist.php?mid=43">行业</a><a href="newslist.php?mid=46">新品</a><a href="newslist.php?mid=45">攻略</a><a href="newslist.php?mid=44">公司</a></div>
        </div>
        <div class="news-figure clearfix">
            <div class="col-xs-6 col-xs-6-one"><a href="newsdetail.php?mid=<?=$insu[0]['id']?>"><img src="images/02.jpg"><div class="news-img-tt"><?=$insu[0]['title']?></div></a></div>
            <div class="col-xs-6 col-xs-6-tow"><a href="newsdetail.php?mid=<?=$insu[1]['id']?>"><img src="images/03.jpg"><div class="news-img-tt"><?=$insu[1]['title']?></div></a></div>
        </div>
        <ul class="news-ul">
        <?php  
        if($insu) {
            for($in=2;$in<6;$in++) {
        ?>
            <li>                
                <div class="clearfix">
                    <div class="pull-left news-img"><a href="newsdetail.php?mid=<?=$insu[$in]['id']?>"><img src="images/01.jpg"></a></div>
                    <div class="news-list-txt">
                    <div class="news-tt"><a href="newsdetail.php?mid=<?=$insu[$in]['id']?>"><?=$insu[$in]['title']?></a></div>
                        <div class="clearfix date">
                            <div class="pull-left guoji"><?=getClassname($insu[$in]['classid'])?></div>
                            <div class="pull-left date-number"><?=getRelease($insu[$in]['newstime'])?></div>
                        </div>
                        <div class="news-icon"><?=$insu[$in]['plnum']?></div>
                    </div>
                </div>                
            </li>
        <?php }} ?>
        </ul>
        <a href="insurance.php" class="news-more"><span>查看更多</span></a>
    </div>
	<!--保险-->
<?php include 'foot.php'; ?>