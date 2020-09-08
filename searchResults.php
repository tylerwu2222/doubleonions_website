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
            <div id="header-padding"></div>
            <div id="search-div">
                <?php
                require 'includes/dbh.php';
                require 'includes/loadProducts.php';
                if(isset($_GET['search'])){
                    $keyword = $_GET['search'];
                    echo "<div class='container search-results'><div class='row justify-content-center'><p>Search results for '". $keyword ."'</p></div></div>";
                    $sql = "SELECT * FROM products WHERE tags LIKE '%$keyword%' OR name LIKE '%$keyword%'";
                    selectTable($conn, $sql);
                    $_SESSION['prev-pg']="/searchResults.php?search=$keyword";
                }
                ?>
            </div>
        </div>
        <!--Footer-->
        <div id="footer-div">
            <?php include 'includes/footer.php'; ?>
        </div>
	</body>
</html>