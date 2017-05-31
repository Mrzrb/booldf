<?php
    include("./lib/mDB.php");



    function storePic($src){
        $picName = time().$_FILES['file']['name'];
        if($_FILES['file']['error']>0){
            echo "Return Code: ".$_FILES['file']['error'].'<br />';
        }else{
            if(file_exists($src."/".$_FILES['file']['name'])){
                echo $_FILES['file']['name']." already exists. ";
            }else{
                move_uploaded_file($_FILES['file']['tmp_name'],
                $src."/".$picName);
            }
        }
        return $picName;
    }


    if(empty($_POST)){
        require("./reg.html");
    }else{
         var_dump($_FILES);
        // var_dump($_POST);
       // exit;
    // $picSrc = storePic("upload");
    $mdb = new mDB();
    $mdb->fetchTable_('odersys','uinfo');

    $picSrc = storePic("upload");
    $mdb->insertData($_POST['username'],$_POST['password'],'Name',$_POST['telephone'],$_POST['classid'],$picSrc);
    header("location:login.php");
    }




?>