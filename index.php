<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quản lý Salomon</title>
<!-- Liên kết CSS bootstrap -->
    <link href="public\vendor\bootstrap\css\bootstrap.min.css" type="text/css" rel="stylesheet" />
<!-- Liên kết thêm FONT AWESOME -->
    <link href="public\vendor\font-awesome-4.7.0\css\font-awesome.min.css" />
    <style>
        div {
            border: 1px solid red;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="row">
            <div class="col-md-6 col-12 col-xl-3">
                Cột LOGO
            </div><!-- END cột logo -->
            <div class="cold-md-6 col-12 col-xl-9">
                Cột tên Công ty
            </div><!-- END cột tên công ty -->
        </div><!-- END Header -->
   
        <!-- Main Content -->
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3">
                <ul class="list-group">
                    <li class="list-group-item"><a href="loaisanpham\danhsach.php">Danh sách Loại sản phẩm</a></li>
                    <li class="list-group-item"><a href="sanpham\danhsach.php">Danh sách Sản phẩm</a></li>
                </ul>
            </div><!-- End sidebar -->
            <!-- Content -->
            <div class="col-md-9">
                CONTENT
            </div><!-- End content -->
        </div><!-- end main content -->
            <!-- footer -->
            <div class="row">
                <div class="col-md-3">Cột ABOUT US</div>
                <div class="col-md-3">Cột LINK</div>
                <div class="col-md-3">Cột NEWS</div>
                <div class="col-md-3">Cột GOOGLE MAP</div>
            </div><!-- end footer -->
    </div>
<!-- Hầu như tích hợp thư viện JS trước khi đóng thẻ BODY để tăng trải nghiệm người dùng -->
    <!-- Liên kết thư viện JQuery -->
    <script src="public\vendor\jquery\jquery.min.js"></script>
    <!-- Liên kết thư viện POPPERJS -->
    <script src="public\vendor\popperjs\popper.min.js"></script>
    <!-- Liên kết thư viện Bootstrap 4 -->
    <script src="public\vendor\bootstrap\js\bootstrap.min.js"></script>
</body>
</html>