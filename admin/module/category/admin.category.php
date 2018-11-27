<?php
include_once '../../../assets/common/connect.php';
if (isset($_POST["submit"])) {
    $category = $_POST['newCate'];

    $sql = ("INSERT INTO category (CATE_NAME) VALUES ('$category')");
    mysqli_query($cn, $sql);

    if (mysqli_affected_rows($cn) === 0) {
        echo "Unsuccesful";
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
                <a class="navbar-brand " href="../../index.html">Adminator</a>
                <button class="navbar-toggler  navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
                        aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon icon-bar"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarTogglerDemo02">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="../../module/account/account.html"> <i class="fas fa-user-secret"></i>Admin <span
                                    class="sr-only"></span></a>
                        </li>
                        <li class="nav-item"><a class="nav-link " href="../../login.html">Logout</a></li>
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
                                <li class="item-dashboard"><a href="../../index.html" class="reset-underline">Introduction</a></li>
                                <li class="item-dashboard"><a href="../../module/account/account.html" class="reset-underline"><i class="fas fa-user-secret"></i>Admin</a></li>
                                <li class="item-dashboard"><a href="../../module/product/admin.product.php" class="reset-underline"><i
                                            class="fas fa-box"></i>Product</a></li>
                                <li class="item-dashboard"><a href="../../module/category/admin.category.php" class="reset-underline"><i
                                            class="fas fa-clipboard-list"></i>Categories</a></li>
                                <li class="item-dashboard"><a href="../../module/order/admin.order.html" class="reset-underline"><i class="fas fa-dolly"></i>Order</a></li>
                                <li class="item-dashboard"><a href="../../module/customer/admin.customer.html" class="reset-underline"><i
                                            class="fas fa-user-friends"></i>Customer</a></li>
                                <li class="item-dashboard"><a href="../../module/news/admin.news.html" class="reset-underline"><i class="far fa-bell"></i>News</a></li>
                                <li class="item-dashboard"><a href="../../module/feedback/admin.feedback.html" class="reset-underline"><i
                                            class="far fa-envelope"></i>Feedback</a></li>
                                <li class="item-dashboard"><a href="../../module/comment/admin.comment.html" class="reset-underline"><i
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
                                                    <label for="new-cate">New category</label>
                                                    <input type="text" id="new-cate" style="margin:40px 0;" name="newCate" required> 
                                                    <div class="comfirm text-center">
                                                        <button type="submit" name="submit" class="btn btn-success " style="margin: 0 40px;">Confirm</button>
                                                    </div><br>


                                                </form>
                                                <table class="table text-left" id="data">
                                                    <!--data ajax here -->
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
        </div>

        <script>
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
                                     <th>${cate}</th>
                                     <th> <a href="edit.category.php?id=${id}" class="btn btn-success">Edit</a>
                                       <a href="delete.category.php?id=${id}" class="btn btn-danger">Delete</a></th>
                                   </tr>
                              `
                    }
                    document.getElementById("data").innerHTML = html;
                }
            }
        </script>    




        <script src="../../../assets/js/jquery-3.3.1.min.js"></script>
        <script src="../../../assets/js/popper.min.js"></script>
        <script src="../../../assets/js/bootstrap.min.js"></script>
    </body>

</html>