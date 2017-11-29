<meta charset="utf8">
<?php 
session_start();
if(isset($_SESSION['user'])&&!empty($_SESSION['user'])){


require("./lib/init.php");
$sql = "select * from cat";
//$rs = mysql_query($sql);
//$cat = array();
//while($row = mysql_fetch_assoc($rs)) {
//	$cat[] = $row;
//}
$cat=mGetAll($sql);
//print_r($cat);

require('./view/admin/catlist.html');
}else{
    header('location:login.php');
}
?>