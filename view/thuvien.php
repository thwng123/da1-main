<?php
    function total_bill(){
        
        $total = 0;
        foreach($list_cart as $lc){

            $total = $lc['quantity'] * $lc['price'];
            $total_bill += $total;

        }
        // $total_bill += $total;
       
        return $total_bill;
    }

?>