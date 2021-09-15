<?php
    echo "<div id='header'>";
        include "../../model/Database.php";
        
        if(!isset($_SESSION['cart'])){
            $_SESSION['cart'] = [];
        }

        $cart_label = "Cart";
        $cart_items_count = array_reduce(
            $_SESSION['cart'], 
            function($a, $b){
                return $a + $b;
            }, 
            0
        );

        if($cart_items_count > 0) {
            $cart_label = "Cart ($cart_items_count)";
        }

        echo "<img src='../../images/logo/logo.png' alt='logo' id='header-image'>";

        echo "<ol>";
            echo "<a href='cart_page.php'><li class='header-item'>$cart_label</li></a>";
            echo "<li class='header-item normal-cursor'> Categories
                <ul class='dropdown_menu'>";
                $categories = $database -> get_categories();
                foreach($categories as $category) {
                    $category_id = $category['id'];
                    $category_name = $category['name'];
                    echo "<li><a href='products_page.php?category_id=$category_id'>$category_name</a></li>";
                }
                echo "</ul>
            </li>";
            
            echo "<li class='header-item normal-cursor'>Brands
                <ul class='dropdown_menu'>";
                $brands = $database -> get_brands();
                foreach($brands as $brand) {
                    $brand_id = $brand['id'];
                    $brand_name = $brand['name'];
                    echo "<li><a href='products_page.php?brand_id=$brand_id'>$brand_name</a></li>";
                }
                echo "</ul>
            </li>";
            echo "<a href='products_page.php'><li class='header-item'>Products</li></a>";
            echo "<a href='home_page.php'><li class='header-item'>HOME</li></a>";
        echo "</ol>";
    echo "</div>";
?>
