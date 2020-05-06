<?php 
    // $host="localhost";
    $servername="localhost";
    $username ="root";
    $pass="";
    $DBname="shopOnline";
    $port="3306";

    //create connection
    $conn = new mysqli($servername, $username, $pass, $DBname, $port);

    //check connection
    if($conn->connect_error){
        die('connection failed: '.$conn->connect_error);
    }
    // echo "connected successfully";
?>