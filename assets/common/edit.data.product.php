<?php
require_once './connect.php';

if (mysqli_affected_rows($cn) > 0) {
    echo '<h4> Connected</h4>';
//            header("location:home.php");
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
?>