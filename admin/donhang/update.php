<div class="container pt-2" style="width: 80%">
<?php
 if(is_array($dh)){
  extract($dh);
}



?>
            <h1 class="d-flex justify-content-center ">Sửa</h1>
            <div class="container " style="width: 80%">
        
                <form action="index.php?act=updatedh" method="post">
                  <div class="mt-3">
                    <span class="form-label">ID:</span>
                    <input type="text" class="form-control" disabled />
                  </div>
                  <div class="mt-3">
                  
                   <span class="form-label">Tên người đặt</span>
                    <input value="<?=$user_name?>" type="text" class="form-control" name="user_name" disabled/>
                
                  </div>
                  <div class="mt-3">
                  
                   <span class="form-label">Địa chỉ</span>
                    <input value="<?=$user_address?>" type="text" class="form-control" name="user_address" disabled/>
                
                  </div>
                  <div class="mt-3">
                  
                   <span class="form-label">Email</span>
                    <input value="<?=$user_email?>" type="text" class="form-control" name="user_email" disabled/>
                
                  </div>
                  <div class="mt-3">
                   <span class="form-label">Phone</span>
                    <input value="<?=$user_phone?>" type="text" class="form-control" name="user_phone" disabled/>
                
                  </div>
                  <div class="mt-3">
                   <span class="form-label">Tổng giá</span>
                    <input value="<?=$total_bill?>" type="text" class="form-control" name="total_bill" disabled/>
                  </div><br>
                  <span class="form-label">Tình trạng:</span>
                  <select name="status_delivery" id="">
                    <?php
                        if($status_delivery==0){
                        echo'<option  value="0">Chờ xác nhận</option>
                        <option value="1">Chờ lấy hàng</option>
                        <option value="2">Chờ giao hàng</option>
                        <option value="3">Đã giao</option>
                        <option value="-1">Huỷ</option>
                        ';
                      
                        }else if($status_delivery==1) {
                            echo' <option value="1">Chờ lấy hàng</option>
                                <option value="2">Chờ giao hàng</option>
                                <option value="3">Đã giao</option>
                                <option  value="0">Chờ xác nhận</option>
                                <option value="-1">Huỷ</option>';
                        }else if($status_delivery==2) {
                            echo'  <option value="2">Chờ giao hàng</option>
                            <option value="3">Đã giao</option>
                                <option  value="0">Chờ xác nhận</option>
                                <option value="1">Chờ lấy hàng</option>
                                <option value="-1">Huỷ</option>
                            ';
                        }else if($status_delivery==3){
                            echo'  <option value="3">Đã giao</option>
                            <option  value="0">Chờ xác nhận</option>
                            <option value="1">Chờ lấy hàng</option>
                            <option value="2">Chờ giao hàng</option>
                            <option value="-1">Huỷ</option>';
                        }else {
                            echo'  <option value="-1"> Huỷ</option>
                            <option  value="0">Chờ xác nhận</option>
                            <option value="1">Chờ lấy hàng</option>
                            <option value="2">Chờ giao hàng</option>
                            <option value="3">Đã giao</option>';
                        }
                        
                        
                        ?>
                  </select>
                 <br>
                
                  
                  <?php
                       $method = ($status_payment === 1) ? "Thanh toán COD" : "Thanh toán VNPay";
                  ?>
                  <div class="mt-3">
                   <span class="form-label">Hình thức thanh toán:</span>
                    <input value="<?=$method?>" type="text" class="form-control" name="status_payment" disabled/>
                  </div><br>
                  
                  <table border="1"  width="100%" >
                        <tr align="center" >
                            <th>Tên sản phẩm</th>
                            <th>Ảnh</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                            <th>Thao tác</th>
                        </tr>
                        <?php
                            $show = show_detail($id);
                            foreach($show as $item){
                                extract($item);
                            
                        ?>
                            <tr align="center" style="border:1px solid #747474">
                                <td><?=$product_name?></td>
                                <td><img src="../image/<?= $item['image']?>" alt="" width="150px" height="150px"></td>
                                <td>$<?=$price?></td>
                                <td><?=$quantity?></td>
                                <td>$<?=$price * $quantity?></td>
                               
                                <td><a href="index.php?act=xoadh&id=<?= $item['id']?>"> Xoá</a></td>
                            </tr>

                        <?php
                            }
                        ?>

                   
                  </table>
                 
                  <div class="mt-3 d-flex justify-content-center">
                    
                    <input type="hidden" name="id" value="<?=$dh['id']?>">    
                    <button type="submit" class="btn btn-secondary m-1 "><i class="fa-solid fa-arrow-left"></i><a href="index.php?act=listdh" style="color:white; text-decoration: none;">Quay lại</a></button>
                    <button type="submit" class="btn btn-success m-1 " name="btnsumbit"><i class="fa-solid fa-plus"></i>Sửa Mới</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>