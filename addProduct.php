<?php
session_start();
if ($_SESSION['role'] != 1 && $_SESSION['accountID'] != 1) {
    header('location: index.php');
}
require_once('./connectDB.php');

//xu ly img
$uploadOk = 0;
$target_file ="";
if($_SERVER['REQUEST_METHOD'] === 'POST' && is_uploaded_file($_FILES['productImg']['tmp_name'])){
    $target_dir = "./images/product/";
    $target_file = $target_dir . basename($_FILES["productImg"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["productImg"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
        }
    }


    // Check if file already exists
    if (file_exists($target_file)) {
        echo "<script>alert('Sorry, file already exists.')</script>";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "<script>alert('Sorry, your file was not uploaded.')</script>";
    // if everything is ok, try to upload file
    } else {
        
    }

}
if($_SERVER['REQUEST_METHOD'] === 'POST' &&
    !is_uploaded_file($_FILES['productImg']['tmp_name'])){
        echo "<script>alert('no file upload')</script>";
    }

// end xu ly img 

if ($uploadOk == 1 ){
    $name =$_POST['productName'] ;
    $des =$_POST['productDescription'];
    $ava= $_POST['productAvailable'];
    $importprice = $_POST['productImportPrice'];
    $price= $_POST['productPrice'];
    $cate= $_POST['categoryID'];
    $img = $target_file;
    $pieces =  $_POST['pieces'];

    //viet query
    $queryAddProduct = "INSERT INTO Product (productName, productDescription,
    productAvailable, productImportPrice,
    productPrice, categoryID, productImg, pieces) VALUES (
        '$name', '$des', $ava, $importprice, $price, $cate, '$img', $pieces 
    )";
    // var_dump($queryAddProduct);
    echo "<script>alert('$queryAddProduct')</script>";
    //thuc hien query
    if ($conn->query($queryAddProduct) == TRUE) {
        //move file img
        // echo "asd";
        if (move_uploaded_file($_FILES["productImg"]["tmp_name"], $target_file)) {
            // echo "The file ". basename( $_FILES["productImg"]["name"]). " has been uploaded.";
            echo "<script>alert('successfuly')</script>";
        } else {
            echo "<script>alert('Sorry, there was an error uploading your file.')</script>";
        }
        unset($_POST);
        header('location: admin.php');
    } else {
        echo "<script>alert('failed')</script>";
        // echo $conn->connect_error;
        unset($_POST);
        header('location: addProduct.php');
    }

}



?>
<!doctype html>
<html lang="en">

<head>
    <title>add product</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="./style.css">
    <script src='./myjavascript.js'></script>
</head>

<body>
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
                    <h5 class='d-inline'><a href="./admin.php">Admin</a></h5>
                    <button class='btn btn-success btn-sm p-0 ml-3'>
                        <a class="nav-link m-0 py-0" href="logout.php">logout</a>
                    </button>
                </div>

            </div>
        </div>
    </nav>
    <!-- end nav  -->


    <!-- begin content  -->
    <div class="container mt-4 w-50">
        <form action="addProduct.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Product name *</label>
                <input type="text" class="form-control" name="productName" placeholder="product's name" >
            </div>
            <div class="form-group">
                <label for="available">Product available *</label>
                <input type="text" class="form-control" name="productAvailable" placeholder="product available" >
            </div>
            <div class="form-group">
                <label for="importPrice">Product import price *</label>
                <input type="text" class="form-control" name="productImportPrice" placeholder="product import price" >
            </div>
            <div class="form-group">
                <label for="price">Product price *</label>
                <input type="text" class="form-control" name="productPrice" placeholder="product price" >
            </div>
            <div class="form-group">
                <label for="pieces">Product pieces *</label>
                <input type="text" class="form-control" name="pieces" placeholder="product pieces" >
            </div>
            <div class="form-group">
                <label for="description">Product description</label>
                <input type="text" class="form-control" name="productDescription" placeholder="product description" >
            </div>

            <div class="form-group">
                <label for="categories">category *</label>
                <select class="form-control" name="categoryID">
                    <?php

                    $query = "select * from Category";
                    $categories = $conn->query($query);
                    // if($categories->num_rows>0) echo "asd";
                    while ($c = $categories->fetch_assoc()) {
                        echo '<option value="' . $c['categoryID'] . '">' . $c["categoryName"] . '</option>';
                    };
                    // echo 'asd';
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="image">Product image *: </label>
                <input type="file" class="" name="productImg" >
            </div>



            <input type="submit" value="Add product">
        </form>
    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>