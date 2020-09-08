<?php
    include 'includes/sessionTimer.php';
    $_SESSION['prev-pg']="/cart.php";
?>
<!DOCTYPE HTML>
<html>
    <head>
        <?php include 'includes/head.php'; ?>
        <?php include 'style.php'; ?>
    </head>
    <body>
        <!-----NavigationBar---->
        <div id="nav-div">
            <?php include 'includes/navbar.php'?>
        </div>
        <!--CartDisplay-->
        <div id="header-padding"></div>
        <div id="page-title-div"><p class="product-type">CART</p></div>
        <div id="main-div">
            <?php 
            // if logged in, show cart from db
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                require 'includes/dbh.php';
                include 'includes/addToCart.php';
                if (!empty($_GET) && !isset($_SESSION['added'])){
                    addItem();
                }
                $_SESSION['added'] = true; // will prevent adding same item multiple times
                showCart();
            }
            // if not logged in, prompt login
            else if(!isset($_SESSION['loggedin'])){
                echo '<a href="login.php?back=/cart.php">';
                echo "<button id='go-to-login-button'>Login</button>";
                echo '</a>';
                echo "<p class='reminder-text'>*Login to view your cart*</p>";
            }
            ?>
        </div>
        <!--Footer-->
        <div id="footer-div">
            <?php include 'includes/footer.php'; ?>
        </div>
    </body>
</html>