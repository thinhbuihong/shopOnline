<?php 
    session_start();
    // header("location: index.php");

    // echo $_POST['email'];
    // print_r($_POST['email']);
    // check empty email and password
    if($_SERVER['REQUEST_METHOD'] !== 'POST' ){
        header("location: index.php");
    }
    if($_SERVER['REQUEST_METHOD'] === 'POST' && 
        (empty($_POST['account']) || 
        empty($_POST['password'])) ){
        echo "<script type='text/javascript'>alert('Please provide full information'); window.location='./index.php'</script>";
    }

    //invoke connecdb
    require_once("./connectDB.php");
    $acc = $_POST['account'];
    $pas =$_POST['password'];
    
    $query = "SELECT * FROM Account WHERE account='$acc' AND password='$pas';";
    $result = $conn->query($query);
    // print_r($_POST['password']);

    if ($result->num_rows > 0) {
        //logged in successfully
        // check permission
        $row = $result->fetch_assoc();
        $_SESSION['accountID'] = $row['accountID'];
        $_SESSION['role'] = $row['role'];
        $_SESSION['account'] = $row['account'];
        //admin
        if($row['role'] == 1){
            header('location: ./admin/admin.php');
        }else{
            //guest
            header('location: ./index.php');
        }
    }else{
        // loggin failed
        echo "<script type='text/javascript'>alert('wrong username or password'); window.location='./index.php'</script>";
    }
    // print_r($result);
