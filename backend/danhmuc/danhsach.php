<?php
require_once __DIR__ . '/../../dbconnect.php';

$sql = "SELECT * FROM danhmuc;";
$result = mysqli_query($conn, $sql);

$data = [];
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $data[] = array(
        'dm_id' => $row['dm_id'],
        'dm_ten' => $row['dm_ten'],
        'dm_mota' => $row['dm_mota'],
    );
}
/*
[
    ['dm_id' => 1, 'dm_ten' => 'MÃ¡y tÃ­nh báº£ng', 'dm_mota' => ''], row1
    ['dm_id' => 2, 'dm_ten' => 'MÃ¡y tÃ­nh báº£ng', 'dm_mota' => ''], row2
    ['dm_id' => 3, 'dm_ten' => 'MÃ¡y tÃ­nh báº£ng', 'dm_mota' => ''], row3
    ...
]
*/
// print_r($data);die;
// var_dump($data);die;
?>

<style>
.rowchan {
    background: red;
}
</style>

<a href="/webPHP/backend/danhmuc/them.php">Thêm Loại sản phẩm</a>
<table border="1">
    <tr>
        <th>Mã</th>
        <th>Tên</th>
        <th>Mô tả</th>
        <th>Chức năng</th>
    </tr>
    <?php
    $bienDem = 1;
    ?>
    <?php foreach($data as $row): ?>
    <tr class="<?php echo ($bienDem % 2 == 0 ? 'rowchan' : '') ?>">
        <td><?= $row['dm_id']; ?></td>
        <td><?= $row['dm_ten']; ?></td>
        <td><?php echo $row['dm_mota']; ?></td>
        <td>
            <!-- Truyền dữ liệu GET trên URL, theo dạng ?KEY1=VALUE1&KEY2=VALUE2 -->
            <a href="/webPHP/backend/danhmuc/sua.php?dm_id=<?= $row['dm_id']; ?>">Sửa</a>
            <a href="/webPHP/backend/danhmuc/xoa.php?dm_id=<?= $row['dm_id']; ?>">Xóa</a>
        </td>
    </tr>
    <?php $bienDem++; ?>
    <?php endforeach; ?>
</table>