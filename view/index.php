<?php
    session_start();
    include "../model/pdo.php";
    include "../model/sanpham.php";
    include "../model/danhmuc.php";
    include "../model/khachhang.php";
    include 'header.php';
    include '../global.php';

    $spnew = load_sp_home();
    $spnewnam = load_sp_homenam();
    $spnewnu = load_sp_homenu();
    $blog = load_blog_home();

    // /$spcl = loadone_sanphamcl($product_id,$cate_id);
    
    if(isset($_GET['act']) && $_GET['act'] != ""){
        $act = $_GET['act'];
        switch ($act) {
            case 'chitietsanpham':
                
                if(isset($_GET['product_id']) && $_GET['product_id'] > 0){
                    $product_id = $_GET['product_id'];
                    $onesp = loadone_sanpham($product_id);
                    extract($onesp);
                    $spcl = loadone_sanphamcl($product_id,$cate_id);
                    $dstop4 = load_all_top4();
                    $loadColor = load_color();
                    $loadSize = load_size();
                    include 'chitietsanpham.php';
                }else{
                    include 'home.php';
                }
                
                break;
           
            case 'nam':
                $spnewnam = load_all_homenam();
                include 'nam.php';
                break;
            case 'nu':
                $spnewnu = load_all_homenu();
                include 'nu.php';
                break;

            // case 'gioithieu':
               
            //     include '../gioithieu.php';
            //     break;

            // case 'lienhe':
               
            //     include '../lienhe1.php';
            //     break;
            case 'dangky':
                // SELECT `user_id`, `username`, `password`, `email`, `phone`, `role`, `image` FROM `user` WHERE 1
                

              
                $errors = [];
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    // Kiểm tra các trường dữ liệu cụ thể của biểu mẫu
                   
                        $username = $_POST['username'];
                        $password = $_POST['password'];
                        $email = $_POST['email'];
                        // $existingUser = checkUserExistence($email,$username);
                       

                        if(empty($username)){
                            $errors['username'] = "Trường này không được để trống";
                        }
                        if(empty($password)){
                            $errors['password'] = "Trường này không được để trống";
                        }
                        if(empty($email)){
                            $errors['email'] = "Trường này không được để trống";
                        }
                        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                            $errors['email'] = "Email không hợp lệ.";
                        }
                        if(email_exist($email)){
                            $errors['email'] = "Email đã tồn tại.";
                        }
              
                     

                        if(empty($errors)){
                            setUser($username, $password, $email);
                            echo '<script>alert("Bạn đã đăng ký thành công vui lòng đăng nhập");</script>';
                            echo '<script>window.location.href = "index.php?act=dangnhap"</script>';
                        }
                
                      
                        
                       
                    
                }
                
              
              
               
                include 'dangky.php';
                break;
            case 'dangnhap':
                $errors = [];
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    // Kiểm tra các trường dữ liệu cụ thể của biểu mẫu
                   
                        $username = $_POST['username'];
                        $password = $_POST['password'];

                        if(empty($username)){
                            $errors['username'] = "Trường này không được để trống";
                        }
                        if(empty($password)){
                            $errors['password'] = "Trường này không được để trống";
                        }
                        
                        if(empty($errors)){
                            $checkUser = checkUser($username,$password);
                            if(is_array($checkUser)){
                                $_SESSION['username'] = $checkUser;
                                echo '<script>window.location.href = "index.php?act=home"</script>';
                            }else {
                                $thongbao = "Tên người dùng hoặc mật khẩu không chính xác.";
                            }
                        }     
                    
                }
                
                include 'dangnhap.php';
                break;

            

            case 'capnhattk':

                if ($_SERVER['REQUEST_METHOD'] === 'POST'){
                  
                    $user_id = $_POST['user_id'];
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $email = $_POST['email'];
                    $phone = $_POST['phone'];
                    $anh = $_FILES['image'];
                    $tenanh = $anh['name'];

                    updatekh1($username,$password,$email,$phone,$tenanh,$user_id);
                    move_uploaded_file($anh['tmp_name'],'../image/'.$tenanh);
                    $_SESSION['username'] = checkUser($username,$password);

                 
                    echo '<script>window.location.href = "index.php?act=home"</script>';
                }

                // if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                //     $user_id = $_POST['user_id'];
                //     $username = $_POST['username'];
                //     $password = $_POST['password'];
                //     $email = $_POST['email'];
                //     $phone = $_POST['phone'];
                //     $anh = $_FILES['image'];
                
                //     // Kiểm tra xem tệp đã được tải lên thành công không
                //     if ($anh['error'] === UPLOAD_ERR_OK) {
                //         $tenanh = $anh['name'];
                //         move_uploaded_file($anh['tmp_name'], '../image/' . $tenanh);
                //     } else {
                //         $tenanh = ""; // Nếu không tải lên được, đặt tên ảnh là rỗng
                //     }
                
                //     // Cập nhật thông tin người dùng
                //     updatekh1($username, $password, $email, $phone, $tenanh, $user_id);
                
                //     // Đặt lại SESSION nếu cần thiết
                //     $_SESSION['username'] = checkUser($username, $password);
                
                //     // Chuyển hướng người dùng sau khi cập nhật thành công
                //     echo '<script>window.location.href = "index.php?act=home"</script>';
                // }
                include 'capnhattk.php';
                break;

            case 'search':
              
                if(isset($_POST['btn'])){
                    $kyw = $_POST['kyw'];
                }else {
                    $kyw = "";
                }
                
                $pro = searchProduct($kyw);
          
                include 'search.php';
                break;

            case 'thoat':
              
                session_unset();
                echo '<script>window.location.href = "index.php?act=home"</script>';
                break;

            case 'quenmk':
                ob_start();
                include './sendmail.php';
                $mail= new Mailer();
                $errors = [''];
                 
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    // Kiểm tra các trường dữ liệu cụ thể của biểu mẫu
                           
                    $email = $_POST['email'];
                                
                                // $existingUser = checkUserExistence($email,$username);      
                        if($email==""){
                            $errors['email'] = "Trường này không được để trống";
                                   
                        }else  if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                            $errors['email'] = "Email không hợp lệ.";
                        }else {
                            $code=substr(rand(0,999999),0,6);
                            $content="Mã xác nhận là".$code;
                            $mail->sendMial($content,$email);
                            $_SESSION['mail']=$email;
                            $_SESSION['code']=$code;
                            header("location:index.php?act=ma");
                        }             
                }
            include './quenmk.php';             
            break;
            case 'ma':
            $errors = [''];
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                var_dump($_SESSION['code']);
                                // Kiểm tra các trường dữ liệu cụ thể của biểu mẫu
                               
                $ma = $_POST['ma'];
                if(empty($ma)){
                    $errors['ma']="TRường này không được để trống";
                }else if($ma!=$_SESSION['code']){
                    $errors['ma']="Mã xác nhận không đúng";
                }else{
                    header("location:index.php?act=updatemk");
                }
                                //    var_dump($_SESSION['mail']);
                                //    var_dump($_SESSION['code']);
            }
            include './ma.php';
            break;
            case 'updatemk':
                            
                              
                             
                               
            $errors = [''];
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                       
                                    
                                    // Kiểm tra các trường dữ liệu cụ thể của biểu mẫu
                                   
                                      
                $password = $_POST['password'];                       
                if(empty($password)){
                    $errors['pass']="Trường không được để trống";
                }else{
                    updatemk($_SESSION['mail'],$password);
                                           
                    header("location:index.php?act=dangnhap");
                }
            }
            include './upadatemk.php';
            break;
           

            
            
            default:
                include 'home.php';
                break;
        }
    }else {
        include 'home.php';
    }
    
    include 'footer.php';
?>