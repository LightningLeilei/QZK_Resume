<?php

$id = intval( $_REQUEST['id'] );
if( $id < 1 ) die("错误的简历ID");

try
{
    $dbh = new PDO('mysql:host=mysql.ftqq.com;dbname=fangtangdb','php','fangtang');
    
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //注意` 和' 的差别
    $sql = "SELECT * FROM `resume` WHERE `id` = ? LIMIT 1";

    $sth = $dbh->prepare( $sql );
    $ret = $sth->execute( [ $id ] );
    $resume = $sth->fetch(PDO::FETCH_ASSOC);//按字段名嵌入   
}

catch( Exception $Exception ){
    die( $Exception->getMessage());
}

include'lib/Parsedown.php';
$md = new Parsedown();

?><!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="https://bootswatch.com/4/simplex/bootstrap.min.css"> -->
    <link rel="stylesheet" type="text/css" media="screen" href="css/app.css" />
    <title><?=$resume['title']?></title>
</head>

<body>
    <div class="container">
        <div class="page_box">
            <div class="content">
            <?=$md->text( $resume['content'] )?>
            </div> 
        </div>
    </div>
</body>
</html>