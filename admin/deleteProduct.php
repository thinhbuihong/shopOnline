<?php
    session_start();
    if ($_SESSION['role'] != 1 && $_SESSION['accountID'] != 1) {
        header('location: index.php');
    }

    require_once('./connectDB.php');
    if($id = $_GET['id']){
        $link = $conn->query("SELECT * from product where productID='$id'");
        $link = $link->fetch_assoc();
        $link = ".".$link['productImg'];

        $query = "DELETE FROM Product where ProductID = $id";
        if($conn->query($query)){
            echo "<script>alert('delete successfuly')</script>";
            //delete img
            unlink($link);
        }
    }
    $conn->close();
    header('location: admin.php');
?>
