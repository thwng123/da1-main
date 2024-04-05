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
                $user_id = $_SESSION['username']['user_id'];
                if(isset($_GET['product_id'])){
                    $quantity = 0;
                    $status = 0;

                    $product_id = $_GET['product_id'];
                  
                    if(!cartExsit($product_id, $user_id)){
                        add_cart($user_id, $product_id, $quantity,$status);
                    }else {
                        echo "<script> alert('Sản phẩm đã tồn tại vui lòng cập nhật trong giỏ hàng')</script>";
                    }
                  
                    
                }


                // $user_id = $_SESSION['username']['user_id'];
               
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
                // $product_id = $_GET['product_id'];
                $user_id = $_SESSION['username']['user_id'];
                
                $_SESSION['cart']  = list_cart($user_id);
               
                    

                
                
                include 'cart.php';
                break;
            
            case 'del_cart':
                if(isset($_GET['cart_id']) && ($_GET['cart_id']>0)){
                    
                    $cart_id =$_GET['cart_id'];
                    del_cart($cart_id);
                    echo '<script>window.location.href = "index.php?act=cart";</script>';

                }
                $rows = list_cart("",0);

                 include 'cart.php';
                break;
                
            
            case 'checkout':
               
                 $_SESSION['cart']  = list_cart($user_id);
              
                if(!empty($_POST['btn']) && !empty($_SESSION['cart'])){
                   
                    $user_name = $_POST['user_name'];
                    $user_email = $_POST['user_email'];
                    $user_address = $_POST['user_address'];
                    $user_phone = $_POST['user_phone'];
                    $user_id = $_SESSION['username']['user_id'];
                    $total_bill = total_bill();
                    $status_delivery = 0;
                    $status_payment = 0;
                    

                    $orderId = insert_get_last_id($user_id,$user_name ,$user_email ,$user_phone ,$user_address ,$total_bill,$status_delivery,$status_payment);
                    // $_SESSION['orderId'] = $orderId;
                    
                    
                    foreach($_SESSION['cart'] as $productID => $lc){
                        $orderID = $orderId;
                        $product_id = $lc['product_id'];
                        $quantity = $lc['quantity'];
                        $price = $lc['price'];

                        insertOrderItem($orderID, $product_id, $quantity, $price);

                    }
                  
                    
                    
                    del_cart2($user_id);
                    unset($_SESSION['cart']);
                    
                    // echo '<script>window.location.href = "index.php?act=dathangthanhcong"</script>';
                    echo "<script>alert('Bạn đã mua hàng thành công đang chờ xử lý'); window.location.href = ' index.php?act=home';</script>";
                  
                }else if(isset($_POST['redirect'])){
                    $user_name = $_POST['user_name'];
                    $user_email = $_POST['user_email'];
                    $user_address = $_POST['user_address'];
                    $user_phone = $_POST['user_phone'];
                    $user_id = $_SESSION['username']['user_id'];
                    $total_bill = total_bill();
                    // echo $total_bill;
                    $rounded = round($total_bill);
                    echo $rounded;
                   
                    // echo $total_bill;
                    $status_delivery = 0;
                    $status_payment = 1;
                    ob_start();
                 error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
                 date_default_timezone_set('Asia/Ho_Chi_Minh');
                 $vnp_Url="https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
                 $vnp_Returnurl="https://localhost/da1-main/view/index.php?act=dathangthanhcong";
                 $vnp_TmnCode = "CGXZLS0Z";//Mã website tại VNPAY 
                 $vnp_HashSecret = "XNBCJFAKAZQSGTARRLGCHVZWCIOIGSHN"; //Chuỗi bí mật
                 $vnp_TxnRef = rand(0,999999); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
                 $vnp_OrderInfo = 'nội dung thanh toán';
                 $vnp_OrderType ='billpayment';
                 $vnp_Amount =  ($rounded*24000)*100;
                 $vnp_Locale = 'vn';
                 $vnp_BankCode = 'NCB';
                 $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
                 //Add Params of 2.0.1 Version
                 // $vnp_ExpireDate = $_POST['txtexpire'];
                 //Billing
                 // $vnp_Bill_Mobile = $_POST['txt_billing_mobile'];
                 // $vnp_Bill_Email = $_POST['txt_billing_email'];
                 // $fullName = trim($_POST['txt_billing_fullname']);
                 // if (isset($fullName) && trim($fullName) != '') {
                 //     $name = explode(' ', $fullName);
                 //     $vnp_Bill_FirstName = array_shift($name);
                 //     $vnp_Bill_LastName = array_pop($name);
                 // }
                 // $vnp_Bill_Address=$_POST['txt_inv_addr1'];
                 // $vnp_Bill_City=$_POST['txt_bill_city'];
                 // $vnp_Bill_Country=$_POST['txt_bill_country'];
                 // $vnp_Bill_State=$_POST['txt_bill_state'];
                 // // Invoice
                 // $vnp_Inv_Phone=$_POST['txt_inv_mobile'];
                 // $vnp_Inv_Email=$_POST['txt_inv_email'];
                 // $vnp_Inv_Customer=$_POST['txt_inv_customer'];
                 // $vnp_Inv_Address=$_POST['txt_inv_addr1'];
                 // $vnp_Inv_Company=$_POST['txt_inv_company'];
                 // $vnp_Inv_Taxcode=$_POST['txt_inv_taxcode'];
                 // $vnp_Inv_Type=$_POST['cbo_inv_type'];
                 $inputData = array(
                    "vnp_Version" => "2.1.0",
                     "vnp_TmnCode" => $vnp_TmnCode,
                     "vnp_Amount" => $vnp_Amount,
                     "vnp_Command" => "pay",
                     "vnp_CreateDate" => date('YmdHis'),
                     "vnp_CurrCode" => "VND",
                     "vnp_IpAddr" => $vnp_IpAddr,
                     "vnp_Locale" => $vnp_Locale,
                     "vnp_OrderInfo" => $vnp_OrderInfo,
                     "vnp_OrderType" => $vnp_OrderType,
                     "vnp_ReturnUrl" => $vnp_Returnurl,
                     "vnp_TxnRef" => $vnp_TxnRef
                     // "vnp_ExpireDate"=>$vnp_ExpireDate
                     // "vnp_Bill_Mobile"=>$vnp_Bill_Mobile,
                     // "vnp_Bill_Email"=>$vnp_Bill_Email,
                     // "vnp_Bill_FirstName"=>$vnp_Bill_FirstName,
                     // "vnp_Bill_LastName"=>$vnp_Bill_LastName,
                     // "vnp_Bill_Address"=>$vnp_Bill_Address,
                     // "vnp_Bill_City"=>$vnp_Bill_City,
                     // "vnp_Bill_Country"=>$vnp_Bill_Country,
                     // "vnp_Inv_Phone"=>$vnp_Inv_Phone,
                     // "vnp_Inv_Email"=>$vnp_Inv_Email,
                     // "vnp_Inv_Customer"=>$vnp_Inv_Customer,
                     // "vnp_Inv_Address"=>$vnp_Inv_Address,
                     // "vnp_Inv_Company"=>$vnp_Inv_Company,
                     // "vnp_Inv_Taxcode"=>$vnp_Inv_Taxcode,
                     // "vnp_Inv_Type"=>$vnp_Inv_Type
                 );

                 if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                     $inputData['vnp_BankCode'] = $vnp_BankCode;
                 }
                 // if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
                 //     $inputData['vnp_Bill_State'] = $vnp_Bill_State;
                 // }

                 //var_dump($inputData);
                 
                 
                 $orderId = insert_get_last_id($user_id,$user_name ,$user_email ,$user_phone ,$user_address ,$total_bill,$status_delivery,$status_payment,$madh);
                 // $_SESSION['orderId'] = $orderId;
                 
                 
                 foreach($_SESSION['cart'] as $productID => $lc){
                     $orderID = $orderId;
                     $product_id = $lc['product_id'];
                     $quantity = $lc['quantity'];
                     $price = $lc['price'];

                     insertOrderItem($orderID, $product_id, $quantity, $price);

                 }
               
                 
                 
                 del_cart2($user_id);
                 unset($_SESSION['cart']);
                 ksort($inputData);
                 $query = "";
                 $i = 0;
                 $hashdata = "";
                 foreach ($inputData as $key => $value) {
                     if ($i == 1) {
                         $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                     } else {
                        $hashdata .= urlencode($key) . "=" . urlencode($value);
                         $i = 1;
                     }
                     $query .= urlencode($key) . "=" . urlencode($value) . '&';
                 }

                 $vnp_Url = $vnp_Url . "?" . $query;
                 if (isset($vnp_HashSecret)) {
                     $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
                     $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
                 }
                 $returnData = array('code' => '00'
                     , 'message' => 'success'
                     , 'data' => $vnp_Url);
                     if (isset($_POST['redirect'])) {
                         header('Location: '.$vnp_Url);
                         die();
                     } else {
                         echo json_encode($returnData);
                     }
                    
                  
                     
 
                     
                     // vui lòng tham khảo thêm tại code demo
             }
               
                // echo '<script>window.location.href = "index.php?act=home"</script>';


                include 'checkout.php';
                break;

            case 'dathangthanhcong':
               
                // $_SESSION['bill1'] = showAll($user_id);
                // // echo '<pre>';
                // // print_r($_SESSION['bill1']);
                // // echo '</pre>';
                // // die;
                // $_SESSION['bill2'] = showAll2($user_id);
                // echo '<pre>';
                // print_r($_SESSION['bill2']);
                // echo '</pre>';
                // die;
                // unset($_SESSION['bill1']);
                // unset($_SESSION['bill2']);
                include 'dathangthanhcong.php';
                break;

            case 'orderDetail':
                if(isset($_GET['id']) && $_GET['id'] > 0 ){
                    $order_id = $_GET['id'];
                    $show_one = show_detail_order($order_id);
                    extract($show_one);
                }
                
                include 'orderDetail.php';
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
                // var_dump($_SESSION['code']);
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