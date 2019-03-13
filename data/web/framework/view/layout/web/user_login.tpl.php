<h1 class="page_title"><?=$title?></h1>

<form action="/?m=user&amp;a=login_check" methed = "post" id="form_login" onsubmit="send_form('form_login');return false;">
    <div id="form_login_notice" class="form_info middle"></div>

    <div class="form-group">
        <input type="text" name="email" placeholder="Email" class="form-control"/></div>
    
    <div class="form-group">
        <input type="password" name="password" placeholder="密码" class="form-control"/></div>
    
    <div class="form-group">
        <input type="submit" id="login_button" value="登陆" class="btn btn-primary"/></div>
</form>