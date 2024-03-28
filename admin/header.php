<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <!-- Nhúng thư viện bootstrap -->
    <link rel="stylesheet" href="../lib/bootstrap.css" />
    <script src="../lib/bootstrap.js"></script>
    <script src="../lib/font-fontawesome-ae333ffef2.js"></script>
    <script src="https://cdn.tiny.cloud/1/xllionilhwjyh1ua7ejdvgjoqgbw9egw997vs36sxe0xdhun/tinymce/5/tinymce.min.js" referrerpolicy="origin">
                      
                    </script>
    
  </head>
  <body>
    
    <nav class="navbar navbar-expand-sm bg-light shadow">
      <div class="container">
        <!-- logo -->
        <a class="navbar-brand" href="#">
          <img
            src="../image/logo/logo.png"
            alt="Logo"
            width="100"
            height="50"
            class="d-inline-block align-text-top"
          />
        </a>
        <!-- Menu -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#"
              >Xin chào Admin !!</a
            >
          </li>
          <li class="nav-item">
            <a class="nav-link text-danger" href="../view/index.php">QUAY LẠI TRANG CHỦ</a>
          </li>
        </ul>
      </div>
    </nav>
    <!--End Header-->
    <!-- Nội dung -->
    <div class="d-flex">
      <!-- Side bar bên trái -->
      <div
        class="bg-light border-end"
        style="width: 20%; height: calc(100vh - 2px)"
      >
      <div class="d-flex  justify-content-center ">
        <ul class="nav flex-column pt-4  ">
          <li class="nav-item">
            <a class="nav-link d-flex justify-content-center"><img src="../image/khachhang1.jpg" class="rounded-circle" width="30px" height="30px" alt=""><h4>ADMIN</h2></a>
          </li>
          <li class="nav-item fw-medium">
            <a class="nav-link" href="index.php">TRANG CHỦ</a>
          </li>
          
          <li class="nav-item fw-medium">
            <a class="nav-link" href="index.php?act=listdm">QUẢN LÝ DANH MỤC</a>
          </li>
          <li class="nav-item fw-medium ">
            <a class="nav-link"  href="index.php?act=listsp">QUẢN LÝ SẢN PHẨM</a>
          </li>
          <li class="nav-item fw-medium">
            <a class="nav-link"  href="index.php?act=listkh">QUẢN LÝ KHÁCH HÀNG</a>
          </li>
          <li class="nav-item fw-medium ">
            <a class="nav-link"  href="index.php?act=listbl">BÌNH LUẬN</a>
          </li>
          <li class="nav-item fw-medium">
            <a class="nav-link"  href="index.php?act=listtk">THỐNG KÊ</a>
          </li>
        </ul>
      </div>
      </div>