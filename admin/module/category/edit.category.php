<?php
require_once '../../../assets/common/connect.php'; 
$cateID = "";
        if (isset($_GET["id"])) {
            $cateID = $_GET["id"];
        } else {
            header("location:admin.category.php");
        }
        $sql = "SELECT CATE_NAME FROM category WHERE CATE_ID =".$cateID;
        
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
              <li class="item-dashboard"><a href="../../module/product/admin.product.html" class="reset-underline"><i
                    class="fas fa-box"></i>Product</a></li>
              <li class="item-dashboard"><a href="../../module/category/admin.category.html" class="reset-underline"><i
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
                    <h3 class="text-center">Edit category</h3>
                    <div class="create-product text-center mx-auto">
                        <form action="updateDB.category.php" method="GET" id="dataEdit">
                        <label for="new-cate">Rename category</label>
                        <input type="text" id="new-cate" name="newNameCate"  value="<?php echo "$row[0]"; ?>"  style="margin:40px 0px;">
                        <div class="comfirm text-center">
                          
                          <button type="submit" name="submit" class="btn btn-success" style="margin: 0 40px;">Confirm</button>
                          <a href="admin.category.php" class="btn btn-danger">Back</a>
                           <input type="" name="cateID" hidden value="<?php echo"$cateID";?>">
                        </div><br>
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


<script>
          // call ajax
            var ajax = new XMLHttpRequest();
            var method = "GET";
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
                    console.log(this.responseText);
                    var html = "";
                    for (var i = 0; i < data.length; i++)
                    {  
                        var cate = data[i].CATE_NAME;
                        
                        html += ` 
                            <option value="${cate}">${cate}</option>
                       `
                    }
                    document.getElementById("nameCategory").innerHTML = html;
                }
            }
    </script>    



  <script src="../../../assets/js/jquery-3.3.1.min.js"></script>
  <script src="../../../assets/js/popper.min.js"></script>
  <script src="../../../assets/js/bootstrap.min.js"></script>
</body>

</html>