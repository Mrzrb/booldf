<?php
    //session_start();
    include('lib/mDB.php');


        if(empty($_POST)){
        require('./login.html');
        }else{
            $msql = new mDB();
            $msql->fetchTable_('odersys','uinfo');
            $g = $msql->getDataArr();
            
            $unum = count($g);
            $i = 0;
            $isfind=false;
            foreach($g as $v){
                if($i<$unum){
                    if($_POST['username']==$v['username']){
                        $isfind = true;
                        if($v['password'] == $_POST['password']){
                            //echo 'login OK';
                            setcookie('username',$v['username']);
                            setcookie('id',$v['zid']);
                            $i++;
                            header("location:book.php");
                            break;
                        }else{
                           $i++;
                           echo "<script>alert('用户名或密码错误，请确认后再登陆')</script>";
                           header("refresh:0.1;url=login.php"); 
                        }
                    }
                    else{
                        $i++;
                    }
            }
            if($isfind == false&&$i==$unum){
                echo "<script>alert('用户名或密码错误，请确认后再登陆.')</script>";
                header("refresh:0.1;url=login.php"); 
            }
        }
    }    
?>