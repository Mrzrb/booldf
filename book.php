<?php

    include("lib/mDB.php");
    $msql = new mDB();
    $msql->fetchTable_('odersys','uinfo');
    // var_dump($_COOKIE);
    $g = $msql->pickDataAsId($_COOKIE['id']);
    //var_dump($g);
    

    require ('book.html');
?>