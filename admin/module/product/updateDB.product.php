<?php

include_once '../../../assets/common/connect.php';
if (isset($_GET["updateProduct"])) {
    $id1 = $_GET["productID"];
//    $name1 = $_GET["proName"];
    $price1 = $_GET["proPrice"];
//    $category1 = $_GET['cateName'];
    $gender1 = $_GET["proGender"];
    $season1 = $_GET["proSeason"];
    $description1 = $_GET["proDescription"];
    $image1 = $_GET["proImg"];


    $sql3 = "UPDATE product SET "
   //         . "PRO_NAME = '{$name1}',"
            . "PRO_PRICE = '{$price1}',"
   //         . "CATE_ID = (SELECT CATE_ID FROM category WHERE CATE_NAME ='{$category1}'), "
            . "PRO_GENDER = '{$gender1}', "
            . "PRO_SEASON = '{$season1}', "
            . "PRO_DESCRIPTION = '{$description1}',"
            . "PRO_IMG = '{$image1}' "
            . "WHERE PRO_ID = {$id1}";
 

    mysqli_query($cn, $sql3);

    if (mysqli_affected_rows($cn) > 0) {
        echo "<script type='text/javascript'>alert('Submitted successfully!')</script>";
       header("location:admin.product.php");
    } else {
        echo "<h4> Lỗi </h4>";
    }
}
if (isset($_GET["updateProduct"]) == FALSE) {
    header("location:admin.product.php");
    exit();
}
?>
