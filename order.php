<?php
session_start();

if (empty($_SESSION['accountID'])) {

    echo "<script type='text/javascript'>alert('Please login'); window.location='./index.php'</script>";
}
//order table
//select cusID
require_once('./connectDB.php');
$accID = $_SESSION['accountID'];
$cusID = $conn->query("SELECT * FROM customer where accountID='$accID'");
$cusID = $cusID->fetch_object();
$cusID = $cusID->customerID;

// add order
$addOrder = "INSERT INTO orders(customerID) VALUES ($cusID)";
if ($conn->query($addOrder) == TRUE) {
    //add order sucessfuly
    $orderID = $conn->query("SELECT MAX(orderID) FROM orders WHERE customerID='$cusID'");
    $orderID = $orderID->fetch_array();
    $orderID = $orderID[0];
    //add oder detail table
    //loop through all items in cart
    $success = true;
    foreach($_SESSION['cart'] as $proID => $quality ){
        $addOrderDetail = "INSERT INTO orderdetail(orderID, productID, productQuatity)
        VALUES ('$orderID', '$proID', $quality)";
        if ($conn->query($addOrderDetail) != TRUE) {
            $success = false;
            break;
        }
    }
    if($success){
        echo "<script>alert('successfuly')</script>";
        // $_SESSION['order'] = 1;
        unset($_SESSION['cart']);
        echo "<script>window.location='./index.php'</script>";
    }else{
        echo "<script>alert('failed'); window.location='./index.php'</script>";
    }
}




$conn->close();
?>

<!-- <script>alert()</script> -->