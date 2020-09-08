<?php
include 'includes/sessionTimer.php';
unset($_SESSION['added']);
$_SESSION["prev-pg"] = "/index.php";
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
            <div id="header-padding">
            </div>
            <div id="banner-div">
                <?php include 'includes/banner.php'; ?>
            </div>
            <div id="survey-div" class="container-fluid">
                <?php
                if(isset($_GET['signup']) && $_GET['signup'] == 'success'){
                    echo "<script>alert('Signup successful!');</script>";
                }
                include 'includes/votingForm.php'; ?>
            </div>
        </div>

        <!--Footer-->
        <div id="footer-div">
            <?php include 'includes/footer.php'; ?>
        </div>
	</body>
</html>