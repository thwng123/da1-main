<div class="container pt-2" style="width: 80%">

            <h1 class="d-flex justify-content-center ">Sửa mới</h1>
            <?php
            if(is_array($kh)){
              extract($kh);
            }
            
            
            ?>
            <div class="container " style="width: 80%">
        
                <form action="index.php?act=updatekh" method="post" enctype="multipart/form-data">
                  <div class="mt-3">
                    <span class="form-label">ID:</span>
                    <input type="text" class="form-control" disabled />
                  </div>
                  
                  <div class="mt-3">
                    <span class="form-label">Tên Khách hàng</span>
                    <input type="text" class="form-control" name="ten" value="<?=$username?>" />
                  </div>
                  <div class="mt-3">
                    <span class="form-label">Mật khẩu</span>
                    <input type="password" class="form-control" name="matkhau" value="<?=$password?>"/>
                  </div>
                  <div class="mt-3">
                    <span class="form-label">Email</span>
                    <input type="email" class="form-control" name="email" value="<?=$email?>" />
                  </div>
                  <div class="mt-3">
                    <span class="form-label">Anh khách hàng</span>
                    <img src="../image/<?php echo $image?>" alt="" width="100px" height="100px">
                    
                    <input type="file" class="form-control" name="anh"/>
                  </div>
                  <div class="mt-3">
                    <span class="form-label">Số điện thoại</span>
                  

                    <input type="text" class="form-control" name="so" value="<?=$phone?>" />
                  </div>
                  <div class="mt-3">
                    <span class="form-label">Vai trò</span>
                  

                    <select name="vaitro" id="">
                     <?php
                     if($role==0){
                      echo'<option  value="0">Admin</option>
                      <option value="1">Khách hàng</option>';
                     }else{
                      echo'<option  value="1">Khách hàng</option>
                      <option value="0">Admin</option>';
                     }
                     
                     
                     ?>

                    </select>
                  </div>
                 
                  
                  
                  
                 
                  <div class="mt-3 d-flex justify-content-center">
                    <input type="hidden" name="id" value="<?=$user_id?>">
                      <button type="submit" class="btn btn-secondary m-1 "><i class="fa-solid fa-arrow-left"></i><a href="index.php?act=listkh" style="color:white; text-decoration: none;">Quay lại</a></button>
                      <button type="submit" name="btnsumbit" class="btn btn-success m-1 " ><i class="fa-solid fa-plus"></i>Sửa Mới</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <script>
    tinymce.init({
        selector: '#myTextarea'
    });
</script>
        
       