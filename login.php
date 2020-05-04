<?php 
    session_start();
    // header("location: index.php");

    // echo $_POST['email'];
    // print_r($_POST['email']);
    // check empty email and password
    if($_SERVER['REQUEST_METHOD'] !== 'POST' || 
        empty($_POST['email']) || 
        empty($_POST['password']) ){
        header("location: index.php");
    }

    $email = $_POST['email'];
    $pass =$_POST['password'];

    //invoke connecdb
    // chdir(dirname($__FILE__));
    require_once("./connectDB.php");
    

?>