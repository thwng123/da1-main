<div class="container pt-4" style="width: 80%">
        <h1 class="d-flex justify-content-center ">Đơn Hàng</h1>
        
        <!-- <div >
          <button class="btn btn-success"><i class="fa-solid fa-plus" ></i><a href="index.php?act=addkh" style="color:white; text-decoration: none;">Tạo mới</a></button>
        </div> -->
        <table class="table table-hover table-bordered  mt-3 table-striped container ">
        
          <thead>
            <tr>
              <th>ID</th>
              <th >Ngày đặt</th>
              <th>Người đặt</th>
              <th>Tổng giá</th>
              <th>Tình trạng</th>
              <th>Phương thức</th>
              <th></th>
              <!-- <th>Tương tác</th> -->
            </tr>
          </thead>
          <tbody>
            
         
            
            <?php
            foreach($listdh as $item){
              extract($item);
             
           
             
             

            
              $tinh_trang = ($status_delivery === 0) ?  "Đã xử lý" :  "Đang xử lý";
            
            ?>
            
               <tr>
                <td><?=$id?></td>
                <td><?=$created_at?></td>
                <td><?=$user_name?></td>
                <td>$<?=$total_bill?></td>
                <td>  
                    <?php if($status_delivery==0){ 
                        echo"Đang chờ xác nhận";
                        }else if($status_delivery==1){
                        echo "Chờ lấy hàng";
                        }else if($status_delivery==2){
                        echo "Chờ giao hàng";
                        }else if($status_delivery==3){
                        echo "Đã giao";
                        }else if($status_delivery==-1){
                        echo "Đã huỷ";
                    }?>
                </td>
                <td><?php if($status_payment==0){
                            echo"Thanh toán COD";
                            }else if($status_payment==1){
                            echo "Thanh toán VNPAY";
                        }?>
                </td>
                <td><a href="index.php?act=suadh&id=<?=$id?>">Xem chi tiết</a></td>
             
             
            </tr>
            <?php
            }
            ?>
            
            
            
          </tbody>
        </table>
      </div>
    </div>