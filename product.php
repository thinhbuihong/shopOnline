<?php
session_start();

$disable = '';
if (isset($_SESSION['role'])) {
    $disable = 'd-none';
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>Product detail</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- my css    -->
    <link rel="stylesheet" href="./css/style.css">
    <script src='./js/myjavascript.js'></script>
</head>
<!-- body------------------------------------------------------------------------------------------------------------------ -->

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
                    <!-- cart  -->
                    <li class="nav-item ml-2">
                        <a href="cart.php" class="">
                            <i class="fa fa-shopping-cart fa-2x" aria-hidden="true" id="cart-icon"></i>
                        </a>
                    </li>
                </ul>

                <!-- dang nhap -->
                <form class="form-inline ml-auto my-lg-0 
                <?php if (!empty($disable)) echo $disable; ?>
                " id='login' method="POST" action="login.php">
                    <input class="form-control mr-sm-2" id="account" type="text" placeholder="Account" name="account" value="">
                    <input class="form-control mr-sm-2" id="password" type="text" placeholder="Password" name="password" value="">
                    <button class="btn btn-outline-secondary my-2 my-sm-0 mr-1" id="login" type="submit">Log in</button>
                    <button class="btn btn-outline-success my-2 my-sm-0" id="signup"><a href="signUp.php" class="text-decoration-none">Sign up</a></button>
                </form>

                <!-- hien thi cho admin  -->
                <div class="nav-item ml-auto text-light d-none
                <?php if ($_SESSION['role'] == 1) echo "d-flex"; ?>
                ">
                    <h5 class='d-inline'><a href="./admin/admin.php" class="text-decoration-none">Admin</a></h5>
                    <button class='btn btn-success btn-sm p-0 ml-3'>
                        <a class="nav-link m-0 py-0" href="logout.php">logout</a>
                    </button>
                </div>

                <!-- hien thi guest  -->
                <div class="nav-item ml-auto text-light d-none
                <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 0) echo "d-flex"; ?>
                  ">
                    <h3 class='d-inline'><?php
                                            if (isset($_SESSION['role']) && $_SESSION['role'] == 0)
                                                echo '<h5>' . $_SESSION['account'] . '</h5>';
                                            ?></h3>
                    <button class='btn btn-success btn-sm p-0 ml-3'>
                        <a class="nav-link m-0 py-0" href="logout.php">logout</a>
                    </button>
                </div>
            </div>
        </div>
    </nav>
    <!-- end nav  -->

    <div class="container mt-5">
        <?php 
            $id = $_GET['id'];
            // get product from database 
            require_once('./connectDB.php');
            $p = $conn->query("select * from product where productID='$id'");
            $p = $p->fetch_object();
            echo "<h2>$p->productName</h2><hr>";

            echo "<div class='row'>";
            echo "<div class='col-5'><img class='img-fluid p-2' src='$p->productImg'>";
            echo "</div>";
            echo "<div class='col-7'>";
            echo "<p>$p->productDescription</p>";
            echo "<h5>Pieces: $p->pieces (pieces)</h5>";
            echo "<h3>Price: $p->productPrice \$</h3>";
            echo "<button><a class='text-decoration-none' href='addCart.php?id=$id'>Add Cart</a></button>";
            echo "</div>";
            echo "</div>";
        ?>


    </div>
    <!-- Optional JavaScript --------------------------------------------->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -------------------->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <?php 
        $conn->close();
    ?>
</body>

</html>