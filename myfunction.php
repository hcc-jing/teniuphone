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

function dianzan()
{
	global $empire,$dbtbpre;
	$id = $_POST['id']; //文章的id
	//查询是否已经存在点赞情况
	$sayip=egetip(); //ip地址
	$dian = $empire->fetch1("select id from {$dbtbpre}dianzan where ip = '{$sayip}'");
	if($dian) {
		//已经存在
		echo json_encode('already');
		exit;
	}else {
		$query = "update {$dbtbpre}ecms_news set diggtop = diggtop + 1 where id = '{$id}' limit 1";
		$empire->updatesql($query);
		//记录点赞
		$sql = "insert into {$dbtbpre}dianzan(ip) values('".$sayip."')";
		$empire->query($sql);
		echo json_encode('success');
	}
}

$action();
?>