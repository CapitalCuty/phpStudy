<?php 
    $top="top";
    function foo(){
        global $top;
        $sub="sub";
        echo $top;
        function bar(){
            global $top,$sub;
            echo $top;
            echo $sub;
        }
        bar();
    }
    foo();
?>