<div class="order_success">
    <h1>Bạn đã đặt hàng thành công</h1>
</div>

<div class="box-bill" style="border:1px solid #747474">
    <div class="bill_detail">
    <h3>Đơn hàng của bạn</h3>
    <div class="info_bill" style="padding:20px">
        <div>Mã đơn hàng: <strong><?php echo $_SESSION['bill1']['order_id']?></strong>  </div>
        <div>Username đặt hàng:  <strong><?php echo $_SESSION['bill1']['user_name']?></strong></div>
        <div>Địa chỉ: <strong><?php echo $_SESSION['bill1']['user_address']?></strong> </div>
        <div>Email người đặt: <strong><?php echo $_SESSION['bill1']['user_email']?></strong> </div>
        <div>Số điện thoại: <strong><?php echo $_SESSION['bill1']['user_phone']?></strong> </div>
    </div>
    <div class="table_order">
        <table border="1">
            <tr>
                <th>Sản phẩm</th>
                <th>Tổng cộng</th></th>
            </tr>
            <?php
                    $total = 0;
                    $total_bill = 0;
                foreach($_SESSION['bill2'] as $item){
                    $total = $item['quantity'] * $item['price'];
                    $total_bill += $total;
                
            ?>
                <tr>
                    <td> <?= $item['product_name']?> <strong> × <?php echo $item['quantity']?></strong></td>
                    <td>$<?= $total?></td>
                </tr>
            <?php
                }
            ?>
                <tr class="order_total">
                        <th>Order Total</th>
                        <td><strong name="total_bill" >$<?php echo $total_bill?></strong></td>
                </tr>
        </table>
    </div>
   
    </div>
    
</div>