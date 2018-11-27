  <?php
        include_once '../../../assets/common/connect.php';
        if(isset($_GET["id"]) and !empty($_GET["id"]))
        {
            $cateID = $_GET["id"];
            $sql = "DELETE FROM category WHERE CATE_ID = ".$cateID;
            $rs = mysqli_query(($cn), $sql);
            if(mysqli_affected_rows($cn)>0)
            {
                header("location:admin.category.php");
            }
        }
?>