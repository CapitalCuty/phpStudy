<?php
    $connect = mysqli_connect("127.0.0.1","root","root","study");
    if(!$connect){
        exit("数据库连接失败");
    }
    // echo "数据库连接成功";
    $sql = "select * from user1";
    $query = mysqli_query($connect,$sql);
    // print_r($query);
    
    $array = [];
    while($rows=mysqli_fetch_assoc($query)){
        $array[]=$rows;
    }
    // print_r($array);
    mysqli_free_result($query);
    mysqli_close($connect);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php混编</title>
    <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
    <style>
        table {
            width: 600px;
            height: 300px;
            text-align: center;
            margin: 0 auto;
        }

        thead tr {
            background: #000;
            color: #fff;
        }

        tbody tr:nth-child(odd) {
            background: pink;
        }

        tbody tr:nth-child(even) {
            background: lightgreen;
        }

        .current {
            background: skyblue !important;
        }
    </style>
</head>

<body>
    <table border="1" cellspacing="0" cellpadding="0">
        <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>age</th>
                <th>gender</th>
                <th>birthday</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($array as $keys=>$values){ ?>
            <tr>
                <?php foreach($values as $key=>$value){ ?>
                <td><?php echo $value ?></td>
                <?php } ?>
                <td class="del"><a href="#">删除</a></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

    <script>
        $(function () {
            $("tbody").on("mouseover", "tr", function () {
                $(this).addClass("current").siblings("tr").removeClass("current");
            })
            $("tbody").on("mouseout", "tr", function () {
                $(this).removeClass("current");
            })

            // $("tbody").on("click", "tr>.del", function () {
            //     // alert(11)
            //     var id = $(this).parents("tr").children().eq(0).text();
            //     console.log(id)
            // })
        })

    </script>
</body>

</html>