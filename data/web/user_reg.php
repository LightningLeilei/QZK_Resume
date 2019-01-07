<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" media="screen" href="css/app.css" />
    <title>用户注册</title>
</head>
<body>

    <div class="container">
    <?php $is_login=false; include 'header.php' ?>
    <h1 class="page_title">用户注册</h1>
    <form action="user_save.php" methed ="post" id="form_reg" onsubmit="send_form('form_reg');return false;">
        <div id="form_reg_notice" class="form_info middle"></div>
        <div class="form-group">
            <input type="text" name="email" placeholder="Email" class="form-control"/>
        </div>
        <div class="form-group">
            <input type="password" name="password" placeholder="密码" class="form-control" />
        </div>
        <div class="form-group">
            <input type="password" name="password2" placeholder="重复密码" class="form-control" />
        </div>
        <div class="form-group">
            <input type="submit" value="注册" class="btn btn-primary"/>&nbsp;<input type="button" value="返回" class="btn btn-outline-secondary float-right" onClick="history.back(1);void(0);"/>
        </div>
    </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <script src="http://lib.sinaapp.com/js/jquery/3.1.0/jquery-3.1.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>

</body>
</html>