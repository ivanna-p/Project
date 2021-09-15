<?php session_start(); ?>
<?php
    include "../model/Database.php";

    $order_id = $database -> create_order(
        $_POST['name'],
        $_POST['surname'],
        $_POST['email'],
        $_POST['address'],
        $_POST['phone_number']
    );

    $cart = $_SESSION['cart'];
    foreach($cart as $product_id => $amount) {
        $product = $database -> get_product_by_id($product_id);
        $database -> create_order_item(
            $order_id,
            $product_id,
            $amount,
            $product['price']
        );
    }   
    unset($_SESSION['cart']);
    echo $order_id;
?>
