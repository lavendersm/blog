<?php
session_start();
if(isset($_SESSION['user'])&&!empty($_SESSION['user'])){
    require('./lib/init.php');
    $sql = "select * from comment";
    $comms = mGetAll($sql);

//print_r($comms);

    require(ROOT . '/view/admin/commlist.html');
}else{
    header('Location: login.php');
}


?>