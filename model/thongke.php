<?php
    function thong_ke_hang_hoa(){
         $sql = "SELECT 
         lo.cate_id, 
         lo.cate_name,
         COUNT(*) AS price,
         MIN(hh.price) AS gia_min,
         MAX(hh.price) AS gia_max,
         ROUND(AVG(hh.price), 2) AS gia_avg
        FROM 
            products hh 
        JOIN 
            categories lo ON lo.cate_id = hh.cate_id 
        GROUP BY 
            lo.cate_id, lo.cate_name";
        return pdo_query($sql);
    }

    function count_status()
{
    $sql = "SELECT
    COUNT(*) AS total_orders,
    COUNT(CASE WHEN `status_delivery` = '0' THEN 1 END) AS Order_Confirmed,
    COUNT(CASE WHEN `status_delivery` = '1' THEN 1 END) AS Preparing_your_order,
    COUNT(CASE WHEN `status_delivery` = '2' THEN 1 END) AS Shipped,
    COUNT(CASE WHEN `status_delivery` = '3' THEN 1 END) AS Delivered,
    COUNT(CASE WHEN `status_delivery` = '-1' THEN 1 END) AS Cancelled
    FROM `orders`";
    return pdo_query($sql);
}


function statistic_product()
{
    $sql = "SELECT O.*, P.*,CU.*,
    MIN(O.quantity) AS quantity_min,
    MAX(O.quantity) AS quantity_max
    FROM order_items O
    JOIN `products` P ON O.product_id = P.product_id
    JOIN `orders` CU ON CU.id = O.order_id
    GROUP BY O.product_id";

    return pdo_query($sql);
}

function statistic_order()
{
    $sql = "SELECT 
    O.user_id,
    CU.*,
    MIN(O.total_bill) AS price_min,
    MAX(O.total_bill) AS price_max,
    AVG(O.total_bill) AS average_price,
    COUNT(*) AS order_count
FROM 
    `orders` O
JOIN 
    `user` CU ON CU.user_id = O.user_id
WHERE 
    O.status_delivery != '-1' 
    AND O.user_id IN (
        SELECT 
            user_id
        FROM 
            `orders`
        WHERE 
            status_delivery != '-1'
        GROUP BY 
            user_id
    )
GROUP BY 
    O.user_id, CU.user_id";

    return pdo_query($sql);
}
// -- JOIN `product` P ON P.id_product = H.id_product

?>