<?php
session_start();
if ($_SESSION['role'] != 1 && $_SESSION['accountID'] != 1) {
    header('location: index.php');
}



?>
<!doctype html>
<html lang="en">

<head>
    <title>admin page</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="./style.css">
    <script src='./myjavascript.js'></script>
</head>

<body onload='management("Product")'>
    <!-- begin nav  -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top px-0">
        <div class="container px-0">
            <!-- logo -->
            <a class="navbar-brand" href="index.php">
                <img src="./images/logo/logo.png" alt="logo ATN" class='d-inline-block' height='40px' width='65px'>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-3">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home</a>
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

                <div class="nav-item ml-auto text-light d-flex">
                    <h3 class='d-inline'>Admin</h3>
                    <button class='btn btn-success btn-sm p-0 ml-3'>
                        <a class="nav-link m-0 py-0" href="#">logout</a>
                    </button>
                </div>

            </div>
        </div>
    </nav>
    <!-- end nav  -->


    <!-- begin content  -->
    <div class="container" id="content">

        <div class="row">
            <!-- left -->
            <div class="col-lg-3">
                <div class="list-group ">
                    <a class='list-group-item list-group-item-action list-group-item-warning' href="#">Product Management</a>
                    <a class='list-group-item list-group-item-action list-group-item-warning' href="#">Customer management</a>
                    <a class='list-group-item list-group-item-action list-group-item-warning' href="#">Order management</a>
                    <a class='list-group-item list-group-item-action list-group-item-warning' href="#">category management</a>
                </div>
                <!-- end lis group  -->
            </div>
            <!-- end left  -->

            <!-- right  -->
            <!-- management  -->
            <div class="col-lg-9">
                <!-- <h6>day la phan quan ly</h6> -->
                <div class="container-fluid" id="management"></div>
            </div>
            <!-- /.row -->
        </div>
        <!-- end content  -->



        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>