<?php 
    session_start();

    if(empty($_SESSION['role'])){

        echo "<script type='text/javascript'>alert('Please login'); window.location='./index.php'</script>";


    }
?>

<!-- <script>alert()</script> -->