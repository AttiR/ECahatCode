<?php 
 // Connection to database
 ob_start();    // enable to use headers
 // session start
 if(!isset($_SESSION)){
     session_start();
 }

 $hostname = "localhost";
 $username = "root";
 $password = "nHNA3-cP2HFRGzW/";
 $database = "ChadCodeE";

 $connect = mysqli_connect($hostname, $username, $password, $database)
 or die("connection with Database is not esctablishes.");
 if($connect){
     echo "Successfully connected with database!";
 }
?>