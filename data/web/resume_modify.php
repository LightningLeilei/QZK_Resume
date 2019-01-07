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
    $sql = "SELECT * FROM `resume` WHERE `id` = ? LIMIT 1";

    $sth = $dbh->prepare( $sql );
    $ret = $sth->execute( [ $id ] );
    $resume = $sth->fetch(PDO::FETCH_ASSOC);//按字段名嵌入

    if( $resume['uid'] != $_SESSION['uid'] ) die("只能修改自己的简历");
    
}

catch( Exception $Exception ){
    die( $Exception->getMessage());
}
?><!doctype html>
<html lang="zh-cn">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="https://bootswatch.com/4/simplex/bootstrap.min.css"> -->
    <link rel="stylesheet" type="text/css" media="screen" href="css/app.css" />
    <title>修改简历</title>
</head>

<body>
    <!-- 页面内容区域 -->
    <div class="container">
        <div class="page_box">
            <h1 class="page_title">修改简历</h1>
            <form action="resume_update.php" methed = "post" id="form_resume" onsubmit="send_form('form_resume');return false;">
                <div id="form_resume_notice" class="form_info middle"></div>

                <div class="form-group">
                    <input type="text" name="title" class="form-control" value="<?=$resume['title']?>"/></div>

                <div class="form-group">
                    <textarea rows="10" name="content"  class="form-control" ><?=htmlspecialchars( $resume['content'] )?></textarea></div>

                <input type="hidden" name="id" value="<?=$resume['id']?>" />

                <div class="form-group">
                    <input type="submit" value="更新简历" class="btn btn-primary"/>&nbsp;<input type="button" value="返回" class="btn btn-outline-secondary float-right" onClick="history.back(1);void(0);"/></div>
                
            </form>
        </div>
    </div>
    <!-- 页面内容区域 -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <script src="http://lib.sinaapp.com/js/jquery/3.1.0/jquery-3.1.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>

  </body>
</html>