<?php
    // 解决字符编码
    header("content-type:text/html;charset=utf-8");
    // 判断请求方式是否为GET
    if($_SERVER["REQUEST_METHOD"]=="GET"){
        $id=$_GET["id"];
    }else {
        exit("只支持get请求！");
    }
    // 建立连接
    $connect = mysqli_connect("127.0.0.1","root","root","study");
    if(!$connect){
        exit("数据库连接失败！");
    }
    // 删除的sql语句
    $sql = "delete from user1 where id=".$id;
    $query = mysqli_query($connect,$sql);
    print_r($query);
    if($query<0){
        exit("查询数据库失败");
    }
    // 受影响的行数
    $affect_rows = mysqli_affected_rows($connect);
    // 没有受影响的行数，也就是删除失败
    if($affect_rows<=0){
        exit("删除数据库失败");
    }
    // 删除成功直接跳转到主页
    header("Location:./myindex.php");

?>