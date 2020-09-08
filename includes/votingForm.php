<?php
    require 'dbh.php';
    session_start();
    if(isset($_SESSION['submitted']) && $_SESSION['submitted'] == true){
        echo '<p class="survey-desc">Form submitted. Thanks for participating :)</p>';
    }
    else{
        echo '<p class="survey-desc">Vote here on which items should be ordered</p>';
    }
    $sql = "SELECT * from products ORDER BY RAND( )";
    $result = $conn->query($sql);
    $num_items = $result->num_rows;
    echo '<form action="includes/submitVotes.php" method="POST" id="voting-form">';
    echo '<div class="container-fluid voting-table"><div class="row">';
    for($i = 0; $i < $num_items;++$i){
                $row = $result->fetch_assoc();
                $productID = $row['product_id'];
                $productImage = $row['image_path'];
                $productVotes = $row['votes'];
                // name product-id[] (emphasis on []) will be an array of all the voted-for items
                echo '<div class="col-md-3"><label class="survey-label"> <input type="checkbox" name="product-id[]" value="'.$productID.'">';
                echo '<img class="voting-img" src="'. $productImage.'" alt="product_image" title="click to vote for me!"></label>';
                echo '</div>';
    }
    if(isset($_SESSION['submitted']) && $_SESSION['submitted'] == true){
        echo '</div></div><input type="submit" value="Submit" title="You already submitted a vote" disabled>';  
    }
    else{
        echo '</div></div><input type="submit" value="Submit">';
    }
    echo '</form>';
?>
           