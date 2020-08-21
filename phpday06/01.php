<?php
// 设置10秒后消失
    // setcookie("user","zy",time()+10);
    // print_r ($_COOKIE);
    // print_r($_COOKIE["user"]);
    
// 删除cookie
    setcookie("user","zy",time()-10);

?>