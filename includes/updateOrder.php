<?php
require 'dbh.php';
if(isset($_POST['order_num'])){
	$orderNum = $_POST['order_num']; // orderNum stored correctly...
	$newQty = $_POST['qty'];
	if($newQty == 0){
		echo '0';
		$sql = "DELETE FROM carts WHERE order_num=$orderNum";
		if (mysqli_query($conn, $sql)) {
	    //echo "Record deleted successfully";
		} 
		else {
		    echo "Error deleting record: " . mysqli_error($conn);
			mysqli_close($conn);
		}
	}
	else if($newQty > 0 && $newQty <= 999){
		//echo 'not 0 '.$orderNum;
		$sql = "UPDATE carts SET quantity=$newQty WHERE order_num = $orderNum";
		mysqli_query($conn, $sql);
		mysqli_close($conn);
	}
}
header("Location: ../cart.php");
?>