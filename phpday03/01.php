<?php
    header("content-type:text/html;charset=utf-8");
    // var_dump($GLOBALS);
    // var_dump($GLOBALS["_POST"]);
    // var_dump($_POST);
    var_dump($GLOBALS["_SERVER"]["REQUEST_METHOD"]);
    var_dump($_SERVER["REQUEST_METHOD"]);
    var_dump($_REQUEST);
?>