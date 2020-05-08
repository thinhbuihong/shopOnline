<?php
session_start();
// $_SESSION['order'] = 0;
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

<body onload='showProduct()'>
  <!-- begin navbar  -->
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
          <li class="nav-item ml-2 <?php if($_SESSION['role'] == 1){ echo "d-none";} ?>">
            <a href="cart.php" class="">
              <i class="fa fa-shopping-cart fa-2x" aria-hidden="true" id="cart-icon"></i>
            </a>
          </li>
        </ul>

        <!-- dang nhap -->
        <form class="form-inline ml-auto my-lg-0 
        <?php if (!empty($disable)) echo $disable; ?>
        " id='loginForm' method="POST" action="login.php">
          <input class="form-control mr-sm-2" id="account" type="text" placeholder="Account" name="account" value="">
          <input class="form-control mr-sm-2" id="password" type="password" placeholder="Password" name="password" value="">
          <button class="btn btn-outline-secondary my-2 my-sm-0 mr-1" id="login" type="submit">Log in</button>
          <button class="btn btn-outline-success my-2 my-sm-0" id="signup"><a href="./signUp.php" class="text-decoration-none">Sign up</a></button>
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
  <!-- end navbar  -->

  <!-- begin content  -->
  <div class="container" id="content">

    <div class="row">
      <!-- left -->
      <div class="col-lg-3">
        <button class="collapse-toggle d-block d-md-none btn btn-outline-warning w-100"
        data-toggle="collapse" data-target="#drop">Filter</button>
        <div class="list-group mt-5 collapse d-md-block" id="drop">
          <button class='list-group-item list-group-item-action list-group-item-warning' onclick="showProduct()">All
           </button>
          <?php 
            require_once('./connectDB.php');
            $categories = $conn->query("SELECT * FROM category");

            while($row = $categories->fetch_object()){
              echo "<button class='list-group-item list-group-item-action list-group-item-warning' onclick=\"showProduct('$row->categoryID')\">$row->categoryName</button>";
            }
          ?>
          
        </div>
        <div class="container-fluid d-none d-lg-block" id="ads">
          <img class="img-fluid mt-3" src="./images/images.png" alt="ads">
          <img class="img-fluid mt-3" src="./images/images.png" alt="ads">
        </div>
      </div>
      <!-- end left  -->

      <!-- right  -->
      <div class="col-lg-9">
        <!-- carousel  -->
        <div id="carouselExampleIndicators" class="carousel slide my-4 d-none d-md-block" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>

          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <img class="d-block img-fluid" src="https://s3-ap-southeast-1.amazonaws.com/legohousevn/42081_alt1.jpg" alt="Dell_xps_13-9350.jpg">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="https://s3-ap-southeast-1.amazonaws.com/legohousevn/21030_alt1.jpg" alt="Dell xps 15">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="https://p0ct8ommu0.vcdn.com.vn/media/catalog/product/cache/a237138a07ed0dd2cc8a6fa440635ea6/magento/LEGO_TECHNIC/42100/42100_2.png" alt="Dell_xps_15-7590">
            </div>
          </div>

          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
        <!-- end carousel  -->

        <!-- products  -->
        <div class="row" id='product'>

        </div>
        <!-- end products -->
      </div>
      <!-- /.row -->
    </div>
    <!-- end content  -->





    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Thinh Dep Zai</p>
      </div>
    </footer>


    <!-- Optional JavaScript --------------------------------------------->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -------------------->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>