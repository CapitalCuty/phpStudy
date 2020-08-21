<?php
    header("content-type:text/html;charset=utf-8");
    function addData(){
        //添加数据：
        // 1.判断值是否为空
        // 2.获取表单提交的数据
        // 3.连接数据库
        // 4.添加数据
        // 5.跳转到首页

        // 获取当前文件目录
        // print_r($_SERVER["PHP_SELF"]);
        // print_r($_POST);
        // [name] =>   [gender] => -1   [birthday] => 
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

        $name = $_POST["name"];
        $gender= $_POST["gender"];
        $birthday = $_POST["birthday"];

        $avatar = "阿凡达";

        // 建立数据库连接
        $connect = @mysqli_connect("127.0.0.1","root","root","study");
        if(!$connect){
            exit("数据库连接失败！");
        }
        // 查询语句
        $sql = "INSERT INTO user1 VALUE (NULL,'{$name}',23,$gender,'{$birthday}');";
        // 查询
        $query = mysqli_query($connect,$sql);
        if(!$query){
            exit("添加数据失败！");
        }
        // $GLOBALS["errors"]="添加成功";
        header("Location:./myindex.php");

    }

    if($_SERVER["REQUEST_METHOD"] === "POST"){
        addData();
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>XXX管理系统</title>
  <link rel="stylesheet" href="assets/css/bootstrap.css">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
  <nav class="navbar navbar-expand navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#">XXX管理系统</a>
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.html">用户管理</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">商品管理</a>
      </li>
    </ul>
  </nav>
  <main class="container">
    <h1 class="heading">添加用户</h1>
    <?php if (isset($errors)): ?>
    <div class="alert alert-warning">
      <?php echo $errors; ?>
    </div>
    <?php endif ?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" autocomplete="off">
      <!-- <div class="form-group">
        <label for="avatar">头像</label>
        <input type="file" class="form-control" id="avatar" name="avatar">
      </div> -->
      <div class="form-group">
        <label for="name">姓名</label>
        <input type="text" class="form-control" id="name" name="name">
      </div>
      <div class="form-group">
        <label for="gender">性别</label>
        <select class="form-control" id="gender" name="gender">
          <option value="-1">请选择性别</option>
          <option value="1">男</option>
          <option value="0">女</option>
        </select>
      </div>
      <div class="form-group">
        <label for="birthday">生日</label>
        <input type="date" class="form-control" id="birthday" name="birthday">
      </div>
      <button class="btn btn-primary">保存</button>
    </form>
  </main>
</body>
</html>
