<?php
 
    function display_product_item($product_id, $price, $discount, $image, $name){
        echo "<a class='product' href='product_details_page.php?product_id=$product_id'>";
        echo "<div>";

        echo "<img class='product-image' src='$image' width=70px alt='Picture of the product'>
            <p class='name'>$name</p><br />";

        if($discount > 0){
            echo "<p>Price: <span class='with_discount'>$price rsd</span></p><br />";
            $new_price = $price * (100-$discount)/100;
            echo "<p>Discount: $discount%</p><br />";
            echo "<p>Price with discount: <span class='discount'>$new_price rsd</span></p><br />";
        } else {
            echo "<p>Price: $price rsd</p>";
        } 
        echo "</div></a>";
    }
?>