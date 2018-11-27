<?php
require_once '../../../assets/common/connect.php'; 
 if (isset($_GET["submit"]) == FALSE) {
            header("location:admin.category.php");
            exit();
        }
        $idCate   = $_GET["cateID"];
        $nameCate = $_GET["newNameCate"];
      

        $sql = "UPDATE category set CATE_NAME = '{$nameCate}' WHERE CATE_ID = {$idCate}";
            //echo "$sql";
            //exit();

        $query = mysqli_query($cn, $sql);
        if ($query) {
            header("location:admin.category.php");
            
        } else {
            echo '<h3>Lỗi không thể update database</h3>';
           
        }
?>
