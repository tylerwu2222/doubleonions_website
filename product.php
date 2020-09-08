<?php
	require 'includes/sessionTimer.php';
	unset($_SESSION['added']);
?>
<?php 
include 'includes/loadProducts.php';
function selectProduct($mysqli, $productID){
	$sql = "SELECT * FROM products WHERE product_id=$productID";
    $result = $mysqli->query($sql);
   	loadProductPage($result);
}

function loadProductPage($result){
	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		$productID = $row["product_id"];
		$productType =  $row["type"];
	    $productName =  $row["name"];
	    $productImage = $row["image_path"];
	    $productPrice =  $row["price"];
	    $productSizeRaw = $row["size"];
	    $productSizes = explode(',',strval($productSizeRaw));
	    $productColorsRaw = $row["color"];
	    $productDesc = $row["description"];
	    $productTagsRaw = $row["tags"];
	    $productTags = explode(',',strval($productTagsRaw));
	    $productStock = $row["stock"]; 
	    echo '<div class="container-fluid">
				<div class="row justify-content-md-center">
	    			<div class="col-md-7 product-table">';
		    echo '<a href="#"><img class="product-image img-fluid" src="'. $productImage .'" alt="productImage"></a>';
		    echo '<p class="product-small-text"> Tags: ';
		    $commaCount = 0;
		    $numTags = count($productTags);
		    foreach ($productTags as $tag){
		    	echo '<a href="searchResults.php?search='.$tag.'" class="tags">'. $tag. '</a>';
		    	if($commaCount != $numTags - 1){
		    	 echo ", ";
		    	}
		    	++$commaCount;
			}
			echo '</p></div>';
	    echo '<div class="col-md-5 product-table">';
		    echo '<p class="product-title">'. $productName . '</p>';
		    echo '<p class="product-price">$'.$productPrice.'</p>';
		    echo '<p class="product-small-text">'. $productDesc . '</p>';
		    $numSizes = count($productSizes);
		    
			// form for size, color, qty
			echo'<form action="cart.php?id='.$productID.'" method="POST">';
			// size select
			if($numSizes == 1){
		    	echo '<p class="product-text"> Size: '. $productSizes[0] .'</p>';
		    }
		    else{
		    	echo '<p class="product-text"> Size: <select name="size">';
		    	foreach($productSizes as $size){
		    		echo '<option>'.$size. '</option>';
		    	}
		    	echo '</select></p>';
			}
			// color select
		    if($productColorsRaw != NULL) {
		    	$productColors = explode(',',strval($productColorsRaw));	
			    $numColors = count($productColors);
			     if($numColors == 1){
			    	echo '<p class="product-text"> Color: '. $productColors[0] .'</p>';
			    }
			    else{
			    	echo '<p class="product-text"> Color: <select name="color">';
			    	foreach($productColors as $color){
				    	echo '<option>'. $color . '</option>';
			    	}
		    	echo '</select></p>';
		    	}
			}
			// if logged in, show addToCart button
			if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
				// only show qty select if logged in

				echo '<p class="product-text"> Qty: </p><input type="number" name="qty" value=1 min="1" max="999">';
				// disable ATC button if stock =0
				if($productStock == 0){
				    echo '<p class="product-stock-out product-small-text">' .$productStock. ' in stock</p>';
					echo '<input type="submit" id="add-to-cart-button" value="Add to Cart" disabled/>';
					echo '<p class="text-danger">This item is currently out of stock. </p>';
				}
				else if($productStock <= 10){
				    echo '<p class="product-stock-low product-small-text">' .$productStock. ' in stock</p>';
				    echo '<input type="submit" id="add-to-cart-button" value="Add to Cart" />';
				}
				else{
				    echo '<p class="product-stock product-small-text">' .$productStock. ' in stock</p>';
					echo '<input type="submit" id="add-to-cart-button" value="Add to Cart" />';
				}
				echo '</form></div></div></div>';
			}
			// else prompt login
			else if(!isset($_SESSION['loggedin'])){
				echo '</form>';
				echo '<p class="product-stock product-small-text">' .$productStock. ' in stock</p>';
				echo '<a href="login.php?back=/product.php?id='.$productID.'"">';
				echo "<button id='go-to-login-button'>Login</button>";
				echo '</a>';
				echo '<p class="reminder-text">*Login to add items to cart*</p>';
				echo '</div></div></div>';
			}

		
	}
}
?>
<!DOCTYPE HTML>
<html lang="en">
	<head>
		<?php include 'includes/head.php'; ?>
		<?php include 'style.php'; ?>
    </head>
  <body>
        <!--NavigationBar-->
        <div id="nav-div">
        	<?php include 'includes/navbar.php'?>
        </div>
        <!--MainDisplay-->
        <div id="main-div">
            <!--ProductDisplay-->
            <div id="header-padding"></div>
            <div id="page-title-div"></div>
            <div id="product-div">
            	<?php
            	$id = $_GET['id'];
            	require 'includes/dbh.php';
            	selectProduct($conn,$id);
            	?>
            </div>
        </div>
        <!--Footer-->
		<div id="footer-div">
            <?php include 'includes/footer.php'; ?>
        </div>
	</body>

</html>