<?php
include_once '../../../assets/common/connect.php';

if (mysqli_affected_rows($cn) > 0) {
    echo '<h4> Connected</h4>';
}
$proID = '';
if (isset($_GET["id"])) {
    $proID = $_GET["id"];
} else {
    header("location:../../admin/module/product/admin.product.php");
}
$sql = "SELECT PRO_NAME, PRO_PRICE, PRO_DESCRIPTION,PRO_SEASON,PRO_GENDER"
        . " FROM product"
        . " WHERE PRO_ID =" . $proID;

$result = mysqli_query($cn, $sql);

$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}
echo json_encode($data);

//echo $sql;
//        $sql = "SELECT * FROM Product where id =".$pID;
//        $rs = mysqli_query($cn, $sql);
//
//        if (mysqli_num_rows($result) == 0) {
//        header("location:  admin.product.php");
//            die("<h3>Không có dữ liệu admin </h3><br>");
//        }
//        $row = mysqli_fetch_array($results);
?>