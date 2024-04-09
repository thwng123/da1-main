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

function statistic_comment()
{
    $sql = "SELECT P.product_id, P.product_name,
             COUNT(*) AS quantity, 
             MIN(Comme.date) AS oldest_comment_date, 
             MAX(Comme.date) AS newest_comment_date FROM comments Comme JOIN products P ON P.product_id = Comme.product_id GROUP BY P.product_id, P.product_name HAVING quantity > 0";

    return pdo_query($sql);
}

function comment_select_by_product($product_id)
{
    $sql = "SELECT C.*, P.* , Cl.username
    FROM comments C
    JOiN user Cl ON Cl.user_id = C.user_id
    JOIN products P ON C.product_id = P.product_id
    WHERE C.product_id = '$product_id'
    ORDER BY date DESC";
    return pdo_query($sql);
}

?>