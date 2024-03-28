<?php
function listdm(){
    $sql="SELECT * FROM `categories` WHERE 1";
    $listdm=pdo_query($sql);
    return $listdm;
}
function adddm($ten){
    $sql="INSERT INTO `categories`( `cate_name`) VALUES 
    ('$ten')";
  pdo_execute($sql);
}
function delete(){
  $sql="DELETE FROM `categories` WHERE cate_id=".$_GET['id'];
  pdo_execute($sql);
}
function listdmid(){
  $sql="SELECT * FROM `categories` WHERE cate_id=".$_GET['id'];
  $listdm=pdo_query_one($sql);
  return $listdm;
 
}
function updatedm($ten,$id){
  $sql="UPDATE `categories` SET `cate_name`='$ten' WHERE cate_id=".$id;
                        pdo_execute($sql);

 
 
}


?>