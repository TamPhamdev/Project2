<?php
include_once '../../assets/common/connect.php';
$newsdetail_ID = "";
if (isset($_GET["id"])) {
    $newsdetail_ID = $_GET["id"];
} else {
    header("location:../../index.php");
}
$sql = "SELECT * FROM news"
        . " WHERE NEWS_ID =" . $newsdetail_ID;

$rs = mysqli_query($cn, $sql);

if (mysqli_num_rows($rs) == 0) {
    die("<h3>Không có dữ liệu admin </h3><br>");
}
$row = mysqli_fetch_array($rs);
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
                        <<li class="nav-item">
                            <a class="nav-link " href="product.php" id="navbarDropdown" role="button" aria-haspopup="true"
                               aria-expanded="false">
                                Shop
                            </a>
                        </li>
                        <li class="nav-item"><a class="nav-link " href="news.php">News</a></li>
                        <li class="nav-item"><a class="nav-link " href="about.php">About</a></li>
                        <!-- ul here -->
                        <li class="nav-item"><a class="nav-link" href="cart.php"><i class="fas fa-shopping-bag"></i></a></li>
                    </ul>
                </div>
            </nav>
        </div>
        <!--Navbar End-->

        <div class="title-level col-xs-6">
            <div class="container">
                <div class="row align-item-center ">
                    <div class="col-md-8 col-xs-6">
                        <h2 style="font-family: 'Montserrat';font-weight: 700" ;>News</h2>
                    </div>
                    <div class="col-md-4 title-bar mr-auto">
                        <span class="home-item"><a href="../../index.php">Home</a></span>
                        <span class="separator">></span>
                        <span class="current-item">News</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="new-wrapper" style="margin:60px 0;">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-sm-6 text-center  mx-auto">
                        <h2><?php echo $row[1] ?></h2>
                        <h5>A new moderately-priced line from the seasoned designer.</h5>
                        <img src="<?php echo $row[4] ?>" alt="" class="w-50 h-50">
                        <p class="news-detail-text" style="font-family: 'Raleway', sans-serif;
                           font-size: 18px;
                           font-weight: 500;
                           color: #3f3f3f;">
                           <?php echo $row[2] ?>
                        </p> 
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