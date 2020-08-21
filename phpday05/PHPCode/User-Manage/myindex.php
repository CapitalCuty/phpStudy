<?php
    // 连接
    $connect = mysqli_connect("127.0.0.1","root","root","study");
    if(!$connect){
        exit("数据库连接失败！");
    }
    // 查询
    $sql = "select * from user1 ORDER BY id ASC;";
    $query = mysqli_query($connect,$sql);
    
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
    <h1 class="heading">用户管理 <a class="btn btn-link btn-sm" href="myadd.php">添加</a></h1>
    <table class="table table-hover">
      <thead>
        <tr>
          <th>id</th>
          <th>姓名</th>
          <th>年龄</th>
          <th>性别</th>
          <th>出生日期</th>
          <th class="text-center" width="140">操作</th>
        </tr>
      </thead>
      <tbody>
      <?php while($row=mysqli_fetch_assoc($query)){ ?>
        <tr>
            <td><?php echo $row["id"] ?></td>
            <td><?php echo $row["name"] ?></td>
            <td><?php echo $row["age"] ?></td>
            <td><?php echo $row["gender"]==0?"男":"女" ?></td>
            <td><?php echo $row["birthday"] ?></td>
            <td class="text-center">
                <a class="btn btn-info btn-sm" href="myedit.php?id=<?php echo $row["id"] ?>">编辑</a>
                <a class="btn btn-danger btn-sm" href="mydelete.php?id=<?php echo $row["id"] ?>">删除</a>
            </td>
        </tr>
        
      <?php } ?>

      </tbody>
    </table>
    <ul class="pagination justify-content-center">
      <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
      <li class="page-item"><a class="page-link" href="#">1</a></li>
      <li class="page-item"><a class="page-link" href="#">2</a></li>
      <li class="page-item"><a class="page-link" href="#">3</a></li>
      <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
    </ul>
  </main>
</body>
</html>
