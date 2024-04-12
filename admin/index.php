<?php


include '../model/pdo.php';
include '../model/danhmuc.php';
include '../model/sanpham.php';
include './header.php';
include '../model/khachhang.php';
include '../model/binhluan.php';
include '../model/thongke.php';
include '../model/cart.php';
if(isset($_GET['act'])){
    $act=$_GET['act'];
   switch ($act) {
    case 'listdm':
        $listdm=listdm();
        include './danhmuc/list.php';
        # code...
        break;
        case 'adddm':
          $erors=[];
         
            if(isset($_POST['btnsumbit'])){
               
              $ten=$_POST['ten'];
              if(empty($ten)){
                $erors['username']="Tên Không được để trống";

              }else{

              
              adddm($ten);
              }
            }
            include './danhmuc/add.php';
            # code...
            break;
            case 'xoadm':
         
              if(isset($_GET['id'])&&($_GET['id']>0)){
                delete();
               
               
               
                
            }
            $listdm=listdm();
           

            include './danhmuc/list.php';
           
            break;
            case 'suadm':
             
              if(isset($_GET['id'])&&($_GET['id']>0)){
               
                $dm=listdmid();
                
            }
           
            include './danhmuc/update.php';
           
            break;
              case 'updatedm':
                if(isset($_POST['btnsumbit'])){
                  $ten=$_POST['ten'];
                  $id=$_POST['id'];
                  updatedm($ten,$id);
                  
                }
                $listdm=listdm();
           

                include './danhmuc/list.php';
               
                
                break;
                case 'listsp':
                  if(isset($_POST['btnsumbit'])&&($_POST['btnsumbit'])){
                    $kyw=$_POST['kyw'];
                    $iddm=$_POST['iddm'];
                    // check tồn tại 
                }else{
                    $kyw="";
                    $iddm=0;

                }
                $listsp=listsp($kyw,$iddm);
                $listdm=listdm();

                  include './sanpham/list.php';
                  break;
                case 'addsp':
                  if(isset($_POST['btnsumbit'])){
                    $ten=$_POST['ten'];
                    $gia=$_POST['gia'];
                    $soluong=$_POST['soluong'];
                    $anh=$_FILES['anh'];
                    $mota=$_POST['mota'];
                    $danhmuc=$_POST['danhmuc'];
                    $tenanh=$anh['name'];
                    $ext = pathinfo($tenanh,PATHINFO_EXTENSION);
                    $ext_img = ['png','jpg','gif','jpag','webp'];
                    $erors=[];
                    if(empty($ten)){
                      $erors['ten']="Tên không được để trống";

                    }
                    if(empty($gia)){
                      $erors['gia']="Gía không được để trống";

                    }else if($gia<=0){
                      $erors['gia']="Gía  phải lớn hơn 0";

                    }
                  
                    if(!in_array($ext,$ext_img)){        
                      $erors['anh'] = "file not valid";
                  }else if($anh['size']> 50*1024){
                      $erors['anh'] = " Flie phải <= 50KB";
                  }
                    if(empty($soluong)){
                      $erors['soluong']="Số lượng không được để trống";

                    }else if($soluong<=0){
                      $erors['soluong']="Số lượng phải lớn hơn 0";

                    }
                    if(empty($mota)){
                      $erors['mota']="Mô tả không được để trống";

                    }
                    if(empty($erors)){
                      addsp($ten,$tenanh,$gia,$soluong,$mota,$danhmuc);
                   
                      move_uploaded_file($anh['tmp_name'], '../image/' .$tenanh);

                    }
               
                   
                   
                   
                  
                   
                    
                  
                   
                  
                   
                }
               
                $listdm=listdm();
                
    
                  include './sanpham/add.php';
                  break;
                  case 'xoasp':
         
                    if(isset($_GET['id'])&&($_GET['id']>0)){
                      deletesp();
                     
                     
                     
                      
                  }
                  if(isset($_POST['btnsumbit'])&&($_POST['btnsumbit'])){
                    $kyw=$_POST['kyw'];
                    $iddm=$_POST['iddm'];
                    // check tồn tại 
                }else{
                    $kyw="";
                    $iddm=0;
  
                }
                $listsp=listsp($kyw,$iddm);
                 
      
                  include './sanpham/list.php';
                 
                  break;
                  case 'suasp':
                    if(isset($_GET['id'])&&($_GET['id']>0)){
                        
                        $sp=loadsanphamid();
                    }
                    $listdm=listdm();
                  
                   
                    include './sanpham/update.php';
                   
                    break;
                case 'updatesp':
                    
                  if(isset($_POST['sumbit'])){
                    $ten=$_POST['ten'];
                    $gia=$_POST['gia'];
                    $soluong=$_POST['soluong'];
                    $anh=$_FILES['anh'];
                    $mota=$_POST['mota'];
                    $danhmuc=$_POST['danhmuc'];
                    $tenanh=$anh['name'];
                  $id=$_POST['id'];
                  updatesp($ten,$gia,$tenanh,$mota,$soluong,$danhmuc,$id);

                   // nếu mà hình bằng roongx thì thêm hinh vào
                
                      move_uploaded_file($anh['tmp_name'], '../image/' .$tenanh);
                    
                }
                if(isset($_POST['btnsumbit'])&&($_POST['btnsumbit'])){
                  $kyw=$_POST['kyw'];
                  $iddm=$_POST['iddm'];
                  // check tồn tại 
              }else{
                  $kyw="";
                  $iddm=0;

              }
              $listsp=listsp($kyw,$iddm);
              $listdm=listdm();
               include './sanpham/list.php';
               case 'listtk':
               
                // $listtk = thong_ke_hang_hoa();

                  include './thongke/list.php';
                  break;
               case 'listdh':
                  $listdh = showAll2();
                  // $listtk = thong_ke_hang_hoa();

                  include './donhang/list.php';
                  break;
               case 'suadh':
                  if(isset($_GET['id'])&&($_GET['id']>0)){
                        $id = $_GET['id'];
                    $dh=show_detail_order($id);
                }
                  include './donhang/update.php';
                  break;
                  case 'updatedh':
                  
                    if(isset($_POST['btnsumbit'])){
                      // $user_name=$_POST['user_name'];
                      // $user_address=$_POST['user_address'];
                      // $user_email=$_POST['user_email'];
                    
                      // $user_phone=$_POST['user_phone'];
                      // $total_bill=$_POST['total_bill'];
                      $status_delivery = $_POST['status_delivery'];
                      // $status_payment = $_POST['status_payment'];
                      $id = $_POST['id'];
                   
                      // updateOrder($user_name, $user_address, $user_email, $user_phone,$status_delivery,$status_payment,$id);
                      updateOrder($status_delivery,$id);
    
                     // nếu mà hình bằng roongx thì thêm hinh vào
                  
                        // move_uploaded_file($anh['tmp_name'], '../image/' .$tenanh);
                      
                  }
                  // echo"thnanh cong";
                  
                 $listdh=showAll2();  
                 include './donhang/list.php';
                 break;

                 case 'xoadh':
       
                  if(isset($_GET['id'])&&($_GET['id']>0)){
                     $id = $_GET['id'];
                     delorder($id);

                   
                    
                 }
                
              
                 $listdh = showAll2();
                //  echo '<script>window.location.href = "index.php?act=cart"</script>';
               
    
                include './donhang/list.php';
               case 'listkh':
               
                $listkh=listkh();
             
              
  
                  include './khachhang/list.php';
                  break;
               case 'addkh':
                if(isset($_POST['btnsumbit'])){
                  $ten=$_POST['ten'];
                  $matkhau=$_POST['matkhau'];
                  $email=$_POST['email'];
                  $anh=$_FILES['anh'];
                  $so=$_POST['so'];
                  $vaitro=$_POST['vaitro'];
                  $tenanh=$anh['name'];
                  $erors=[];
                  if(empty($ten)){
                    $erors['ten']="Tên không được để trống";

                  }
                  if(empty($matkhau)){
                    $erors['matkhau']="Mật khẩu không được để trống";

                  }
                  if(empty($email)){
                    $erors['email']="Email không được để trống";

                  }
                  else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $errors['email'] = "Email không hợp lệ.";
                  }
                  if(empty($so)){
                    $erors['so']="Số điện thoại không được để trống";

                  }
                  if(empty($erors)){

                  
                  addkh($ten,$matkhau,$email,$so,$vaitro,$tenanh);
                  move_uploaded_file($anh['tmp_name'], '../image/' .$tenanh);
                  $thongbao = "Thêm thành công";
                  }

             
                 
                 
                 
                
                 
                
                 
                  
                
                 
                
                 
              }
             
              
              
  
                include './khachhang/add.php';
                break;
                case 'xoakh':
       
                  if(isset($_GET['id'])&&($_GET['id']>0)){
                    deletekh();
                   
                   
                   
                    
                 }
                
              
              $listkh=listkh();
               
    
                include './khachhang/list.php';
               
                break;
                case 'suakh':
                  if(isset($_GET['id'])&&($_GET['id']>0)){
                      
                      $kh=loadkhtheoid();
                  }
                  
                
                 
                  include './khachhang/update.php';
                 
                  break;
              case 'updatekh':
                  
                if(isset($_POST['btnsumbit'])){
                  $ten=$_POST['ten'];
                  $matkhau=$_POST['matkhau'];
                  $email=$_POST['email'];
                  $anh=$_FILES['anh'];
                  $so=$_POST['so'];
                  $vaitro=$_POST['vaitro'];
                  $tenanh=$anh['name'];
                $id=$_POST['id'];
                updatekh($ten,$matkhau,$email,$so,$vaitro,$tenanh,$id);

                 // nếu mà hình bằng roongx thì thêm hinh vào
              
                    move_uploaded_file($anh['tmp_name'], '../image/' .$tenanh);
                  
              }
             
       
            $listkh=listkh();
             include './khachhang/list.php';
             break;
             case 'listbl':
              $listbl= statistic_comment();
              include './binhluan/list.php';
              break;

             case 'detail_bl':
              if(isset($_GET['product_id']) && $_GET['product_id'] > 0){
                  $product_id = $_GET['product_id'];
                  $show_detail = comment_select_by_product($product_id);
              }
              include './binhluan/detail_bl.php';
              break;
              case 'xoabl':
       
                if(isset($_GET['id'])&&($_GET['id']>0)){
                  deletebl();
                  echo '<script>window.location.href = "index.php?act=listbl"</script>';
                  
               }
              
               $show_detail = comment_select_by_product($product_id);
             
  
              include './binhluan/detail_bl.php';
              break;
                

               
    default:
    include './home.php';
        # code...
        break;
   }
}
include './home.php';
include './footer.php';



?>