<?php
function addkh($ten,$matkhau,$email,$so,$vaitro,$tenanh){
    $sql="INSERT INTO `user`( `username`, `password`, `email`, `phone`, `role`, `image`) 
    VALUES ('$ten','$matkhau','$email','$so','$vaitro','$tenanh')";
    pdo_execute($sql);


}

// function addkh1($ten,$matkhau,$email){
//     $sql="INSERT INTO `user`( `username`, `password`, `email`) 
//     VALUES ('$ten','$matkhau','$email')";
//     pdo_execute($sql);

// }

function setUser($username,$password,$email) {
    $sql="INSERT INTO `user`(`username`, `password`, `email`) VALUES ('$username','$password','$email')";
    pdo_execute($sql);
    // echo $sql;
   
}

function checkUser($username,$password){
    $sql = "SELECT * FROM `user` WHERE username='".$username."' AND password='".$password."'";
    $row = pdo_query_one($sql);
    return $row;
}

function email_exist($email)
{
    $sql = "SELECT * FROM `user` WHERE `email` = '$email'";
    return pdo_query_value($sql) > 0;
}

// function checkUser($email){
//     $sql = "SELECT * FROM `user` WHERE username='".$username."'";
//     $row = pdo_query_one($sql);
//     return $row;
// }

// function checkExistingUser($username, $email){
//      $sql = "SELECT * FROM `user` WHERE email='".$email."' AND username='".$username."'";
//      $row = pdo_query_one($sql);
//     return $row;
   
    
   
// }

function listkh(){
    $sql="SELECT `user_id`, `username`, `password`, `email`, `phone`, `role`, `image` FROM `user` WHERE 1";
    $listkh=pdo_query($sql);
    return $listkh;
}
function   deletekh(){
    $sql="DELETE FROM `user` WHERE user_id=".$_GET['id'];
    pdo_execute($sql);
}
function loadkhtheoid(){
    $sql="SELECT * FROM `user` WHERE user_id=".$_GET['id'];
    $sp=pdo_query_one($sql);
    return $sp;
}
function updatekh($ten,$matkhau,$email,$so,$vaitro,$tenanh,$id){
    if($tenanh!=""){
        $sql="UPDATE `user` SET
    
     `username`=' $ten',
     `password`=' $matkhau',
     `email`=' $email',
     `phone`=' $so',
     `role`=' $vaitro',
     `image`='$tenanh' WHERE user_id=".$id;
  
    }else{
        $sql="UPDATE `user` SET
    
     `username`=' $ten',
     `password`=' $matkhau',
     `email`=' $email',
     `phone`=' $so',
     `role`=' $vaitro'
      WHERE user_id=".$id;
    
    }
    pdo_execute($sql);
}

function updatekh1($username, $password, $email, $phone, $tenanh, $user_id) {
    if(empty($tenanh)) {
        $sql = "UPDATE `user` SET
            `username` = '$username',
            `password` = '$password',
            `email` = '$email',
            `phone` = '$phone',
            `image` = NULL 
            WHERE user_id = $user_id";
    } else {
        $sql = "UPDATE `user` SET
            `username` = '$username',
            `password` = '$password',
            `email` = '$email',
            `phone` = '$phone',
            `image` = '$tenanh' 
            WHERE user_id = $user_id";
    }
    pdo_execute($sql);
    // echo $sql;
}




?>