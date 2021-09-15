<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="../../common/style.css">
    <link rel="stylesheet" href="../../common/reset.css">
    <?php include "../../common/fonts.php"; ?>
</head>
<body>
    <div class='container home-page'>
        <?php
            include "../../common/header.php";
            include "../../common/footer.php";
        ?>

        <div class="categories-list home-page-categories">
            <?php
                include "../items/category_item.php";
                $categories = $database -> get_categories();

                foreach($categories as $category) {
                    $category_id = $category['id'];
                    $category_name = $category['name'];
                    display_category_item($category_id, $category_name);
                }
            ?>
        </div>
        <div class="categories-list custom-scrollbar home-page-brands">
            <?php
                include "../items/brand_item.php";
                $brands = $database -> get_brands();

                foreach($brands as $brand) {
                    $brand_id = $brand['id'];
                    $brand_name = $brand['name'];
                    $brand_image = '../../images/brand/'.$brand['image'];
                    display_brand_item($brand_id, $brand_name, $brand_image);
                }
            ?>
        </div>
        <div class='background-homepage-2'>
            <p>Best partners, best offer!</p>
        </div>
    </div>
</body>
</html>
