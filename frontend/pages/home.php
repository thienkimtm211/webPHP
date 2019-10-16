<?php
// Include file cấu hình ban đầu của `Twig`
require_once __DIR__.'/../../bootstrap.php';
// Truy vấn database để lấy danh sách
// 1. Include file cấu hình kết nối đến database, khởi tạo kết nối $conn
include_once(__DIR__.'/../../dbconnect.php');


// 2. Chuẩn bị câu truy vấn $sql
// 2. Chuẩn bị câu truy vấn $sql

$sqlDanhSachSanPham = <<<EOT
    SELECT sp.sp_id, sp.sp_ten, sp.sp_gia, sp.sp_giacu, sp.sp_mota, sp.sp_soluong, dm.dm_ten 
    FROM `sanpham` sp
    JOIN `danhmuc` dm ON sp.dm_id = dm.dm_id
    GROUP BY sp.sp_id, sp.sp_ten, sp.sp_gia, sp.sp_giacu, sp.sp_mota, sp.sp_soluong, dm.dm_ten
EOT;
// 3. Thực thi câu truy vấn SQL để lấy về dữ liệu
$result = mysqli_query($conn, $sqlDanhSachSanPham);
// 4. Khi thực thi các truy vấn dạng SELECT, dữ liệu lấy về cần phải phân tích để sử dụng
// Thông thường, chúng ta sẽ sử dụng vòng lặp while để duyệt danh sách các dòng dữ liệu được SELECT
// Ta sẽ tạo 1 mảng array để chứa các dữ liệu được trả về
$dataDanhSachSanPham = [];
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
    $dataDanhSachSanPham[] = array(
        'sp_id' => $row['sp_id'],
        'sp_ten' => $row['sp_ten'],
        'sp_gia' => number_format($row['sp_gia'], 2, ".", ",") . ' vnđ',
        'sp_giacu' => number_format($row['sp_giacu'], 2, ".", ","),
        'sp_mota' => $row['sp_mota'],
        'sp_soluong' => $row['sp_soluong'],
        'dm_ten' => $row['dm_ten'],
    );
}
// Yêu cầu `Twig` vẽ giao diện được viết trong file `home.html.twig`
echo $twig->render('frontend/pages/home.html.twig', [
    'danhsachsanpham' => $dataDanhSachSanPham
]);