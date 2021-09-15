<?php
    function display_brand_item($brand_id, $brand_name, $image){
        echo "<a class='brand-item' href='products_page.php?brand_id=$brand_id'>";
            echo "<div>";
                echo "<img class='brand-image' src='$image' width=70px alt='$brand_name'>";
            echo "</div>";
        echo "</a>";
    }
?>
