<div class="container pt-2" style="width: 80%">
<?php
 if(is_array($dm)){
  extract($dm);
}



?>
            <h1 class="d-flex justify-content-center ">Sửa</h1>
            <div class="container " style="width: 80%">
        
                <form action="index.php?act=updatedm" method="post">
                  <div class="mt-3">
                    <span class="form-label">ID:</span>
                    <input type="text" class="form-control" disabled />
                  </div>
                  <div class="mt-3">
                  
                   <span class="form-label">Tên danh muc</span>
                    <input value="<?=$cate_name?>" type="text" class="form-control" name="ten"/>
                
                  </div>
                  
                 
                  <div class="mt-3 d-flex justify-content-center">
                    
                    <input type="hidden" name="id" value="<?=$cate_id?>">
                      <button type="submit" class="btn btn-secondary m-1 "><i class="fa-solid fa-arrow-left"></i><a href="index.php?act=listdm" style="color:white; text-decoration: none;">Quay lại</a></button>
                      <button type="submit" class="btn btn-success m-1 " name="btnsumbit"><i class="fa-solid fa-plus"></i>Sửa Mới</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>