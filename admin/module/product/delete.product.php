<?php
session_start();
if ($_SESSION["permission"] != 'Product' && $_SESSION["permission"] != 'All') {
    echo "<script>alert('BẠN KHÔNG ĐỦ QUYỀN TRUY CẬP TRANG NÀY. VUI LÒNG LIÊN HỆ ADMIN ĐỂ BIẾT THÊM CHI TIẾT');window.location.href = '../../index.php';</script>";
    die();
}
?>

<!doctype html>
<?php
include '../../../assets/common/permission.php';
include_once '../../../assets/common/connect.php';
 if(isset($_GET["id"]) and !empty($_GET["id"]))
        {
            $accID = $_GET["id"];
            $sql = "DELETE FROM product WHERE PRO_ID = ".$accID;
            $rs = mysqli_query($cn, $sql);
            if(mysqli_affected_rows($cn)>0)
            {
                header("location:admin.product.php");
            }
        }
?>