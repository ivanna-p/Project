<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="../../common/style.css">
    <link rel="stylesheet" href="../../common/reset.css">
    <?php include "../../common/fonts.php"; ?>
</head>
<script>
function validateForm() {
    var fields = document.forms["checkout-form"].getElementsByTagName("input");
    var invalidFieldName = "";

    for(var i=0; i < fields.length; i++) {
        if(fields[i].value == "") {
            invalidFieldName = fields[i].name;
        }
    }

    if (invalidFieldName == "") {
        return true;
    } else {
        alert("Field " + invalidFieldName + " must be filled out");
        return false;
    }
}
</script>
<body>
    <div class='container form-layout'>
        <?php
            include "../../common/header.php";
            include "../../common/footer.php";
        ?>
        <form name='checkout-form' method="post" action="../../logic/checkout_logic.php" target="result" onsubmit="return validateForm()">
            <label id='input-name' class= 'label'>Name:</label>
            <input class='input' type='text' name='name' placeholder='Type your name here...'>
            <label class= 'label'>Surname:</label>
            <input class='input' type='text' name='surname' placeholder='Type your surname here...'>
            <label class= 'label'>E-mail adress:</label>
            <input class='input' type='email' name='email' placeholder='example@adress.com'>
            <label class= 'label'>Delivery adress:</label>
            <input class='input' type='text' name='address' placeholder='Type your delivery adress here...'>
            <label class= 'label'>Contact phone number:</label>
            <input class='input' type='tel' name='phone_number'placeholder='Type your number here...'>
            <input type='submit' class='checkout-submit' value='Confirm order'>
        </form>
        <div class='checkout-result'>
            <label class= 'order-number'>ID number of your order is:</label>
            <iframe name="result"></iframe>
        </div>
    </div>
</body>
</html>
