<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Đây là chức năng Sửa Loại sản phẩm</h1>
    <?php
        require_once __DIR__ . '/../../dbconnect.php';

        $dm_id = $_GET['dm_id'];
        echo 'Đang sửa khóa chính là: ' . $dm_id . '<br/>';

        $sqlSelect = "SELECT * FROM danhmuc WHERE dm_id = $dm_id;";
        $resultSelect = mysqli_query($conn, $sqlSelect);

        $danhmucRow = mysqli_fetch_array($resultSelect, MYSQLI_ASSOC); // 1 record
        //print_r($danhmucRow);
    ?>

    <form name="frmdanhmucSua" id="frmdanhmucSua" method="post" action="">
        Mã loại sản phẩm: <input type="text" name="dm_id" id="dm_id" readonly value="<?php echo $danhmucRow['dm_id'] ?>" /><br />
        Tên sản phẩm: <input type="text" name="dm_ten" id="dm_ten" value="<?= $danhmucRow['dm_ten'] ?>" /><br />
        Mô tả sản phẩm: <input type="text" name="dm_mota" id="dm_mota" value="<?= $danhmucRow['dm_mota'] ?>" /><br />
        <input type="submit" name="btnSua" id="btnSua" value="Lưu" />
    </form>

    <?php
    // Tức là người dùng đã nhập xong, và bấm nút Lưu
    if(isset($_POST['btnSua'])) {
        $dm_ten = $_POST['dm_ten'];
        $dm_mota = $_POST['dm_mota'];

        $sqlUpdate = "UPDATE danhmuc SET dm_ten = N'$dm_ten', dm_mota = N'$dm_mota' WHERE dm_id = $dm_id;";
        mysqli_query($conn, $sqlUpdate);
        echo 'Lưu thành công!';

        // Sau khi cập nhật dữ liệu, tự động điều hướng về trang Danh sách
        header('location:danhsach.php');
    }
    ?>
</body>
</html>

