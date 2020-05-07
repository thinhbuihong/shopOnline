<?php
session_start();
// if($_SESSION['order'] == 1){
//     unset($_SESSION['cart']);
//     $_SESSION['order'] == 0;
// }

$disable = '';
if (isset($_SESSION['role'])) {
    $disable = 'd-none';
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>ShopOnline</title>
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
        <h4 class="d-inline mr-2">Your Cart
            <?php
            if (empty($_SESSION['cart'])) {
                echo "Is Empty";
            }
            ?>
        </h4>
        <table class="table table-hover table-sm mt-2">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quality</th>
                    <th scope="col">#</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $product = [];
                if (!empty($_SESSION['cart'])) {
                    $cart = $_SESSION['cart'];
                    require_once('./connectDB.php');
                    $i = 1;
                    $total = 0;
                    $items = 0;
                    foreach ($cart as $id => $quality) {
                        // $pro{0=>id, 1=>quality}
                        //get product from database
                        $p = $conn->query("SELECT * FROM product WHERE productID='$id'");
                        $p = $p->fetch_object();

                        echo "<tr><td>$i</td>
                              <td>$p->productName</td>
                              <td>$p->productPrice $</td>
                              <td>$quality</td>
                              <td><button><a class=\"text-decoration-none text-dark\" href=\"deleteItemCart.php?id=$id\">delete</a></button></td>
                              </tr>";

                        $items += $quality;
                        $total += $quality * $p->productPrice;
                        $i += 1;
                    }
                    // total price 
                    echo "<tr><td></td><td></td>
                        <td>$total $</td>
                        <td>$items items</td>
                        <td><button><a class=\"text-decoration-none text-success\" href=\"order.php\">Buy</a></button></td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <!-- Optional JavaScript --------------------------------------------->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -------------------->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>