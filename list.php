<?php
    include ("lib/mDB.php");
    /* 获取菜品信息 */ 
    $msql = new mDB();
    $msql->fetchTable_("odersys","food");
    $date = date("Y-m-d");
    $sql = "select * from food where ordertime='$date' order by resname";
    $msql->query($sql);
    $g = $msql->getDataArr();
    $keys = $msql->getKeys();


    /*获取登录信息*/ 
    $log = new mDB();
    $log->fetchTable_("odersys","uinfo");
    $user = $log->pickDataAsId($_COOKIE['id']);
    //var_dump($user);
    /*逻辑部分*/ 
    if(!empty($g)){
        require("list.html");
    }else{
        echo "<script> alert('Get info failed!') </script>";
    }
?>