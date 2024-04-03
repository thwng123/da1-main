<?php
    session_start();
    include "../model/pdo.php";
    include "../model/sanpham.php";
    include "../model/danhmuc.php";
    include "../model/khachhang.php";
    include "../model/cart.php";
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

                    // if(isset($_POST['btn_addcart']) ){
                    //     $user_id = $_SESSION['username']['id'];
                    //     // echo $user_id;
                    //     $product_id = $_GET['product_id'];
                    //     // add_cart($user_id, $product_id);
                    //     // echo '<script>window.location.href = "index.php?act=cart"</script>';

                    // }
                   
                    include 'chitietsanpham.php';
                }else{
                    
                    include 'home.php';
                }

                
                
                break;

            case 'addcart':
                if(isset($_GET['product_id'])){
                    $product_id = $_GET['product_id'];
                  
                    $user_id = $_SESSION['username']['user_id'];
                  
                    // add_cart($user_id, $product_id, $quantity);
                    add_cart($user_id, $product_id, $quantity,$status);
                    //  echo "thuong";
                }


                $user_id = $_SESSION['username']['user_id'];
               
                 $_SESSION['cart'] = list_cart($user_id);
                
                
                
                include 'cart.php';
                break;

                
                
                break;
           
            // case 'add_cart':
            //     if($_SERVER['REQUEST_METHOD'] === 'POST') {
            //          $product_id = loadone_sanpham($product_id);
            //         // $product_id = 
            //         $user_id = $_SESSION['username']['id'];
            //         add_cart($user_id, $product_id);

                    
            //     }
            //     include 'chitietsanpham.php';
            //     break;


            case 'nam':
                $spnewnam = load_all_homenam();
                include 'nam.php';
                break;
            case 'nu':
                $spnewnu = load_all_homenu();
                include 'nu.php';
                break;

            case 'cart':
                $product_id = $_GET['product_id'];
                $user_id = $_SESSION['username']['user_id'];
                
                $_SESSION['cart']  = list_cart($user_id, $product_id);
               
                    

                
                
                include 'cart.php';
                break;
            
            case 'del_cart':
                if(isset($_GET['cart_id']) && ($_GET['cart_id']>0)){
                 
                    $cart_id =$_GET['cart_id'];
                    del_cart($cart_id);
                    echo '<script>window.location.href = "index.php?act=cart"</script>';

                }
                $rows = list_cart("",0);

                // include 'cart.php';
                break;
                
            
            case 'checkout':
               
                 $_SESSION['cart']  = list_cart($user_id, $product_id);
              
                if(!empty($_POST) && !empty($_SESSION['cart'])){
                   
                   
                  

                    $user_name = $_POST['user_name'];
                    $user_email = $_POST['user_email'];
                    $user_address = $_POST['user_address'];
                    $user_phone = $_POST['user_phone'];
                    $user_id = $_SESSION['username']['user_id'];
                    $total_bill = total_bill();
                    $status_delivery = 0;
                    $status_payment = 0;
                    

                    $orderId = insert_get_last_id($user_id,$user_name ,$user_email ,$user_phone ,$user_address ,$total_bill,$status_delivery,$status_payment);
                    
                    
                    foreach($_SESSION['cart'] as $productID => $lc){
                        $orderID = $orderId;
                        $product_id = $lc['product_id'];
                        $quantity = $lc['quantity'];
                        $price = $lc['price'];

                        insertOrderItem($orderID, $product_id, $quantity, $price);

                    }
                  
                    
                    
                    del_cart2($user_id);
                    unset($_SESSION['cart']);
                    
                    echo '<script>window.location.href = "index.php?act=dathangthanhcong"</script>';
                  
                }
               
                // echo '<script>window.location.href = "index.php?act=home"</script>';


                include 'checkout.php';
                break;

            case 'dathangthanhcong':
               
                $_SESSION['bill1'] = showAll($user_id);
                // // echo '<pre>';
                // // print_r($_SESSION['bill1']);
                // // // unset ($_SESSION['bill1']);
                // // echo '</pre>';
                // // die;
                $_SESSION['bill2'] = showAll2($user_id);
                // echo '<pre>';
                // print_r($_SESSION['bill2']);
                // echo '</pre>';
                // die;
                // unset($_SESSION['bill1']);
                // unset($_SESSION['bill2']);
                include 'dathangthanhcong.php';
                break;
                
            
            case 'capnhatcart':
                if(isset($_POST['capnhatsoluong'])){
                
                
                    for($i = 0; $i < count($_POST['product_id']); $i++){
                        $product_id = $_POST['product_id'][$i];
                        $quantity =  $_POST['soluong'][$i];
                        capnhatCart($product_id, $quantity); // Thay $soluong bằng $quantity
                        echo '<script>window.location.href = "index.php?act=cart"</script>';

                    }
                    
                }

                include 'cart.php';
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

                if (isset($_POST['btn']) && $_POST['btn']){
                  
                    $user_id = $_POST['user_id'];
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $email = $_POST['email'];
                    $phone = $_POST['phone'];
                    $anh = $_FILES['image'];
                    $tenanh = $anh['name'];

                    updatekh1($user_id,$username,$password,$email,$phone,$tenanh);
                     move_uploaded_file($anh['tmp_name'],'../image/'.$tenanh);
                    $_SESSION['username'] = checkUser($username,$password);

                 
                    echo '<script>window.location.href = "index.php?act=capnhattk"</script>';
                }

                // if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                //     // Kiểm tra tồn tại của các biến POST
                //     if(isset($_POST['user_id'], $_POST['username'], $_POST['password'], $_POST['email'], $_POST['phone'], $_FILES['image'])) {
                //         $user_id = $_POST['user_id'];
                //         $username = $_POST['username'];
                //         $password = $_POST['password'];
                //         $email = $_POST['email'];
                //         $phone = $_POST['phone'];
                //         $anh = $_FILES['image'];
                
                //         // Kiểm tra tính hợp lệ của file được tải lên
                //         if($anh['error'] === UPLOAD_ERR_OK) {
                //             $tenanh = $anh['name'];
                //             move_uploaded_file($anh['tmp_name'], '../image/' . $tenanh);
                //         } else {
                //             $tenanh = ""; // Nếu không tải lên được, đặt tên ảnh là rỗng
                //         }
                
                //         // Thực hiện cập nhật thông tin người dùng
                //          updatekh1($username, $password, $email, $phone, $tenanh, $user_id);
                
                //         // Đặt lại SESSION nếu cần thiết
                //          $_SESSION['username'] = checkUser($username, $password);
                
                //         // Chuyển hướng người dùng sau khi cập nhật thành công
                //         echo '<script>window.location.href = "index.php?act=home"</script>';
                //     } else {
                //         // Thông báo lỗi nếu các biến POST không tồn tại
                //         echo "Có lỗi xảy ra khi xử lý yêu cầu.";
                //     }
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