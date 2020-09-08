<?php
require 'includes/sessionTimer.php';
unset($_SESSION['added']);
$_SESSION['prev-pg']="/prints.php";
?>
<!DOCTYPE HTML>
<html lang="en">
    <head>
        <?php include 'includes/head.php'; ?>
        <?php include 'style.php'; ?>
    </head>
    <body>
        <!-----NavigationBar---->
        <div id="nav-div">
            <?php include 'includes/navbar.php'?>
        </div>
        <!--ProductDisplay-->
        <div id="header-padding"></div>
        <div id="page-title-div">
            <?php include 'includes/loadProducts.php';
            setHeading('prints');
            ?>
        </div>
        <div id="page-subtitle-div">
        </div>
        <div id="main-div">
            <?php
            require 'includes/dbh.php';
            // if search query, get
            if(isset($_GET['search'])){
                $keyword = $_GET['search'];
                echo "<div class='container'><div class='row justify-content-center'>Search results for '". $keyword ."'</div></div>";
                $sql = "SELECT * FROM products WHERE type='print' AND (tags LIKE '%$keyword%' OR name LIKE '%$keyword%')";
            }
            // print all items
            else{
                $sql = "SELECT * FROM products WHERE type='print'";
            }
            selectTable($conn, $sql);
            ?>
        </div>
        <!--Footer-->
        <div id="footer-div">
            <?php include 'includes/footer.php'; ?>
        </div>
    </body>
</html>