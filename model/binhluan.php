<?php
function listbl($idpro){
    $sql="SELECT * 
    FROM comments
    JOIN user  ON comments.user_id = user.user_id
    JOIN products ON comments.product_id = products.product_id where comments.product_id ='".$idpro."' order by comments_id   desc  ";
    $listbl=pdo_query($sql);
    return $listbl;
}
function listbladmin(){
    $sql="SELECT *
    FROM comments
    JOIN user ON comments.user_id = user.user_id
    JOIN products ON comments.product_id = products.product_id   ";
    $listbl=pdo_query($sql);
    return $listbl;
}
function  deletebl(){
    $sql="DELETE FROM `comments` where comments_id= ".$_GET['id'];
    pdo_execute($sql);
}

?>