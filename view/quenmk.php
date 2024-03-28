<hr>

<div class="box-spct">
    <ul>
        <li><a href="index.php?act=home">Trang chủ </a></li>
        <li> > </li>
        <li> Quên Mật Khẩu</li>
    </ul>

    
</div>
    <div class="box-login" style="text-align:center; color:red; font-weight:500;">
    <?php
        if(isset($thongbao)){
            echo $thongbao;
        }
       
    ?>
    </div>
  
<div class="box-login">
    <form action="index.php?act=quenmk" method="post" id="login-form">
        <div class="form-group">
            <label for="username">Email *</label><br>
            <input type="text" id="username" name="email"  placeholder="Email">
            <div style="color: red;font-weight:500"><?php  if(isset(  $errors['email'])){
                echo  $errors['email'];
            } ?></div>
        </div>
        
        <div class="form-group dangnhap">
            <a href="index.php?act=dangky" class="forgot-password">Bạn chưa có tài khoản?</a>
            <input type="submit" name="btnsumbit" class="btn" value="Quên Mật Khẩu">
        
            <!-- <a href="/" class="forgot-password">Quên mật khẩu của bạn?</a> -->
        </div>
        <?php
       
            
                
            

             
               
         
          

             ?>
        
       

        <hr>

        <div class="form-group" style="text-align:center; margin-top: 12px">
            <span style="color:gray" >Bạn chưa có tài khoản?</span>
            <span><a style="color:#ff6a28" href="index.php?act=dangky">Đăng ký</a></span>
        </div>

    </form>

    
</div>

<hr style="max-width:1100px; margin:0 auto; margin-top:35px;margin-bottom:35px;">
