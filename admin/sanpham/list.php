<div class="container pt-4" style="width: 80%">
        <h1 class="d-flex justify-content-center ">Sản phẩm</h1>
        <form action="" method="post" style="margin-bottom: 10px;">
        <input type="text" name="kyw">
        <select name="iddm" id="">
            <option value="0" selected>Tất cả</option>
        <?php
            foreach($listdm as $item){

           
            
            ?>
            <option value="<?php echo $item['cate_id']?>"><?php echo $item['cate_name']?></option>
             <?php }?>
        </select>
        <input type="submit" name="btnsumbit" value="Tìm Kiếm">

    </form>
        <div >
          <button class="btn btn-success"><i class="fa-solid fa-plus" ></i><a href="index.php?act=addsp" style="color:white; text-decoration: none;">Tạo mới</a></button>
        </div>
        <table class="table table-hover table-bordered  mt-3 table-striped container ">
        
          <thead>
            <tr>
              <th>ID</th>
              <th >Tên sản phẩm</th>
              <th>Gía sản phẩm</th>
              <th>Anh sản phẩm</th>
              <th>Mô tả</th>
              <th>Số lượng</th>
              <th>Danh mục</th>
              <th>Tương tác</th>
            </tr>
          </thead>
          <tbody>
            
         
            
            <?php
            foreach($listsp as $item){
              extract($item);
             
            
            $hinhsp="../image/" .$image;
            if(is_file($hinhsp)){
                $hinh="<img src=".$hinhsp." height=80 width=80> ";

            }else{
                $hinh="không có ảnh được chọn";
            }
              $suasp="index.php?act=suasp&id=".$product_id;
              $xoasp="index.php?act=xoasp&id=".$product_id;

            
            
            
            ?>
            
               <tr>
                <td><?=$product_id?></td>
                <td><?=$product_name?></td>
                <td><?=$price?></td>
                <td><?=$hinh?></td>
                <td><?=$description?></td>
                <td><?=$quantity?></td>
                <td><?=$cate_id?></td>
              
              <td>
                <button class="btn btn-sm btn-warning"><i class="fa-solid fa-pen-to-square"></i><a href="<?= $suasp?>" style="color:white; text-decoration: none;">Sửa</a></button>
                <button class="btn btn-sm btn-danger " data-bs-toggle="modal" data-bs-target="#myModal">
                  <i class="fa-solid fa-trash"></i><a style="color:white; text-decoration: none;" href="<?=$xoasp?>">Xóa</a></button>
                 
              </td>
            </tr>
            <?php
            }
            ?>
            
            
            
          </tbody>
        </table>
      </div>
    </div>