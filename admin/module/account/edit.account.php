<?php
session_start();
if ($_SESSION["permission"] != 'All' && $_SESSION["permission"] != 'Account') {
    echo "<script>alert('BẠN KHÔNG ĐỦ QUYỀN TRUY CẬP TRANG NÀY. VUI LÒNG LIÊN HỆ ADMIN ĐỂ BIẾT THÊM CHI TIẾT');window.location.href = '../../index.php';</script>";
}
?>

<?php
include '../../../assets/common/permission.php';
include_once '../../../assets/common/connect.php';

    $accID = "";
        if (isset($_GET["id"])) {
            $accID = $_GET["id"];
        } else {
            header("location:account.php");
        }
        $sql = "SELECT * FROM account WHERE ACC_ID =".$accID;
        $rs = mysqli_query($cn, $sql);
        
         if (mysqli_num_rows($rs) == 0) {
            die("<h3>Không có dữ liệu admin </h3><br>");
        }
        $row = mysqli_fetch_array($rs);
?>

<html lang="en">

    <head>
        <title>Admin Dashboard</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link href="../../../assets/css/admin.css" rel="stylesheet">
        <link href="../../../assets/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
                            <a class="nav-link" href="../../module/account/account.php"> <i class="fas fa-user-secret"></i>Admin <span
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
                        <div class="col-md-3 col-sm-3 sidebar-left mx-auto" >
                            <ul>
                                <li class="item-dashboard"><a href="../../index.php" class="reset-underline">Introduction</a></li>
                                <li class="item-dashboard"><a href="../../module/account/account.php" class="reset-underline" style='color: #f5614d;'><i class="fas fa-user-secret"></i>Admin</a></li>
                                <li class="item-dashboard"><a href="../../module/product/admin.product.php" class="reset-underline"><i
                                            class="fas fa-box"></i>Product</a></li>
                                <li class="item-dashboard"><a href="../../module/category/admin.category.php" class="reset-underline"><i
                                            class="fas fa-clipboard-list"></i>Categories</a></li>
                                <li class="item-dashboard"><a href="../../module/order/admin.order.php" class="reset-underline"><i class="fas fa-dolly"></i>Order</a></li>
                                <li class="item-dashboard"><a href="../../module/customer/admin.customer.php" class="reset-underline"><i
                                            class="fas fa-user-friends"></i>Customer</a></li>
                                <li class="item-dashboard"><a href="../../module/news/admin.news.php" class="reset-underline"><i class="far fa-bell"></i>News</a></li>
                                <li class="item-dashboard"><a href="../../module/feedback/admin.feedback.php" class="reset-underline"><i
                                            class="far fa-envelope"></i>Feedback</a></li>
                                <li class="item-dashboard"><a href="../../module/comment/admin.comment.php" class="reset-underline"><i
                                            class="far fa-edit"></i>Comment</a></li>
                            </ul>
                        </div>
                        <div class="col-md-9 col-sm 9">
                            <div class="sidebar-right">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm-6 mx-auto">
                                            <h3 class="text-center">Edit account admin</h3>
                                            <form action="updateDB.account.php" class="container" method="POST" style="width:100%;">
                                                <div class="form-group row">
                                                    <label for="inputEmail3" class="col-sm-6 col-form-label">Username</label>
                                                    <div class="col-sm-6">
                                                        <input  class="form-control" type="text" disabled style="cursor: not-allowed;" name="username" required  minlength="6" value="<?php echo $row['ACC_NAME']?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputEmail3" class="col-sm-6 col-form-label">Enter new password</label>
                                                    <div class="col-sm-6">
                                                        <input  class="form-control" type="password" name="newPassword" required minlength="6"title="MẬT KHẨU ÍT NHẤT 6 KÍ TỰ"  ><br>
                                                    </div>
                                                </div>
                                                 <div class="form-group row">
                                                    <label for="inputEmail3" class="col-sm-6 col-form-label">Confirm new password</label>
                                                    <div class="col-sm-6">
                                                        <input  class="form-control" type="password" name="confirmPassword" required minlength="6"title="MẬT KHẨU ÍT NHẤT 6 KÍ TỰ" ><br>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputEmail3" class="col-sm-6 col-form-label">Mangenament</label>
                                                    <div class="col-sm-6">
                                                        <div class="form-group row">
                                                        <select class="form-control" name="role" value="<?php echo $row['ACC_PER']?>">
                                                        <option value="Product" <?php if($row['ACC_PER'] == 'Product'){echo 'selected= "selected"';}?>>Product</option>
                                                        <option value="Category"  <?php  if($row['ACC_PER'] == 'Category'){echo 'selected= "selected"';}?>>Category</option>
                                                        <option value="Order"  <?php if($row['ACC_PER'] == 'Order'){echo 'selected= "selected"';}?>>Order</option>
                                                        <option value="Customer"  <?php if($row['ACC_PER'] == 'Customer'){echo 'selected= "selected"';}?>>Customer</option>
                                                        <option value="News"  <?php if($row['ACC_PER'] == 'News'){echo 'selected= "selected"';}?>>News</option>
                                                        <option value="Feedback"  <?php if($row['ACC_PER'] == 'Feedback'){echo 'selected= "selected"';}?>>Feedback</option>
                                                        <option value="Comment"  <?php if($row['ACC_PER'] == 'Comment'){echo 'selected= "selected"';}?>>Comment</option>
                                                        </select><br>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="comfirm text-center">
                                                    <button type="submit" name="submit"class="btn btn-success" style="margin: 0 40px;">Confirm</button>
                                                    <a href="account.php" class="btn btn-danger">Back</a>
                                                     <input type="" name="accID" hidden value="<?php echo"$accID";?>">
                                                </div> 
                                            </form>   

                                         
                                        </div>

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