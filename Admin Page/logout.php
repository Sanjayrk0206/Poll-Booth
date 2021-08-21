<?php

session_start();

if(isset($_SESSION['Roll_No']))
{
	unset($_SESSION['Roll_No']);

}

header("Location: ../mlogin/mlogin.php",true);
die;