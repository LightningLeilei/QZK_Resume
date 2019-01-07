<?php

session_start();
if( intval($_SESSION['uid'] ) < 1 ){
    header("Location:user_login.php");
    die("请先登陆<a href='user_login.php'>再添加简历");
}

error_reporting( E_ALL & ~E_NOTICE );

//获取输入参数
$title = trim($_REQUEST['title']);
$content = trim($_REQUEST['content']);

//参数检查
if( strlen( $title ) < 1 ) die("简历名称不可为空");
if( mb_strlen( $content ) < 6 ) die("简历内容不能少于10个字符");

//连接数据库
try
{
    $dbh = new PDO('mysql:host=mysql.ftqq.com;dbname=fangtangdb','php','fangtang');
    
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //注意` 和' 的差别
    $sql = "INSERT INTO `resume`( `title`,`content`,`uid`,`created_at`) VALUES ( ? , ? , ? , ? )";
    $sth = $dbh->prepare( $sql );
    $ret = $sth->execute( [ $title ,$content, intval( $_SESSION['uid'] ) , date("Y-m-d H:i:s" ) ] );
    
    // header("Location:user_login.php");
    die("简历保存成功<script>location='resume_list.php'</script>");
}

catch( PDOException $Exception )
{
    $erroeInfo = $sth->errorInfo;
    if( $erroeInfo[1] == 1062){
        die($Exception->getMassage() . "简历名称和已存在简历重复");
    }else{
        die( $Exception->getMessage() );
    }
}



// echo $sql;