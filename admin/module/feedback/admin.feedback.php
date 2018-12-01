<?php
session_start();
if ($_SESSION["permission"] != 'Feedback' && $_SESSION["permission"]!= 'All') {
    echo "<script>alert('BẠN KHÔNG ĐỦ QUYỀN TRUY CẬP TRANG NÀY. VUI LÒNG LIÊN HỆ ADMIN ĐỂ BIẾT THÊM CHI TIẾT');window.location.href = '../../index.php';</script>";
    die();
}
?>


<?php
include_once '../../../assets/common/connect.php';
include '../../../assets/common/permission.php';
if ($cn == NULL) {
    exit();
}
$sql = "select * from Feedback;";

$result = mysqli_query($cn, $sql);


?>

<!doctype html>
<html lang="en">
<script language="JavaScript">
    function confirmDelete(delUrl) {
        return confirm('Are you sure you want to delete');
    }
</script>

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
                  <div class="col-md-10 col-sm-10 mx-auto">
                      <h1>Feedback management board</h1>
                      <table class="table" style="">
                        <tr>
                            <th>ID</th>
                            <th colspan="2">Title</th>
                            <th>Sender</th>
                            <th>Time</th>
                            <th>Content</th>
                            </tr>
                        <?php
                        while ($row = mysqli_fetch_array($result)){
                            echo "<tr>";
                            echo "<td>".$row["FEEDBACK_ID"]. "</td>";
                            echo "<td>".$row["FEEDBACK_TITLE"]. "</td>";
                            echo "<td> </td>";
                            echo "<td>".$row["FEEDBACK_NAME"]. "</td>";
                            echo "<td>".$row["FEEDBACK_DATE"]. "</td>";                        
                            echo '<td><a href="admin.feedback.detail.php?ID='.$row["FEEDBACK_ID"].'" class="btn btn-info reset-underline">Detail</a></td>';
                            echo '<td><a href="DeleteFeedback.php?ID='.$row["FEEDBACK_ID"].'" class="btn btn-danger" onclick="return confirmDelete()">Delete</a></td>';
                            echo "<tr>";
                        }
                        mysqli_close($cn);
                        ?>               
                        </table>
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