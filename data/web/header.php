<nav class="navbar navbar-expand-lg navbar-light bg-light no_padding" style="background-color: white;">

    <a href="#" class="navbar-brand">
        <img src="image/logo.png" hieght="50" alt="Lightning简历logo">
    </a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
  
    <?php
    function active_class( $link ){
        if( $link == ltrim( $_SERVER['SCRITP_NAME'],'/' ) ){
            return " active ";
        } 
    } 
    ?>
    <?php if( $is_login) : ?>
    <ul class="navbar-nav">
        <li class="nav-item <?=active_class('resume_list.php')?>"><a href="resume_list.php" class="nav-link" ><span class="menu_square"></span>我的简历</a></li>
        <li class="nav-item"><a href="user_logout.php" class="nav-link" ><span class="menu_square"></span>注销</a></li>
    </ul>
    <?php else: ?>
    <ul class="navbar-nav">
        <li class="nav-item <?=active_class('user_reg.php')?>"><a href="user_reg.php" class="nav-link" ><span class="menu_square"></span>注册</a></li>
        <li class="nav-item <?=active_class('user_login.php')?>"><a href="user_login.php" class="nav-link" ><span class="menu_square"></span>登陆</a></li>
    </ul>
    <?php endif; ?>

  </div>
</nav>