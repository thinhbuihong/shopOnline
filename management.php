<?php 
    require_once('./connectDB.php');

    $table = $_GET['par'];
    // echo $table;
    if($table == 'Product'){
        $query = "select productID, productName, productAvailable, productPrice, pieces, categoryID from $table";
        $result = $conn->query($query);

        echo '<table class="table table-hover table-sm">';
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


    
?>