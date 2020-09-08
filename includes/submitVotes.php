<?php
require 'dbh.php';
// array of voted for items
$votedItems = $_POST['product-id'];
// increment each product that was voted for
foreach($votedItems as $productID){
	$sql =  "UPDATE products SET votes = votes + 1 WHERE product_id=$productID";
	mysqli_query($conn, $sql);
}
//set session submitted to true
session_start();
$_SESSION['submitted']=true;
// return to index
header("Location: ../index.php?form=submitted");
?>