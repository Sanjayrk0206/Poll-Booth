<?php
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "delta_poll";

 // checking connection
 $conn1 = new mysqli($servername, $username, $password, $dbname);
 // Check connection
 if ($conn1->connect_error) {
     die("Connection failed: " . $conn1->connect_error);
 }
 