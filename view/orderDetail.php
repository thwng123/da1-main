<hr>
<div class="box-spct">
    <ul>
        <li><a href="index.php?act=home">Trang chủ </a></li>
        <li> / </li>
        <li>Chi tiết đơn hàng</li>
    </ul>

</div>

<div class="tong">
<div class="box-detail-bill" >
    <div class="info-bill">
        <label for="">Tên người đặt: </label>
        <input type="text" name="" id="" value="<?= $user_name?>" disabled><br>
        <label for="">Email: </label>
        <input type="text" name="" id="" value="<?= $user_email?>" disabled><br>
        <label for="">Phone: </label>
        <input type="text" name="" id="" value="<?= $user_phone?>" disabled><br>
        <label for="">Địa chỉ: </label>
        <input type="text" name="" id="" value="<?= $user_address?>" disabled><br>
    </div>
    
    <div class="bill_total">
        <h1>Tổng đơn hàng: $<?= $total_bill?></h1>
    </div>
    

</div>
<div class="table-detail-bill" style="margin:0 auto">
    <table border="1" style="text-align:center" width="1100px" >
        <thead>

            <tr>
                <th>Tên sản phẩm</th>
                <th>Ảnh</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
            </tr>
        </thead>
        <tbody>
            <?php

                $show = show_detail($id);
                foreach( $show as $item){
                    extract($item);
                

            ?>
                <tr>
                    <td><?=$product_name?></td>
                    <td><img src="../image/<?= $item['image']?>" alt="" width="150px" height="150px"></td>
                    <td>$<?=$price?></td>
                    <td><?=$quantity?></td>
                    <td>$<?=$price * $quantity?></td>
                </tr>
                
            <?php
                }
            ?>
        </tbody>

    </table>
</div>
</div>
<hr style="max-width:1100px; margin:0 auto; margin-top:65px">

