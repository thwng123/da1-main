<!DOCTYPE html>
<?php
include '../../model/pdo.php';
include '../../model/binhluan.php';
$idpro=$_REQUEST['idpro'];

session_start();


?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Comment List</title>
  <!-- Bootstrap CSS -->
  
  <style>
    /* Custom Styles */
    
  </style>
</head>
<body>
    <style>
       
  

/*   
  .form-group {
    margin-bottom: 20px;
  } */
  
  textarea {
     height: 100px;
    width: 100%;
    padding: 10px;
  }
  
  #ibputbl {
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border: none;
   
  }
  
  #ibputbl :hover {
    background-color: #0056b3;
  }
    </style>
     <div class=" mb-3" >
   
     <?php
                        // echo "nội dung bình luận ở đây".$idpro;
                       $listdsbinhluan= listbl($idpro);
                      // print_r($listdsbinhluan);
                       
                      
                        foreach($listdsbinhluan as $item){
                            extract($item);
                            // echo $_SESSION['username']['image'];

                        ?>
 
  
    
    

      <div class="card-body" >
        <?php
        // if(isset($_SESSION['username']['image'])){

        
        
        ?>
        <!-- <img src="../image/" alt="" style="border-radius: 50px; width: 50px; height: 50px;"> -->
        <?php
        // }
        
        ?>
        <h5 class="card-title"><?=$username?></h5>
        <h6 class="card-subtitle mb-2 text-muted"><?=$date?></h6>
        <h7><?=$content?></h7>
        
       
         
      </div>
      <?php
                        }
        
        ?>
      
    </div>
    <?php
    if(isset($_SESSION['username'])){

      $iduser=$_SESSION['username']['user_id'];    
    
    ?>
      <form action="<?=$_SERVER['PHP_SELF'];?>" method="post">
    <div class="form-group">
    
        <label for="comment">Comment:</label>
        <input type="hidden" name="idpro" value="<?=$idpro?>">
        <input type="hidden" name="iduser" value="<?=$iduser?>">
        <textarea id="comment" name="comment" ></textarea>
        <input id="ibputbl" type="submit" name="btnsumbit" value="Gửi Bình Luận">
      
    </div>
    </form>
    <?php
    }
    ?>
 
  
   
      <?php
                    if(isset($_POST['btnsumbit'])&&($_POST['btnsumbit'])){
                        $comment=$_POST['comment'];
                        $idpro=$_POST['idpro'];
                        $iduser=$_POST['iduser'];
                        // $ngaybinhluan=date('h:i:sa d/m/Y');
                        $sql="INSERT INTO `comments`( `content`, `product_id`, `user_id`) VALUES
                         ('$comment','$idpro','$iduser')";
                          pdo_execute($sql);
                        header("Location:" .$_SERVER['HTTP_REFERER']);
                       
                     
                       
                 

                    }
                    ?>
    
    <!-- <div class="card mb-3">
      <div class="card-body">
        <h5 class="card-title">Jane Smith</h5>
        <h6 class="card-subtitle mb-2 text-muted">jane@example.com</h6>
        <p class="card-text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p> 
        <a href="#" class="card-link">Reply</a>
      </div>
    </div>  -->
    <!-- More comments can be added similarly -->
 
  <!-- Bootstrap JS and dependencies -->

</body>
</html>
