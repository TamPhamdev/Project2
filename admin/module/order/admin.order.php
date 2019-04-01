<?php
session_start();
 if($_SESSION["permission"] != 'Order' && $_SESSION["permission"]!= 'All')  
 {  
      echo "<script>alert('BẠN KHÔNG ĐỦ QUYỀN TRUY CẬP TRANG NÀY. VUI LÒNG LIÊN HỆ ADMIN ĐỂ BIẾT THÊM CHI TIẾT');window.location.href = '../../index.php';</script>";
 } 

?>
<?php
include '../../../assets/common/connect.php';   
include '../../../assets/common/permission.php';
//    $status = '0';
//    if(isset($_POST['checkbox']) && $_POST['checkbox'] == '1') {
//        $status = $_POST['checkbox'];
//        
//    } 
    if($cn == NULL)
    {
        exit();
    }        
    $sql = "select * from bill";
//    $sql2 = "";
    
    $result = mysqli_query($cn, $sql);
    if(mysqli_num_rows($result)==0)
    {
        die("<h3>Emty data store!!</h3>");
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
  <style>
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
<script language="JavaScript" type="text/javascript">
            var index, table = document.getElementById('table');
    
            function checkDelete(){
            return confirm('Are you sure?');
            }
        
            function checkToggle(){
                return confirm('Are you sure you want to change status?');
            }
</script>
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
              <li class="item-dashboard"><a href="../../module/order/admin.order.php" class="reset-underline"  style='color: #f5614d;'><i class="fas fa-dolly"></i>Order</a></li>
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
                  <div class="col-sm-12">
                    <h3 class=" text-center">Order management board</h3>                    
                    <table class="table table-responsive margin-40" id="table">
                      <thead>
                        <tr>

                          <th scope="col">CustomerId</th>
                          <th scope="col">DateOrder</th>
                          <th scope="col">Approval</th>
                          <th scope="col">Address</th>
                          <th scope="col"></th>
                          <th scope="col"></th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                        while ($row = mysqli_fetch_array($result)) {
                            echo "<tr>";
                            //echo "<td>". $row[0] ."</td>"; //[0]
                            echo "<td>". $row[7] ."</td>"; //[1]
                            echo "<td>". $row[1] ."</td>"; //[2]
                            
                             echo "<td>".
                              "<label class='switch'>".
                                "<input type='checkbox' id='checkValue' name='checkbox' checked onclick = 'return checkToggle()'>".
                                "<span class='slider round'></span>".
                              "</label>".
                            "</td>";
                             echo "<td>". $row['BILL_ADDRESS'] ."</td>";
                            //echo "<td>". $row[3] ."</td>"; //[3]
                            echo "<td>"."<input class='btn btn-success reset-underline'  type='button' onclick=location.href='detail.order.php?id=$row[0]' value='Detail'>"."</td>";
                            echo "<td><a href='delete.order.php?id=$row[0]' class='btn btn-danger' onclick = 'return checkDelete()'>Delete</a></td>";
                            echo "</tr>";
                        }
                        ?>

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






  <script src="../../../assets/js/jquery-3.3.1.min.js"></script>
  <script src="../../../assets/js/popper.min.js"></script>
  <script src="../../../assets/js/bootstrap.min.js"></script>
</body>

</html>
