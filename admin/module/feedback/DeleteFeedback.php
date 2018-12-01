<?php
include_once '../../../assets/common/connect.php';

    $pID = $_GET["ID"];
    $sql = "delete from Feedback where FEEDBACK_ID = ".$pID;
    mysqli_query($cn, $sql);
    Header("Location:admin.feedback.php");
?>