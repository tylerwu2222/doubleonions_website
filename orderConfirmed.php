k<?php
    include 'includes/sessionTimer.php';
    unset($_SESSION['added']);
?>
<!DOCTYPE HTML>
<html>
    <head>
        <?php include 'includes/head.php'; ?>
        <?php include 'style.php'; ?>
    </head>
    <body>
        <!-----NavigationBar---->
        <div id="nav-div">
            <?php include 'includes/navbar.php'?>
        </div>
        <!--OrderDisplay-->
        <div id="header-padding"></div>
        <div id="main-div">
            <p class="product-type">RECIEPT</p>
            <p>Your payment was recieved.</p>
            <?php
                require 'includes/dbh.php';
                $orderNum = $_SESSION['orderNum'];
                $userId = $_SESSION['userId'];
                //echo 'order_num: ' . $orderNum . 'userID: ' . $userId;
                $sql = "SELECT * FROM orders WHERE order_num=$orderNum";
                $result = $conn->query($sql);
            	if ($result->num_rows > 0) {
            		$row = $result->fetch_assoc();
            		$address = $row['address'];
            		$items = $row['item_list'];
            		$totalPrice = $row['total_price'];
            	}
            	
            	echo "<div class='container order-confirm-msg'><div class='row justify-content-center'><p>Your purchase of " . $items. " will be delivered to ". $address . "</p></div>"; 
            	echo "<div class='row justify-content-center'><p> If you have any questions or concerns, email me at <a href='mailto:22onions@gmail.com'>22onions@gmail.com </a></div></div>";
            	$sql2 = "SELECT * FROM carts WHERE user_id=$userId";
            	$result = $conn->query($sql);
            	while($row = $result->fetch_assoc()) {
            	    $item = $row['product_name'];
            	    // once order made (payment confirmed)... remove from stock qty ordered
                	$sql3 = "UPDATE products SET stock=stock-$quantity WHERE (name='$item' AND stock>0)";
                	if(mysqli_query($conn, $sql2)){
                	    //echo 'works';
                	}
                	else{
                		echo "Error deleting record: " . mysqli_error($conn);
                	}
            	}
            
            	// and remove users items from cart table
                $sql4 = "DELETE FROM carts WHERE user_id = $userId";
                $conn->query($sql4);
            ?>
        </div>
        
        <!--Footer-->
        <div id="footer-div">
            <?php include 'includes/footer.php'; ?>
        </div>
    </body>
</html>