<div class="container pt-4" style="width: 80%">
        <h1 class="d-flex justify-content-center ">Bình luận</h1>
        
        <!-- <div >
          <button class="btn btn-success"><i class="fa-solid fa-plus" ></i><a href="index.php?act=addkh" style="color:white; text-decoration: none;">Tạo mới</a></button>
        </div> -->
        <table class="table table-hover table-bordered  mt-3 table-striped container ">
        
          <thead>
            <tr>
              <th>Mã</th>
              <th>Nội dụng</th>
              <th >Khách hàng</th>
              <th >Sản phẩm</th>
              <th >Ngày bình luận</th>
              <th>Tương tác</th>
            </tr>
          </thead>
          <tbody>
            
         
            
            <?php
            foreach($show_detail as $item){
              extract($item);

              $xoabl="index.php?act=xoabl&id=".$comments_id;

            ?>
            
               <tr>
                <td><?=$comments_id?></td>
                <td><?=$content?></td>
                <td><?=$username?></td>
                <td><?=$product_name?></td>
                <td><?=$date?></td>
                
         
             
              <td>
                <!-- <button class="btn btn-sm btn-danger " data-bs-toggle="modal" data-bs-target="#myModal"> -->
                  <a href="index.php?act=xoabl&id=<?=$comments_id?>"> Xoá</a>
               
              </td>
            </tr>
            <?php
            }
            ?>
            
            
            
          </tbody>
        </table>
      </div>
    </div>