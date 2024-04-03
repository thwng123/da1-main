<hr>
<?php
    if(!isset($_SESSION['username'])){
        echo '<script>window.location.href = "index.php?act=dangnhap"</script>';
        die;
    }
?>
<div class="box-spct">
    <ul>
        <li><a href="index.php?act=home">Trang chủ </a></li>
        <li> / </li>
        <li>Giỏ hàng</li>
    </ul>

</div>

<div class="table-cart" >
<form action="index.php?act=capnhatcart" method="post">


    <table border="1"  align= "center" style="width:1100px; border:1px solid #ddd; margin-bottom:59px">
        <tr align= "center">
            <th>Xoá</th>
            <th>Hình ảnh</th>
            <th>Sản phẩm</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Tổng</th>
            
        
        </tr>

            <!-- <form action="" method="post"> -->

        
                <?php
                $total = 0;
                $total_bill = 0;
                foreach( $_SESSION['cart']  as $lc){

                    $total = $lc['quantity'] * $lc['price'];
                    $total_bill += $total;
                ?>
                

            
                <tr align= "center">
                    <td>
                        <a href="index.php?act=del_cart&cart_id=<?php echo $lc['cart_id']?>">
                        <!-- <button><i class="fa-solid fa-trash" style="font-size: 20px; color:#ff6a28 "></i></button> -->
                        <input type="button" value="Xoá" style="font-size: 20px; color:#ff6a28 ">
                        </a>  
                    </td>
                    <td class="product_thumb">
                        <img src="../image/<?= $lc['image']?>" alt="" width="100" >
                    
                    </td>
                    <td class="product_name"><?= $lc['product_name']?></td>
                    <td class="pro-price">$<?= $lc['price']?></td>
                    <td class="product_quantity">
                        <!-- <input type="number" name="soluong[]" min="1" value="1" id=""> -->
                    
                        <input type="number" id="" min="1" name="soluong[]" value="<?= $lc['quantity'] ?>">
                        <input type="hidden" id="" name="product_id[]" value="<?= $lc['product_id'] ?>">
                    </td>
                    <td class="product_total">$<?= $total?></td>
                    
                    
                </tr>
            


                <?php
                }
                ?>
                <tr>
                    <td colspan=6 style="text-align:right;" class="capnhat" ><input  style="background: #242424;border: 0;color: #ffffff;display: inline-block;font-size: 12px;font-weight: 600;height: 38px;line-height: 18px;padding: 10px 15px;text-transform: uppercase;cursor: pointer;-webkit-transition: 0.3s;transition: 0.3s;" type="submit" value="Cập nhật giỏ hàng" name="capnhatsoluong"></td>
                </tr>
                <tr>
                    <td colspan=6 style="text-align:center;" class="pro-price" >
                        <div class="total_bill">
                            Tổng giỏ hàng: $<?php echo $total_bill?>
                        </div>
                        <div class="checkout">
                        <a href="index.php?act=checkout">
                            <input type="button" style="font-size:14px;background: #ff6a28;color: #ffffff;border: 0;padding: 10px 15px;font-weight: 600;margin-top:15px"  value="Thanh toán">
                        </a>
                        
                        </div>
                    </td>
                    
                </tr>   
              

            
           
            


    </table>
</form>
        <!-- <div class="total_cart" style="margin-top:59px">
            <h3>Tổng giỏ hàng</h3>
            <div class="coupon_inner">
                <div class="cart_subtotal">
                    <p>Tổng phụ</p>
                    <p class="cart_amount">£215.00</p>
                </div>
            </div>
        </div> -->
            

   
        
       
</div>
      