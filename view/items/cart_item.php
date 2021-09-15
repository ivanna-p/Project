<?php
 
    function display_cart_item($product_id, $name, $amount, $price, $discount, $image) {
        echo "<div class='cart-item'>";

            echo "<div class='cart-sub-item-image-container'>";
                echo "<img src='$image' class='cart-sub-item-image' alt='Picture of the product'>";
            echo "</div>";
          
            echo "<div class='cart-sub-item-details'>";
                echo "<p><a href='product_details_page.php?product_id=$product_id'>$name</a></p>";
                echo "<p>";
                    if($discount > 0){
                        echo "<p>Price: <span class='with_discount'>$price rsd</span></p>";
                        $new_price = $price * (100-$discount)/100;
                        echo "<p>Discount: $discount%</p>";
                        echo "<p>Price with discount: <span class='discount'>$new_price rsd</span></p>";
                    } else {
                        echo "<p>Price: $price rsd</p>";
                    } 
                echo "</p>";
            echo "</div>";

            echo "<p><div class='cart-sub-item-costs'></p>";
                echo "<p>Amount: $amount</p>";
                echo "<p>Sub-total:". $price * $amount." rsd</p>";
                echo "<form action='cart_page.php' method='post'>";
                echo "<input type='hidden' name ='product_id_to_remove' value='$product_id'>";
                echo "<input class='remove-from-cart-button' type='submit' name ='remove_from_cart' value='Remove from cart'>";
                echo "</form>";
            echo "</div>";
        echo "</div>";
    }
?>