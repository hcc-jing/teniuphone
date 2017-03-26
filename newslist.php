<?php  
$titlename = '新闻列表';
include 'head.php';
$mid  = isset($_GET['mid'])  ? $_GET['mid'] : '';
$page = isset($_GET['page']) ? $_GET['page'] : '1';
$pagesize = 12;
$newsinfo = getNewslists($mid, $page, $pagesize);
$counts   = returnCount($mid);
$pagecount = ceil($counts/$pagesize);
// echo '<pre>';
// print_r($counts);exit;
?>
</div>
<div class="news-list">
    <div class="clearfix">
        <div class="pull-left list-tt"><?=getClassname($mid)?>-新闻列表</div>
    </div>
    <ul class="news-ul">
        <?php  
        if($newsinfo) {
        	foreach($newsinfo as $newval)  {
        ?>    
        <li>
            <div class="clearfix">
                <div class="pull-left news-img"><a href="newsdetail.php?mid=<?=$newval['id']?>"><img src="images/01.jpg"></a></div>
                <div class="news-list-txt">
                    <div class="news-tt"><a href="newsdetail.php?mid=<?=$newval['id']?>"><?=$newval['title']?></a></div>
                    <div class="clearfix date">
                        <div class="pull-left date-number"><?=getRelease($newval['newstime'])?></div>
                    </div>
                    <div class="news-icon"><?=$newval['plnum']?></div>
                </div>
            </div>
        </li>
 		<?php } } ?>
    </ul>
    <div class="bs-example" data-example-id="simple-pager">
        <nav aria-label="...">
            <ul class="pager">
                <li><a href="newslist.php?mid=<?=$mid?>&page=1">首页</a></li>
                <?php  
                if($page <= 1) {
                	echo "<li><a href=\"javascript:;\">上一页</a></li>";
                }else {
                	echo "<li><a href=\"newslist.php?mid={$mid}&page=".($page-1)."\">上一页</a></li>";
                }
                ?>
                <?php  
                if($page >= $pagecount) {
                	echo "<li><a href=\"javascript:;\">下一页</a></li>";
                }else {
                	echo "<li><a href=\"newslist.php?mid={$mid}&page=".($page+1)."\">下一页</a></li>";
                }
                ?>
                <li><a href="newslist.php?mid=<?=$mid?>&page=<?=$pagecount?>">最末页</a></li>
            </ul>
        </nav>
    </div>
</div>
<!--保险-->
<?php include 'foot.php'; ?>