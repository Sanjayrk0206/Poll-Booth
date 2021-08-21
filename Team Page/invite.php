<?php

    include("../connection.php");

    if(isset($_GET['Tname'])){
        $user_data = mysqli_query($conn,"select * from user_details where designation='Member'");

        while($list = mysqli_fetch_array($user_data)){
            $Roll_No=$list['Roll_No'];
            $Name=$_GET['Tname'];
            $user_check = mysqli_query($conn,"select * from invite where Team_Name='$Name' and Roll_No='$Roll_No'");
            
            if(mysqli_fetch_row($user_check) == null){
                $query = "insert into invite (Roll_No,Team_Name) values ('$Roll_No','$Name')";
                                
                mysqli_query($conn, $query);
            }
        }
    }
    header("Location: team.php?Tname=$Name",true);
    die;