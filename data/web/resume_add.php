<?php
session_start();
if( intval($_SESSION['uid'] ) < 1 ){
    header("Location:user_login.php");
    die("请先登陆<a href='user_login.php'>再添加简历");
}
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
    <title>添加简历</title>
</head>
<body>
    <div class="container">
        <div class="page_box">
        <h1 class="page_title">添加简历</h1>
        <form action="resume_save.php" methed = "post" id="form_resume" onsubmit="send_form('form_resume');return false;">
            <div id="form_resume_notice" class="form_info full"></div>
            <div class="form-group">
                <input type="text" name="title" placeholder="简历名称" class="form-control"/>
            </div>

            <div class="form-group">
                <textarea name="content" rows="10" placeholder="写入简历内容，支持Markdown 语法" class="form-control"></textarea>
            </div>    

            <div class="form-group">
                <input type="submit" value="保存简历" class="btn btn-primary"/><input type="button" value="返回" class="btn btn-outline-secondary float-right" onClick="history.back(1);void(0);"/>
                
            </div>
        </form>
        </div>
    </div>
</body>
</html>