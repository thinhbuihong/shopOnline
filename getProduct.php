<?php
    require_once('./connectDB.php');

    $categoryID = $_GET['cate'] ;
    $filter ="";
    if($categoryID !== 'all'){
        $filter = "where categoryID='$categoryID'";
    }
    

    $query = "SELECT productID, productName,productDescription, productPrice, productImg
                 FROM Product ".$filter;
    $result = $conn->query($query);
    $product ='';

    // echo $query;
    // printf("Query failed: %s\n", $conn->error);

    // Numeric array
    while ($row = $result->fetch_object()) {
        $product .= '<div class="col-lg-4 col-md-6 mb-4">';
        $product .= '<div class="card h-100">';
        $product .= '<a href="product.php?id='.$row->productID.'"><img class="card-img-top" style="height:175px;" src="'.$row->productImg.'" alt=""></a>';
        $product .= '<div class="card-body">';
        $product .= '<h4 class="card-title">';
        $product .= '<a href="product.php?id='.$row->productID.'">'.$row->productName.'</a></h4>';
        $product .= '<h5>$'.$row->productPrice.'</h5>';
        $product .= '<p class="card-text">' .$row->productDescription;
        $product .= '</p></div></div></div></div>';

    }
    echo $product;

    // Free result set
    $result->free_result();

    $conn->close();
?>