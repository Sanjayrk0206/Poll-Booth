<?php
    include('../../connection1.php');

    if(isset($_GET['Pname'])){
        $Name=$_GET['Pname'];
        $data=$_POST['data'];
        $C_Name = mysqli_query($conn1,"select * from $Name;");
        while($result=mysqli_fetch_field($C_Name)){
            $column[] = $result->name;
        }
        $query = "insert into $Name (`Roll_No`) values ('$data[0]')";
                            
        mysqli_query($conn1, $query);
        array_shift($column);
        array_shift($column);
        $i=1;
        foreach($column as $list) {
            $query = "update $Name set `$list`='$data[$i]' where `Roll_No`=$data[0]";
            mysqli_query($conn1, $query);
            $i++;
        }

    }

    header('Location: ../mainpage.php');
    die;