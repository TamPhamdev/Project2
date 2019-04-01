<?php
session_start();
 if($_SESSION["permission"] != 'Order' && $_SESSION["permission"]!= 'All')  
 {  
      echo "<script>alert('BẠN KHÔNG ĐỦ QUYỀN TRUY CẬP TRANG NÀY. VUI LÒNG LIÊN HỆ ADMIN ĐỂ BIẾT THÊM CHI TIẾT');window.location.href = '../../index.php';</script>";
 } 

?>
<?php
    include '../../../assets/common/connect2.php';  
    include '../../../assets/common/permission.php';
    if($cn == NULL)
    {
        exit();
    }
    
    $user ="";
    if (isset($_GET["id"]) and !empty($_GET["id"])) {
        $user = $_GET["id"];
    }
    else
    {
        header("location:admin.order.php");
    }
    //truy van du lieu trong bang Product
    
    $sql = "SELECT B.BILL_ID, b.CUS_ID, b.BILL_DATEORDER, BillTotal, d.PRO_ID, BillCount, b.BILL_DISCOUNT, d.BILLINFO_PRICE, c.CUS_NAME, c.CUS_EMAIL, c.CUS_PHONE, d.pro_id, b.BILL_ADDRESS
    FROM bill B
    INNER JOIN customer C on b.CUS_ID = c.CUS_ID
    INNER JOIN billinfo D ON B.BILL_ID = D.BILL_ID
    INNER JOIN
    (
        SELECT BILL_ID, SUM(BILLINFO_PRICE) AS BillTotal, count(BILNINFO_QUANTITY) as BillCount FROM billinfo
        GROUP BY BILL_ID
    ) X ON B.BILL_ID = X.BILL_ID
    where b.bill_id = $user;";
    
//    echo $sql;
//    exit();
    
    $sql2 = "SELECT p.pro_name
    from billinfo bi
    inner JOIN product p on p.PRO_ID = bi.PRO_ID
    where bi.bill_id = $user;";

    //thi hanh truy van select SQL
    $result = mysqli_query($cn, $sql);
    $result2 = mysqli_query($cn, $sql2);
    //kt co du lieu tra ve ko
    if(mysqli_num_rows($result)==0)
    {
        die("<h3>Not found !!</h3>");
    }
    
    $row = mysqli_fetch_array($result);
    $row2 = mysqli_fetch_array($result2);
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
          <li class="nav-item"><a class="nav-link " href="../../login.php">Logout</a></li>
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
                    <h3 class=" text-center">Order detail board</h3>                    
                    <table class="table table-responsive margin-40" >
                     <?php
                        while ($row = mysqli_fetch_array($result)) {                  
                            echo "<td>";
                            echo "<table class='table table-responsive margin-40' width='50%'>";
                            echo "<thead>";
                            echo "<tr>";
                            echo "<th scope='col' class='btn btn-success reset-underline' width='100px' >Customer</th>";
                            echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";
                            echo "<tr>";
                            echo "<th scope='row'>Bill Id:</th>";
                            echo "<td>". $row[0] ."</td>"; 
                            echo "</tr>";
                            echo "<tr>";
                            echo "<th scope='row'>Product Order:</th>";
                            while ($row2 = mysqli_fetch_array($result2)) {                           
                            echo "<td>". $row2[0] ."</td>";
                            }
                            echo "</tr>";                            
                            echo "<tr>";
                            echo "<th scope='row'>Quantity:</th>";
                            echo "<td>". $row[5] ."</td>"; 
                            echo "</tr>";
                            echo "<tr>";
                            echo "<th scope='row'>Discount:</th>";
                            echo "<td>". $row[6] ."</td>"; 
                            echo "</tr>";
                            echo "<tr>";
                            echo "<th scope='row'>Total Price:</th>";
                            echo "<td>". $row[3] ."</td>"; 
                            echo "</tr>";
                            echo "</tbody>";
                            echo "</table>";
                            echo "</td>";
                            echo "<td>";
                            echo "<table class='table table-responsive margin-40' width='50%'>";
                            echo "<thead>";
                            echo "<tr>";
                            echo "<th scope='col' class='btn btn-success reset-underline' width='100px' >Customer</th>";
                            echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";
                            echo "<tr>";
                            echo "<th scope='row'>CustomerId:</th>";
                            echo "<td>". $row[1] ."</td>"; 
                            echo "</tr>";
                            echo "<tr>";
                            echo "<th scope='row'>Customer Name:</th>";
                            echo "<td>". $row[8] ."</td>"; 
                            echo "</tr>";
                            echo "<tr>";
                            echo "<th scope='row'>Email:</th>";
                            echo "<td>". $row[9] ."</td>"; 
                            echo "</tr>";
                            echo "<tr>";
                            echo "<th scope='row'>Phone Number:</th>";
                            echo "<td>". $row[10] ."</td>"; 
                            echo "</tr>";
                            echo "<tr>";
                            echo "<th scope='row'>Address:</th>";
                            echo "<td>". $row[12] ."</td>"; 
                            echo "</tr>";
                            echo "</tbody>";
                            echo "</table>";
                            echo "</td>";
                        }
                        mysqli_close($cn);
                        ?>   

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