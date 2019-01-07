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
     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
     <link rel="stylesheet" type="text/css" media="screen" href="css/app.css" />
</head>
<body>
    <div class="container">
    <?php include 'header.php' ?>
    <h1 class="page_title">我的简历</h1>
    <div class="card" style="width:auto;">
        <?php if( $resume_list ): ?>
        <ul class="list-group">
        <?php foreach( $resume_list as $item): ?>
            <li id="rlist-<?=$item['id']?>" class="list-group-item" >
                <a href="resume_detail.php?id=<?=$item['id']?>" class="btn btn-light" target="_blank" ><?=$item['title']?></a>
                <a href="resume_detail.php?id=<?=$item['id']?>" target="_blank" ><img src="image/opennew.png" alt="查看"></a>
                <a href="resume_modify.php?id=<?=$item['id']?>" target="" ><img src="image/pencil.png" alt="编辑"></a>
                <a href="javascript:confirm_delete('<?=$item['id']?>');void(0);"><img src="image/close.png" alt="删除"></a>
            </li>
        <?php endforeach?>
        </ul>
        <?php endif; ?>
    </div>
    <p class="btn_resume_add"><a href="resume_add.php" class="btn btn-light" ><img src="image/plus.png" alt="添加简历"> 添加简历</a></p>
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