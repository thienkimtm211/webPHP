<?php
    $conn = mysqli_connect('127.0.0.1', 'root', '', 'salomon') or die('Server không thể kết nối!');

// Tùy chỉnh kết nối
// Set charset là utf-8 đối với kết nối này. Dùng để gõ tiếng Việt, Nhật, Thái, Trung Quốc ...
// Lưu ý: gõ với bộ gõ UNIKEY, bảng mã là UNICODE
    $conn->query("SET NAMES 'utf8'");
    $conn->query("SET CHARACTER SET utf8");
?>