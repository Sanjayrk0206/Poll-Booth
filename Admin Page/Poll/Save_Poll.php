<?php 
    if(isset($_GET['Pname'])){
        include('../../connection1.php');
        $Name=$_GET['Pname'];
        $Question=$_POST['Q'];

        for($i=0;$i<count($Question);$i++){
            $p=str_replace(" ","_", $Question[$i]);
            $p=str_replace("?","",$p);
            $conn1->query("alter table $Name add $p varchar( 255 )");
        }

    }

    header('Location: ../mainpage.php');
    die;
    