<?php 
session_start();
if( intval($_SESSION['uid'] ) < 1 ){
    header("Location:user_login.php");
    die("请先登陆<a href='user_login.php'>再添加简历");
}

$id = intval( $_REQUEST['id'] );
if( $id < 1 ) die("错误的简历ID");

try
{
    $dbh = new PDO('mysql:host=mysql.ftqq.com;dbname=fangtangdb','php','fangtang');
    
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //注意` 和' 的差别
    $sql = "UPDATE `resume` SET `is_deleted` = 1 , `title` = CONCAT(`title` , ? ) WHERE `id` = ? AND `uid`= ? LIMIT 1 ";
    $sth = $dbh->prepare( $sql );
    $ret = $sth->execute( ['_DEL_'.time() , $id , intval( $_SESSION['uid'] ) ] );
    
    // die("简历删除成功<script>location.reload();</script>");
    die("done");
}
catch( Execption $Exception)
{
    die( $Exception->getMessage() );
}