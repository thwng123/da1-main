<div class="container pt-4" style="width: 80%">
        <h1 class="d-flex justify-content-center ">Thống kê</h1>
        
        <div >
          <button class="btn btn-success"><i class="fa-solid fa-plus" ></i><a href="index.php?act=addkh" style="color:white; text-decoration: none;">Tạo mới</a></button>
        </div>
        <table class="table table-hover table-bordered  mt-3 table-striped container ">
        
          <thead>
            <tr>
              <th>Mã danh mục</th>
              <th >Tên danh mục</th>
              <th>Số lượng</th>
              <th>Giá min</th>
              <th>Giá max</th>
              <th>Giá trung bình</th>
              
            </tr>
          </thead>
          <tbody>
            
         
            
            <?php
            foreach($listtk as $item){
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
                <td><?=$cate_id?></td>
                <td><?=$cate_name?></td>
                <td><?=$price?></td>
                <td>$<?=$gia_min?></td>
                <td>$<?=$gia_max?></td>
                <td>$<?=$gia_avg?></td>
               
               

              </td>
            </tr>
            <?php
            }
            ?>
            
            
            
          </tbody>
        </table>
      </div>
    </div>