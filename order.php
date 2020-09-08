<script type="text/javascript">
    function submitForms(){
            document.getElementById("paypal-form").submit();
            document.getElementById("shipping-form").submit();
    }
</script>

<?php
    require 'includes/sessionTimer.php';
    unset($_SESSION['added']);
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
        <!--MainDisplay-->
        <div id="main-div">
        <!--OrderDisplay-->
        <div id="header-padding"></div>
        <div id="page-title-div"><p class="product-type">ORDER</p></div>
        <div id="main-div">
            <div class="container-fluid">
                <div class="row justify-content-md-center">
                    <!--order summary-->
                    <div class="col col-md-3 order-col">
                        <p>Order Summary</p>
                        <?php
                            require 'includes/dbh.php';
                            $userID=$_SESSION['userId'];
                            $sql = "SELECT * FROM carts WHERE user_id=$userID";
                            $result = $conn->query($sql);
                            $numOrders=$result->num_rows;
                            $subTotal = 0;
                            $shipping = 1.00;
                            // calculate prices
                            while ($row =$result->fetch_assoc()) {
                                $productID = $row['product_id'];
                                $productPrice = $row['price'];
                                $productQuantity = $row['quantity'];
                                $itemTotal = $productPrice * $productQuantity;
                                $itemTotal = number_format($itemTotal,2);
                                $productName = $row['product_name'];
                                $sql2 = "SELECT * FROM products WHERE product_id=$productID";
                                $result2 = $conn->query($sql2);
                                $row2 =$result2->fetch_assoc();
                                //increase shipping for clothing/prints
                                if($row2['type'] == 'clothing'){
                                    $shipping = 4.00;
                                }
                                else if($row2['type'] == 'prints'){
                                    $shipping = 3.00;
                                }
                                echo '<div class="row justify-content-md-center"><p>'.$productName.' [ x'.$productQuantity.' ] --> $'.$itemTotal.'</p></div>';
                                $subTotal += $itemTotal;
                                $_SESSION['subTotal'] = $subTotal;
                                
                            }
                            //subtotal
                            $subTotal = number_format($subTotal,2);
                            echo '<div class="row justify-content-md-center"><p>Subtotal: $'.$subTotal.'</p></div>';
                            $tax = $subTotal * .0725;
                            $tax = round($tax, 2);
                            echo '<div class="row justify-content-md-center"><p>Tax: $'.$tax.'</p></div>';
                            $shipping = number_format($shipping,2);
                            echo '<div class="row justify-content-md-center"><p>Shipping: $'.$shipping.'</p></div>';
                            $total = $subTotal + $tax + $shipping;
                            echo '<div class="row justify-content-md-center"><p>Total: $'.$total.'</p></div>';
                    ?>
                    <div class="row justify-content-md-center">
                    <button type="button" id="back-to-cart-btn" onclick="location.href = '/cart.php';">Back to Cart</button>
                    </div>
                    </div>
                    <!--shipping info-->
                    <div class="col-md-3 order-col">
                        <form action="includes/makeOrder.php" method='POST' id="shipping-form">
                            <div class="order-form">
                                <input class ="form-control" type="text" name="first-name" placeholder="First name" required/><br>
                                <input class ="form-control" type="text" name="last-name" placeholder="Last name" required/><br>
                                <input class ="form-control" type="text" name="address" placeholder="Address" required/><br>
                                <input class ="form-control" type="text" name="city" placeholder="City" required/><br>
                                <?php
                                    include 'includes/statesList.php';
                                ?><br>
                                <input class="form-control" type="text" name="zip-code" placeholder = "ZIP code" required><br>
                                <?php
                                echo '<input type="hidden" name="total" value='.$total.'>';
                                ?>
                                <textarea class="form-control text-box" name="add-instr" cols="40" rows="5" placeholder="Additional instructions..."></textarea>
                                <?php
                                $orderEmail = $_SESSION['email'];
                                    echo '<input type="hidden" name="email" value="'.$orderEmail.'">';
                                                      
                                ?>
                            </div>
                        </form>
                              
                        <!--Paypal form-->
                        <form action="https://www.paypal.com/cgi-bin/webscr" id="paypal-form" method="POST" target="_blank">
                            <input type="hidden" name="cmd" value="_xclick">
                            <input type="hidden" name="business" value="22onions@gmail.com">
                            <input type="hidden" name="lc" value="US">
                            <input type="hidden" name="item_name" value="shoppingCart">
                            <?php
                                echo '<input type="hidden" name="amount" value="'.$total.'">';
                            ?>
                            <INPUT TYPE="hidden" NAME="shipping" VALUE="0.00">
                            <input type="hidden" name="currency_code" value="USD">
                            <input type="hidden" name="button_subtype" value="services">
                            <input type="hidden" name="no_note" value="1">
                            <input type="hidden" name="no_shipping" value="1">
                            <input type="hidden" name="rm" value="1">
                            <input type="hidden" name="return" value="http://doubleonions.com/orderConfirmed.php?">
                            <input type="hidden" name="cancel_return" value="http://doubleonions.com/order.php?">
                            <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHosted">
                            <input type="button" id="order-btn" value="Place Order" border="0" alt="PayPal" onclick="submitForms()">
                            <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal" style="position: absolute; left: -9999px; width: 1px; height: 1px;"
    tabindex="-1">
                            <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
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
