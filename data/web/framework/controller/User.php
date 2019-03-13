<?php

namespace NewFrame\Controller;

class User
{
    public function login()
    {
        $data['title'] = "用户登陆";
        render_layout($data);
    }

    public function login_check()
    {
        //获取输入参数
        $email = trim(v('email'));
        $password = trim(v('password'));

        //参数检查
        if (strlen($email) < 1) {
            e("Email 地址不可为空");
        }
        if (mb_strlen($password) < 6) {
            e("密码不能短于6个字符");
        }
        if (mb_strlen($password) > 12) {
            e("密码不能长于12个字符");
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            e("Email 地址错误");
        }

        //注意` 和' 的差别
        if ($user_list = get_data("SELECT * FROM `user` WHERE `email` = ? LIMIT 1", [ $email ])) {
            $user = $user_list[0];
        }
        
        if (!password_verify($password, $user['password'])) {
            e("错误的Email地址或密码");
        }

        session_start();
        $_SESSION['email'] = $email;
        $_SESSION['uid'] = $user['id'];

        echo("登陆成功<script>location='/?m=resume&a=list'</script>");
        return true;
    }

    public function logout()
    {
        if (!headers_sent()) {
            session_start();
        }
        foreach ($_SESSION as $key => $value) {
            unset($_SESSION[$key]);
        }
        header("Location: /");
    }


    public function register()
    {
        $data['title'] = "用户注册";
        render_layout($data);
    }

    public function saveUser()
    {
        $email=trim(v('email'));
        $password=trim(v('password'));
        $password2=trim(v('password2'));
        
        //参数检查
        if (strlen($email) < 1) {
            e("Email 地址不可为空");
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            e("Email 地址错误");
        }

        if (mb_strlen($password) < 6) {
            e("密码不能短于6个字符");
        }
        if (mb_strlen($password) > 12) {
            e("密码不能长于12个字符");
        }
        if ($password !=$password2) {
            e("两次密码不同");
        }


        /**
         * 判断Email存在与否
         */
        if (get_data("SELECT * FROM `user` WHERE `email`=? LIMIT 1", [$email])) {
            e("Email已存在");
        } else {
            $sql="INSERT INTO `user` (`email`,`password`,`created_at`) VALUES (?,?,?)";
            run_sql($sql, [$email,password_hash($password, PASSWORD_DEFAULT),date("Y-m-d H:i:s")], 1062, "Email已存在");
    
            echo "用户注册成功<script>location='/?m=user&a=login'</script>";
        }

        return true;
    }
}
