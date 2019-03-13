<form action="/?m=user&a=saveUser" methed ="post" id="form_reg" onsubmit="send_form('form_reg');return false;">
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