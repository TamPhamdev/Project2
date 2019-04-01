 <?php  
 
 session_start();  
 if(!isset($_SESSION["username"]) || ($_SESSION["username"] == ''))  
 {  
      header("location:login.php");  
 }  
 ?> 
<!doctype html>
<html lang="en">

    <head>
        <title>Admin Dashboard</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="../assets/css/admin.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    </head>

    <body>
        <header>
            <nav class="navbar sticky-top navbar-expand-md navbar-expand-sm wow fadeInDown" id="nav">
                <!--Navbar start-->
                <a class="navbar-brand " href="index.php">Adminator</a>
                <button class="navbar-toggler  navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
                        aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon icon-bar"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarTogglerDemo02">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="module/account/account.php"> <i class="fas fa-user-secret"></i>
                               <?php  
                echo '<span style="text-transform: uppercase;">Welcome - '.$_SESSION["username"].'</span>'; ?> 
                                <span class="sr-only"></span>
                            </a>
                        </li>
                        <li class="nav-item"><a class="nav-link " href="logout.php">Logout</a></li>
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
                                <li class="item-dashboard"><a href="../../index.php" class="reset-underline" style='color: #f5614d;'>Introduction</a></li>
                                <li class="item-dashboard"><a href="./module/account/account.php" class="reset-underline"><i class="fas fa-user-secret"></i>Admin</a></li>
                                <li class="item-dashboard"><a href="./module/product/admin.product.php" class="reset-underline"><i
                                            class="fas fa-box"></i>Product</a></li>
                                <li class="item-dashboard"><a href="./module/category/admin.category.php" class="reset-underline"><i
                                            class="fas fa-clipboard-list"></i>Categories</a></li>
                                <li class="item-dashboard"><a href="./module/order/admin.order.php" class="reset-underline"><i class="fas fa-dolly"></i>Order</a></li>
                                <li class="item-dashboard"><a href="./module/customer/admin.customer.php" class="reset-underline"><i
                                            class="fas fa-user-friends"></i>Customer</a></li>
                                <li class="item-dashboard"><a href="./module/news/admin.news.php" class="reset-underline"><i class="far fa-bell"></i>News</a></li>
                                <li class="item-dashboard"><a href="./module/feedback/admin.feedback.php" class="reset-underline"><i
                                            class="far fa-envelope"></i>Feedback</a></li>
                                <li class="item-dashboard"><a href="./module/comment/admin.comment.php" class="reset-underline"><i
                                            class="far fa-edit"></i>Comment</a></li>
                            </ul>
                        </div>

                        <div class="col-md-9 col-sm 9">
                            <div class="sidebar-right">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h3>Đây là trang quản lí dữ diệu của Ahihishop.com </h3>
                                            <p>Đây là trang admin quản lí thông tin thuộc website Ahihishop.com</p>
                                            <span>Nhà phát triển</span> <br>
                                            <button class="btn btn-success"> <a href="../index.php" class="reset-underline">Xem website</a></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="../assets/js/jquery-3.3.1.min.js"></script>
        <script src="../assets/js/popper.min.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
    </body>

</html>