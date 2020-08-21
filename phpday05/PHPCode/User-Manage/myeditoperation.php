<?php
    header("content-type:text/html;charset=utf-8");
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        // 点击保存时的操作
        function addData(){
            //添加数据：
            // 1.判断值是否为空
            // 2.获取表单提交的数据
            // 3.连接数据库
            // 4.添加数据
            // 5.跳转到首页
        
            if(empty($_POST["name"])){
                $GLOBALS["errors"]="用户名不能为空";
                return;
            }
            // isset()可以判断是否有值，0也是一个值，empty()认为0是空
            if(!(isset($_POST["gender"])) || $_POST["gender"] == -1){
                $GLOBALS["errors"]="性别不能为空";
                return;
            }
            if(empty($_POST["birthday"])){
                $GLOBALS["errors"]="生日不能为空";
                return;
            }
            $id=$_GET["id"];
            $name = $_POST["name"];
            $gender= $_POST["gender"];
            $birthday = $_POST["birthday"];
        
            // 建立数据库连接
            $connect_new = @mysqli_connect("127.0.0.1","root","root","study");
            if(!$connect_new){
                exit("数据库连接失败！");
            }
            // 查询语句
            $sql = "UPDATE user1 SET name='{$name}',age=10,gender={$gender},birthday='{$birthday}' WHERE id={$id};";
            // 查询
            $query = mysqli_query($connect_new,$sql);
            if(!$query){
                exit("编辑数据失败！");
            }
            header("Location:./myindex.php");
        }
    
        addData();
    }else {
        exit("只支持GET请求");
    }
          
?>