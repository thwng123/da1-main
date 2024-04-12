<div class="container pt-4" style="width: 80%">
        <!-- <h1 class="d-flex justify-content-center ">Thống kê</h1> -->
        
        <div >
          <!-- <button class="btn btn-success"><i class="fa-solid fa-plus" ></i><a href="index.php?act=addkh" style="color:white; text-decoration: none;">Tạo mới</a></button> -->
        </div>
        <h1 class="d-flex justify-content-center ">Thống kê tình trạng đơn hàng</h1>
        <table class="table table-hover table-bordered  mt-3 table-striped container ">
        
          <thead>
            <tr>
              <th>Tổng đơn</th>
              <th>Chờ xác nhận</th>
              <th>Chờ lấy hàng</th>
              <th>Chờ giao hàng</th>
              <th>Đã giao</th>
              <th>Đã huỷ</th>
              
            </tr>
          </thead>
          <tbody>
            
         
            
            <?php
            $thongke =  count_status();
            foreach($thongke as $tk){
              extract($tk);
             
            ?>
            
               <tr>
                <td><?=$total_orders?></td>
                <td><?=$Order_Confirmed?></td>
                <td><?=$Preparing_your_order?></td>
                <td><?=$Shipped?></td>
                <td><?=$Delivered?></td>
                <td><?=$Cancelled?></td>
               
               

              </td>
            </tr>
            <?php
            }
            ?>
            
            
            
          </tbody>
        </table>
        <br>
        <h3 class="d-flex justify-content-center ">Thống kê sản phẩm</h3>
        <table class="table table-dark table-sm">
          <thead>
            <tr>
              <th scope="col">Tên sản phẩm</th>
              <th scope="col">Số lượng Min</th>
              <th scope="col">Số lượng Max</th>
             
            </tr>
          </thead>
          <?php
          
          $thongkesp = statistic_product();
            foreach($thongkesp as $tksp){
                extract($tksp);
            
          ?>
          <tbody class="table-group-divider">
            
            <tr>
             
            <td><?= $product_name?></td>
              <td><?= $quantity_min?></td>
              <td><?= $quantity_max?></td>
            </tr>
           
          </tbody>
          <?php 
            }
          ?>
      </table>
      <br>
      <h3 class="d-flex justify-content-center ">Thống kê đơn hàng</h3>
      <table class="table ">
          <thead>
            <tr>
              <th scope="col">Tên khách hàng</th>
              <th scope="col">Min price</th>
              <th scope="col">Max price</th>
              <th scope="col">Order Count</th>
             
            </tr>
          </thead>
          <?php
          
          $thongkedh = statistic_order();
            foreach($thongkedh as $tkdh){
                extract($tkdh);
            
          ?>
          <tbody class="table-group-divider">
            
            <tr>
             
            <td><?= $user_name?></td>
              <td>$<?= $price_min?></td>
              <td>$<?= $price_max?></td>
              <td><?= $order_count?></td>
            </tr>
           
          </tbody>
          <?php 
            }
          ?>
      </table>

      </div>
    </div>