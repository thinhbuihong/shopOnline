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
    
    $query = "SELECT * FROM Account WHERE account='$acc';";
    $result = $conn->query($query);
    print_r($_POST['password']);
    // echo $acc;
    echo $pas;
    // if ($result->num_rows > 0) {
    //     $row = $result->fetch_assoc();
    //     if($row["password"] === $pass){
    //         echo "admin";
    //     }else{
    //         echo "fail";
    //     }
    // }else{
    //     printf("Query failed: %s\n", $conn->error);
    // }
    // print_r($result);

?>