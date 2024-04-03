<div class="box-spct">
    <ul>
        <li><a href="index.php?act=home">Trang chủ </a></li>
        <li> / </li>
        <li>Thủ tục thanh toán</li>
    </ul>

</div>
<div class="checkout_form">
    <div class="row" >
       
            <form action="index.php?act=checkout" method="post" style="display:flex; max-width:1100px; justify-content: space-between;" >
                <div class="left" style="width:46%">
                    <h3>Billing Details</h3>
                    <div class="col-lg-12 mb-20">
                        <label>Họ tên <span>*</span></label>
                        <input type="text" name="user_name" value="<?= $_SESSION['username']['username']?>" required>    
                    </div>
                    <div class="col-12 mb-20">
                        <label>Địa chỉ<span>*</span></label>
                        <input type="text" name="user_address" value="" required>    
                    </div>
                    <div class="col-12 mb-20">
                        <label>Email<span>*</span></label>
                        <input type="text" name="user_email" value="<?= $_SESSION['username']['email']?>" required>    
                    </div>
                    <div class="col-12 mb-20">
                        <label>Số điện thoại<span>*</span></label>
                        <input type="tel" name="user_phone" value="<?= $_SESSION['username']['phone']?>" required>    
                    </div>
                </div>

                <div class="right" style="width:50%">
                    <h3>Your order</h3>
                    <div class="order_table table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th>Sản phẩm</th>
                                    <th>Tổng cộng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $total = 0;
                                    $total_bill=0;
                                    foreach($_SESSION['cart'] as $lc){
                                    $total = $lc['quantity'] *  $lc['price'] ;
                                    $total_bill += $total;
                                ?>

                                    <tr>
                                        <td> <?= $lc['product_name']?> <strong> × <?php echo $lc['quantity']?></strong></td>
                                        <td>$<?php echo $total?></td>
                                    </tr>
                                   
                                    
                                <?php
                                    }
                                ?>

                            
                            </tbody>
                            <tfoot>
                               
                                     <tr class="order_total">
                                        <th>Order Total</th>
                                        <td><strong name="total_bill" >$<?php echo $total_bill?></strong></td>
                                    </tr>

                                
                               
                            </tfoot>
                        </table>
                        <!-- <a href="index.php?act=home" onclick="return !confirm('Đừng đi :))')" class="btn btn-warning">Quay lại trang chủ</a> -->
                        <div class="order_button">
                            
                            <input type="submit" value="Thanh toán">
                        </div>
                    </div>
                </div>
                
                
          
      
      
           
                
            </form>
            
            
        
    </div>
</div>
