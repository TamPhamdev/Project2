<?php
include_once '../../../assets/common/connect.php';
$productID = "";
        if (isset($_GET["id"])) {
            $productID = $_GET["id"];
        } else {
            header("location:admin.product.php");
        }
        $sql = "SELECT * FROM product WHERE PRO_ID =".$productID;
//        echo $sql;
        $rs = mysqli_query($cn, $sql);
        
         if (mysqli_num_rows($rs) == 0) {
            die("<h3>Không có dữ liệu admin </h3><br>");
        }
        $row = mysqli_fetch_array($rs);

//echo $sql;
//        $sql = "SELECT * FROM Product where id =".$pID;
//        $rs = mysqli_query($cn, $sql);
//
//        if (mysqli_num_rows($result) == 0) {
//        header("location:  admin.product.php");
//            die("<h3>Không có dữ liệu admin </h3><br>");
//        }
//        $row = mysqli_fetch_array($results);
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
                <a class="navbarnd " href="../../index.html">Adminator</a>
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
                        <li class="nav-item"><a class="nav-link " href="login.html">Logout</a></li>
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
                                    <div class="row d-flex justify-content-center">
                                        <div class="col-md-6 col-sm-6">
                                            <h3 class="text-center">Edit product</h3>
                                            <div class="create-product text-left mx-auto d-flex justify-content-between">
                                                <form action="updateDB.product.php" method="GET" style="width:100%;" id="data-edit-product">
                                                                                                       <label for="nameProduct">Tên sản phẩm</label>
                                                                                                        <input type="text" id="nameProduct" required style="margin-left:60px;" name="proName"  value="<?php echo "$row[1]" ?>"><br>
                                                                                                        <label for="priceProduct">Giá cả</label>
                                                                                                        <input type="number" required pattern="0+\.[0-9]*[1-9][0-9]*$" min="0" onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                                                                                                               style="margin-left:114px;" id="priceProduct" name="proPrice" value="<?php echo "$row[2]" ?>"><br>
                                                                                                        <label for="nameCategory">Chủng loại</label>
                                                                                                        <select type="text" id="cate-option" name="cateName"  required  style="margin-left:82px;">
                                                                                                           
                                                                                                        </select>
                                                                                                        <br>
                                                                                                        <label for="gender">Giới tính</label>
                                                                                                        <select id="gender" name="proGender"  style="margin-left:98px;">
                                                                                                            <option value="unisex">Unisex</option>
                                                                                                            <option value="male">Male</option>
                                                                                                            <option value="female">Female</option>
                                                                                                        </select><br>
                                                                                                        <label for="season">Mùa</label>
                                                                                                        <select id="season" name="proSeason" style="margin-left:125px;"  value="">
                                                                                                            <option value="All">All</option>
                                                                                                            <option value="Summer">Summer</option>
                                                                                                            <option value="Winter">Winter</option>
                                                                                                            <option value="Fall">Fall</option>
                                                                                                            <option value="Spring">Spring</option>
                                                                                                        </select><br>
                                                                                                        <label for="descriptionProduct">Mô tả</label>
                                                                                                        <input type="text" id="descriptionProduct" name="proDescription"   value="<?php echo "$row[4]" ?>" required  style="margin-left: 114px;"> <br>
                                                                                                        <label for="imgProdct">Hình ảnh</label>
                                                                                                        <input type="text"  id="inputGroupFile" name="proImg"  value="<?php echo "$row[3]" ?>" style="margin-left:90px;">
                                                                                                        <br>
                                                                                                       <div class="comfirm text-center">
                                                                                                            <button type="submit" class="btn btn-success" name="updateProduct" style="margin: 0 40px;">Xác nhận</button>
                                                                                                            <a href="admin.product.php" class="btn btn-danger">Trở về</a>
                                                                                                            <input type="" name="productID" hidden value="<?php echo"$productID";?>">
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
                    document.getElementById("cate-option").innerHTML = html;
                }
            }
    </script>    




        <script src="../../../assets/js/jquery-3.3.1.min.js"></script>
        <script src="../../../assets/js/popper.min.js"></script>
        <script src="../../../assets/js/bootstrap.min.js"></script>
    </body>

</html>