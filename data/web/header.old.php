
 <div class="headbox">
            
            <?php if( $is_login) : ?>
            <ul class="menu">
                <li><span class="menu_square"></span><a href="resume_list.php" >我的简历</a></li>
                <li><span class="menu_square"></span><a href="user_logout.php" >注销</a></li>
            </ul>
            <?php else: ?>
            <ul class="menu">
                <li><span class="menu_square"></span><a href="user_reg.php" >注册</a></li>
                <li><span class="menu_square"></span><a href="user_login.php" >登陆</a></li>
            </ul>
            <?php endif; ?>
            <div class="logo"><a href="index.php"><img src="image/logo.png" alt="Lightning" /></a></div>
        </div>