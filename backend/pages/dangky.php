<?php
// Include file cấu hình ban đầu của `Twig`
require_once __DIR__. '/../../dbconnect.php';
?>

<form name="frmdangky" id="frmdangky" method="post" action="/webPHP/backend/pages/dangky">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mx-4">
                    <div class="card-body p-4">
                        <h1>Đăng ký</h1>
                        <p class="text-muted">Tạo tài khoản</p>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-user"></i>
                                </span>
                            </div>
                            <input class="form-control" type="text" placeholder="Tên tải khoản" name="kh_tendangnhap" />
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-user"></i>
                                </span>
                            </div>
                            <input class="form-control" type="password" placeholder="Mật khẩu" name="kh_matkhau" />
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-user"></i>
                                </span>
                            </div>
                            <input class="form-control" type="text" placeholder="Họ tên" name="kh_hoten" />
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-user"></i>
                                </span>
                            </div>
                            <select name="kh_gioitinh" class="form-control">
                                <option value="0">Nam</option>
                                <option value="1">Nữ</option>
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-user"></i>
                                </span>
                            </div>
                            <input class="form-control" type="text" placeholder="Địa chỉ" name="kh_diachi" />
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-user"></i>
                                </span>
                            </div>
                            <input class="form-control" type="text" placeholder="Điện thoại" name="kh_dienthoai" />
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-user"></i>
                                </span>
                            </div>
                            <input class="form-control" type="email" placeholder="Email" name="kh_email" />
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-user"></i>
                                </span>
                            </div>
                            <select class="form-control" placeholder="Ngày sinh" name="kh_ngaysinh" id="kh_ngaysinh"> 
                                <?php for ($ngaysinh = 1; $ngaysinh <= 31; $ngaysinh++) { ?>
                                    <option value="<?= $ngaysinh ?>"><?= $ngaysinh ?></option>
                                <?php ;} ?>
                            </select>
                            <select class="form-control" placeholder="Tháng sinh" name="kh_thangsinh" id="kh_thangsinh"> 
                                <?php for ($thangsinh = 1; $thangsinh <= 12; $thangsinh++) { ?>
                                    <option value="<?= $thangsinh ?>"><?= $thangsinh ?></option>
                                <?php ;} ?>
                            </select>
                            <select class="form-control" placeholder="Năm sinh" name="kh_namsinh" id="kh_namsinh"> 
                                <?php for ($namsinh = 1900; $namsinh <= 2019; $namsinh++) { ?>
                                    <option value="<?= $namsinh ?>"><?= $namsinh ?></option>
                                <?php ;} ?>
                            </select>
                        </div>
                        <button class="btn btn-block btn-success" name="btnDangKy">Tạo tài khoản</button>
                    </div>
</form>                    

<?php
if(isset($_POST['btnDangKy']))
{
    // Lấy dữ liệu người dùng hiệu chỉnh gởi từ REQUEST POST
    $kh_tendangnhap = $_POST['kh_tendangnhap'];
    $kh_matkhau = sha1($_POST['kh_matkhau']);
    $kh_hoten = $_POST['kh_hoten'];
    $kh_gioitinh = $_POST['kh_gioitinh'];
    $kh_diachi = $_POST['kh_diachi'];
    $kh_dienthoai = $_POST['kh_dienthoai'];
    $kh_email = $_POST['kh_email'];
    $kh_ngaysinh = $_POST['kh_ngaysinh'];
    $kh_thangsinh = $_POST['kh_thangsinh'];
    $kh_namsinh = $_POST['kh_namsinh'];

    // Sử dụng Mã hóa MD5 hoặc SHA1 để mã hóa chuỗi
    // echo md5(time());
    // Output: 447c13ce896b820f353bec47248675b3
    // echo sha1(time());
    // Output: 6c2cef9fe21832a232da7386e4775654b77c7797
    // yyyy_mm_dd_HH_mm_ss_kh_tendangnhap
    $kh_makichhoat = sha1(time());
    $kh_trangthai = 0; // Mặc định khi đăng ký sẽ chưa kích hoạt tài khoản
    $kh_quantri = 0; // Mặc định khi đăng ký sẽ không có quyền quản trị

    // Câu lệnh INSERT
    $sql = "INSERT INTO khachhang(kh_tendangnhap, kh_matkhau, kh_hoten, kh_gioitinh, kh_diachi, kh_dienthoai, kh_email, kh_ngaysinh, kh_thangsinh, kh_namsinh, kh_makichhoat, kh_trangthai, kh_quantri) 
            VALUES ('$kh_tendangnhap', '$kh_matkhau', '$kh_hoten', $kh_gioitinh, '$kh_diachi', '$kh_dienthoai', '$kh_email', $kh_ngaysinh, '$kh_thangsinh', '$kh_namsinh', '$kh_makichhoat', $kh_trangthai, $kh_quantri)";
    //var_dump ($sql); die;
    // Thực thi SELECT
    $result = mysqli_query($conn, $sql);
    var_dump($result); die;
    // Đóng kết nối
    mysqli_close($conn);
    
}
?>    