
<?php  
require 'dbh.php';
session_start(); // gives access to 
$comment = $_POST['responseText'];
if(empty($comment)){
	header("Location:../contact.php?comment=missing");
exit();
}
// logged in, then attach uid and un
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
	$userID = $_SESSION['userId'];
	$username = $_SESSION['username'];
}
// else null
else{
	$userID = NULL;
	$username = NULL;
}
$sql = "INSERT INTO comments (user_id, username, comment) VALUES (?,?,?)";
$stmt = mysqli_stmt_init($conn);
$stmt->prepare($sql);
$stmt->bind_param("iss", $userID,$username,$comment);
echo $conn->error;
$stmt->execute();
mysqli_stmt_close($stmt);
mysqli_close($conn);
header("Location:../contact.php?comment=submitted");
exit();
?>