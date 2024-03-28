<?php
include '../model/pdo.php';
include '../model/danhmuc.php';
include '../model/sanpham.php';
include './header.php';
include '../model/khachhang.php';
if(isset($_GET['act'])){
    $act=$_GET['act'];
   switch ($act) {
    case 'listdm':
        $listdm=listdm();
        include './danhmuc/list.php';
        # code...
        break;
        case 'adddm':
         
            if(isset($_POST['btnsumbit'])){
               
              $ten=$_POST['ten'];
              adddm($ten);
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
               
                   
                   
                   
                  
                   
                    addsp($ten,$tenanh,$gia,$soluong,$mota,$danhmuc);
                   
                      move_uploaded_file($anh['tmp_name'], '../image/' .$tenanh);
                  
                   
                  
                   
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
                  addkh($ten,$matkhau,$email,$so,$vaitro,$tenanh);

             
                 
                 
                 
                
                 
                
                 
                    move_uploaded_file($anh['tmp_name'], '../image/' .$tenanh);
                
                 
                
                 
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
                

               
    default:
    include './home.php';
        # code...
        break;
   }
}
include './home.php';
include './footer.php';


?>