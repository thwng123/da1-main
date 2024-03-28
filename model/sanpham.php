<?php
function addsp($ten,$tenanh,$gia,$soluong,$mota,$danhmuc){
    $sql="INSERT INTO `products`( `product_name`, `price`, `image`, `description`, `quantity`, `cate_id`) 
                        VALUES ('$ten',' $gia','$tenanh','$mota','$soluong','$danhmuc')";
    pdo_execute($sql);
    // echo $sql;
}
function listsp($kyw,$iddm){
    $sql="SELECT * FROM `products`  WHERE 1 ";
    if($kyw!=""){
        $sql.=" and product_name like '%".$kyw."%'"; // nếu 
    }
    if($iddm>0){
        $sql.=" and cate_id = '".$iddm."'";
    }

    

    $sql.=" order by product_id desc";
    $listsp=pdo_query($sql);
    return $listsp;
    // list sản phẩm
}



function searchProduct($kyw){
    $sql="SELECT * FROM `products` WHERE 1 ";

    if($kyw != ""){
        $sql.= " AND `product_name` LIKE '%".$kyw."%' ";
    }
    $sp = pdo_query($sql);
    return $sp;
}

// function listsp1(){
//     $sql="SELECT * FROM `products` INNER JOIN categories WHERE categories.cate_id = products.cate_id;";
   
  
//     $listsp1=pdo_query($sql);
//     return $listsp1;
//     // list sản phẩm
// }


function deletesp(){
    $sql="DELETE FROM `products`WHERE product_id=".$_GET['id'];
    pdo_execute($sql);

}
function loadsanphamid(){
    $sql="SELECT * FROM `products` WHERE product_id=".$_GET['id'];
    $sp=pdo_query_one($sql);
    return $sp;
}

function loadone_sanpham($product_id){
    $sql="SELECT * FROM `products` WHERE product_id=".$_GET['product_id'];
    $sp=pdo_query_one($sql);
    return $sp;
}

function loadone_sanphamcl($product_id,$cate_id){
    $sql="SELECT * FROM `products` WHERE  cate_id = ".$cate_id." and product_id <>".$_GET['product_id'];
    $sql .= " limit 0,4";
    $sp=pdo_query($sql);
    return $sp;
}

function load_sp_homenam(){
    $sql="SELECT * FROM `products` WHERE cate_id = 1 limit 0,6";
    $sp = pdo_query($sql);
    return $sp;
}

function load_all_homenam(){
    $sql="SELECT * FROM `products` WHERE cate_id = 1 ";
    $sp = pdo_query($sql);
    return $sp;
}

function load_sp_homenu(){
    $sql="SELECT * FROM `products` WHERE cate_id = 2 limit 0,6";
    $sp = pdo_query($sql);
    return $sp;
}

function load_all_homenu(){
    $sql="SELECT * FROM `products` WHERE cate_id = 2 ";
    $sp = pdo_query($sql);
    return $sp;
}

function load_blog_home(){
    $sql="SELECT * FROM `blog` WHERE 1";
    $sp = pdo_query($sql);
    return $sp;
}

function load_sp_home(){
    $sql="SELECT * FROM `products` WHERE 1 limit 0,6";
    $sp = pdo_query($sql);
    return $sp;
}


function load_all_top4(){
    $sql="SELECT * FROM `products` WHERE 1 order by luotxem desc limit 0,4";
    $sp = pdo_query($sql);
    return $sp;
}

function load_color(){
    $sql="SELECT `color_id`, `color_name` FROM `color` WHERE 1";
    $sp = pdo_query($sql);
    return $sp;
}

function load_size(){
    $sql="SELECT * FROM `size` WHERE 1";
    $sp = pdo_query($sql);
    return $sp;
}




function updatesp($ten,$gia,$tenanh,$mota,$soluong,$danhmuc,$id){
    if($tenanh!=""){
        $sql="UPDATE `products` SET
        
         `product_name`='$ten',
         `price`='$gia',
         `image`='$tenanh',
         `description`='$mota',
         `quantity`='$soluong',
         `cate_id`='$danhmuc' WHERE product_id=$id";
         
     }else{
        $sql="UPDATE `products` SET
        
        `product_name`='$ten',
        `price`='$gia',
      
        `description`='$mota',
        `quantity`='$soluong',
        `cate_id`='$danhmuc' WHERE product_id=$id";
       
     }
     pdo_execute($sql);
     
    
  
       
       
       
      
       
       
}






?>