<hr>
<div class="box-spct">
    <ul>
        <li><a href="index.php?act=home">Trang chủ </a></li>
        <li> / </li>
        <li>Lịch sử đơn hàng</li>
    </ul>

</div>

<div class="order_success">
    
</div>

<div class="box-bill" >
    <div class="bill_detail">
        <h3>Đơn hàng của bạn</h3>
        <table style="width:1100px" border="1">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Date</th>
                    <th>Receiver</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Payment</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
               <?php
                $listOrder = showAll($user_id);
                foreach($listOrder as $item){
                    extract($item);
                
               

                // ($status_delivery === 0) ? $tinh_trang = "Đã xử lý" : $tinh_trang = "Đang xử lý";
                $tinh_trang = ($status_delivery === 0) ?  "Đã xử lý" :  "Đang xử lý";
                //  $payment = ($status_payment === 0) ?  "Đã thanh toán VNPAY" :  "Thanh toán COD";
               ?>

                    <tr>
                        <td><?=$id?></td>
                        <td><?=$created_at?></td>
                        <td><?=$user_name?></td>
                        <td>$<?=$total_bill?></td>
                        <td><?=$tinh_trang?></td>
                        <td><?php if($status_payment==0){
                            echo"Thanh toán khi nhận hàng";
                        }else if($status_payment==1){
                            echo "Đã thanh toán qua VNPAY";
                        }?></td>
                        <td>
                            <a href="index.php?act=orderDetail&id=<?=$id?>"> Xem chi tiết</a>   
                        </td>
                    </tr>

               <?php
                }
               ?>
            </tbody>
            

            <tr>


            </tr>
            
        </table>
        
    </div>
   
    </div>
    
</div>