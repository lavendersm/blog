<?php 


require('./lib/init.php');
session_start();

if(empty($_POST)) {
	require(ROOT . '/view/front/login.html');
} else {
	$user['name'] = trim($_POST['name']);
	if(empty($user['name'])) {
		print_r('用户名不能为空');
	}

	$user['password'] = trim($_POST['password']);
	if(empty($user['password'])) {
		print_r('密码不能为空');
	}

	//$sql = "select * from user where name='$user[name]' and password='$user[password]'";
	$sql = "select * from user where name='$user[name]'";
	$row = mGetRow($sql);
	//print_r($row);exit();
	if(!$row) {
		print_r('用户名错误');
	} else {
		if(md5($user['password'].$row['salt']) === $row['password']){
//        if($user['password']=== $row['password']){
            $_SESSION['user']=$user;
            $_SESSION['username']=$user['name'];

            setcookie('name' , $user['name']);
			setcookie('ccode' , cCode($user['name']));
			header('Location: index.php');
		} else {
			print_r('密码错误');
		}
	}
}

?>