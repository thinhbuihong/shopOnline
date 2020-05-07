<?php 
    require_once('./connectDB.php');

    $table = $_GET['par'];
    // echo $table;
    if($table == 'product'){
        $query = "select productID, productName, productAvailable, productPrice, pieces, categoryID from $table";
        $result = $conn->query($query);

        echo '<h4 class="d-inline mr-2">Product</h4> 
            <button><a href="addProduct.php">Add</a></button>';
        echo '<table class="table table-hover table-sm mt-2">';
        echo '<thead class="thead-dark">';
        echo '<tr><th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">available</th>
            <th scope="col">Price</th>
            <th scope="col">Pieces</th>
            <th scope="col">category ID</th>
            <th scope="col">#</th>
            <th scope="col">#</th></tr>';
        echo '</thead><tbody>';
        while($p = $result->fetch_assoc()){
            $productHTML = "<tr>";
            foreach ($p as $value) {
                # code...
                $productHTML .= "<td>$value</td>";
            }
            echo $productHTML;
            //them nut sua va xoa
            echo '<td><button><a href="modifyProduct.php?id='.$p['productID'].'">modify</a></button></td>
                    <td><button><a href="deleteProduct.php?id='.$p['productID'].'">delete</a></button></td>';
            echo '</tr>';
        }
        echo '</tbody></table>';
        
    }

    //category
    if($table == 'category'){
        $query = "select * from $table";
        $result = $conn->query($query);

        echo '<h4 class="d-inline mr-2">Categories</h4> 
            <button><a href="addCategory.php">Add</a></button>';
        echo '<table class="table table-hover table-sm mt-2">';
        echo '<thead class="thead-dark">';
        echo '<tr><th scope="col">#</th>
            <th scope="col">Category Name</th>
            <th scope="col">Category Description</th>
            <th scope="col">#</th>
            <th scope="col">#</th></tr>';
        echo '</thead><tbody>';
        while($p = $result->fetch_assoc()){
            $productHTML = "<tr>";
            foreach ($p as $value) {
                # code...
                $productHTML .= "<td>$value</td>";
            }
            echo $productHTML;
            //them nut sua va xoa
            echo '<td><button><a href="modifyCategory.php?id='.$p['categoryID'].'">modify</a></button></td>
                    <td><button><a href="deleteCategory.php?id='.$p['categoryID'].'">delete</a></button></td>';
            echo '</tr>';
        }
        echo '</tbody></table>';
        
    }

    //customer
    if($table == 'customer'){
    $query = "select * from $table";
    $result = $conn->query($query);

    echo '<h4 class="d-inline mr-2">Customer</h4> ';
        // <button><a href="addProduct.php">Add</a></button>';
    echo '<table class="table table-hover table-sm mt-2">';
    echo '<thead class="thead-dark">';
    echo '<tr><th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Address</th>
        <th scope="col">Email</th>
        <th scope="col">Phone</th>
        <th scope="col">gender</th>
        <th scope="col">Account ID</th>
        <th scope="col">#</th>
        <th scope="col">#</th></tr>';
    echo '</thead><tbody>';
    while($p = $result->fetch_assoc()){
        $productHTML = "<tr>";
        foreach ($p as $value) {
            # code...
            $productHTML .= "<td>$value</td>";
        }
        echo $productHTML;
        //them nut sua va xoa
        echo '<td><button><a href="modifyCustomer.php?id='.$p['customerID'].'">modify</a></button></td>
                <td><button><a href="deleteCustomer.php?id='.$p['customerID'].'">delete</a></button></td>';
        echo '</tr>';
    }
    echo '</tbody></table>';
    }

    //order
    if($table == 'orderdetail'){
    // $query = "SELECT * FROM $table";
    $query = "SELECT t1.orderDetailsID, t3.customerName, t1.productID, t1.productQuatity
    FROM orderdetail AS t1 INNER JOIN orders AS t2 
    ON t1.orderID = t2.orderID 
    INNER JOIN customer as t3 
    on t2.customerID = t3.customerID";

    $result = $conn->query($query);

    echo '<h4 class="d-inline mr-2">Order</h4> ';
        // <button><a href="addProduct.php">Add</a></button>';
    echo '<table class="table table-hover table-sm mt-2">';
    echo '<thead class="thead-dark">';
    echo '<tr><th scope="col">#</th>
        <th scope="col">Customer Name</th>
        <th scope="col">Product ID</th>
        <th scope="col">Product quatity</th>';
    echo '</thead><tbody>';
    while($p = $result->fetch_assoc()){
        $productHTML = "<tr>";
        foreach ($p as $value) {
            # code...
            $productHTML .= "<td>$value</td>";
        }
        echo $productHTML;
        //them nut sua va xoa
    }
    echo '</tbody></table>';}
    
?>