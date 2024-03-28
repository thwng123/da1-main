
    <main>
        <div class="banner">
            <div id="carouselExample" class="carousel slide">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img src="../image/slide1.jpg" class="d-block w-100" alt="..." >
                    </div>
                    <div class="carousel-item">
                    <img src="../image/slide2.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                    <img src="../image/slide3.png" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                    <img src="../image/slider5.png" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <!-- <h2  style="text-alight:center; margin-top:10px">New Collection</h2> -->
        <div class="container" style="margin-top:50px" >
            <div class="box-main"> 
                <img src="../image/girl.jpg" alt="">
            </div>
            <div class="box-phu">
                <h4 style="text-alight:center;">Bộ sưu tập dành cho nữ</h4>

                <div class="pro">
                    <?php
                        foreach($spnewnu as $sp){
                            // extract($sp);
                            
                        
                    ?>
                        <div class="product">
                            <img src="../image/<?= $sp['image']?>" alt="">
                            <a href="index.php?act=chitietsanpham&product_id=<?php echo $sp['product_id']?>"><?= $sp["product_name"]?></a><br>
                            <span>$<?= $sp['price']?></span>
                        </div>
                    <?php
                        }
                    ?>


                </div>

                
            </div>

        </div>
        <hr>
        <div class="container" style="margin-top:50px" >
            <!-- <div class="box-main"> 
                <img src="image/girl.jpg" alt="">
            </div> -->
            <div class="box-phu">
                <h4 style="text-alight:center;">Bộ sưu tập dành cho nam</h4>

                <div class="pro">
                    <?php
                        foreach($spnewnam as $sp){
                            // extract($sp);
                            
                        
                    ?>
                        <div class="product">
                            <img src="../image/<?= $sp['image']?>" alt="">
                            <a href="index.php?act=chitietsanpham&product_id=<?php echo $sp['product_id']?>"><?= $sp["product_name"]?></a><br>
                            <span>$<?= $sp['price']?></span>
                        </div>
                    <?php
                        }
                    ?>


                </div>

                
            </div>

            <div class="box-main"> 
                <img src="../image/boy.jpg" alt="">
            </div>

        </div>
      </div>

        <div class="blog">
            <h2>Blog mới nhất</h2>
            <div class="blog-main">

                <?php
                    foreach ($blog as $key) {
                    
                ?>
                    <div class="blog-detail">
                        <img src="../image/blog/<?php echo $key['image']?>" alt="">
                        <h3>
                            <a href="#"><?php echo $key['tittle']?></a>
                        </h3>
                        <p>By <span class="themes"><?php echo $key['author']?></span>/ <?php echo $key['create_at']?></p>
                        <p><?php echo $key['content']?></p>
                    </div>
                <?php
                    }
                ?>
               
            </div>

        </div>
        <hr style="max-width:1100px; margin:0 auto; margin-top:65px;margin-bottom:50px">

        <div class="ins">
            <h2>Theo dõi chúng tôi trên Instagram</h2>
            <div class="box-ins">
                <div class="ins-detail">
                    <img src="../image/about/ins1.png" alt="">
                </div>
                <div class="ins-detail">
                    <img src="../image/about/ins2.png" alt="">
                </div>
                <div class="ins-detail">
                    <img src="../image/about/ins3.png" alt="">
                </div>
                <div class="ins-detail">
                    <img src="../image/about/ins4.png" alt="">
                </div>
                <div class="ins-detail">
                    <img src="../image/about/ins5.png" alt="">
                </div>

            </div>
        </div>
        <!-- <hr style="max-width:1200px; margin:0 auto; margin-bottom:65px"> -->

    </main>
    <hr style="max-width:1400px; margin:0 auto; margin-top:65px;margin-bottom:50px">
    <hr style="max-width:1100px; margin:0 auto; margin-top:65px;margin-bottom:50px">
    