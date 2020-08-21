<?php
    header("content-type:text/html;charset=utf-8");
    // 第一步：创建连接(@ 在失败之后隐藏提示)
    $connection =@mysqli_connect("localhost","root","root","study");
    // print_r($connection);

    // 第二步：判断连接是否失败
    if(!$connection){
        exit("<h1>数据库连接失败</h1>");
    }

    // 第三步：查询数据库
    $sql = "select * from user1";
    $result = mysqli_query($connection,$sql);
    
    // 第四步：将数据展示到页面
    // print_r ($result);
    // $row = mysqli_fetch_assoc($result);
    // print_r ($row);
    $arr_final=[];
    while($row = mysqli_fetch_assoc($result)) {
        // 打印数据
        // print_r($row["id"]."----".$row["name"]."----".$row["age"]."----".$row["gender"]."----".$row["birthday"]);
        // echo "<br>";
        $arr_final[]=$row;


    }
    // print_r($arr_final);
    // echo json_encode($arr_final);
    $.ajax{
        url:"code",
        dataType: "json",
        data:{
              array: json_encode($arr_final)
        }
    };
    // 第五步：释放结果集
    mysqli_free_result($result);
    // 第六步：关闭连接
    mysqli_close($connection);
?>
