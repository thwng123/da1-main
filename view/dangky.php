<hr>

<div class="box-spct">
    <ul>
        <li><a href="index.php?act=home">Trang chủ </a></li>
        <li> > </li>
        <li> Đăng ký</li>
    </ul>

    
</div>
<!-- SELECT `user_id`, `username`, `password`, `email`, `phone`, `role`, `image` FROM `user` WHERE 1 -->
<div class="box-login">
    <form action="index.php?act=dangky" method="post" id="login-form">
        <div class="form-group">
            <div class="lable">Email đăng nhập *</div>
          
            <input type="text"  name="email"  placeholder="Email đăng nhập">
            <div style="color: red;font-weight:500"><?php echo $errors['email'] ?? '' ?></div>
        </div>
        <div class="form-group">
            <div class="lable">Tên đăng nhập *</div>
         
            <input type="text"  name="username"  placeholder="Tên đăng nhập">
            <div style="color: red;font-weight:500"><?php echo $errors['username'] ?? '' ?></div>
        </div>
        <div class="form-group">
            <div class="lable">Mật khẩu *</div>
           
            <input type="password"  name="password"  placeholder="Mật khẩu">
            <div style="color: red;font-weight:500"><?php echo $errors['password'] ?? '' ?></div>
        </div>
       
        <div class="form-group dangnhap " style="position: relative;">
           
            <button type="submit" class="btn"  style="position: absolute; right:0; margin-top:25px">Đăng ký</button>
           <!-- <input type="submit" class="btn" value="Đăng ký"> -->
            <!-- <a href="/" class="forgot-password">Quên mật khẩu của bạn?</a> -->
        </div><br>
       
        <hr>
        <div class="form-group" style="text-align:center; margin-top: 12px">
            <span style="color:gray" >Bạn đã có tài khoản?</span>
            <span><a style="color:#ff6a28" href="index.php?act=dangnhap">Đăng nhập tại đây.</a></span>
        </div>
       

    </form>

</div>
<hr style="max-width:1100px; margin:0 auto; margin-top:35px;margin-bottom:35px;">

