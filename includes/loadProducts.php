<?php
function setHeading($page){
	$heading = $page;
	echo '<p class="product-type">'.strtoupper($heading).'</p>';
	echo '<div class="md-form"><form class="navbar-form" action="includes/searchProducts.php" method="POST">';
    echo '<input class="form-control product-search" type="text" name="keyword" placeholder="Search '.$heading.'..." aria=label="Search"><input type="hidden" name="product-type" value='.$heading.'><input type="submit" style="display: none" />';
    echo '</form></div>';
}

// create and fill table
function setTable($result, $num_items){
	echo '<div class="container-fluid product-table"><div class="row justify-content-md-center">';
    for($i = 0; $i < $num_items;++$i){
                $row = $result->fetch_assoc();
				$productID = $row["product_id"];
		        $productName =  $row["name"];
		        $productImage = $row["image_path"];
		        $productPrice =  $row["price"];
                // create product item, 2 per row, since 
                echo '<div class="col-md-3"><a class="product-link" href="product.php?id='.$productID.'"> <img class="thumbnail-photo" src="' . $productImage . '" alt="product_image">';
				echo '<p class="thumbnail-title">'. $productName . '</p>';
				echo '<p class="thumbnail-price">$'. $productPrice .'</p></a>';
                echo '</div>';
    }
    echo '</div></div>';
}

function selectTable($mysqli, $sql){
    $result = $mysqli->query($sql);
    $num_items = $result->num_rows;
    setTable($result, $num_items);
    $mysqli->close();
}

?>