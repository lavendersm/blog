<meta charset="utf8">
<?php 
session_start();
if(isset($_SESSION['user'])&&!empty($_SESSION['user'])){
    require('./lib/init.php');
//cat_id
$cat_id = $_GET['cat_id'];
//echo $cat_id;


//检测 栏目id 是否为数字
//var_dump($cat_id);
if(!is_numeric($cat_id)) {
	echo '栏目不合法';
	exit();
}

//检测 栏目是否存在
$sql = "select count(*) from cat where cat_id=$cat_id";
$rs = mGetOne($sql);
if($rs == 0) {
	echo '栏目不存在';
	exit();
}

//检测栏目下是否有文章
$sql = "select count(*) from art where cat_id=$cat_id";
$rs = mysql_query($sql);
$a=mysql_fetch_row($rs);
if($a[0] != 0) {
	echo '栏目下有文章,不能删除';
	exit();
}

//检测完毕,删除栏目
$sql = "delete from cat where cat_id=$cat_id";
if(!mysql_query($sql)) {
	echo '栏目删除失败';
} else {
	echo '栏目删除成功';
}
}else{
    header('location:login.php');
}


?>