<?php
session_start();
if ($_SESSION["permission"] != 'Feedback' && $_SESSION["permission"]!= 'All') {
    echo "<script>alert('BẠN KHÔNG ĐỦ QUYỀN TRUY CẬP TRANG NÀY. VUI LÒNG LIÊN HỆ ADMIN ĐỂ BIẾT THÊM CHI TIẾT');window.location.href = '../../index.php';</script>";
}
?>
<?php

include_once '../../../assets/common/connect.php';

if($cn == NULL)
   {
       exit();
   }
   $pID ="";
   if (isset($_GET["ID"]) and !empty($_GET["ID"])) {
       $pID = $_GET["ID"];
   }   

   $sql = "select * from Feedback where FEEDBACK_ID = ".$pID;
   

   $result = mysqli_query($cn, $sql);

   if(mysqli_num_rows($result)==0)
   {
       die("<h3>Not found !!</h3>");
   }

   $row = mysqli_fetch_array($result);

?>

<!doctype html>
<html lang="en">

<head>
  <title>Admin Dashboard</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="../../../assets/css/admin.css" rel="stylesheet">
  <link href="../../../assets/css/toggle switch.css" rel="stylesheet">
  <link href="../../../assets/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
</head>

<body>
  <header>
    <nav class="navbar sticky-top navbar-expand-md navbar-expand-sm wow fadeInDown" id="nav">
      <!--Navbar start-->
      <a class="navbar-brand " href="../../index.php">Adminator</a>
      <button class="navbar-toggler  navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
        aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon icon-bar"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarTogglerDemo02">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="../../module/account/account.php"> <i class="fas fa-user-secret"></i><?php  
                echo '<span style="text-transform: uppercase;">Welcome - '.$_SESSION["username"].'</span>'; ?> <span
                class="sr-only"></span></a>
          </li>
          <li class="nav-item"><a class="nav-link " href="../../logout.php">Logout</a></li>
          <!-- ul here -->
        </ul>
      </div>
    </nav>
  </header>
  <div class="admin-layout">
    <div class="admin-wrapper">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3 col-sm-3 sidebar-left mx-auto">
            <ul>
              <li class="item-dashboard"><a href="../../index.php" class="reset-underline">Introduction</a></li>
              <li class="item-dashboard"><a href="../../module/account/account.php" class="reset-underline"><i class="fas fa-user-secret"></i>Admin</a></li>
              <li class="item-dashboard"><a href="../../module/product/admin.product.php" class="reset-underline"><i
                    class="fas fa-box"></i>Product</a></li>
              <li class="item-dashboard"><a href="../../module/category/admin.category.php" class="reset-underline"><i
                    class="fas fa-clipboard-list"></i>Categories</a></li>
              <li class="item-dashboard"><a href="../../module/order/admin.order.php" class="reset-underline"><i class="fas fa-dolly"></i>Order</a></li>
              <li class="item-dashboard"><a href="../../module/customer/admin.customer.php" class="reset-underline"><i
                    class="fas fa-user-friends"></i>Customer</a></li>
              <li class="item-dashboard"><a href="../../module/news/admin.news.php" class="reset-underline"><i class="far fa-bell"></i>News</a></li>
              <li class="item-dashboard"><a href="../../module/feedback/admin.feedback.php" class="reset-underline" style='color: #f5614d;'><i
                    class="far fa-envelope"></i>Feedback</a></li>
              <li class="item-dashboard"><a href="../../module/comment/admin.comment.php" class="reset-underline"><i
                    class="far fa-edit"></i>Comment</a></li>
            </ul>
          </div>
          <div class="col-md-9 col-sm 9">
            <div class="sidebar-right">
              <div class="container">
                <div class="row ">
                  <div class="col-md-8 col-sm-8 mx-auto">
                    <h1>Feedback content</h1>
                    <table class="table">                        
                          <tr>
                            <td>Name</td>
                            <td><?php echo $row['FEEDBACK_NAME']; ?></td>
                          </tr>
                          <tr>
                            <td>Email</td>
                            <td><?php echo $row['FEEDBACK_EMAIL']; ?></td>
                          </tr>
                          <tr>
                            <td>Member</td>
                            <td><?php 
                                if ($row['CUS_ID']>0) {
                                    echo "Customer";
                                }
                                else{
                                    echo "Guest";
                                }
                            ?></td>
                          </tr>
                          <tr>
                            <td>Title</td>
                            <td><?php echo $row['FEEDBACK_TITLE']; ?></td>
                          </tr>
                          <tr>
                            <td>Content</td>
                            <td><?php echo $row['FEEDBACK_CONTENT']; ?></td>
                          </tr>
                         
                    </table>
                    <form action="" method="POST">
                        <label for="">Reply</label>
                        <input type="text" name="txtReply" style="height:100px; width: 100%;" value="<?php echo "$row[8]";?>">
                        <br>
                        <br>
                        <button name="btnSend" class="btn btn-success" >Send</button>
                    </form> 
                        <?php echo '<a href="admin.feedback.php" class="btn btn-danger">Back</a>' ?>                                   
                    <?php
                        if (isset($_POST["btnSend"])) {
                        
                            $FEEDBACK_REPLY = $_POST["txtReply"];
                            if (isset($_POST["txtReply"]) and !empty("txtReply"))
                            {   
                                if ($row["CUS_ID"]>0) {
                                $sql1 = "update Feedback set FEEDBACK_REPLY ='$FEEDBACK_REPLY' where FEEDBACK_ID='$pID'";
                                mysqli_query($cn,$sql1); 
                                }                                            
                            }                                        
                        }
                    ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>






  <script src="../../../assets/js/jquery-3.3.1.min.js"></script>
  <script src="../../../assets/js/popper.min.js"></script>
  <script src="../../../assets/js/bootstrap.min.js"></script>
</body>

</html>