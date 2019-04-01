<?php
session_start();
if ($_SESSION["permission"] != 'All' && $_SESSION["permission"] != 'Account') {
    echo "<script>alert('BẠN KHÔNG ĐỦ QUYỀN TRUY CẬP TRANG NÀY. VUI LÒNG LIÊN HỆ ADMIN ĐỂ BIẾT THÊM CHI TIẾT');window.location.href = '../../index.php';</script>";
}
?>

<!doctype html>
<?php
include '../../../assets/common/permission.php';
include_once '../../../assets/common/connect.php';
error_reporting(E_ALL & ~E_NOTICE & ~8192);
if (isset($_POST["submit"])) 
{
    $role = $_POST["role"];
    $password1 = mysqli_real_escape_string($cn, $_POST['newPassword']);
    $password2 = mysqli_real_escape_string($cn, $_POST['confirmPassword']);
    $password1 = md5($password1);
    $password2 = md5($password2);
    $username = mysqli_real_escape_string($cn, $_POST['username']);
    $sql = "INSERT INTO account (ACC_NAME , ACC_PASS, ACC_PER) VALUES ('$username', '$password1', '$role')";
    $dup = mysqli_query($cn,"SELECT ACC_NAME FROM account WHERE ACC_NAME='".$_POST['username']."'");
    if ($password1 <> $password2) 
    {
        echo "<script>alert('PASSWORD KHÔNG TRÙNG VUI LÒNG THỬ LẠI !!!');window.location.href = 'create.account.php';</script>";
        exit();
    }
    else if(mysqli_num_rows($dup) > 0)
    {
            echo "<script>alert('Tên tài khoản đã được sử dụng. Vui lòng chọn tên khác')</script>";
    }
    else {
        mysqli_query($cn, $sql);
        echo "<script>alert('THÊM TÀI KHOẢN MỚI THÀNH CÔNG !!!');window.location.href = 'account.php';</script>";
    }

   
}
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
                                            <h3 class="text-center">Create new admin</h3>
                                            <form action="" class="container" method="POST" style="width:100%;">
                                                <div class="form-group row">
                                                    <label for="inputEmail3" class="col-sm-6 col-form-label">Enter new username</label>
                                                    <div class="col-sm-6">
                                                        <input  class="form-control" type="text" name="username" required  minlength="6">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputEmail3" class="col-sm-6 col-form-label">Enter new password</label>
                                                    <div class="col-sm-6">
                                                        <input  class="form-control" type="password" name="newPassword" required minlength="6"><br>
                                                    </div>
                                                </div>
                                                 <div class="form-group row">
                                                    <label for="inputEmail3" class="col-sm-6 col-form-label">Confirm new password</label>
                                                    <div class="col-sm-6">
                                                        <input  class="form-control" type="password" name="confirmPassword" required minlength="6"><br>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputEmail3" class="col-sm-6 col-form-label">Mangenament</label>
                                                    <div class="col-sm-6">
                                                        <div class="form-group row">
                                                        <select class="form-control" name="role" >
                                                        <option value="Product">Product</option>
                                                        <option value="Category">Category</option>
                                                        <option value="Order">Order</option>
                                                        <option value="Customer">Customer</option>
                                                        <option value="News">News</option>
                                                        <option value="Feedback">Feedback</option>
                                                        <option value="Comment">Comment</option>
                                                        </select><br>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="comfirm text-center">
                                                    <button type="submit" name="submit"class="btn btn-success" style="margin: 0 40px;">Confirm</button>
                                                    <a href="account.php" class="btn btn-danger">Back</a>
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