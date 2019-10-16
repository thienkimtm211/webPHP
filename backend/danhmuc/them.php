<?php
require_once __DIR__ . '/../../dbconnect.php';

// Lấy dữ liệu Sản phẩm
$sqlSanPham = <<<EOT
    SELECT * FROM sanpham;
EOT;
$resultSanPham = mysqli_query($conn, $sqlSanPham);
$dataSanPham = [];
while ($row = mysqli_fetch_array($resultSanPham, MYSQLI_ASSOC)) {
    $dataSanPham[] = array(
        'sp_id' => $row['sp_id'],
        'sp_ten' => $row['sp_ten'],
    );
}
?>

<form name="frmDanhmucSanPham" id="frmDanhmucSanPham" method="post" action="" enctype="multipart/form-data">
    Danh mục mới:
    <input type="text" name="dm_ten" id="dm_ten" />
    <br />
    Mô tả:
    <input type="text" name="dm_mota" id="dm_mota" />
    <br />
    <button name="btnLuu" id="btnLuu" class="btn btn-primary">
        <i class="fa fa-heartbeat" aria-hidden="true"></i> Lưu
    </button>
</form>

<?php

    if(isset($_POST['btnLuu'])) {
        $dm_ten = $_POST['dm_ten'];
        $dm_mota = $_POST['dm_mota'];
    
        $errors = [];

        if (empty($dm_ten)) {
            $errors['dm_ten'][] = [
                'rule' => 'required',
                'rule_value' => true,
                'value' => $dm_ten,
                'msg' => 'Vui lòng nhập tên Danh mục'
            ];
        }

        if (!empty($errors)) { ?>
            <div id="thongbao" class="alert alert-danger face" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <ul>
                    <?php foreach($errors as $fields) : ?>
                        <?php foreach($fields as $field) : ?>
                        <li><?= $field['msg']; ?></li>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </ul>
            </div>
                <?php
                }
        else {

            $sqlInsert = "INSERT INTO danhmuc (dm_ten, dm_mota) VALUES (N'$dm_ten', N'$dm_mota')";
            $result = mysqli_query($conn, $sqlInsert);
        }

}
?>