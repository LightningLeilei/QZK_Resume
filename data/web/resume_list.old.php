<?php
session_start();
if( intval($_SESSION['uid'] ) < 1 ){
    header("Location:user_login.php");
    die("请先登陆<a href='user_login.php'>再添加简历");
}

$is_login = true;

try
{
    $dbh = new PDO('mysql:host=mysql.ftqq.com;dbname=fangtangdb','php','fangtang');
    
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //注意` 和' 的差别
    $sql = "SELECT `id`,`uid`,`title`,`created_at` FROM `resume` WHERE `uid` = ? AND `is_deleted` != 1";

    $sth = $dbh->prepare( $sql );
    $ret = $sth->execute( [ intval($_SESSION['uid'] ) ] );
    $resume_list = $sth->fetchall(PDO::FETCH_ASSOC);//按字段名嵌入
   
}
catch( Exception $Exception ){
    die($Exception->getMassage() );
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>我的简历</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/main.css" />
    <script src="js/main.js"></script>
    <script src="http://lib.sinaapp.com/js/jquery/3.1.0/jquery-3.1.0.min.js"></script>

</head>
<body>
    <div class="container">
    <?php include 'header.php' ?>
    <h1>我的简历</h1>
    <?php if( $resume_list ): ?>
    <ul class="list-group">
    <?php foreach( $resume_list as $item): ?>
    <li id="rlist-<?=$item['id']?>">
    <span class="menu_square_large"></span>
    <a href="resume_detail.php?id=<?=$item['id']?>" class="title middle" target="_blank" ><?=$item['title']?></a>
    <a href="resume_detail.php?id=<?=$item['id']?>" target="_blank" ><img src="image/opennew.png" alt="查看"></a>
    <a href="resume_modify.php?id=<?=$item['id']?>" target="" ><img src="image/pencil.png" alt="编辑"></a>
    <a href="javascript:confirm_delete('<?=$item['id']?>');void(0);"><img src="image/close.png" alt="删除"></a>
    </li>
    <?php endforeach?>
    </ul>
    <?php endif; ?>
    <p><a href="resume_add.php" class="resume_add" ><img src="image/plus.png" alt="添加简历"> 添加简历</a></p>
    </div>
</body>
</html>