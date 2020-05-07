<?php
    session_start();

    require_once('./connectDB.php');

    if($_SERVER['REQUEST_METHOD'] === 'POST' &&
    !empty($_POST['customerName']) &&
    !empty($_POST['account']) &&
    !empty($_POST['customerEmail']) &&
    !empty($_POST['password']) &&
    !empty($_POST['customerAddress']) &&
    !empty($_POST['customerPhone']) &&
    !empty($_POST['customerGender'])
    ){
        $name = $_POST['customerName'];
        $account=$_POST['account'];
        $email=$_POST['customerEmail'];
        $password=$_POST['password'];
        $address=$_POST['customerAddress'];
        $phone=$_POST['customerPhone'];
        $gender=$_POST['customerGender'];
        $account=$_POST['account'];
        $account=$_POST['account'];
        $account=$_POST['account'];
        // echo "<script>alert('asd')</script>";
        //create acc
        $addAcc = "INSERT INTO account (account, password) VALUES 
        ('$account', '$password')";

        $conn->query($addAcc);

        //lay accountid
        $accountID = ($conn->query("SELECT accountID FROM account WHERE account='$account'"))->fetch_assoc();
        $accountID = $accountID['accountID'];

        //insert table customer
        $addCus = "INSERT INTO customer (customerName, customerAddress,
        customerEmail, customerPhone, customerGender, accountID) values
        ('$name', '$address', '$email', '$phone', '$gender', '$accountID')";
        
        if($conn->query($addCus)){
            // echo "<script>alert('add successfuly')</script>";
            echo "<script type='text/javascript'>alert('successfuly'); window.location='./index.php'</script>";
        }
    }
    if($_SERVER['REQUEST_METHOD'] === 'POST' &&
    (empty($_POST['customerName']) ||
    empty($_POST['account']) ||
    empty($_POST['customerEmail']) ||
    empty($_POST['password']) ||
    empty($_POST['customerAddress']) ||
    empty($_POST['customerPhone']) ||
    empty($_POST['customerGender'])) ){

        echo "<script type='text/javascript'>alert('Please provide full information');</script>";;
    }
    
    
    
    

    
?>
<!doctype html>
<html lang="en">

<head>
    <title>Sign Up</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="./css/style.css">
    <script src='./js/myjavascript.js'></script>
</head>

<body>
    <!-- begin nav  -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top px-0">
        <div class="container px-0">
            <!-- logo -->
            <a class="navbar-brand" href="./index.php">
                <img src="./images/logo/logo.png" alt="logo ATN" class='d-inline-block' height='40px' width='65px'>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-3">
                    <li class="nav-item active">
                        <a class="nav-link" href="./index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                    <li class="nav-item ml-2">
                        <a href="" class="">
                            <i class="fa fa-shopping-cart fa-2x" aria-hidden="true" id="cart-icon"></i>
                        </a>
                    </li>
                </ul>



            </div>
        </div>
    </nav>
    <!-- end nav  -->


    <!-- begin content  -->
    <div class="container mt-4 w-50">
        <form action="signUp.php" method="POST" enctype="multipart/form-data">

            <div class="form-group">
                <label for="customerName">Name *</label>
                <input type="text" class="form-control" name="customerName" placeholder="full name">
            </div>
            <div class="form-group">
                <label for="account">Account *</label>
                <input type="text" class="form-control" name="account" placeholder="account ">
            </div>
            <div class="form-group">
                <label for="customerEmail">Email *</label>
                <input type="email" class="form-control" name="customerEmail" placeholder="email">
            </div>
            <div class="form-group">
                <label for="password">Password *</label>
                <input type="password" class="form-control" name="password" placeholder="password">
            </div>
            <div class="form-group">
                <label for="customerAddress">Address *</label>
                <input type="text" class="form-control" name="customerAddress" placeholder="address">
            </div>
            <div class="form-group">
                <label for="customerPhone">Phone *</label>
                <input type="text" class="form-control" name="customerPhone" placeholder="Phone">
            </div>


            <legend class="form-label pt-0">Gender</legend>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="customerGender" id="male" value="1">
                <label class="form-check-label" for="male">Male</label>
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="customerGender" id="famale" value="0">
                <label class="form-check-label" for="famale">Female</label>
            </div>
            <br><br>



            <input type="submit" value="Sign Up">
        </form>
    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>