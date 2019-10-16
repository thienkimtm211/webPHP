<?php
require_once __DIR__ . '/../../dbconnect.php';

// Kiểm tra xác thực tài khoản
if(isset($_SESSION['username']) && !empty($_SESSION['username'])) {
    // Đã đăng nhập rồi
    echo 'Đã đăng nhập!';
} else {
    // Chưa đăng nhập
    echo 'Bạn chưa đăng nhập. Vui lòng <a href="http://localhost:80/webPHP/backend/pages/login.php">click vào đây</a> để đến trang Đăng nhập';
    die;
}

// Here DOCS
// End of Text
$sql = <<<EOT
    SELECT sp.sp_id, sp.sp_ten, sp.sp_gia, sp.sp_giacu, sp.sp_mota, sp.sp_soluong,
        dm.dm_ten, km.km_ten
    FROM sanpham sp
    JOIN danhmuc dm ON sp.dm_id = dm.dm_id
    LEFT JOIN khuyenmai km ON sp.km_id = km.km_id;
EOT;

$result = mysqli_query($conn, $sql);

$data = [];
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $data[] = array(
        'sp_id' => $row['sp_id'],
        'sp_ten' => $row['sp_ten'],
        'sp_gia' => $row['sp_gia'],
        'sp_giacu' => $row['sp_giacu'],
        'sp_mota' => $row['sp_mota'],
        'sp_soluong' => $row['sp_soluong'],
        'dm_ten' => $row['dm_ten'],
        'km_ten' => $row['km_ten'],
    );
}

//var_dump($data);die;
?>

<a href="/webPHP/index.php?page=sanpham_them" class="btn btn-outline-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i> Thêm Sản phẩm</a>
<div class="table-responsive-sm">
    <table class="table table-bordered table-hover table-sm">
        <thead>
            <tr>
                <th>Mã sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Giá sản phẩm</th>
                <th>Giá cũ sản phẩm</th>
                <th>Mô tảsản phẩm</th>
                <th>Số lượng sản phẩm</th>
                <th>Danh mục</th>
                <th>Khuyến mãi sản phẩm</th>
                <th>Chức năng</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data as $row): ?>
            <tr>
                <td><?= $row['sp_id'] ?></td>
                <td><?= $row['sp_ten'] ?></td>
                <td><?= $row['sp_gia'] ?></td>
                <td><?= $row['sp_giacu'] ?></td>
                <td><?= $row['sp_mota'] ?></td>
                <td><?= $row['sp_soluong'] ?></td>
                <td><?= $row['dm_ten'] ?></td>
                <td><?= $row['km_ten'] ?></td>
                <td>
                    <a href="/webPHP/backend/sanpham/sua.php?sp_id=<?= $row['sp_id']; ?>">Sửa</a>
                    <!-- <a href="/web02/sanpham/xoa.php?sp_id=">Xóa</a> -->
                    <button class="btn btn-danger btn-delete" data-sp-ma="<?= $row['sp_id'] ?>">
                        <i class="fa fa-trash" aria-hidden="true"></i>&nbsp;Xóa
                    </button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>