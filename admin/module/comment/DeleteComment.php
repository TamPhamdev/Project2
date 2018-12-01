<?php
include_once '../../../assets/common/connect.php';

    $pID = $_GET["ID"];
    $sql = "delete from Comment where COMMENT_ID = ".$pID;
    mysqli_query($cn, $sql);
    Header("Location:admin.comment.php");
?>