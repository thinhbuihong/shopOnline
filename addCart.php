<?php 
    session_start();

    // if()
    $id = $_GET['id'];
    $cart = $_SESSION['cart'];
    if(empty($cart[$id])){
        // array_push($_SESSION['cart'], $id=>1);
        $_SESSION['cart'][$id] = 1;
    }else{
        $_SESSION['cart'][$id] += 1;
    }

    header('location: cart.php');
?>