<?php 
    session_start();
    // header("location: index.php");

    // echo $_POST['email'];
    // print_r($_POST['email']);
    // check empty email and password
    if($_SERVER['REQUEST_METHOD'] !== 'POST' || 
        empty($_POST['account']) || 
        empty($_POST['password']) ){
        header("location: index.php");
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
        //admin
        if($row['role'] == 1){
            header('location: admin.php');
        }else{
            //guest
            header('location: index.php');
        }
    }else{
        // loggin failed
        echo "sai ten dang nhap hoac mat khau";
    }
    // print_r($result);

?>