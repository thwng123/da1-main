<div class="container pt-4" style="width: 80%">
        <h1 class="d-flex justify-content-center ">Bình luận</h1>
        
        <!-- <div >
          <button class="btn btn-success"><i class="fa-solid fa-plus" ></i><a href="index.php?act=addkh" style="color:white; text-decoration: none;">Tạo mới</a></button>
        </div> -->
        <table class="table table-hover table-bordered  mt-3 table-striped container ">
        
          <thead>
            <tr>
              <th>Sản phẩm</th>
              <th >Số lượng</th>
        
           
        
              <th>Thời gian</th>
           
              <th>Tương tác</th>
            </tr>
          </thead>
          <tbody>
            
         
            
            <?php
            foreach($listbl as $item){
              extract($item);
             
           
             
          

            
            
            
            ?>
            
               <tr>
                <td><?=$product_name?></td>
                <td><?=$quantity?></td>
                <td><?=$oldest_comment_date?></td>
                
         
             
              <td>
                <!-- <button class="btn btn-sm btn-danger " data-bs-toggle="modal" data-bs-target="#myModal"> -->
                <a href="index.php?act=detail_bl&product_id=<?=$product_id?>"> Xem chi tiết</a>
               
              </td>
            </tr>
            <?php
            }
            ?>
            
            
            
          </tbody>
        </table>
      </div>
    </div>