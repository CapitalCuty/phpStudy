<?php
include_once "./17.php";
echo USER_NAME;
    $x=90;
    $y=90;
    function foo(){
        $GLOBALS["z"]=$GLOBALS["x"]+$GLOBALS["y"];
    }
    foo();
    echo $z;

    $a=date("yy-m-d");
    echo $a;