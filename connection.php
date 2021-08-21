<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "delta_login";

if(!$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname)){
    header("Location: welcome.html");
    die;
}