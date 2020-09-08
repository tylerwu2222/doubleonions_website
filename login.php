<?php
require 'includes/sessionTimer.php';
unset($_SESSION['added']);
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
            <!--Login Form-->
            <div id="header-padding"></div>
            <div id="page-title-div"><p class="product-type">LOGIN</p></div>
    		<div id="login-div">
    		    <div class="container">
    		        <div class="row justify-content-center">
        		        <div class="col-4 login-col">
                			<?php
                			if($_GET){
                				//echo $_GET['back'];
                				$_SESSION['prev-pg'] = $_GET['back'];
                			}
                			?>
                			<form action="includes/verifyLogin.php" method="POST" class="account-form">
                				<input type="text" name="emailuid" placeholder="username/email" class="input-field"><br>
                				<input type="password" name="pwd" placeholder="password" class="input-field"><br>
                				<button type="submit" name="login-submit" class="account-button">Login</button><br>
                				<a id="signup-link" href="signup.php">Create Account</a>
                			</form>
            			</div>
        			</div>
    			</div>
    		</div>
    	</div>
		<!--Footer-->
		<div id="footer-div">
            <?php include 'includes/footer.php'; ?>
        </div>
	</body>
</html>