<?php
    include_once '../../../assets/common/connect.php';
    if (isset($_GET["btnsubmit"])) {
        $COMMENT_NAME = $_GET["txtname"];
        $COMMENT_EMAIL = $_GET["txtemail"];
        $COMMENT_CONTENT = $_GET["txtcontent"];
        $prodetail_ID = $_GET["ID"];
        
        if (isset($_GET["txtname"]) and isset($_GET["txtemail"]) and isset($_GET["txtcontent"])
           and !empty($_GET["txtname"]) and !empty("txtemail") and !empty("txtcontent"))
        {
            $sql = "insert into comment(COMMENT_NAME, COMMENT_CONTENT, CUS_ID, COMMENT_EMAIL, PRO_ID) values ('$COMMENT_NAME','$COMMENT_CONTENT',(select CUS_ID from Customer where CUS_EMAIL ='$COMMENT_EMAIL'),'$COMMENT_EMAIL','$prodetail_ID')";
            mysqli_query($cn, $sql);                 
        }
        header("location:../../../assets/module/product-detail.php?id=$prodetail_ID");
    }
?>