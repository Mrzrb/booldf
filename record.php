<?php
    //  var_dump($_POST); exit;
    // var_dump($_COOKIE);exit;
    include ('lib/mDB.php');
    if(empty($_POST)){
        header("location:book.php");
    }else{
        $msql = new mDB();
        $msql->fetchTable_('odersys','food');
        $msql->insertData($_COOKIE['username'],$_POST['resname'],$_POST['dishname'],$_POST['restele'],$_POST['price'],$_POST['ordertime'],$_POST['bld']);
        header("location:list.php");
    }
?>