<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="../../common/style.css">
    <link rel="stylesheet" href="../../common/reset.css">
    <?php include "../../common/fonts.php"; ?>
</head>
<body>
    <div class='container'>
        <?php
            include "../../common/header.php";
            include "../../common/footer.php";
        ?>
        <div class="product-results">
            <?php
                include "../items/product_item.php";

                if(isset($_GET['category_id'])) {
                    $category_id = $_GET['category_id'];
                    $category_names = $database -> get_category_by_id($category_id);
                    foreach($category_names as $category_name){
                        echo "<p class='products-label'>" . $category_name['name'] . "</p>";
                    }
                } else {
                    $category_id = -1;
                }

                if(isset($_GET['brand_id'])) {
                    $brand_id = $_GET['brand_id'];
                    $brand_names = $database -> get_brand_by_id($brand_id);
                    foreach($brand_names as $brand_name){
                        echo "<p class='products-label'>" . $brand_name['name'] . "</p>";
                    }
                } else {
                    $brand_id = -1;
                }

                $products = $database -> get_products($brand_id, $category_id);
                
                foreach($products as $product){
                    display_product_item(
                        $product['id'],
                        $product['price'],
                        $product['discount'],
                        '../../images/products/id_'.$product['id'].'.jpg',
                        $product['name'],
                    );
                }    
            ?>
        </div>
    </div>
</body>
</html>
