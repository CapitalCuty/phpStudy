<?php 
    header("content-type:text/html;charset=utf-8");
  // 判断是否是get请求
    if($_SERVER["REQUEST_METHOD"] === "GET"){
        // 获取被编辑用户的id
    $id=$_GET["id"];

    // 建立连接
    $connect = mysqli_connect("127.0.0.1","root","root","study");
    if(!$connect){
        exit("数据库连接失败！");
    }
    // sql语句
    $sql = "SELECT * FROM user1 WHERE id={$id};";
    // 查询
    $query = mysqli_query($connect,$sql);
    if(!$query){
        exit("查询数据库失败！");
    }
    $user = mysqli_fetch_assoc($query);
    // [id] => 16 [name] => 匿名 [age] => 21 [gender] => 0 [birthday] => 2020-05-14 

    // 关闭结果集
    mysqli_free_result($query);
    // 关闭连接
    mysqli_close($connect);
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
    <h1 class="heading">编辑“<?php echo $user['name']; ?>”</h1>
    <form action="<?php echo './myeditoperation.php?id='.$id; ?> " method="POST" >
      <!-- <div class="form-group">
        <label for="avatar">头像</label>
        <input type="file" class="form-control" id="avatar">
      </div> -->
      <div class="form-group">
        <label for="name">姓名</label>
        <input type="text" class="form-control" id="name" value="<?php echo $user['name']; ?>" name="name">
      </div>
      <div class="form-group">
        <label for="gender">性别</label>
        <select class="form-control" id="gender" name="gender">
          <option value="-1">请选择性别</option>
          <option value="1" <?php echo $user['gender'] === '1' ? ' selected': ''; ?>>男</option>
          <option value="0" <?php echo $user['gender'] === '0' ? ' selected': ''; ?>>女</option>
        </select>
      </div>
      <div class="form-group">
        <label for="birthday">生日</label>
        <input type="date" class="form-control" id="birthday" value="<?php echo $user['birthday']; ?>" name="birthday">
      </div>
      <button class="btn btn-primary">保存</button>
    </form>
  </main>
</body>

</html>