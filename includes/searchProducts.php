<?php 
// redirect back to parent with keyword query
$keyword = $_POST['keyword'];
$type = $_POST['product-type'];
//echo "keyword ".$keyword. " type ". $type;
header("Location:../".$type.".php?search=".$keyword);
?>