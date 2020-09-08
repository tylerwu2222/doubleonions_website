<?php
require 'includes/sessionTimer.php';
unset($_SESSION['added']);
?>

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
            <!--Signup Form-->
            <div id="header-padding"></div>
            <div id="page-title-div"><p class="product-type">SIGN UP</p></div>
    		<div id="signup-div">
    		    <div class="container">
    		        <div class="row justify-content-center">
        		        <div class="col-4 signup-col">
                			<form action="includes/addUser.php" method="POST" class="account-form">
                				<input type="text" name="uid" placeholder="username" class="input-field"><br>
                				<input type="text" name="email" placeholder="email" class="input-field"><br>
                				<input type="password" name="pwd" placeholder="password" class="input-field"><br>
                				<input type="password" name="pwd-repeat" placeholder="re-enter password" class="input-field"><br>
                				<button type="submit" name="signup-submit" class="account-button">Create Account</button>
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