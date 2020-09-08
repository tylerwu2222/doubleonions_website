
<?php
// reached login page correctly...
if(isset($_POST['login-submit'])){
	require 'dbh.php';
	$username_email=$_POST['emailuid'];
	$password=$_POST['pwd'];

	// check for empty fields
	if(empty($username_email) || empty($password)){
		header("Location:../login.php?error=empty_fields&email_uid=".$username_email);
		exit();
	}
	// else check match
	else{
		$sql = "SELECT * FROM users WHERE username=? OR email=?";
		$stmt = mysqli_stmt_init($conn);
	
		if(!mysqli_stmt_prepare($stmt,$sql)){
				header("Location: ../login.php?error=sql_error1");
				exit();
		}
		else{
			mysqli_stmt_bind_param($stmt, "ss", $username_email, $username_email);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			// fetch assoc turns raw $result data into an associative array
			if($row = mysqli_fetch_assoc($result)){
				$pwd_check = password_verify($password, $row['password']);
				if($pwd_check == false){
					header("Location: ../login.php?error=wrong_pwd");
					exit();
				}
				// CORRECT LOGIN -> START SESSION
				else if($pwd_check == true){
					session_start();
					$_SESSION['loggedin'] = true;
					$_SESSION['userId'] = $row["user_id"];
					$_SESSION['username'] = $row["username"];
					$_SESSION['email'] = $row["email"];
					if(isset($_SESSION['prev-pg'])){
						echo $_SESSION['prev-pg'];
						header("Location: ..".strval($_SESSION['prev-pg']));
					}
					else{
					    header("Location: ../index.php?login=success");
					}
					exit();
				}
				else{
					header("Location: ../login.php?error=wrong_pwd");
					exit();
				}
			}
			else{
				header("Location: ../login.php?error=no_user");
				exit();
			}
		}
	}
}
// else return to index page
else{
	header("Location:../index.php");
	exit();
}

?>