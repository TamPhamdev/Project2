<?php
require_once '../../../assets/common/connect.php'; 
 if (isset($_GET["submit"]) == FALSE) {
            header("location:admin.news.php");
            exit();
        }
        $idNews   = $_GET["newsID"];
        $newsTitle = $_GET["newsTitle"];
        $newsContent = $_GET["newsContent"];
        $newsImg = $_GET["newsImg"];
      

        $sql = "UPDATE news set NEWS_TITLE = '{$newsTitle}', NEWS_CONTENT = '{$newsContent}', NEWS_IMG = '{$newsImg}'"
        . " WHERE NEWS_ID = {$idNews}";
//        echo $sql;
//        exit();

        $query = mysqli_query($cn, $sql);
        if ($query) {
            header("location:admin.news.php");
            
        } else {
            echo '<h3>Lỗi không thể update database</h3>';
           
        }
?>
