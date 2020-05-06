<?php
    session_start();
    if ($_SESSION['role'] != 1 && $_SESSION['accountID'] != 1) {
        header('location: index.php');
    }

    require_once('./connectDB.php');
    if($id = $_GET['id']){
        $query = "DELETE FROM category where categoryID = $id";
        if($conn->query($query)){
            echo "<script>alert('delete successfuly')</script>";

        }
    }
    $conn->close();
    header('location: admin.php');
?>