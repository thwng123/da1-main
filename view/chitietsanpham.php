<hr>
<div class="box-spct">
    <ul>
        <li><a href="index.php?act=home">Trang chủ </a></li>
        <li> > </li>
        <li> Chi tiết sản phẩm</li>
        <li> > </li>
        <li><?php echo $onesp['product_name']?></li>
    </ul>

    <div class="detail-spct">
        <div class="img-spct">
            <img src="../image/<?php echo $onesp['image']?>" alt="">
        </div>
        <div class="content-spct">
            <h1><?php echo $onesp['product_name']?></h1>
            <div class="box-spct-cm">
                <ul>
                    <li><i class="fa-solid fa-star" style="font-size: 13px; color:#ff6a28"></i></li>
                    <li><i class="fa-solid fa-star" style="font-size: 13px; color:#ff6a28"></i></li>
                    <li><i class="fa-solid fa-star" style="font-size: 13px; color:#ff6a28"></i></li>
                    <li><i class="fa-solid fa-star" style="font-size: 13px; color:#ff6a28"></i></li>
                    <li><i class="fa-solid fa-star" style="font-size: 13px; color:#ff6a28"></i></li>
                    <li><a href="#"> 1 đánh giá </a></li>
                    <li><a href="#"> Viết đánh giá </a></li>
                </ul>
            </div>
            <span>$<?php echo $onesp['price']?></span>
            <p><?php echo $onesp['description']?></p>
               
            <form action="index.php?act=addcart&product_id=<?= $onesp['product_id']?>" method="post">
                <div class="product-size">
                    <h3>Size</h3>
                    <select name="size_name" id="">
                    <?php
                            foreach($loadSize as $key){
                                
                                
                        ?>
                            <option value="<?php echo $key['size_name']?>"><?php echo $key['size_name']?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>

                <!-- <div class="product-quantity">
                    <h3>Số lượng</h3>
                    <input type="number" name="soluong" min="1" max="100" value="1" >
                </div> -->
            
                <button type="submit" name="btn_addcart">THÊM VÀO GIỎ HÀNG</button>
               
            </form>
            
            <div class="box-spct-cm">
                <ul>
                    <li>
                        <a href="#"><i class="fa-solid fa-heart" style="font-size: 13px"></i> Thêm vào mục yêu thích</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa-solid fa-sliders" style="font-size: 13px; margin-left:10px"></i>  So sánh sản phẩm này</a>
                    </li>
                    
                </ul>
            </div>

        </div>
    </div>
    
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){         
        $("#binhluan").load("../view/binhluan/binhluan.php", {idpro: <?=$product_id?>});             
    });
</script>
    <div class="box-spcl">
        <h2>Bình luận</h2>
               
        <div class="row " id="binhluan">
                
        </div>
    </div>
            

<div class="box-spcl">
    
    <h2>Sản phẩm liên quan</h2>
    <p>Các thiết kế hiện đại, tối giản và hiện đại thể hiện chữ viết tay Lavish Alice</p>
    <div class="product-cl">   
        <?php
            foreach ($spcl as $key) {
                
            
        ?>   
            <div class="product">
                <img src="../image/<?php echo $key['image']?>"alt="">
                <a href="index.php?act=chitietsanpham&product_id=<?php echo $key['product_id']?>"><?php echo $key['product_name']?></a><br>
                <span>$<?php echo $key['price']?></span>
                                
            </div>   
        <?php
            }
        ?>
        <!-- <div class="product">
            <img src="../image/product11.jpg" alt="">
            <a href="#">Product 1</a><br>
           <span>£60.00</span>
                        
        </div>   
        <div class="product">
            <img src="../image/product28.jpg" alt="">
            <a href="#">Product 2</a><br>
           <span>£60.00</span>
                        
        </div>   
        <div class="product">
            <img src="../image/product13.jpg" alt="">
            <a href="#">Product 3</a><br>
           <span>£60.00</span>
                        
        </div>   
        <div class="product">
            <img src="../image/product15.jpg" alt="">
            <a href="#">Product 4</a><br>
           <span>£60.00</span>
                        
        </div>        -->
    </div>
    
    
</div>

<div class="box-spcl">
    
    <h2>Best seller</h2>
    <p>Các thiết kế hiện đại, tối giản và hiện đại thể hiện chữ viết tay Lavish Alice</p>
    <div class="product-cl">     
        <?php
            foreach ($dstop4 as $sp) {
                
            
        ?> 
            <div class="product">
                <img src="../image/<?php echo $sp['image']?>" alt="">
                <a href="index.php?act=chitietsanpham&product_id=<?php echo $sp['product_id']?>"><?php echo $sp['product_name']?></a><br>
                <span>$<?php echo $sp['price']?></span>
                            
            </div> 

        <?php 
            }
        ?>
        <!-- <div class="product">
            <img src="../image/product11.jpg" alt="">
            <a href="#">Product 1</a><br>
           <span>£60.00</span>
                        
        </div>   
        <div class="product">
            <img src="../image/product28.jpg" alt="">
            <a href="#">Product 2</a><br>
           <span>£60.00</span>
                        
        </div>   
        <div class="product">
            <img src="../image/product13.jpg" alt="">
            <a href="#">Product 3</a><br>
           <span>£60.00</span>
                        
        </div>   
        <div class="product">
            <img src="../image/product15.jpg" alt="">
            <a href="#">Product 4</a><br>
           <span>£60.00</span>
                        
        </div>        -->
    </div>
    
    
</div>

<hr style="max-width:1100px; margin:0 auto; margin-bottom:65px">
<hr style="max-width:1100px; margin:0 auto;">