<?php
session_start();

?>

<!doctype html>
<?php
include '../../../assets/common/permission.php';
include_once '../../../assets/common/connect.php';
error_reporting(E_ALL & ~E_NOTICE & ~8192);
if (isset($_POST["submit"])) {
    $password1 = mysqli_real_escape_string($cn, $_POST['newPassword']);
    $password2 = mysqli_real_escape_string($cn, $_POST['confirmPassword']);
    $password1 = md5($password1);
    $password2 = md5($password2);
    $username = mysqli_real_escape_string($cn, $_SESSION['username']);

    if ($password1 <> $password2) {
        echo "<script>alert('PASSWORD KHÔNG TRÙNG VUI LÒNG THỬ LẠI !!!');window.location.href = 'changepass.php';</script>";
        exit();
    } else if (mysqli_query($cn, "UPDATE account SET ACC_PASS='$password1' WHERE ACC_NAME='$username'")) {
        echo "<script>alert('BẠN ĐÃ ĐỔI PASSWORD THÀNH CÔNG !!!');window.location.href = '../../index.php';</script>";
    } else {
        mysqli_error($cn);
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
    </head>

    <body>
        <header>
            <nav class="navbar sticky-top navbar-expand-md navbar-expand-sm wow fadeInDown" id="nav">
                <!--Navbar start-->
                <a class="navbar-brand " href="../../index.html">Adminator</a>
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
                        <div class="col-md-9 col-sm-9">
                            <div class="sidebar-right">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm-6 mx-auto">
                                            <h3 class="text-center">Change password</h3>
                                            <form action="" class="container" method="POST" style="width:100%;">
                                                <div class="form-group row">
                                                    <label for="inputEmail3" class="col-sm-6 col-form-label">Your Username</label>
                                                    <div class="col-sm-6">
                                                        <input  class="form-control" type="text" disabled style="cursor: not-allowed;" 
                                                                name="username" required  minlength="6" value="<?php echo $_SESSION['username'] ?>">
                                                    </div>
                                                </div>
                                                 <div class="form-group row">
                                                    <label for="inputEmail3" class="col-sm-6 col-form-label">Your Role</label>
                                                    <div class="col-sm-6">
                                                        <input  class="form-control" type="text" disabled style="cursor: not-allowed;" 
                                                                name="username" required  minlength="6" value="<?php echo $_SESSION['permission'] ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputEmail3" class="col-sm-6 col-form-label">Enter new password</label>
                                                    <div class="col-sm-6">
                                                        <input  class="form-control" type="password" name="newPassword" required title='PASSWORD TỐI THIỂU 6 KÍ TỰ' minlength="6">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputEmail3" class="col-sm-6 col-form-label">Re-Enter new password</label>
                                                    <div class="col-sm-6">
                                                        <input  class="form-control" type="password" name="confirmPassword"  title='PASSWORD TỐI THIỂU 6 KÍ TỰ' required minlength="6"><br>
                                                    </div>
                                                </div>
                                                <div class="comfirm text-center">
                                                    <button type="submit" name="submit"class="btn btn-success" style="margin: 0 40px;">Confirm</button>
                                                    <button type="reset" class="btn btn-danger">Reset</button>
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
 <script src="../../../assets/js/jquery-3.3.1.min.js"></script>
 





        <script src="../../../assets/js/popper.min.js"></script>
        <script src="../../../assets/js/bootstrap.min.js"></script>
    </body>

</html>