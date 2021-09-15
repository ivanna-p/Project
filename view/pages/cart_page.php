<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="../../common/style.css">
    <link rel="stylesheet" href="../../common/reset.css">
    <?php include "../../common/fonts.php"; ?>
</head>
<body>
    <div class='container cart'>
        <?php
            if(isset($_POST['remove_from_cart'])){
                $product_id_to_remove = $_POST['product_id_to_remove'];
                unset($_SESSION['cart'][$product_id_to_remove]);
            }

            include "../../common/header.php";
            include "../../common/footer.php";

        ?>
        <div class="cart-list">
            <?php
                include "../items/cart_item.php";

                $cart = $_SESSION['cart'];
                $total_price = 0;
                foreach($cart as $product_id => $amount) {
                    $product = $database -> get_product_by_id($product_id);
                    display_cart_item(
                        $product_id,
                        $product['name'],
                        $amount,
                        $product['price'],
                        $product['discount'],
                        '../../images/products/id_'.$product['id'].'.jpg'
                    );
                    $total_price = $total_price + ($amount * $product['price']);
                }

                if(count($cart) < 1) {
                    echo "<p class='empty_cart'>Your cart is empty!</p>";
                }
            ?>
        </div>
        <div>
            <?php
                if(count($cart) > 0) {
                    echo "<p class='total-price'>Total price: ".$total_price."rsd</p>";
                }
            ?>
            
        </div>
        <?php
            if(count($cart) > 0) {
                echo "<p><a href='checkout_page.php'>
                    <input type='submit' class='checkout-page-place-order-button' value='Place order'/>
                    </a></p>";
            }
        ?>
    </div>
</body>
</html>
