<?php

session_start();
if( intval($_SESSION['uid'] ) < 1 ){
    header("Location:user_login.php");
    die("请先登陆<a href='user_login.php'>再添加简历");
}

error_reporting( E_ALL & ~E_NOTICE );

//获取输入参数
$id = intval( $_REQUEST['id'] );
$title = trim( $_REQUEST['title'] );
$content = trim( $_REQUEST['content'] );

//参数检查
if( strlen( $id ) < 1 ) die("简历名称不可为空");
if( strlen( $title ) < 1 ) die("简历名称不可为空");
if( mb_strlen( $content ) < 6 ) die("简历内容不能少于10个字符");

//连接数据库
try
{
    $dbh = new PDO('mysql:host=mysql.ftqq.com;dbname=fangtangdb','php','fangtang');
    
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //注意` 和' 的差别
    $sql = "UPDATE `resume` SET `title` = ?,`content` = ? WHERE `id` = ? AND `uid`= ? LIMIT 1 ";
    $sth = $dbh->prepare( $sql );
    $ret = $sth->execute( [ $title ,$content , $id , intval( $_SESSION['uid'] ) ] );
    
    // header("Location:user_login.php");
    die("简历更新成功<script>location='resume_list.php'</script>");
}

catch( PDOException $Exception )
{
    $erroeInfo = $sth->errorInfo;
    if( $erroeInfo[1] == 1062){
        die($Exception->getMassage() . "简历名称已存在");
    }else{
        die( $Exception->getMessage() );
    }
}
catch( Execption $Exception){
    die( $Exception->getMessage() );
}


