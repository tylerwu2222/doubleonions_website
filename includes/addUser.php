<?php
//first check if user clicked submit (don't want user to access directly)
if(isset($_POST['signup-submit'])){
	require 'dbh.php';
	$username=$_POST['uid'];
	$email=$_POST['email'];
	$password=$_POST['pwd'];
	$passwordRepeat=$_POST['pwd-repeat'];

	// empty fields
	if(empty($username) || empty($email) || empty($password) || empty($passwordRepeat)){
		echo "<script>alert('Some fields are still empty');window.location.href='../signup.php?error=empty_fields'</script>;";
		exit();
	}
	// invalid email and username
	else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)){
		echo "<script>alert('Invalid username and email');window.location.href='../signup.php?error=invalid_un_email'</script>";
		exit();
	}
	// invalid email
	else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		echo "<script>alert('Invalid email');window.location.href='../signup.php?error=invalid_email'</script>";
		exit();
	} 
	// invalid username
	else if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
		echo "<script>alert('Invalid username');window.location.href='../signup.php?error=invalid_un'</script>";
		exit();
	}
	// password mismatch
	else if($password != $passwordRepeat){
		echo "<script>alert('Passwords do not match');window.location.href='../signup.php?error=pw_mismatch'</script>";
		exit();
	}
	else{
		// prepared statements protect against SQL injection
		$sql = "SELECT username FROM users WHERE username=?";
		$stmt = mysqli_stmt_init($conn);
		$sql2 = "SELECT email FROM users WHERE email=?";
		$stmt2 = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			header("Location: ../signup.php?error=sql_error");
			exit();
		}
		else{
			//"s" string, "i" int,"b" boolean, "iii" = 3 ints..
			// check un
			mysqli_stmt_bind_param($stmt, "s", $username);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$unCount = mysqli_stmt_num_rows($stmt);
			mysqli_stmt_prepare($stmt2,$sql2);
			mysqli_stmt_bind_param($stmt2, "s", $email);
			mysqli_stmt_execute($stmt2);
			mysqli_stmt_store_result($stmt2);
			$emailCount = mysqli_stmt_num_rows($stmt2);
			// existing username or email
			if($unCount > 0){
				echo "<script>alert('Username taken');window.location.href='../signup.php?error=un_taken'</script>";
				exit();
			}
			else if($emailCount > 0){
				echo "<script>alert('Email already in use');window.location.href='../signup.php?error=email_taken'</script>";
				exit();
			}
			// create new user
			else{
				// again use ? as placeholders b/c sensitive info
				$sql = "INSERT INTO users (username, email, password) VALUES (?,?,?)";
				$stmt = mysqli_stmt_init($conn);
				if(!mysqli_stmt_prepare($stmt,$sql)){
					header("Location: ../signup.php?error=sql_error");
					exit();
				}
				else{
					// hash pwd for extra security
					$hashedPwd = password_hash($password, PASSWORD_DEFAULT);
					//"s" string, "i" int,"b" boolean, "iii" = 3 ints..
					mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
					//echo $conn->error
					mysqli_stmt_execute($stmt);
					header("Location: ../index.php?signup=success");
					exit();
				}
			}
		}
	}
	mysqli_stmt_close($stmt);
	mysqli_close($conn);
}
else{
	header("Location: ../signup.php");
	exit();
}
?>