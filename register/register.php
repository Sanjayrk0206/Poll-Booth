<?php

session_start();

    include("../connection.php");
    $Notice="";
    $PNotice="";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        //Updating data to the server
        $Name = $_POST['Name'];
        $Roll_No = $_POST['Roll_No'];
        $Email = $_POST['Email'];
        $Password = $_POST['Password'];
        $Cpassword = $_POST['Cpassword'];
        
        //Check Password and Confirm Password
        if($Cpassword == $Password){
            //read from database
            $query = mysqli_query($conn, "select Roll_No from user_details where Roll_No = '$Roll_No'");
            $result=mysqli_num_rows($query);

            if($result > 0)
            {
                $Notice="Already Exist";
            }else{
                $hash = password_hash($Password,PASSWORD_DEFAULT);           
                $query = "insert into user_details (Name,Roll_No,Email,Password) values ('$Name','$Roll_No','$Email','$hash')";
                            
                mysqli_query($conn, $query);
                
                header("Location: ../login/login.php");
                die;
            }
        }else{
             $PNotice="Password and Confirm Password are not same";
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Delta Register</title>
        <link rel="stylesheet" href="register.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Carter+One&display=swap" rel="stylesheet">
        <link rel="icon" href="data:image/png;base64,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" type="image/x-icon">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="register.js"></script>
    </head>
    <body>
        <img class="icon" src="data:image/png;base64,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" alt="Delta">
        <section class="welcome">
            <div class="register">
                <div style="margin-bottom: 1%;margin-top: 1%;">
                    <label style="font-size: 35px;margin-left: 2.5%;">Registration</label>
                    <label style="font-size: 15px;margin-left: 17.5%;;margin-top:2.5%;color:crimson;position:absolute;"><?php echo $Notice;?></label>
                    <label style="font-size: 15px;margin-left: 10%;margin-top:2.5%;color:crimson;position:absolute;"><?php echo $PNotice;?></label>
                    <div class="registerback" onclick="window.history.back()">
                        <i class="fa fa-angle-left"></i>
                        <label style="cursor: pointer;">Go Back</label>
                    </div>
                </div>
                <div style="border-bottom: 3px solid limegreen;margin-left: 1%;margin-right: 1%;"></div>
                <form name="form" method="POST" autocomplete="off">
                    <div class="registerdiv">
                        <label class="registerla">Your Name: </label>
                        <i class="fa fa-user" style="font-size: 30px;margin-left: 1%;"></i>
                        <input class="registerin" name="Name" type="text" maxlength="25" required/>
                    </div>
                    <div class="registerdiv">
                        <label class="registerla">Your Roll No.: </label>
                        <i class="fa fa-id-card" style="font-size: 25px;margin-left: 1%;"></i>
                        <input class="registerin" name="Roll_No" type="number" pattern="[0-9]{9}" min="0" required/>
                    </div>
                    <div class="registerdiv1">
                        <label class="registerla">Your Personal Email: </label>
                        <i class="fa fa-envelope" style="font-size: 30px;margin-left: 1%;"></i>
                        <input class="registerin" name="Email" type="email" maxlength="35" required/>
                    </div>
                    <div class="registerdiv2">
                        <label class="registerla">Your Password: </label>
                        <i class="fa fa-lock" style="font-size: 30px;margin-left: 1%;"></i>
                        <input class="registerin" name="Password" type="password" minlength="8" maxlength="16" required/>
                    </div>
                    <div class="registerdiv2" style="width: 47.5%;">
                        <label class="registerla">Confirm Password: </label>
                        <i class="fa fa-lock" style="font-size: 25px;margin-left: 1%;"></i>
                        <input class="registerin" name="Cpassword" type="password" minlength="8" maxlength="16" style="width: 40%;" required/>
                        <i class="fa fa-eye" id="check" style="cursor: pointer;" onclick="showpass()"></i>
                        <i class="fa fa-eye-slash" id="check1" style="cursor: pointer;display: none;" onclick="showpass()"></i>
                    </div>
                    <input class="loginbutton" name="submit" type="submit" value="Submit"/>
                    <input class="loginbutton" name="reset" type="reset"/>
                </form>
            </div>
        </section>
    </body>
</html>