<?php

echo '<form action="https://www.paypal.com/cgi-bin/webscr" method="POST" target="_blank">
    <input type="hidden" name="cmd" value="_xclick">
    <input type="hidden" name="business" value="22onions@gmail.com">
    <input type="hidden" name="item_name" value="shoppingCart">
    <input type="hidden" name="currency_code" value="USD">
    <input type="hidden" name="amount" value="'.$subTotal.'">
    <input type="hidden" name="tax" value=".0725">
    <input type="hidden" name="no_shipping" value="1">
    <input type="image" src="http://www.paypal.com/en_US/i/btn/x-click-but02.gif" name="submit" alt="Make payments with PayPal">
</form>';

?>