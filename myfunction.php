<?php  
require("../e/class/connect.php");
require("../e/class/db_sql.php");
require("../e/class/q_functions.php");
$link=db_connect();
$empire=new mysqlquery();
$action = isset($_GET['act']) ? $_GET['act'] : '';
//判断动作
if($action == '') {
	exit('wrong quest');
}

//点赞
function dianzan()
{
	global $empire,$dbtbpre;
	$id = $_POST['id']; //文章的id
	//查询是否已经存在点赞情况
	$sayip=egetip(); //ip地址
	$dian = $empire->fetch1("select id from {$dbtbpre}dianzan where ip = '{$sayip}' and pid = '{$id}'");
	if($dian) {
		//已经存在
		echo json_encode('already');
		exit;
	}else {
		$query = "update {$dbtbpre}ecms_news set diggtop = diggtop + 1 where id = '{$id}' limit 1";
		$empire->updatesql($query);
		//记录点赞
		$sql = "insert into {$dbtbpre}dianzan(ip,pid) values('".$sayip."','".$id."')";
		$empire->query($sql);
		echo json_encode('success');
	}
}

//顶函数
function dingtop()
{
	global $empire,$dbtbpre;
	$pid = $_POST['pid']; //文章的id
	//查询是否已经存在点赞情况
	$sayip=egetip(); //ip地址
	$dian = $empire->fetch1("select id from {$dbtbpre}dingtop where ip = '{$sayip}' and pid = '{$pid}'");
	if($dian) {
		//已经存在
		echo json_encode('already');
		exit;
	}else {
		$query = "update {$dbtbpre}enewspl_1 set zcnum = zcnum + 1 where plid = '{$pid}' limit 1";
		$empire->updatesql($query);
		//记录点赞
		$sql = "insert into {$dbtbpre}dingtop(pid,ip) values('".$pid."','".$sayip."')";
		$empire->query($sql);
		echo json_encode('success');
	}
}

//评论
function say()
{
	session_start();
	
	global $empire,$dbtbpre;
	//文章id
	$text    = isset($_POST['mydon']) ? $_POST['mydon'] : $_POST['saytext'];
	$mid     = isset($_POST['mid']) ? $_POST['mid'] : $_POST['yid'];
	$classid = isset($_POST['classid']) ? $_POST['classid'] : $_POST['classids'];

	$id      = check_input($mid);
	$classid = check_input($classid);
	$saytext = check_input($text);
	$sayip   = egetip(); //ip地址
	$uname   = $_COOKIE['uname'];
	$time    = time();
	$url     = 'http://www.teniunet.com/phone/newsdetail.php?mid=' . $id;
	
	$timecha = time() - $_SESSION['saytime'];
	$saytext = smile_replace($saytext);
	//print_r($timecha);exit;
	if ($timecha < 120) {
		echo "<script>alert('您说话过快，请稍后再试');</script>"; 
		echo "<script>location='{$url}'</script>"; 
		exit;
	}

	$sql     = $empire->query("insert into {$dbtbpre}enewspl_1(pubid,username,sayip,saytime,id,classid,checked,zcnum,fdnum,userid,isgood,saytext,eipport) values('','".$uname."','$sayip','$saytime','$id','$classid','0',0,0,'0',0,'".addslashes($saytext)."','');"); 
	$_SESSION['saytime'] = time();
	if($sql) {
		echo "<script>location='{$url}'</script>"; 
	}
}

 //防sql注入函数
	function check_input($value)
	{
		// 去除斜杠
		if (get_magic_quotes_gpc())
		{
		  $value = stripslashes($value);
		}
		// 如果不是数字则加引号
		// if (!is_numeric($value))
		// {
		//   $value = "'" . mysql_real_escape_string($value) . "'";
		// }

		$value = mysql_real_escape_string($value);

		return $value;	
	}

//表情替换
function smile_replace($content)
{
	$smile=array ( 
			1 =>'[~e.jy~]', 
			2 => '[~e.kq~]', 
			3 => '[~e.se~]',
			4 => '[~e.sq~]', 
			5 => '[~e.lh~]', 
			6 => '[~e.ka~]', 
			7 => '[~e.hh~]', 
			8 => '[~e.ys~]', 
			9 => '[~e.ng~]', 
			10 => '[~e.ot~]'
	);

	foreach ($smile as $key =>$value){
	$i=$key;
	$content = str_replace (
	    $value,"<img src='/e/data/face/".$i.".gif' border=0 >",$content);
	}
	return $content;
}	

$action();
?>