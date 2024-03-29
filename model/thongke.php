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

?>