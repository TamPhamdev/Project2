<?php
include_once '../common/connect.php';
if ($cn == NULL) {
    exit();
}
$sql1 = "select * from Feedback ORDER BY FEEDBACK_ID DESC";

$result = mysqli_query($cn, $sql1);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="shortcut icon" href="//cdn.shopify.com/s/files/1/1932/5453/t/12/assets/favicon.ico?5912751953392405595"
    type="image/png">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/product.css">
  <link rel="stylesheet" href="../css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <title>AHIHI Shop</title>
</head>

<body>
  <div class="header">
    <!--Header start-->
     <nav class="navbar main-nav sticky-top navbar-expand-md navbar-expand-sm" id="nav">
                <!--Navbar start-->
                <a class="navbar-brand" href="../../index.php">AHIHI SHOP</a>
                <button class="navbar-toggler  navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
                        aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon icon-bar"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarTogglerDemo02">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="../../index.php">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="product.php" id="navbarDropdown" role="button" aria-haspopup="true"
                               aria-expanded="false">
                                Shop
                            </a>
                        </li>
                        <li class="nav-item"><a class="nav-link " href="news.php">News</a></li>
                        <li class="nav-item"><a class="nav-link " href="about.php">About</a></li>
                        <!-- ul here -->
                      <li class="nav-item"><a id="cart" class="nav-link" href="javascript:void(0);"><i class="fas fa-shopping-bag"></i></a></li>
                    </ul>
                </div>
                <div class="popup-cart" >
                    <div class="list-cart">
                        <div class="item-cart d-flex justify-content-between align-items-center">
                                Your Cart is Empty!
                        </div>         
                    </div>
                </div>
            </nav>
  </div>
  <!--Navbar End-->



  <div class="title-level col-xs-6">
    <div class="container">
      <div class="row align-item-center ">
        <div class="col-md-8 col-xs-6">
          <h2 style="font-family: 'Montserrat';font-weight: 700" ;>About</h2>
        </div>
        <div class="col-md-4 title-bar mr-auto">
          <span class="home-item"><a href="../../index.php">Home</a></span>
          <span class="separator">></span>
          <span class="current-item">About</span>
        </div>
      </div>
    </div>
  </div>
  <div class="about-wrapper mt-md-4 mb-md-4">
    <div class="container">
      <div class=" row text-left ">
        <div class="col-md-6 col-sm-6 mx-auto">
            <h4>Who we are</h4>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sunt repellat, doloribus optio doloremque est, iure deserunt reprehenderit laborum dignissimos aut culpa error! Rem, voluptatum distinctio. Ullam, consequatur, blanditiis error ipsa in qui doloremque atque esse ea veniam dicta, repellendus accusantium. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Placeat asperiores sequi distinctio aspernatur a maiores cumque recusandae culpa deleniti reiciendis!</p>
           
        </div>
      </div>
        <div clas="row">
            <div class="awrapper">
    <div class="container-fluid">
        <div class="row px-lg-5">           
            <div class="col-md-6 col-xs-6 px-0">
                <span class="title-tab">User Feedback</span>
                <div class="comment">
                    <div class="comment-list">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div class="comment-text">
                                    <?php
                                    while ($row = mysqli_fetch_array($result)){
                                        if ($row["CUS_ID"]>0) {
                                            echo
                                            '<p class="meta">
                                            <strong class="review-author">'.$row["FEEDBACK_NAME"].' (Customer)'.'</strong>
                                            <span class="review-dash">-</span>
                                            <time class="review-published-date">'.$row["FEEDBACK_DATE"].'</time>
                                            </p>';  
                                        }
                                        else{
                                            echo
                                            '<p class="meta">
                                            <strong class="review-author">'.$row["FEEDBACK_NAME"].' (Guest)'.'</strong>
                                            <span class="review-dash">-</span>
                                            <time class="review-published-date">'.$row["FEEDBACK_DATE"].'</time>
                                            </p>';  
                                        }
                                        echo
                                        '<div class="description">                                                                
                                        <p>'.$row["FEEDBACK_CONTENT"].'</p>
                                        </div>';
                                    }
                                    ?>
                                </div>
                            </li>
                        </ul>   
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xs-6">
                <form method="POST">
                    <h4>Feedback</h4>
                    <label for="">Name</label>
                    <input type="text" name="txtName">
                    <label for="">Email</label>
                    <input type="email" name="txtEmail">
                    <label for="">Title</label>
                    <input type="text" name="txtTitle" required><br>
                    <label for="">Content</label>
                    <input type="text" name="txtContent" style="height:100px;">
                    <button name="btnSend" class="btn btn-success">Send</button>
                </form>
                <?php
                if (isset($_POST["btnSend"])) {
                    $FEEDBACK_NAME = $_POST["txtName"];
                    $FEEDBACK_EMAIL = $_POST["txtEmail"];
                    $FEEDBACK_TITLE = $_POST["txtTitle"];
                    $FEEDBACK_CONTENT = $_POST["txtContent"];

                    if (isset($_POST["txtName"]) and isset($_POST["txtEmail"]) and isset($_POST["txtTitle"]) and isset($_POST["txtContent"])
                        and !empty("txtName") and !empty("txtEmail") and !empty("txtTitle") and !empty("txtContent"))
                    {
                        $sql = "insert into Feedback(FEEDBACK_TITLE, FEEDBACK_CONTENT, CUS_ID,FEEDBACK_NAME, FEEDBACK_EMAIL) value ('$FEEDBACK_TITLE','$FEEDBACK_CONTENT',(select CUS_ID from Customer where CUS_EMAIL ='$FEEDBACK_EMAIL'),'$FEEDBACK_NAME','$FEEDBACK_EMAIL')";
                        mysqli_query($cn, $sql);
                    }
                }
               
                ?>
            </div>
        </div>
    </div>
  </div>
        </div>
    </div>
  </div>













  <footer>
    <!--Footer -->
    <div class="container mx-auto">
      <div class="top-footer">
        <div class="row">
          <div class="col-md-3 col-xs-6">
            <span class="title-top">Ahihi Shop</span>
            <div class="footer-content">
              <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sint minus rem esse maiores veniam Lorem
                ipsum, dolor sit amet consectetur adipisicing elit. Alias, eveniet?</p>
            </div>
          </div>
          <div class="col-md-3 col-xs-6">
            <span class="title-top">My account</span>
            <div class="footer-content">
              <ul class="text-account">
                <li><a href="#">About us</a></li>
                <li><a href="#">Contact us</a></li>
                <li><a href="#">Login</a></li>
                <li><a href="#">My account</a></li>
                <li><a href="#">FAQ</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-3 col-xs-6">
            <span class="title-top">Contact infomation</span>
            <div class="footer-content">
              <ul class="text-contact">
                <li>ADDRESS</li>
                <li>123 Street Name, City</li><br>
                <li>PHONE</li>
                <li>(123) 456-7890</li><br>
                <li>EMAIL</li>
                <li>mail@example.com</li>
              </ul>
            </div>
          </div>
          <div class="col-md-3 col-xs-6">
            <span class="title-top">WORKING DAYS/HOURS</span>
            <div class="footer-content">
              <span>Mon - Sun / 9:00AM - 8:00PM</span>
            </div>
          </div>
        </div>
      </div>

      <div class="row justify-content-end bottom-footer">
        <div class="col-sm-4">
          <span>© 2018, Ahihi Shop Designed by TamPham. </span>
        </div>
        <div class="col-sm-4">
          <img src="../img/logo-payment.png" alt="">
        </div>
      </div>
    </div>
  </footer>
  <!--End footer-->
  <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fas fa-angle-up" style="margin:0; padding: 0; width: 34px;"></i></button>
  <script src="../js/jquery-3.3.1.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/main.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      let nav = document.querySelector('#nav');
      window.addEventListener('scroll', function () {
        if (this.pageYOffset > 50) {
          nav.classList.add('navbar_black');
        }
        if (this.pageYOffset < 50) {
          nav.classList.remove('navbar_black');
        }
      });
    }, false)
    window.onscroll = function () {
      scrollFunction()
    };

    function scrollFunction() {
      if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("myBtn").style.display = "block";
      } else {
        document.getElementById("myBtn").style.display = "none";
      }
    }

    function topFunction() {
      document.body.scrollTop = 0; // For Safari
      document.body.scrollIntoView({
        behavior: 'smooth',
        block: 'start'
      }); // For Chrome, Firefox, IE and Opera
    }
  </script>
</body>

</html>