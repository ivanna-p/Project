
<?php
    class Database {

        public $conn;

        function __construct() {
            $this -> conn = new mysqli ('localhost', 'root', '', 'webshop');
            if ($this -> conn -> connect_error){
                die ('Error: ' . $conn -> connect_error);
            }
        }

        function execute($query) {
            $query_info = $this -> conn -> query($query);
            if($query_info === false) {
                return [
                    'is_successful'=> false, 
                    'error_message' => $this -> conn -> error
                ];
            } else {
                $array = $query_info -> fetch_all(MYSQLI_ASSOC);
                return [
                    'is_successful' => true, 
                    'array' => $array
                ];
            }
        }

        function get_category($category_name) {
            $result = $this -> execute("SELECT `id`, `name` FROM `category` WHERE `name`='$category_name'");
            if($result['is_successful'] == true) {
                    return ($result['array']);
                } else {
                    die ("Query failed: ".$result['error_message']);
            }      
        }

        function get_category_by_id($category_id) {
            $result = $this -> execute("SELECT * FROM `category` WHERE `id`=$category_id");
            if($result['is_successful'] == true) {
                    return ($result['array']);
                } else {
                    die ("Query failed: ".$result['error_message']);
            }      
        }

        function get_brand_by_name($brand_name) {
            $result = $this -> execute("SELECT * FROM `brand` WHERE `name`='$brand_name'");
            if($result['is_successful'] == true) {
                    return ($result['array']);
                } else {
                    die ("Query failed: ".$result['error_message']);
            }      
        }

        function get_brand_by_id($brand_id) {
            $result = $this -> execute("SELECT * FROM `brand` WHERE `id`=$brand_id");
            if($result['is_successful'] == true) {
                    return ($result['array']);
                } else {
                    die ("Query failed: ".$result['error_message']);
            }      
        }

        function get_categories() {
            $result = $this -> execute("SELECT * FROM `category`");
            if($result['is_successful'] == true) {
                    return ($result['array']);
                } else {
                    die ("Query failed: ".$result['error_message']);
            }      
        }

        function get_brands() {
            $result = $this -> execute("SELECT * FROM `brand`");
            if($result['is_successful'] == true) {
                    return ($result['array']);
                } else {
                    die ("Query failed: ".$result['error_message']);
            }      
        }

        function get_products($brand_id=-1, $category_id=-1) {
            $query = "SELECT * FROM `product`";
            if($brand_id >= 0 && $category_id >= 0){
                $query = $query . " WHERE `brand_id` = $brand_id AND `category_id` = $category_id";
            } elseif($brand_id >= 0){
                $query = $query . " WHERE `brand_id` = $brand_id";
            } elseif($category_id >= 0){
                $query = $query . " WHERE `category_id` = $category_id";
            }
            $result = $this -> execute($query);
            if($result['is_successful'] == true) {
                    return ($result['array']);
                } else {
                    die ("Query failed: ".$result['error_message']);
            }      
        }

        function get_product_by_id($id){
            $result = $this -> execute("SELECT * FROM `product` WHERE `id`='$id'");
            if($result['is_successful'] == true) {
                if(count($result['array']) == 1){
                    return ($result['array'][0]);
                } else {
                    die ("Query failed: No product data!");
                }
            } else {
                die ("Query failed: ".$result['error_message']);
            }      
        }

        function create_order($name, $surname, $email, $address, $phone){
            $query = 
                "INSERT INTO `order`(
                        `name`,
                        `surname`,
                        `email`,
                        `address`,
                        `phone`
                    )
                    VALUES(
                        '$name',
                        '$surname',
                        '$email',
                        '$address',
                        '$phone'
                    )";
            $query_info = $this -> conn -> query($query);
            if($query_info === false) {
                return [
                    'is_successful'=> false, 
                    'error_message' => $this -> conn -> error
                ];
            } else {
                return $this -> conn -> insert_id;
            }    
        }

        function create_order_item($order_id, $product_id, $amount, $price) {
            $query = 
                "INSERT INTO `order_item`(
                        `order_id`,
                        `product_id`,
                        `amount`,
                        `price`
                    )
                    VALUES (
                        '$order_id',
                        '$product_id',
                        '$amount',
                        '$price'
                    )";
            $query_info = $this -> conn -> query($query);
            if($query_info === false) {
                return [
                    'is_successful'=> false, 
                    'error_message' => $this -> conn -> error
                ];
            } else {
                return $this -> conn -> insert_id;
            }    
        }
    }

    $database = new Database('webshop');
?>
