<hr>
<div class="box-spct">
    <ul>
        <li><a href="index.php?act=home">Trang chủ </a></li>
        <li> / </li>
        <li>Sản phẩm nam</li>
    </ul>

    
    
</div>

    <div class="product-both" style="max-width:1100px;margin:0 auto;">
        
        <div class="right">

            <?php 
                foreach ($spnewnam as $sp ) {
                   
                
            ?>
                <div class="pro">
                    <img src="../image/<?php echo $sp['image']?>" alt="">
                    <a href="index.php?act=chitietsanpham&product_id=<?php echo $sp['product_id']?>"><?php echo $sp['product_name']?></a><br>
                    <span>$<?php echo $sp['price']?></span>
                </div>
            <?php 
                }
            ?>
            
            
        </div>
        
    </div>



<hr style="max-width:1100px; margin:0 auto; margin-bottom:65px">
<hr style="max-width:1100px; margin:0 auto;">