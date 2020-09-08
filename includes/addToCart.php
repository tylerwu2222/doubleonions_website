<?php
	include 'includes/sessionTimer.php';
?>
<?php
function addItem(){
	require 'dbh.php';
	// set data to send to db
	// user data
    $userID = $_SESSION['userId'];
	$username = $_SESSION['username'];
	// product data
	$productID = $_GET['id'];
	$sql = "SELECT * FROM products WHERE product_id=$productID";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		$productName = $row['name'];
		$productImage = $row['image_path'];
		$productPrice = $row['price'];
	}
	if(isset($_POST['size'])){

		$productSize = $_POST['size'];
	}
	else{
		$productSize = 'default';
	}
	//echo $productSize;
	if(isset($_POST['color'])){
		$productColor = $_POST['color'];
	}
	else{
		$productColor = 'default';
	}
	//echo $productColor;
    $productQuantity = $_POST['qty'];

    //add product(s) to cart table:
    $sql2 = "INSERT INTO carts (user_id, username, product_id, product_name, product_img, quantity, size, color, price) VALUES (?,?,?,?,?,?,?,?,?)";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt,$sql2);
	mysqli_stmt_bind_param($stmt, "isississd", $userID, $username, $productID, $productName, $productImage, $productQuantity, $productSize, $productColor, $productPrice);
	mysqli_stmt_execute($stmt);
	// close stmts and conn to prepare for another product
	mysqli_stmt_close($stmt);
	mysqli_close($conn);
}

function showCart(){
	require 'dbh.php';
    $userID=$_SESSION['userId'];
    $sql = "SELECT * FROM carts WHERE user_id=$userID";
	$result = $conn->query($sql);
	$numOrders=$result->num_rows;
	// empty cart
    if($numOrders == 0){
        echo 'Your cart is currently empty.';
    }
    // else get orders from db
    else{
    	// create cart table
    	echo '<div class="container-fluid" id="cart-table">';
    	while ($row =$result->fetch_assoc()) {
    		$productName = $row['product_name'];
			$productImage = $row['product_img'];
    		$productQuantity = $row['quantity'];
    		$productPrice = $row['price'];
    		$orderNum = $row['order_num'];
    		echo '<div class="row justify-content-md-center"><div class="col-md-5 cart-col"><img src="'.$productImage.'" alt="product_image" class="cart_prod_image"></div>';
    		echo '<div class="col-md-5 cart-col"><p class="cart_prod_name">'.$productName.'</p>';
    		echo '<form action ="includes/updateOrder.php" method="POST" class="remove-prod-form">
    		Qty: <input type="number" name="qty" data-toggle="tooltip" title="Set quantity to 0 and update to remove an item." min="0" max="999" placeholder=1 value="'.$productQuantity.'"/><br>';
    		echo '<input type="hidden" name="order_num" value="'.$orderNum.'">';
    		echo '<input type="submit" id="udpate-button" value="Update">';
    		echo '</form></p></div></div>';
		}
    	echo '<div class="row justify-content-md-center"><div class="col-md-5 cart-col"></div><div class="col-md-5 cart-col"><form action="order.php"><input type="submit" id="checkout-button" value="Checkout"></form></div></div></div>';
    }
}
// add an ajax/js function that updates qty values when user leaves pg... onbeforeunload?
?>