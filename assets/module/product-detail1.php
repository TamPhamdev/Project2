<?php
include_once '../common/connect.php';

$prodetail_ID = "";
if (isset($_GET["id"])) {
    $prodetail_ID = $_GET["id"];
} else {
    header("location:../../index.php");
}
$sql = "SELECT PRO_ID, PRO_NAME, PRO_PRICE,PRO_IMG, CATE_NAME, PRO_DESCRIPTION,PRO_SEASON,PRO_GENDER"
        . " FROM product, category"
        . " WHERE product.CATE_ID = category.CATE_ID AND PRO_STATUS = 'Active' AND PRO_ID =" . $prodetail_ID;

$rs = mysqli_query($cn, $sql);


$sql1 = "SELECT * FROM comment WHERE PRO_ID =". $prodetail_ID;
$rs1 = mysqli_query($cn, $sql1);

if (mysqli_num_rows($rs) == 0) {
    die("<h3>Không có dữ liệu admin </h3><br>");
}

$row = mysqli_fetch_array($rs);
?>
<!DOCTYPE html>
<!--<meta http-equiv="refresh" content="50">-->
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
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="product.php" id="navbarDropdown" role="button" aria-haspopup="true"
                               aria-expanded="false">
                                Shop
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="product-detail.php">Clothes</a>
                                <a class="dropdown-item" href="product-detail.php">Shoes</a>
                                <a class="dropdown-item" href="product-detail.php">Something else here</a>
                            </div>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="">About</a></li>
                        <!-- ul here -->
                        <li class="nav-item"><a class="nav-link" href="cart.php"><i class="fas fa-shopping-bag"></i></a></li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-search " aria-hidden="true"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!--Navbar End-->


        <div class="title-level col-xs-6">
            <div class="container">
                <div class="row align-item-center ">
                    <div class="col-md-8 col-xs-6">
                        <h2 style="font-family: 'Montserrat';font-weight: 600;" >Product detail</h2>
                    </div>
                    <div class="col-md-4 title-bar mr-auto">
                        <span class="home-item"><a href="../../index.php">Home</a></span>
                        <span class="separator">></span>
                        <span class="current-item"><a href="product.php" style="text-decoration: none; color:#8d8d8d;">Products</a></span>
                        <span class="separator">></span>
                        <span class="current-item"><?php echo $row[1] ?></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="awrapper">
            <div class="container-fluid">
                <div class="row px-lg-5">
                    <div class="col-md-6 col-xs-6">
                        <div class="layoutleft mx-3" style="background-image: url('<?php echo $row[3] ?>')">

                        </div>
                    </div>
                    <div class="col-md-6 col-xs-6 px-0">
                        <div class="layoutright mx-3">
                            <div class="summary">
                                <div class="product-title">
                                    <h1><?php echo $row[1] ?></h1>
                                </div>
                                <div class="product-price"><span>$<?php echo $row[2] ?></span>
                                    <a href="#review-tab" class="review-link">(3 customer reviews)</a>
                                </div>

                                <!--              <div class="product-description">
                                                <p><?php echo $row[4] ?></p>
                                              </div>-->
                                <form action="#" class="cart">
                                    <input type="number" min="1" value="1" step="1" class="cart-quantity">
                                    <button type="submit" name="#" class="add-to-cart-btn"><i class="fas fa-shopping-bag"></i><span>add
                                            to cart</span>
                                    </button>
                                </form>
                                <div class="categories">
                                    <span class="cate-title">Categories: </span>
                                    <a href="#0" style="cursor: default;"><?php echo $row[4] ?></a>
                                    <span class="cate-title">Season: </span>
                                    <a href="#0" style="cursor: default;"><?php echo $row[6] ?></a>
                                    <span class="cate-title">Gender: </span>
                                    <a href="#0" style="cursor: default;"><?php echo $row[7] ?></a>
                                </div>
                                <div class="share-social">
                                    <div class="share-social-btn">
                                        <i class="fas fa-share-alt"></i><span style="padding: 15px;">Share</span>
                                    </div>
                                    <div class="share-social-active">
                                        <div class="social-icon-share">
                                            <div class="social-share">
                                                <i class="fab fa-facebook-f"></i>
                                            </div>
                                            <div class="social-share">
                                                <i class="fab fa-instagram"></i>
                                            </div>
                                            <div class="social-share">
                                                <i class="fab fa-twitter"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--summary here-->
                            <div class="product-tab-wrapper" id="mygroup">
                                <div class="product-tab">
                                    <ul class="product-tab-list">
                                        <li class="description-tab" data-toggle="collapse" data-target="#description-tab"><span>Description</span></li>
                                        <li class="add-info-tab" data-toggle="collapse" data-target="#info-tab"><span>additional
                                                infomation</span></li>
                                        <li class="review-tab" data-toggle="collapse" data-target="#review-tab"><span>reviews</span></li>
                                    </ul>
                                </div>
                                <div class="info-tab">
                                    <div id="description-tab" class="collapse show" data-parent="#mygroup">
                                        <span class="title-tab">Product description</span>
                                        <p style="font: 400 14px/22px 'Raleway';
                                           color: #8d8d8d;"><?php echo $row[4] ?></p>
                                    </div>
                                    <div id="info-tab" class="collapse" data-parent="#mygroup">
                                        <span class="title-tab">Additional Infomation</span>
                                        <table class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Weight</th>
                                                    <td class="product-info-add">0.3kg</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="row">Dimensions</th>
                                                    <td class="product-info-add">50 x 60 cm</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Material</th>
                                                    <td class="product-info-add">Cotton</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div id="review-tab" class="collapse" data-parent="#mygroup">
                                        <div class="comment">
                                            <span class="review-title title-tab">3 reviews for Basic t-shirt</span>
                                            <div class="comment-list">
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item">
                                                        <div class="comment-text">
                                                            <?php
                                                            while ($row1 = mysqli_fetch_array($rs1)){
                                                            if ($row1[5]>0) {
                                                                echo
                                                                '<p class="meta">
                                                                <strong class="review-author">'.$row1["COMMENT_NAME"].' (Customer)'.'</strong>
                                                                <span class="review-dash">-</span>
                                                                <time class="review-published-date">'.$row1["COMMENT_DATE"].'</time>
                                                                </p>';  
                                                            }
                                                            else{
                                                                echo
                                                                '<p class="meta">
                                                                <strong class="review-author">'.$row1["COMMENT_NAME"].' (Guest)'.'</strong>
                                                                <span class="review-dash">-</span>
                                                                <time class="review-published-date">'.$row1["COMMENT_DATE"].'</time>
                                                                </p>';  
                                                            }
                                                            echo
                                                                '<div class="description">                                                                
                                                                <p>'.$row1["COMMENT_CONTENT"].'</p>
                                                                </div>';
                                                            }
                                                            mysqli_close($cn);
                                                            ?>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="review-form">
                                                <div class="respond">
                                                    <span class="comment-notes">Add a review</span>
                                                    <form action="../../admin/module/comment/WriteComment.php" method="get" class="comment-form">
                                                        <input type="hidden" name="ID" value="<?php echo $prodetail_ID;?>"/>
                                                        <p class="comment-notes">Your email address will not be published. Required fields are
                                                            marked&nbsp;<i class="far fa-check-circle"></i></p>
                                                        <div class="comment-form">
                                                            <label for="comment">You review&nbsp;<i class="far fa-check-circle"></i></label>
                                                            <br>
                                                            <textarea name="txtcontent" cols="60" rows="5" required></textarea>
                                                        </div>
                                                        <div class="comment-author">
                                                            <label for="comment">Name &nbsp;<i class="far fa-check-circle"></i></label><br>
                                                            <input type="text" name="txtname" value size="30" required>
                                                        </div>
                                                        <div class="comment-email">
                                                            <label for="comment">Email &nbsp;<i class="far fa-check-circle"></i></label><br>
                                                            <input type="email" name="txtemail" value size="30" required>
                                                        </div>
                                                        <div class="form-submit">
                                                            <input type="submit" name="btnsubmit" class="submit">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end wrapper-->
                        </div>
                    </div>
                    <!--end layout right-->
                </div>
                <!--end row-->
            </div>
            <!--end container-->
        </div>
        <!--end wrapper-->

        <!--Related product-->
        <section class="related-product">
            <div class="container">
                <h2 class="related-product-title">Related products</h2>
                <div class="row" id="data-product-relate">
                  <!--related product here-->
                </div>
            </div>
        </section>
        <!--End related product-->












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

            var ajax = new XMLHttpRequest();
            var method = "GET";
            var url = "../common/display.php";
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
                    if(data.length > 4) 
                    {
                    data.length = 4;
                    }
                    for (var i = 0; i < data.length; i++)
                    {
                        var id = data[i].PRO_ID;
                        var img = data[i].PRO_IMG;
                        var name = data[i].PRO_NAME;
                        var price = data[i].PRO_PRICE;
                        var cate = data[i].CATE_NAME;
                        var description = data[i].PRO_DESCRIPTION;
                        var season = data[i].PRO_SEASON;
                        var gender = data[i].PRO_GENDER;

                        html += `                       <a href="product-detail.php?id=${id}" class="product-item">
                  <div class="col-md-3 col-xs-6 mx-auto">
                    <img class="img-thumbnail img-fluid border-0 no-gutters " src="${img}" alt="">
                    <div class="text-card-item">
                      <p class="item-text">${name}</p>
                      <p class="item-text item-text-light">${cate}</p>
                    </div>
                    <div style="display:flex; justify-content: space-between;">
                      <div class="price-item">
                        <span class="price">${price}</span>
                      </div>
                      <a href="#"><i class="fas fa-shopping-cart cart-icon"></i></a>
                    </div>
                  </div>
                </a>
                                                                        
                                                      `
                    }
                    document.getElementById("data-product-relate").innerHTML = html;

                }
            }
        </script>
    </body>

</html>