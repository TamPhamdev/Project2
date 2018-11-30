  <?php
        include_once '../../../assets/common/connect.php';
        if(isset($_GET["id"]) and !empty($_GET["id"]))
        {
            $newsID = $_GET["id"];
            $sql = "DELETE FROM news WHERE NEWS_ID = ".$newsID;
            $rs = mysqli_query(($cn), $sql);
            if(mysqli_affected_rows($cn)>0)
            {
                header("location:admin.news.php");
            }
        }
?>