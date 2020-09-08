<?php 
// start session
include 'sessionTimer.php';
require 'dbh.php';
// get user_id, username to match with cart items
$userID = $_SESSION['userId'];
$username = $_SESSION['username'];
$email = $_SESSION['email'];
$firstName = $_POST['first-name'];
$name = $_POST['first-name'] ." ". $_POST['last-name'];
$address = $_POST['address']. ", " .$_POST['city']. ", " .$_POST['state']. " " .$_POST['zip-code'] ;
$total = $_POST['total'];
$addInstr = $_POST['add-instr'];
// get all items under this user
$sql = "SELECT * FROM carts WHERE user_id = $userID";
$result = $conn->query($sql);
$orderArray = array();
// push all individual items [w/ qty in ()] into orderArray
while($row = $result->fetch_assoc()){
	$item = $row['product_name'];
	$quantity = $row['quantity'];
	$itemQty = $item ."(".$quantity.")";
	// push into order
	array_push($orderArray, $itemQty);
	
}
$itemList = implode(" ", $orderArray);
//echo $itemList; //works...
// insert values into order table
$sql= "INSERT INTO orders (user_id, username, email, address, item_list, total_price, comments) VALUES (?,?,?,?,?,?,?)";
$stmt = mysqli_stmt_init($conn);
mysqli_stmt_prepare($stmt,$sql);
mysqli_stmt_bind_param($stmt, "issssds", $userID, $username, $email, $address, $itemList, $total, $addInstr);
mysqli_stmt_execute($stmt);

// get most recent order num of user and set session var
$sql = "SELECT MAX(order_num) AS max_order_num FROM orders WHERE user_id = $userID";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$_SESSION['orderNum'] = $row['max_order_num'];
//echo 'ON: ' . $_SESSION['orderNum'];

// close stmts and conn to prepare for another product
mysqli_stmt_close($stmt);
mysqli_close($conn);

// return to orders page
header("Location:../order.php")
?>