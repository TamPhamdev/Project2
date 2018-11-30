<?php
session_start();
if ($_SESSION["permission"] != 'All' && $_SESSION["permission"] != 'Account') {
    echo "<script>alert('BẠN KHÔNG ĐỦ QUYỀN TRUY CẬP TRANG NÀY. VUI LÒNG LIÊN HỆ ADMIN ĐỂ BIẾT THÊM CHI TIẾT');window.location.href = '../../index.php';</script>";
    die();
}
?>

<!doctype html>
<?php
include '../../../assets/common/permission.php';
include_once '../../../assets/common/connect.php';
error_reporting(E_ALL & ~E_NOTICE & ~8192);
if (isset($_POST["submit"])) 
{   $accID = $_POST["accID"];
    $role = $_POST["role"];
    $password1 = mysqli_real_escape_string($cn, $_POST['newPassword']);
    $password2 = mysqli_real_escape_string($cn, $_POST['confirmPassword']);
    $password1 = md5($password1);
    $password2 = md5($password2);
    $username = mysqli_real_escape_string($cn, $_POST['username']);
    $sql = "UPDATE account SET ACC_NAME = '${username}', ACC_PASS = '{$password1}', ACC_PER ='${role}'"
            . " WHERE ACC_ID ='{$accID}'";
    $dup = mysqli_query($cn,"SELECT ACC_NAME FROM account WHERE ACC_NAME='".$_POST['username']."'");
    if ($password1 <> $password2) 
    {
        echo "<script>alert('PASSWORD KHÔNG TRÙNG VUI LÒNG THỬ LẠI !!!');window.location.href = 'edit.account.php?id=$accID';</script>";
        exit();
    }
    else if(mysqli_num_rows($dup) > 0)
    {
            echo "<script>alert('Tên tài khoản đã được sử dụng. Vui lòng chọn tên khác')window.location.href = 'edit.account.php?id=$accID';</script>";
    }
    else {
        mysqli_query($cn, $sql);
        echo "<script>alert('CẬP NHẬP TÀI KHOẢN MỚI THÀNH CÔNG !!!');window.location.href = 'account.php';</script>";
    }


   
}
?>