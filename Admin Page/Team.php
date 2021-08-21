<html>
    <head>
    <?php

        include("../connection.php");

        $Name = $_POST['Tname'];

        $query = mysqli_query($conn, "select Name from user_team where Name = '$Name'");
        $result=mysqli_num_rows($query);

        if($result > 0)
        {
            $Notice = "Team $Name already exist...";
            echo "<script>alert('$Notice');window.history.back();</script>";
            die;
        }else{           
            $query = "insert into user_team (Name) values ('$Name')";
                                
            mysqli_query($conn, $query);
            $Notice = "Team $Name is Created Successfully....";
            echo "<script>alert('$Notice');window.history.back();</script>";
            die;
        }
        ?>
    </head>
</html>
