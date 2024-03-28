<div class="container pt-2" style="width: 80%">

            <h1 class="d-flex justify-content-center ">Thêm Mới</h1>
            <div class="container " style="width: 80%">
        
                <form action="index.php?act=addsp" method="post" enctype="multipart/form-data">
                  <div class="mt-3">
                    <span class="form-label">ID:</span>
                    <input type="text" class="form-control" disabled />
                  </div>
                  
                  <div class="mt-3">
                    <span class="form-label">Tên sản phẩm</span>
                    <input type="text" class="form-control" name="ten" />
                  </div>
                  <div class="mt-3">
                    <span class="form-label">Gía</span>
                    <input type="text" class="form-control" name="gia"/>
                  </div>
                  <div class="mt-3">
                    <span class="form-label">Số lượng</span>
                    <input type="text" class="form-control" name="soluong" />
                  </div>
                  <div class="mt-3">
                    <span class="form-label">Anh sản phẩm</span>
                    
                    <input type="file" class="form-control" name="anh"/>
                  </div>
                  <div class="mt-3">
                    <span class="form-label">Mô tả</span><br>
                  

                   <textarea name="mota" id="myTextarea" rows="7" cols="70" ></textarea>
                  </div>
                  <div class="mt-3">
                    <span class="form-label">Danh mục</span>
                   <select name="danhmuc" id="">
                  <?php
                  foreach($listdm as $item){

                  
                  
                  
                  ?>
                  <option value="<?php echo $item['cate_id']?>"><?php echo $item['cate_name']?></option>
                  <?php
                  }
                  
                  ?>
                   </select>
                  </div>
                  
                  
                  
                 
                  <div class="mt-3 d-flex justify-content-center">
                      <button type="submit" class="btn btn-secondary m-1 "><i class="fa-solid fa-arrow-left"></i><a href="index.php?act=listsp" style="color:white; text-decoration: none;">Quay lại</a></button>
                      <button type="submit" name="btnsumbit" class="btn btn-success m-1 " ><i class="fa-solid fa-plus"></i>Tạo Mới</button>
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
        
       