<?php
    require_once('./connectDB.php');

    

    $query = "SELECT productName,productDescription, productPrice, productImg FROM Product";
    $result = $conn->query($query);
    $product ='';
    // printf("Query failed: %s\n", $conn->error);

    // Numeric array
    while ($row = $result->fetch_object()) {
        $product .= '<div class="col-lg-4 col-md-6 mb-4">';
        $product .= '<div class="card h-100">';
        $product .= '<a href="#"><img class="card-img-top" style="height:175px;" src="'.$row->productImg.'" alt=""></a>';
        $product .= '<div class="card-body">';
        $product .= '<h4 class="card-title">';
        $product .= '<a href="#">'.$row->productName.'</a></h4>';
        $product .= '<h5>$'.$row->productPrice.'</h5>';
        $product .= '<p class="card-text">' .$row->productDescription;
        $product .= '</p></div></div></div></div>';

    }
    echo $product;

    // Free result set
    $result->free_result();

    $conn->close();
?>