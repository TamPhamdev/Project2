<?php
session_start();
if ($_SESSION["permission"] != 'Category' && $_SESSION["permission"]!= 'All') {
    echo "<script>alert('BẠN KHÔNG ĐỦ QUYỀN TRUY CẬP TRANG NÀY. VUI LÒNG LIÊN HỆ ADMIN ĐỂ BIẾT THÊM CHI TIẾT');window.location.href = '../../index.php';</script>";
}
?>

<!doctype html>
<?php
include '../../../assets/common/permission.php';
include_once '../../../assets/common/connect.php';
if (isset($_POST["submit"])) {
    $category = $_POST['newCate'];

    $sql = ("INSERT INTO category (CATE_NAME) VALUES ('$category')");
    $dup = mysqli_query($cn,"SELECT CATE_NAME FROM category WHERE CATE_NAME='".$_POST['newCate']."'");
   
    if(mysqli_num_rows($dup) > 0)
    {
            echo "<script>alert('Tên category đã được sử dụng. Vui lòng chọn tên khác')</script>";
    }
    else if(mysqli_query($cn, $sql) ) 
    {
       echo "<script>alert('THÊM CATEGORY MỚI THÀNH CÔNG !!!');window.location.href = 'admin.category.php';</script>"; 
    }
    
}
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
                                <li class="item-dashboard"><a href="../../module/category/admin.category.php" class="reset-underline" style='color: #f5614d;'><i
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
                                    <div class="row ">
                                        <div class="col-md-8 col-sm-8 mx-auto">
                                            <h3 class="text-center">Add new category</h3>
                                            <div class="create-product text-center mx-auto">
                                                 
                                                <form action="" method="POST">
                                                    <div class="form-group row mb-4 mt-4">
                                                    <label for="inputEmail3" class="col-sm-6 col-form-label">Enter new category</label>
                                                    <div class="col-sm-6">
                                                        <input  class="form-control" pattern="^[_A-z0-9]*((-|\s)*[_A-z0-9]){4,240}$" title="CHỮ KHÔNG DẤU, ÍT NHẤT 4 KÍ TỰ" type="text" name="newCate" required>
                                                    </div>
                                                </div>
                                                    <div class="comfirm text-center">
                                                        <button type="submit" name="submit" class="btn btn-success " style="margin: 0 40px;">Confirm</button>
                                                    </div><br>

                                        <span id="message" style="float:right;"></span>
                                                </form> 
                                                <div id="cate_data" style="margin-top: 50px;"></div>
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

<!--        <script>
            // call ajax
            var ajax = new XMLHttpRequest();
            var method = "POST";
            var url = "../category/category.display.php";
            var asynchronous = true;
            ajax.open(method, url, asynchronous);
            // send ajax request
            ajax.send();
            // receiving  response from data.php
            ajax.onreadystatechange = function ()
            {
                if (this.readyState == 4 && this.status == 200)
                {
                    var data = JSON.parse(this.responseText);
                    var html = "";
                    for (var i = 0; i < data.length; i++)
                    {
                        var id = data[i].CATE_ID;
                        var cate = data[i].CATE_NAME;

                        html += ` 
                                   <tr>
                                     <th scope="col">ID</th>
                                     <th scope="col">Name</th>
                                     <th></th>
                                   </tr>
                                   <tr>
                                     <th scope="row">${id}</th>
                                     <th class="text-muted">${cate}</th>
                                     <th> <a href="edit.category.php?id=${id}" class="btn btn-success">Edit</a>
                                       <a href="delete.category.php?id=${id}" class="btn btn-danger">Delete</a></th>
                                   </tr>
                              `
                    }
                    document.getElementById("data").innerHTML = html;
                }
            }
        </script>    -->




        <script src="../../../assets/js/jquery-3.3.1.min.js"></script>
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
                            $('#cate_data').html(data);
                        }
                    });
                }

                $(document).on('click', '.action', function () {
                    var pro_id = $(this).data('pro_id');
                    var pro_status = $(this).data('pro_status');
                    var action = 'change_status';
                    $('#message').html('');
                    if (confirm("BẠN CÓ MUỐN THAY ĐỔI TRẠNG THÁI CỦA CATEGORY?"))
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