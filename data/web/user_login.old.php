<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>用户登陆</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
    <script src="http://lib.sinaapp.com/js/jquery/3.1.0/jquery-3.1.0.min.js"></script>

</head>
<body>
    <div class="container">
    <?php $is_login=false; include 'header.php' ?>
    <h1>用户登陆</h1>
    <form action="user_login_check.php" methed = "post" id="form_login" onsubmit="send_form('form_login');return false;">
    <div id="form_login_notice" class="form_info middle"></div>
    <p><input type="text" name="email" placeholder="Email" class="middle"/></p>
    <p><input type="password" name="password" placeholder="密码" class="middle"/></p>
    <p><input type="submit" value="登陆" class="middle-button"/></p>
    </form>
    </div>
</body>
</html>