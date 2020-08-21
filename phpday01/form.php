<?php 
    header("content-type:text/html;charset=utf-8")
?>
<?php

    $user_name = $_GET["user-name"];
    $user_pwd = $_GET["user-pwd"];
    echo "用户名：".$user_name;
    echo "<br/>";
    echo "密码：".$user_pwd;
?>