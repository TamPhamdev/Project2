<?php
 include_once '../../../assets/common/connect.php';
        if(isset($_GET["id"]) and !empty($_GET["id"]))
        {
            $proID = $_GET["id"];
            $sql = "UPDATE product SET PRO_STATUS = 0 WHERE PRO_ID =" . $proID;
            $rs = mysqli_query(($cn), $sql);
            if(mysqli_affected_rows($cn)>0)
            {
                header("location:admin.product.php");
                echo 'Thành công';
            }
            else {
                header("location:admin.product.php");
            }
        }
?>