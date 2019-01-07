<?php

error_reporting( E_ALL & ~E_NOTICE );

//获取输入参数
$email = trim($_REQUEST['email']);
$password = trim($_REQUEST['password']);
$password2 = trim($_REQUEST['password2']);

//参数检查
if( strlen( $email ) < 1 ) die("Email 地址不可为空");
if( mb_strlen( $password ) < 6 ) die("密码不能短于6个字符");
if( mb_strlen( $password ) > 12 ) die("密码不能长于12个字符");
if( strlen( $password2 ) < 1 ) die("重复密码不可为空");

if( $password != $password2) die("两次输入的密码不一致");

if( !filter_var($email, FILTER_VALIDATE_EMAIL ) ){
    die("Email 地址错误");
}

// die("OK!");

//连接数据库
try
{
    $dbh = new PDO('mysql:host=mysql.ftqq.com;dbname=fangtangdb','php','fangtang');

    // $sql = "show tables";
    // $sth = $dbh->prepare( $sql );
    // $sth->execute();
    // $result = $sth->fetch(PDO::FETCH_ASSOC);
    // print_r($result);
    
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //注意` 和' 的差别
    $sql = "INSERT INTO `user`( `email`,`password`,`created_at`) VALUES ( ? , ? , ? )";
    $sth = $dbh->prepare( $sql );
    $ret = $sth->execute( [ $email ,password_hash( $password ,PASSWORD_DEFAULT) , date("Y-m-d H:i:s" ) ] );
    
    die("用户注册成功<script>location='user_login.php'</script>");
}

catch( PDOException $Exception )
{
    $erroeInfo = $sth->errorInfo();
    // echo($erroeInfo);
    if( $erroeInfo[1] == 1062){
        die("Email地址已被注册");
    }else{
        die( $Exception->getMessage() );
    }
}
catch( Exception $Exception){
    die( $Exception->getMessage() );
}


