<?php
    function display_category_item($category_id, $category_name){
        echo "<a class='category-item' href='products_page.php?category_id=$category_id'>";
        echo "$category_name</a>";
    }
?>
