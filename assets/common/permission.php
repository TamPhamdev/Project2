<?php

if (isset($_SESSION["username"]) == false) {
    // Nếu người dùng chưa đăng nhập thì chuyển hướng website sang trang đăng nhập
    header('Location:../../login.php');
} else {
    if (isset($_SESSION["role"]) == true) {
        // Ngược lại nếu đã đăng nhập
        $role = $_SESSION["role"];
        $permission = $_SESSION["permission"];
        // Kiểm tra quyền của người đó có phải là admin hay không
        if ($role != 'Active') {
            echo "<script>alert('BẠN KHÔNG ĐỦ QUYỀN TRUY CẬP TRANG NÀY. VUI LÒNG LIÊN HỆ ADMIN ĐỂ BIẾT THÊM CHI TIẾT');window.location.href = '../../index.php';</script>";
            exit();
        }
    }
}
?>
