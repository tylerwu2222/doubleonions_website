<?php
require 'includes/sessionTimer.php';
unset($_SESSION['added']);
$_SESSION['prev-pg']="/contact.php";
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
        <!--MainDisplay-->
        <div id="main-div">
            <div id="header-padding"></div>
            <div id="page-title-div">
                <h3 class="product-type">CONTACT</h3>
            </div>
            <div id="form-div">
                <div class="container-fluid">
                    <div class="row justify-content-md-center">
                        <div class="col col-md-3 contact-col">
                            <address class="contact-content">
                            email: <a href="mailto:22onions@gmail.com"> 22onions@gmail.com </a> <br>
                            instagram: <a href="http://www.instagram.com/doubleonions/" target="_blank"> instagram.com/doubleonions/</a> <br>
                            </address><br>
                            <form id="response-form" action="includes/response.php" method="POST">
                                <p class="contact-content"> or leave a comment below: </p>
                                <textarea class="text-box" name="responseText" cols="40" rows="5"></textarea> <br>
                                <button id="submit-button" type="submit">Submit</button>
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