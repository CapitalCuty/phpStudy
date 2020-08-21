<?php
    header("content-type:text/html;charset=utf-8");
    $a=10;
    echo $a."-------";
    print $a."-------";
    print_r ($a);
    var_dump ($a);
    echo "hello","hey";
    // print "hello","hey"; print无法打印多个数据
    $arr = [1,2,3,4];
    print_r($arr);
    var_dump($arr);//打印出来的有数据类型
?>