<?php
    // function add_cart($user_id, $product_id, $quantity){
    //     $sql = "INSERT INTO `cart`(`user_id`, `product_id`,`quantity`) VALUES ('$user_id','$product_id',1)";
    //     pdo_execute($sql);
    // //    echo $sql;  
    // }
    function add_cart($user_id, $product_id, $quantity,$status){
       
        $sql = "INSERT INTO `cart`(`user_id`, `product_id`, `quantity`,`status`) VALUES ('$user_id','$product_id',1,0)";
        pdo_execute($sql);
    //    echo $sql;  
    }

    // function updateStatus($cart_id){
    //     $sql = "UPDATE `cart` SET `status`='1' WHERE `card_id` = '$card_id'";
    //     pdo_execute($sql);
    // //    echo $sql;  
    // }

    
    
    function list_cart($user_id){
        $sql = "SELECT `cart_id`, U.`user_id`, p.`product_id`,p.product_name,p.price,p.image,c.quantity FROM `cart` C
                 inner join `user` U on U.user_id = C.user_id 
                inner join `products` P on P.product_id = C.product_id
                where U.user_id ='$user_id' and `status` = '0'";
        return pdo_query($sql);
    }

    // function list_cart($user_id){
    //     $sql = "SELECT `cart_id`, U.`user_id`, p.`product_id`,p.product_name,p.price,p.image,c.quantity FROM `cart` C
    //              inner join `user` U on U.user_id = C.user_id 
    //             inner join `products` P on P.product_id = C.product_id
    //             where U.user_id ='$user_id' and `status` = '0'";
    //     return pdo_query($sql);
    // }

    

    function listCart($user_id,$product_id){
        $sql = "SELECT `cart_id`, U.`user_id`, p.`product_id`,p.product_name,p.price,p.image,c.quantity FROM `cart` C
                 inner join `user` U on U.user_id = C.user_id 
                inner join `products` P on P.product_id = C.product_id
                where U.user_id ='$user_id'";
        return pdo_query_one($sql);
    }

    function del_cart($cart_id){
        $sql = "DELETE FROM `cart` WHERE cart_id ='$cart_id'";
        pdo_execute($sql);
    }

    function del_cart2($user_id){
        $sql = "DELETE FROM `cart` WHERE `user_id` = '$user_id'";
        pdo_execute($sql);
    }

  


    function capnhatCart($product_id,$quantity){
       
        $sql = "UPDATE `cart` SET `quantity`= '$quantity' WHERE product_id = '$product_id'";
           
        pdo_execute($sql);
        // echo $sql;
        
    }

    function total_bill(){
        // $_SESSION['cart'] =  list_cart($user_id);
        if(isset($_SESSION['cart'])){
            $total = 0;
            foreach($_SESSION['cart'] as $lc){

               
                $total_bill += $lc['quantity'] * $lc['price'];
    
            }
            return $total_bill;

        }
        
        // $total_bill += $total;
       
        return 0;
        // echo $total_bill;
    }


    /// order
    // function insertOrder($user_id,$user_name ,$user_email ,$user_phone ,$user_address ,$total_bill,$status_delivery,$status_payment) {
    //     $sql = "INSERT INTO `orders`( `user_id`, `user_name`, `user_email`, `user_phone`, `user_address`, `total_bill`, `status_delivery`, `status_payment`) 
    //     VALUES ('$user_id','$user_name','$user_email','$user_phone','$user_address','$total_bill','$status_delivery','$status_payment')";
    //      pdo_execute($sql);
    // }
    
    function insertOrderItem($orderID, $product_id, $quantity, $price) {
        $sql = "INSERT INTO `order_items`( `order_id`, `product_id`, `quantity`, `price`) VALUES ('$orderID','$product_id','$quantity','$price')";
         pdo_execute($sql);
    }

    

    function insert_get_last_id($user_id, $user_name, $user_email, $user_phone, $user_address, $total_bill, $status_delivery, $status_payment) {
        try {
            // Tạo câu lệnh SQL INSERT
            $sql = "INSERT INTO `orders`(`user_id`, `user_name`, `user_email`, `user_phone`, `user_address`, `total_bill`, `status_delivery`, `status_payment`) 
                    VALUES (:user_id, :user_name, :user_email, :user_phone, :user_address, :total_bill, :status_delivery, :status_payment)";
    
            // Chuẩn bị câu lệnh SQL
            $stmt = $GLOBALS['conn']->prepare($sql);
    
            // Bind các giá trị vào câu lệnh SQL
            $stmt->bindParam(':user_id', $user_id);
            $stmt->bindParam(':user_name', $user_name);
            $stmt->bindParam(':user_email', $user_email);
            $stmt->bindParam(':user_phone', $user_phone);
            $stmt->bindParam(':user_address', $user_address);
            $stmt->bindParam(':total_bill', $total_bill);
            $stmt->bindParam(':status_delivery', $status_delivery);
            $stmt->bindParam(':status_payment', $status_payment);
    
            // Thực thi câu lệnh SQL
            $stmt->execute();
    
            // Trả về ID của bản ghi vừa được chèn
            return $GLOBALS['conn']->lastInsertId();
        } catch (\Exception $e) {
            // Xử lý các ngoại lệ nếu có
            debug($e);
        }
    }

    function showAll($user_id){
        $sql = "SELECT * FROM `order_items` JOIN orders ON order_items.order_id = orders.id JOIN products ON order_items.product_id = products.product_id where `user_id` = '$user_id'"  ;
        $list = pdo_query_one($sql);
        return $list;
    }

    function showAll2($user_id){
        $sql = "SELECT * FROM `order_items` JOIN orders ON order_items.order_id = orders.id JOIN products ON order_items.product_id = products.product_id where `user_id` = '$user_id'";
        $list = pdo_query($sql);
        return $list;
    }

    function cartExsit($product_id){
        $sql = "SELECT * FROM `cart`  where `product_id` = '$product_id'";
        return  pdo_query_value($sql) > 0;
    }
    

  
?>