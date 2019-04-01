<?php
session_start();
 if($_SESSION["permission"] != 'News' && $_SESSION["permission"]!= 'All')  
 {  
      echo "<script>alert('BẠN KHÔNG ĐỦ QUYỀN TRUY CẬP TRANG NÀY. VUI LÒNG LIÊN HỆ ADMIN ĐỂ BIẾT THÊM CHI TIẾT');window.location.href = '../../index.php';</script>";
 } 

?>
<?php
include_once '../../../assets/common/connect.php';
if (isset($_POST["submit"])) {
    $title = $_POST['newsTitle'];
    $content = $_POST['newsContent'];
    $img = $_POST['newsImg'];
    $sql = ("INSERT INTO news (NEWS_TITLE , NEWS_CONTENT, NEWS_IMG) VALUES ('$title', '$content', '$img')");
    mysqli_query($cn, $sql);
 
    if (mysqli_affected_rows($cn) > 0) {
      
        header("location:admin.news.php");
 
    }
}
?>

<!doctype html>
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
                <a class="navbarnd " href="../../index.php">Adminator</a>
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
                                <li class="item-dashboard"><a href="../../module/news/admin.news.php" class="reset-underline" style='color: #f5614d;'><i class="far fa-bell"></i>News</a></li>
                                <li class="item-dashboard"><a href="../../module/feedback/admin.feedback.php" class="reset-underline"><i
                                            class="far fa-envelope"></i>Feedback</a></li>
                                <li class="item-dashboard"><a href="../../module/comment/admin.comment.php" class="reset-underline"><i
                                            class="far fa-edit"></i>Comment</a></li>
                            </ul>
                        </div>
<!--                        <label class="title">Title</label>
                        <input  class="form-control" type="text" name="newsTitle" required style="margin-left:58px;"><br>
                        <br>
                        <label class="title ">Content</label>
                        <textarea class="form-control" name="newsContent" id=""  rows="5" style="" required></textarea><br>
                        <label class="title">Image</label>
                        <input class="form-control" type="text" name="newsImg" style="">
                        <br>
                        <div class="comfirm text-center">
                            <button type="submit" name="submit"class="btn btn-success" style="margin: 0 40px;">Confirm</button>
                            <a href="admin.news.php" class="btn btn-danger">Back</a>
                        </div>-->
                        <div class="col-md-9 col-sm 9">
                            <div class="sidebar-right">
                                <div class="container">
                                    <div class="row d-flex justify-content-center">
                                        <div class="col-md-6 col-sm-6">
                                            <h3 class="text-center">Create new post</h3>
                                            <div class="create-news text-left mx-auto d-flex justify-content-between pt-5">
                                                <form action="" class="container" method="POST" style="width:100%;">
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Title</label>
                                                        <div class="col-sm-10">
                                                           <input  class="form-control" pattern="^[_A-z0-9]*((-|\s)*[_A-z0-9]){6,100}$" title="CHỮ KHÔNG DẤU, ÍT NHẤT 6 KÍ TỰ Tối đa 100 kí tự" type="text" name="newsTitle" required ><br>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputPassword3" class="col-sm-2 col-form-label">Content</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" name="newsContent" id=""
                                                                   pattern="^[_A-z0-9]*((-|\s)*[_A-z0-9]){6,400}$" title="CHỮ KHÔNG DẤU, ÍT NHẤT 6 KÍ TỰ Tối đa 500 kí tự"  rows="5" style="height: 250px;" required></input><br>
                                                        </div>
                                                    </div>
                                                     <div class="form-group row">
                                                        <label for="inputPassword3" class="col-sm-2 col-form-label">Image</label>
                                                        <div class="col-sm-10">
                                                          <input class="form-control"  pattern="^((http[s]?|ftp):\/)?\/?([^:\/\s]+)((\/\w+)*\/)([\w\-\.]+[^#?\s]+)(.*)?(#[\w\-]+)?$" 
                                                                 title="NHẬP ĐÚNG ĐỊNH DẠNG URL HÌNH ẢNH"  required   type="text" name="newsImg" style="">
                                                        </div>
                                                    </div>
                                                     <div class="comfirm text-center">
                                                        <button type="submit" name="submit"class="btn btn-success" style="margin: 0 40px;">Confirm</button>
                                                        <a href="admin.news.php" class="btn btn-danger">Back</a>
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