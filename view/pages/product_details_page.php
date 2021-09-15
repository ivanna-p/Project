 <?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link rel="stylesheet" href="../../common/style.css">
    <link rel="stylesheet" href="../../common/reset.css">
    <?php
        include "../../common/fonts.php";
        include "../../common/footer.php";
    ?>
</head>
<body>
    <div class='container'>
        <?php
            if(isset($_GET['product_id'])) {
                $product_id = $_GET['product_id'];
            } else {
                die ("No product data for this ID!");
            }

            if(!isset($_SESSION['cart'])){
                $_SESSION['cart'] = [];
            }

            if(isset($_POST['add_to_cart'])){
                $current_cart = $_SESSION['cart'];
                if(isset($current_cart[$product_id])){
                    $current_ammount = $current_cart[$product_id];
                } else {
                    $current_ammount = 0;
                }

                $current_cart[$product_id] = $current_ammount + 1;
                $_SESSION['cart'] = $current_cart;
            }

            include "../../common/header.php";

            $product = $database -> get_product_by_id($product_id);
            echo "<div class='product-details'>";
                echo "<p class='product-name'>".$product['name']."</p>";
                echo "<p>".$product['description']."</p>";
                if($product['discount'] > 0){
                    echo "<p class='product-price'>Discount: ".$product['discount']."%</p>";
                    $price = $product['price'] * (100-$product['discount'])/100;
                    echo "<p class='product-price original-price'>Original price: ".$product['price']."rsd</p>";
                    echo "<p class='product-price'>You get it for: ".$price."rsd</p>";
                } else {
                    echo "<p class='product-price'>Price: ".$product['price']." rsd</p>";
                }
                
                echo "<p class='product-image-details'><img src='../../images/products/id_".$product['id'].".jpg' height='100px' alt='Picture of the product'</p>";

                if($product['stock'] > 0){
                    echo "<form action='product_details_page.php?product_id=$product_id' method='post'>";
                    echo "<input class='add-to-cart-details-page-button' type='submit' name ='add_to_cart' value='Add to cart'>";
                    echo "</form>";
                } else {
                    echo "<p>This product isn't avaliable at the moment!</p>";
                }
            echo "</div>";
        ?>
    </div>
</body>
</html>
