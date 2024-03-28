<div class="container pt-4" style="width: 80%">
        <h1 class="d-flex justify-content-center ">Khách hàng</h1>
        
        <div >
          <button class="btn btn-success"><i class="fa-solid fa-plus" ></i><a href="index.php?act=addkh" style="color:white; text-decoration: none;">Tạo mới</a></button>
        </div>
        <table class="table table-hover table-bordered  mt-3 table-striped container ">
        
          <thead>
            <tr>
              <th>ID</th>
              <th >Tên Khách Hàng</th>
              <th>Mật khẩu</th>
              <th>Email</th>
              <th>Anh</th>
              <th>Số điện thoại</th>
              <th>Vai trò</th>
              <th>Tương tác</th>
            </tr>
          </thead>
          <tbody>
            
         
            
            <?php
            foreach($listkh as $item){
              extract($item);
             
            
            $hinhkh="../image/" .$image;
            if(is_file($hinhkh)){
                $hinh="<img src=".$hinhkh." height=80 width=80> ";

            }else{
                $hinh="không có ảnh được chọn";
            }
              $suakh="index.php?act=suakh&id=".$user_id;
              $xoakh="index.php?act=xoakh&id=".$user_id;

            
            
            
            ?>
            
               <tr>
                <td><?=$user_id?></td>
                <td><?=$username?></td>
                <td><?=$password?></td>
                <td><?=$email?></td>
                <td><?=$hinh?></td>
                <td><?=$phone?></td>
                <td><?php if($role==0){
                  echo "Admin";
                  }else{
                    echo "Khách Hàng";
                  }
                    ?></td>
              
              <td>
                <button class="btn btn-sm btn-warning"><i class="fa-solid fa-pen-to-square"></i><a href="<?= $suakh?>" style="color:white; text-decoration: none;">Sửa</a></button>
                <button class="btn btn-sm btn-danger " data-bs-toggle="modal" data-bs-target="#myModal">
                  <i class="fa-solid fa-trash"></i><a style="color:white; text-decoration: none;" href="<?=$xoakh?>">Xóa</a></button>
                 
              </td>
            </tr>
            <?php
            }
            ?>
            
            
            
          </tbody>
        </table>
      </div>
    </div>