

<?php
 include_once '../../../assets/common/connect.php'; 
        if(isset($_GET["id"]) and !empty($_GET["id"]))
        {
            $billID = $_GET["id"];
            $sql = "delete FROM BILL where BILL_ID =" . $billID;
            $rs = mysqli_query(($cn), $sql);
            if(mysqli_affected_rows($cn)>0)
            {
                header("location:admin.order.php");
                echo 'Thành công';
            }
            
        }
?>
