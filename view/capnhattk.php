<div class="box-spct">
    <ul>
        <li><a href="index.php?act=home">Trang chủ </a></li>
        <li> / </li>
        <li>Tài khoản của tôi</li>
    </ul>

    
</div>

<div class="form-user">
    <div class="hoso">
        <h1>Hồ Sơ Của Tôi</h1>
        <span>Quản lý thông tin hồ sơ để bảo mật tài khoản</span>
    </div>
    <hr>

    <div class="box-login" style="text-align:center; color:red; font-weight:500;">
    <?php
        if(isset($thongbao)){
            echo $thongbao;
        }
    ?>
    </div>

    <div class="form-container">
            <?php
                // if(isset($_SESSION['username']) && (is_array($_SESSION['username']))){
                //     extract($_SESSION['username']);
                // }
            ?>
        <form action="index.php?act=capnhattk" method="post" enctype="multipart/form-data">
            <div class="info-user">
                <div class="form-group">
                    <label for="username">Tên đăng nhập:</label><br>
                    <input type="text" id="username" name="username" value="<?= $_SESSION['username']['username']?>"  style="width:450px;padding: 5px;border: 1px solid #ccc;border-radius: 5px;padding: 0 20px;height: 48px;">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label><br>
                    <input type="email" id="email" name="email" value="<?= $_SESSION['username']['email']?>"  style="width:450px">
                </div>
                <div class="form-group">
                    <label for="phone">  Số điện thoại:</label><br>
                    <input type="number" id="phone" name="phone" value="<?= $_SESSION['username']['phone']?>"  style="width:450px;padding: 5px;border: 1px solid #ccc;border-radius: 5px;padding: 0 20px;height: 48px;">
                </div>
                <div class="form-group">
                    <label for="password">Mật khẩu:</label><br>
                    <input type="text" id="password" name="password" value="<?= $_SESSION['username']['password']?>" style="width:450px;padding: 5px;border: 1px solid #ccc;border-radius: 5px;padding: 0 20px;height: 48px;" >
                </div>
            </div>
          
            <label for="password">Chọn ảnh:</label><br>
                <img src="../image/<?= $_SESSION['username']['image']?>" alt="" style="width: 100px;height:100px">
                <input type="file" name="image"  style="width:450px;padding:10px;border: 1px solid #ccc;border-radius: 5px;height: 48px;">
          
           <input type="hidden" name="user_id" value="<?= $_SESSION['username']['user_id']?>">
            <div class="form-group" >
             
            <!-- <button type="submit" name="btn" style="width:70px; padding:0 20px; height:40px;border:none; color:white;margin-top:10px; background: rgb(238, 77, 45);">Lưu</button> -->
            <input type="submit" value="Lưu" name="btn" style="width:70px; padding:0 20px; height:40px;border:none; color:white;margin-top:10px; background: rgb(238, 77, 45);">
            </div>
        </form>
    </div>
</div>

<hr style="max-width:1100px; margin:0 auto; margin-top:35px;margin-bottom:35px;">