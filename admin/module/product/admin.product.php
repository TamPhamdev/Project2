<?php
session_start();
if ($_SESSION["permission"] != 'Product' && $_SESSION["permission"]!= 'All') {
    echo "<script>alert('BẠN KHÔNG ĐỦ QUYỀN TRUY CẬP TRANG NÀY. VUI LÒNG LIÊN HỆ ADMIN ĐỂ BIẾT THÊM CHI TIẾT');window.location.href = '../../index.php';</script>";
}
?>

<!doctype html>
<?php
include '../../../assets/common/permission.php';
include_once '../../../assets/common/connect.php';

//if (isset($_GET["id"]) and !empty($_GET["id"])) 
//{
//    if (isset($_GET['deleteProduct'])) {
//        $proID = $_GET["id"];
//        $sql = "UPDATE product SET PRO_STATUS = '0' WHERE PRO_ID =" . $proID;
//        $rs = mysqli_query(($cn), $sql);
//        if (mysqli_affected_rows($cn) > 0) {
////            header("location:admin.product.php");
//            echo 'Thành công';
//        } else {
////            header("location:admin.product.php");
//            echo 'fail cmnr';
//        }
//    }
//}
?>
<html lang="en">

    <head>
        <title>Admin Dashboard</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link href="../../../assets/css/admin.css" rel="stylesheet">
        <link href="../../../assets/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
        <script src="../../../assets/js/jquery-3.3.1.min.js"></script>
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
                            <a class="nav-link" href="../../module/account/account.php"> <i class="fas fa-user-secret"></i>
                               <?php  
                echo '<span style="text-transform: uppercase;">Welcome - '.$_SESSION["username"].'</span>'; ?>  <span
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
                        <div class="col-md-2 col-sm-3" style="background-color: #263544;">
                            <ul>
                                <li  style="font-size:30px; padding: 20px 0;" class="item-dashboard"><a  href="../../index.php" class="reset-underline">Introduction</a></li>
                                <li  style="font-size:25px; padding-bottom: 20px;" class="item-dashboard"><a href="../../module/account/account.php" class="reset-underline"><i class="fas fa-user-secret"></i>Admin</a></li>
                                <li style="font-size:25px; padding-bottom: 20px;" class="item-dashboard"><a href="../../module/product/admin.product.php" class="reset-underline" style='color: #f5614d;'><i
                                            class="fas fa-box"></i>Product</a></li>
                                <li style="font-size:25px; padding-bottom: 20px;" class="item-dashboard"><a href="../../module/category/admin.category.php" class="reset-underline"><i
                                            class="fas fa-clipboard-list"></i>Categories</a></li>
                                <li style="font-size:25px; padding-bottom: 20px;" class="item-dashboard"><a href="../../module/order/admin.order.php" class="reset-underline"><i class="fas fa-dolly"></i>Order</a></li>
                                <li style="font-size:25px; padding-bottom: 20px;" class="item-dashboard"><a href="../../module/customer/admin.customer.php" class="reset-underline"><i
                                            class="fas fa-user-friends"></i>Customer</a></li>
                                <li style="font-size:25px; padding-bottom: 20px;" class="item-dashboard"><a href="../../module/news/admin.news.php" class="reset-underline"><i class="far fa-bell"></i>News</a></li>
                                <li style="font-size:25px; padding-bottom: 20px;" class="item-dashboard"><a href="../../module/feedback/admin.feedback.php" class="reset-underline"><i
                                            class="far fa-envelope"></i>Feedback</a></li>
                                <li style="font-size:25px; padding-bottom: 20px;" class="item-dashboard"><a href="../../module/comment/admin.comment.php" class="reset-underline"><i
                                            class="far fa-edit"></i>Comment</a></li>
                            </ul>
                        </div>
                        <div class="col-md-10 col-sm 9">
                            <div class="sidebar-right">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h3 class=" text-center">Bảng quản lí sản phẩm</h3>
                                            <a href="create.product.php" class="btn btn-success text-left">Thêm sản phẩm mới</a>
                                            <span id="message" style="float:right;"></span>

                                            <div id="user_data"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <script type="text/javascript">
            $(document).ready(function () {

                load_user_data();

                function load_user_data()
                {
                    var action = 'fetch';
                    $.ajax({
                        url: 'action.php',
                        method: 'POST',
                        data: {action: action},
                        success: function (data)
                        {
                            $('#user_data').html(data);
                        }
                    });
                }

                $(document).on('click', '.action', function () {
                    var pro_id = $(this).data('pro_id');
                    var pro_status = $(this).data('pro_status');
                    var action = 'change_status';
                    $('#message').html('');
                    if (confirm("BẠN CÓ MUỐN THAY ĐỔI TRẠNG THÁI CỦA SẢN PHẨM?"))
                    {
                        $.ajax({
                            url: 'action.php',
                            method: 'POST',
                            data: {pro_id: pro_id, pro_status: pro_status, action: action},
                            success: function (data)
                            {
                                if (data != '')
                                {
                                    load_user_data();
                                    $('#message').html(data);
                                }
                            }
                        });
                    } else
                    {
                        return false;
                    }
                });

            });
        </script>


        <script src="../../../assets/js/popper.min.js"></script>
        <script src="../../../assets/js/bootstrap.min.js"></script>
    </body>

</html>