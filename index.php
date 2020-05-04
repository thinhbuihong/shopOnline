<?php 
  session_start()  ;

?>

<!doctype html>
<html lang="en">

<head>
  <title>ShopOnline</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- animate -->
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css"> -->
  

  <!-- my css    -->
  <link rel="stylesheet" href="style.css">
  <script src='./myjavascript.js'></script>
</head>
<!-- body------------------------------------------------------------------------------------------------------------------ -->
<body onload='loadProduct()'>
  <!-- begin navbar  -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top px-0">
    <div class="container px-0">
      <!-- logo -->
      <a class="navbar-brand" href="index.php">
        <img src="./images/logo/logo.png" alt="logo ATN" class='d-inline-block' height='40px' width='65px'>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
        aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
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

        <!-- dang nhap -->
        <form class="form-inline ml-auto my-lg-0" id='login' method="POST" action="login.php">
          <input class="form-control mr-sm-2" id="email" type="text" placeholder="Email@gmail.com" name="email" value="">
          <input class="form-control mr-sm-2" id="password" type="text" placeholder="Password" name="password" value="">
          <button class="btn btn-outline-secondary my-2 my-sm-0 mr-1" id="login" type="submit">Log in</button>
          <button class="btn btn-outline-success my-2 my-sm-0" id="signup" type="">Sign up</button>
        </form>
      </div>
    </div>
  </nav>
  <!-- end navbar  -->

  <!-- begin content  -->
  <div class="container" id="content">

    <div class="row">
      <!-- left -->
      <div class="col-lg-3">

        <!-- <h1 class="my-4">Thinh dep trai</h1> -->
        <div class="list-group ">
          <!-- brand  -->
          <li class="dropdown">
            <a href="#" class="list-group-item " id="brand">Brand</a>
            <div class="dropdown-menu">
              <a href="" class="dropdown-item">Dell</a>
              <a href="" class="dropdown-item">HP</a>
              <a href="" class="dropdown-item">Lenovo</a>
              <a href="" class="dropdown-item">Macbook</a>
              <a href="" class="dropdown-item">Microsoft</a>
            </div>
          </li>
          <!-- operating system  -->
          <li class="dropdown">
            <a href="#" class="list-group-item " id="brand">Operating System</a>
            <div class="dropdown-menu">
              <a href="" class="dropdown-item">Windows</a>
              <a href="" class="dropdown-item">Mac OS</a>
              <a href="" class="dropdown-item">Linux</a>
              <a href="" class="dropdown-item">Macbook</a>
            </div>
          </li>
          <!-- compuer processor type  -->
          <li class="dropdown">
            <a href="#" class="list-group-item " id="brand">Computer Processor Type</a>
            <div class="dropdown-menu">
              <a href="" class="dropdown-item">Intel Core i5</a>
              <a href="" class="dropdown-item">Interl Core i3</a>
              <a href="" class="dropdown-item">Intel Core i7</a>
              <a href="" class="dropdown-item">Intel Celeron</a>
              <a href="" class="dropdown-item">Intel celeron</a>
              <a href="" class="dropdown-item">AMD A-Series</a>
              <a href="" class="dropdown-item">Intel Pentium</a>
            </div>
          </li>

        </div>
        <!-- end lis group  -->
        <!-- ads  -->
        <div class="container-fluid" id="ads">
          <img class="img-fluid mt-3" src="./images/images.png" alt="ads">
          <img class="img-fluid mt-3" src="./images/images.png" alt="ads">
        </div>
      </div>
      <!-- end left  -->

      <!-- right  -->
      <div class="col-lg-9">
        <!-- carousel  -->
        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel" >
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
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
      </div>
    </footer>

    
    <!-- Optional JavaScript --------------------------------------------->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -------------------->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
      crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
      crossorigin="anonymous"></script>
</body>

</html>
