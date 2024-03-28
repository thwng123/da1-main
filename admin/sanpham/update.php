<div class="container pt-2" style="width: 80%">
<?php
 if(is_array($sp)){
  extract($sp);
}



?>
            <h1 class="d-flex justify-content-center ">Sửa sản phẩm</h1>
            <div class="container " style="width: 80%">
        
                <form action="index.php?act=updatesp" method="post" enctype="multipart/form-data">
                  <div class="mt-3">
                    <span class="form-label">ID</span>
                    <input type="text" class="form-control" disabled />
                  </div>
                  
                  <div class="mt-3">
                    <span class="form-label">Tên sản phẩm</span>
                    <input type="text" class="form-control" name="ten" value="<?=$product_name?>" />
                  </div>
                  <div class="mt-3">
                    <span class="form-label">Gía</span>
                    <input type="text" class="form-control" name="gia" value="<?=$price?>"/>
                  </div>
                  <div class="mt-3">
                    <span class="form-label">Số lượng</span>
                    <input type="text" class="form-control" name="soluong" value="<?=$quantity?>"/>
                  </div>
                  <div class="mt-3">
                
                    
                    <span class="form-label">Anh sản phẩm</span>
                    <img src="../image/<?=$image?>" alt="" width="50px" height="50px">
                   
                    <input type="file" class="form-control" name="anh"/>
                   
                  </div>
                  <div class="mt-3">
                    <span class="form-label">Mô tả</span><br>
                  

                   <textarea  name="mota" id="myTextarea" rows="7" cols="70"  ><?=$description?></textarea>
                  </div>
                  <div class="mt-3">
                    <span class="form-label">Danh mục</span>
                   <select name="danhmuc" id="">
                  <?php
                  
                   foreach($listdm as $item){
                       extract($item);
                       if($cate_id=$cate_id) $s="selected"; else $s="";
                       echo ' <option value="'.$cate_id.'" '.$s.'>'.$cate_name.'</option>';
                       
                       
                   
       
       
                  
                   
                   ?>
                  
                  
                    <?php }?>
                  ?>
                   </select>
                  </div>
                 
                  
                  
                 
                  <div class="mt-3 d-flex justify-content-center">
                    <input type="hidden" value="<?=$product_id?>" name="id">
                      <button type="submit" class="btn btn-secondary m-1 "><i class="fa-solid fa-arrow-left"></i><a href="index.php?act=listsp" style="color:white; text-decoration: none;">Quay lại</a></button>
                      <button type="submit" name="sumbit" class="btn btn-success m-1 " ><i class="fa-solid fa-plus"></i>Sửa mới</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <script>
    // tinymce.init({
    //     selector: '#myTextarea'
    // });
</script>
        
       