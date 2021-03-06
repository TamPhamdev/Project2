<?php
session_start();
 if($_SESSION["permission"] != 'News' && $_SESSION["permission"]!= 'All')  
 {  
      echo "<script>alert('BẠN KHÔNG ĐỦ QUYỀN TRUY CẬP TRANG NÀY. VUI LÒNG LIÊN HỆ ADMIN ĐỂ BIẾT THÊM CHI TIẾT');window.location.href = '../../index.php';</script>";
 } 

?>

<?php
include '../../../assets/common/permission.php';
include '../../../assets/common/connect.php';

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
   <script src="../../../assets/js/jquery-3.3.1.min.js"></script>
        <script src="../../../assets/js/popper.min.js"></script>
        <script src="../../../assets/js/bootstrap.min.js"></script>
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
              <li class="item-dashboard"><a href="../../module/news/admin.news.php" class="reset-underline" style='color: #f5614d;'><i class="far fa-bell"></i>News</a></li>
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
                  <div class="col-sm-12">
                    <h3 class=" text-center">News management board</h3>
                    <a href="create.news.php" class="btn btn-success text-left">Add new post</a>
                    <table class="table table-responsive margin-40">
                      <thead>
                        <tr>
                          <th scope="col">ID</th>
                          <th scope="col">Image</th>
                          <th scope="col">Title</th>
                          <th scope="col">Content</th>
                          <th scope="col">Time</th>
                          <th scope="col"></th>
                          <th scope="col"></th>
                          <th scope="col"></th>
                        </tr>
                      </thead>
                      <tbody id="data">
                          
                            <!-- jax call here -->
                      </tbody>
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

    <script>
             // call ajax
            var ajax = new XMLHttpRequest();
            var method = "POST";
            var url = "../news/news.display.php";
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
                        var id = data[i].NEWS_ID;
                        var title = data[i].NEWS_TITLE;
                        var img = data[i].NEWS_IMG;
                        var date = data[i].NEWS_DATE;
                        var content = data[i].NEWS_CONTENT;
                        html += ` 
                          <tr>
                          <th scope="row">${id}</th>
                          <td> <img src="${img}" alt="" style="width:70px; height:70px;"></td>
                          <td>${title}</td>
                          <td class="text-muted module line-clamp">${content}</td>    
                          <td class="text-muted">${date}</td>
                          <td><a href="../../../assets/module/news.detail.php?id=${id}" class="btn btn-success">View</a></td>
                          <td><a href="edit.news.php?id=${id}" class="btn btn-success reset-underline">Edit</a></td>
                          <td><a href="delete.news.php?id=${id}" onclick='return alert();' class="btn btn-danger reset-underline">Delete</a></td>
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
        <script>
            function alert(){
              return  confirm("Bạn có muốn xóa tin này ???");
            }
        </script>
</body>

</html>


                           `