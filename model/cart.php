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

    function updateStatus($cart_id){
        $sql = "INSERT INTO `cart`(`user_id`, `product_id`, `quantity`,`status`) VALUES ('$user_id','$product_id',1,0)";
        pdo_execute($sql);
    //    echo $sql;  
    }

    
    
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

  


    function capnhatCart($product_id,$quantity){
       
        $sql = "UPDATE `cart` SET `quantity`= '$quantity' WHERE product_id = '$product_id'";
           
        pdo_execute($sql);
        // echo $sql;
        
    }

    function cartDec($product_id){
        
    }

    

    
?>