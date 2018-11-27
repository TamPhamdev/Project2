<?php
include_once './assets/common/connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="shortcut icon" href="//cdn.shopify.com/s/files/1/1932/5453/t/12/assets/favicon.ico?5912751953392405595"
    type="image/png">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/animate.css">
  <title>AHIHI Shop</title>
</head>

<body>
  <div class="header">
    <!--Header start-->
    <nav class="navbar main-nav sticky-top navbar-expand-md navbar-expand-sm wow fadeInDown" id="nav">
      <!--Navbar start-->
      <a class="navbar-brand " href="index.php">AHIHI SHOP</a>
      <button class="navbar-toggler  navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
        aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon icon-bar"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarTogglerDemo02">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="index.html">Home <span class="sr-only"></span></a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="assets/module/product.php" id="navbarDropdown" aria-haspopup="true"
              aria-expanded="false">
              Shop
            </a>

            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="assets/module/product.php">Clothes</a>
              <a class="dropdown-item" href="assets/module/product.php">Shoes</a>
              <a class="dropdown-item" href="assets/module/product.php">Something else here</a>
            </div>
          </li>
          <li class="nav-item"><a class="nav-link " href="">About</a></li>
          <!-- ul here -->
          <li class="nav-item"><a class="nav-link" href=""><i class="fas fa-shopping-bag"></i></a></li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="fas fa-search " aria-hidden="true"></i>
            </a>
          </li>
        </ul>
      </div>
    </nav>
    <!--Navbar End-->


    <!-- Carousel here -->
    <div class="container-fluid car px-0">
      <div id="carouselIdTop" class="carousel slide" data-ride="carousel" data-interval="5000">
        <div class="carousel-inner" role="listbox">
          <div class="carousel-item active">
            <div class="container-fluid item1"></div>
            <div class="carousel-caption animated fadeInLeft delay-1s">
              <div class="lang_1">
                <div class="content_1">
                  <div class="text_1">up to <br>
                    <b class="inner1">50</b>
                    <span class="inner2">%<br><b>Off</b></span>
                  </div>
                  <div class="text_2">
                    <h3 class="text2">Summer sale</h3>
                    <h4 class="text3">now starting at <b>$99.00</b></h4>
                  </div>
                  <div class="text_3">
                    <a class="btn btn_primary" href="">Shop now</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--Hết 1 carousel item-->
          <div class="carousel-item item2">
            <div class="container-fluid item2"></div>
            <div class="carousel-caption-order">
              <div class="lang_1">
                <div class="content_1">
                  <div class="text_2">
                    <h3 class="text2">cool shoes</h3>
                    <h4 class="text3">Limited Quantity* <b>$49.00</b></h4>
                  </div>
                  <div style="position: absolute;margin-top:350px;">
                    <a class="btn btn_primary" href="">Shop now</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--Hết 2 carousel item-->
        </div>
      </div>
    </div> <!-- End carousel -->
  </div>
  <!--End header-->

  <!--Banner start-->
  <div class="collection-banner wow fadeInUp">
    <div class="container-fluid px-0">
      <div class="row no-gutters">
        <div class="col-md-3 col-xs-6">
          <div class="parent">
            <img class="img-fluid child" src="assets/img/asset 3.png" alt="">
          </div>
        </div>
        <div class="col-md-3 col-xs-6">
          <div class="parent">
            <img class="img-fluid child" src="assets/img/asset 4.png" alt="">
          </div>
        </div>
        <div class="col-md-3 col-xs-6">
          <div class="parent">
            <img class="img-fluid child" src="assets/img/asset 5.png" alt="">
          </div>
        </div>
        <div class="col-md-3 col-xs-6">
          <div class="parent">
            <img class="img-fluid child" src="assets/img/asset 6.png" alt="">
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--End Banner-->







  <!-- Todo: showcase-->
  <div class="showcase">
    <div class="container-fluid px-0">
      <div class="row  no-gutters">
        <div class="col-md-6 col-xs-12 half-content-left px-0 wow fadeInUp">
          <div class="showcase-item">
            <h3><span class="lang1"> New men collection</span></h3>
            <p><span class="lang2">Yes, this is our new collection, check it out our new arrivals.</span></p>
            <div id="carouselId" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carouselId" data-slide-to="0" class="active"></li>
                <li data-target="#carouselId" data-slide-to="1"></li>
              </ol>
              <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                  <div class="row">
                    <a href="#" class="product-item">
                      <div class="col-md-6 col-xs-6">
                        <img class="img-thumbnail border-0 " src="assets/img/itemlist/asset 10.jpeg" alt="">
                        <div class="text-card-item">
                          <p class="item-text">Havanna shirt</p>
                          <p class="item-text item-text-light">Clothing, shirt</p>
                        </div>
                        <div style="display:flex; justify-content: space-between;">
                          <div class="price-item">
                            <strike class="price-sale">19.99$</strike>
                            <span class="price">10.99$</span>
                          </div>
                          <a href="#"><i class="fas fa-shopping-cart cart-icon"></i></a>
                        </div>
                      </div>
                    </a>
                    <a href="#" class="product-item">
                      <div class="col-md-6 col-xs-6 ">
                        <img class="img-thumbnail border-0 " src="assets/img/itemlist/asset 10.jpeg" alt="">
                        <div class="text-card-item">
                          <p class="item-text">Havanna shirt</p>
                          <p class="item-text item-text-light">Clothing, shirt</p>
                        </div>
                        <div style="display:flex; justify-content: space-between;">
                          <div class="price-item">
                            <strike class="price-sale">19.99$</strike>
                            <span class="price">10.99$</span>
                          </div>
                          <a href="#"><i class="fas fa-shopping-cart cart-icon"></i></a>
                        </div>
                      </div>
                    </a>

                  </div>
                </div>
                <div class="carousel-item">
                  <div class="row">
                    <a href="#" class="product-item">
                      <div class="col-md-6 col-xs-6 ">
                        <img class="img-thumbnail border-0 " src="assets/img/itemlist/asset 10.jpeg" alt="">
                        <div class="text-card-item">
                          <p class="item-text">Havanna shirt</p>
                          <p class="item-text item-text-light">Clothing, shirt</p>
                        </div>
                        <div style="display:flex; justify-content: space-between;">
                          <div class="price-item">
                            <strike class="price-sale">19.99$</strike>
                            <span class="price">10.99$</span>
                          </div>
                          <a href="#"><i class="fas fa-shopping-cart cart-icon"></i></a>
                        </div>
                      </div>
                    </a>
                    <a href="#" class="product-item">
                      <div class="col-md-6 col-xs-6 ">
                        <img class="img-thumbnail border-0 " src="assets/img/itemlist/asset 10.jpeg" alt="">
                        <div class="text-card-item">
                          <p class="item-text">Havanna shirt</p>
                          <p class="item-text item-text-light">Clothing, shirt</p>
                        </div>
                        <div style="display:flex; justify-content: space-between;">
                          <div class="price-item">
                            <strike class="price-sale">19.99$</strike>
                            <span class="price">10.99$</span>
                          </div>
                          <a href="#"><i class="fas fa-shopping-cart cart-icon"></i></a>
                        </div>
                      </div>
                    </a>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> <!-- Hết cột 6 thứ 1-->
        <div class="col-md-6 col-xs-12  banner-right wow fadeInUp delay-0.5s">
          <div class="banner-text">
            <div class="banner-ct-area">
              <span class="text">Men's <br>Collection</span>
            </div>
          </div>
          <div class="half-img"></div>
        </div>
      </div> <!-- Hết row 1-->
      <div class="row no-gutters px-0">
        <!--Row 2-->
        <div class="col-md-6 col-xs-12 half-content-left wow fadeInRight">
          <div class="showcase-item">
            <h3><span class="lang1"> New shoes collection</span></h3>
            <p><span class="lang2">Yes, this is our new collection, check it out our new arrivals.</span></p>
            <div id="carouselId2" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carouselId2" data-slide-to="0" class="active"></li>
                <li data-target="#carouselId2" data-slide-to="1"></li>
              </ol>
              <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                  <div class="row px-0">
                    <a href="#" class="product-item">
                      <div class="col-md-6 col-xs-6 mx-auto">
                        <img class="img-thumbnail img-fluid border-0 " src="assets/img/itemlist/shoes1.jpeg" alt="">
                        <div class="text-card-item">
                          <p class="item-text">Havanna shirt</p>
                          <p class="item-text item-text-light">Clothing, shirt</p>
                        </div>
                        <div style="display:flex; justify-content: space-between;">
                          <div class="price-item">
                            <strike class="price-sale">19.99$</strike>
                            <span class="price">10.99$</span>
                          </div>
                          <a href="#"><i class="fas fa-shopping-cart cart-icon"></i></a>
                        </div>
                      </div>
                    </a>
                    <div class="col-md-6 col-xs-6 mx-auto">
                      <img class="img-thumbnail img-fluid border-0 " src="assets/img/itemlist/shoes2.jpeg" alt="">
                      <div class="text-card-item">
                        <p class="item-text">Havanna shirt</p>
                        <p class="item-text item-text-light">Clothing, shirt</p>
                      </div>
                      <div style="display:flex; justify-content: space-between;">
                        <div class="price-item">
                          <strike class="price-sale">19.99$</strike>
                          <span class="price">10.99$</span>
                        </div>
                        <a href="#"><i class="fas fa-shopping-cart cart-icon"></i></a>
                      </div>
                    </div>
                    </a>
                  </div>
                </div>
                <div class="carousel-item no-gutters px-0">
                  <div class="row  px-0">
                    <a href="#" class="product-item">
                      <div class="col-md-6 col-xs-6 mx-auto">
                        <img class="img-thumbnail img-fluid border-0 " src="assets/img/itemlist/asset 16.jpeg" alt="">
                        <div class="text-card-item">
                          <p class="item-text">Havanna shirt</p>
                          <p class="item-text item-text-light">Clothing, shirt</p>
                        </div>
                        <div style="display:flex; justify-content: space-between;">
                          <div class="price-item">
                            <strike class="price-sale">19.99$</strike>
                            <span class="price">10.99$</span>
                          </div>
                          <a href="#"><i class="fas fa-shopping-cart cart-icon"></i></a>
                        </div>
                      </div>
                    </a>
                    <a href="#" class="product-item">
                      <div class="col-md-6 col-xs-6 mx-auto">
                        <img class="img-thumbnail img-fluid border-0 " src="assets/img/itemlist/asset 16.jpeg" alt="">
                        <div class="text-card-item">
                          <p class="item-text">Havanna shirt</p>
                          <p class="item-text item-text-light">Clothing, shirt</p>
                        </div>
                        <div style="display:flex; justify-content: space-between;">
                          <div class="price-item">
                            <strike class="price-sale">19.99$</strike>
                            <span class="price">10.99$</span>
                          </div>
                          <a href="#"><i class="fas fa-shopping-cart cart-icon"></i></a>
                        </div>
                      </div>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> <!-- Hết cột 6 thứ 1-->
        <div class="col-md-6 col-xs-12 px-0 banner-right banner-right-order wow fadeInLeft delay-0.5s">
          <div class="banner-text">
            <div class="banner-ct-area">
              <span class="text">Shoes <br>Collection</span>
            </div>
          </div>
          <div class="half-img-order"></div>
        </div>
      </div> <!-- Hết row 2-->
    </div>
    <!--Hết Container -->
  </div>
  <!--Showcase end here-->

















  <!--Countdown Event-->
  <div class="container-fluid px-0 event">
    <div class="wrapper">
      <div class="event-content">
        <h4 class="event-text-sm"> Sale for this fall starts in</h4>
        <p class="event-text-md" id="countdownEvent"></p>
      </div>
      <div class="container event-img"></div>
    </div>
  </div>
  <!--End Countdown Event-->


  <!-- Feature products -->
  <div class="container-fluid filter">
    <div class="row no-gutters text-center">
      <div class="col-sm-12 col-md-12 col-lg-12 text-center">
        <h1 class="text-center" style="margin: 20px; font-family: 'Montserrat', sans-serif; font-size:30px; font-weight: bold;">Check
          out what's new</h1>
        <h3 class="text-area-light text-center text-dash" style="margin:10px;font-family: 'Raleway', sans-serif; font-size:24px; font-weight: 400">
          Latest of the trends we have to offer</h3>
        <div style="color:#696969;">&mdash;&mdash;&mdash;</div>
      </div>
    </div>
<!--    <div class="row filter-content justify-content-center no-gutters">
      <div class="filter-item col-xs">
        <a class="filter_btn" href="">All</a>
      </div>
      <div class="filter-item col-xs">
        <a class="filter_btn" href="">Category 1</a>
      </div>
      <div class="filter-item col-xs">
        <a class="filter_btn" href="">Category 1</a>
      </div>
      <div class="filter-item col-xs">
        <a class="filter_btn" href="">Category 1</a>
      </div>
    </div>-->
   <div class="item-list-view">
      <div class="container item-list">
        <div class="row" id="data">
<!--          <a href="index.html" class="product-item">
            <div class="col-md-3 col-xs-6 mx-auto">
              <img class="img-thumbnail img-fluid border-0 no-gutters " src="assets/img/itemlist/asset 10.jpeg" alt="">
              <div class="text-card-item">
                <p class="item-text">Havanna shirt</p>
                <p class="item-text item-text-light">Clothing, shirt</p>
              </div>
              <div style="display:flex; justify-content: space-between;">
                <div class="price-item">
                  <strike class="price-sale">19.99$</strike>
                  <span class="price">10.99$</span>
                </div>
                <a href="#"><i class="fas fa-shopping-cart cart-icon"></i></a>
              </div>
            </div>
          </a>
          <a href="index.html" class="product-item">
            <div class="col-md-3 col-xs-6 mx-auto">
              <img class="img-thumbnail img-fluid border-0 no-gutters " src="assets/img/itemlist/asset 13.jpeg" alt="">
              <div class="text-card-item">
                <p class="item-text">Havanna shirt</p>
                <p class="item-text item-text-light">Clothing, shirt</p>
              </div>
              <div style="display:flex; justify-content: space-between;">
                <div class="price-item">
                  <strike class="price-sale">19.99$</strike>
                  <span class="price">10.99$</span>
                </div>
                <a href="#"><i class="fas fa-shopping-cart cart-icon"></i></a>
              </div>
            </div>
          </a>

          <a href="index.html" class="product-item">
            <div class="col-md-3 col-xs-6 mx-auto">
              <img class="img-thumbnail img-fluid border-0 no-gutters " src="assets/img/itemlist/asset 1.jpeg" alt="">
              <div class="text-card-item">
                <p class="item-text">Havanna shirt</p>
                <p class="item-text item-text-light">Clothing, shirt</p>
              </div>
              <div style="display:flex; justify-content: space-between;">
                <div class="price-item">
                  <strike class="price-sale">19.99$</strike>
                  <span class="price">10.99$</span>
                </div>
                <a href="#"><i class="fas fa-shopping-cart cart-icon"></i></a>
              </div>
            </div>
          </a>
          <a href="index.html" class="product-item">
            <div class="col-md-3 col-xs-6 mx-auto">
              <img class="img-thumbnail img-fluid border-0 no-gutters " src="assets/img/itemlist/asset 2.jpeg" alt="">
              <div class="text-card-item">
                <p class="item-text">Havanna shirt</p>
                <p class="item-text item-text-light">Clothing, shirt</p>
              </div>
              <div style="display:flex; justify-content: space-between;">
                <div class="price-item">
                  <strike class="price-sale">19.99$</strike>
                  <span class="price">10.99$</span>
                </div>
                <a href="#"><i class="fas fa-shopping-cart cart-icon"></i></a>
              </div>
            </div>
          </a>
        </div>
        End row
        <div class="row">
          <a href="index.html" class="product-item">
            <div class="col-md-3 col-xs-6 mx-auto">
              <img class="img-thumbnail img-fluid border-0 no-gutters " src="assets/img/itemlist/asset 15.jpeg" alt="">
              <div class="text-card-item">
                <p class="item-text">Havanna shirt</p>
                <p class="item-text item-text-light">Clothing, shirt</p>
              </div>
              <div style="display:flex; justify-content: space-between;">
                <div class="price-item">
                  <strike class="price-sale">19.99$</strike>
                  <span class="price">10.99$</span>
                </div>
                <a href="#"><i class="fas fa-shopping-cart cart-icon"></i></a>
              </div>
            </div>
          </a>
          <a href="index.html" class="product-item">
            <div class="col-md-3 col-xs-6 mx-auto">
              <img class="img-thumbnail img-fluid border-0 no-gutters " src="assets/img/itemlist/asset 18.jpeg" alt="">
              <div class="text-card-item">
                <p class="item-text">Havanna shirt</p>
                <p class="item-text item-text-light">Clothing, shirt</p>
              </div>
              <div style="display:flex; justify-content: space-between;">
                <div class="price-item">
                  <strike class="price-sale">19.99$</strike>
                  <span class="price">10.99$</span>
                </div>
                <a href="#"><i class="fas fa-shopping-cart cart-icon"></i></a>
              </div>
            </div>
          </a>

          <a href="index.html" class="product-item">
            <div class="col-md-3 col-xs-6 mx-auto">
              <img class="img-thumbnail img-fluid border-0 no-gutters " src="assets/img/itemlist/asset 19.jpeg" alt="">
              <div class="text-card-item">
                <p class="item-text">Havanna shirt</p>
                <p class="item-text item-text-light">Clothing, shirt</p>
              </div>
              <div style="display:flex; justify-content: space-between;">
                <div class="price-item">
                  <strike class="price-sale">19.99$</strike>
                  <span class="price">10.99$</span>
                </div>
                <a href="#"><i class="fas fa-shopping-cart cart-icon"></i></a>
              </div>
            </div>
          </a>
          <a href="index.html" class="product-item">
            <div class="col-md-3 col-xs-6 mx-auto">
              <img class="img-thumbnail img-fluid border-0 no-gutters " src="assets/img/itemlist/asset 3.jpeg" alt="">
              <div class="text-card-item">
                <p class="item-text">Havanna shirt</p>
                <p class="item-text item-text-light">Clothing, shirt</p>
              </div>
              <div style="display:flex; justify-content: space-between;">
                <div class="price-item">
                  <strike class="price-sale">19.99$</strike>
                  <span class="price">10.99$</span>
                </div>
                <a href="#"><i class="fas fa-shopping-cart cart-icon"></i></a>
              </div>
            </div>
          </a>-->
        </div>
        <!--End row-->
        <div style="text-align: center;" class="m-4"><a href="assets/module/product.php" class="submit-form p-3" style="text-align: center; text-decoration: none;">Want more ?</a></div>    
      </div>
      <!--End container-->
    
    </div>
  </div> <!-- End feature products -->


  <!-- Shipping banner -->
  <div class="section">
    <div class="footer-top">
      <div class="row no-gutters">
        <div class="col-sm-12 col-md-12 col-lg-12">
          <div class="homepage-bar">
            <div class="container">
              <div class="row">
                <div class="col-sm-4">
                  <i class="fas fa-shipping-fast" style="font-size:30px; color:aliceblue; margin-top: 20px;"></i>
                  <div>
                    <div class="text-area">
                      <h3 class="text-area-bold">Free shipping & return</h3>
                      <p class="text-area-light">Free shipping on all orders over $99.</p>
                    </div>
                  </div>
                </div>
                <div class="col-sm-4">
                  <i class="fas fa-dollar-sign" style="font-size:30px; color:aliceblue; margin-top: 20px;"></i>
                  <div>
                    <div class="text-area">
                      <h3 class="text-area-bold">MONEY BACK GUARANTEE</h3>
                      <p class="text-area-light">100% money back guarantee.</p>
                    </div>
                  </div>
                </div>
                <div class="col-sm-4">
                  <i class="fas fa-headset" style="font-size:30px; color:aliceblue; margin-top: 20px;"></i>
                  <div>
                    <div class="text-area">
                      <h3 class="text-area-bold">ONLINE SUPPORT 24/7</h3>
                      <p class="text-area-light">Customer always right </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> <!-- End shipping-->



  <!-- Subcribe banner -->
  <div class="container-fluid px-0">
    <div class="subscribe-wrap">
      <div class="contaner-fluid  no-gutters">
        <div class="container">
          <div class="row no-gutters"></div>
          <div class="subscribe no-gutters ">
            <div class="row justify-content-end">
              <div class="col-xs-12 col-sm-6  ">
                <div class="sub-text">
                  <h1><span>Subscribe to get discount coupons & new offers!</span></h1>
                  <p style=" font-family: 'Raleway', sans-serif;
                      font-size: 18px;
                      line-height: 24px;
                      font-weight: 400; padding: 10px 0;">Lorem
                    ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt erat
                    volutpat.
                    volutpat.</p>
                  <input type="text" class="input-form" placeholder="Enter your email...">
                  <input type="submit" value="Subscribe" class="submit-form" id="submit">
                  <div class="social">
                    <span style=" font-weight: 700;
                        font-family: 'Montserrat', sans-serif;
                        font-size: 20px;">Follow
                      us on</span>
                    <div class="social-icon-group">
                      <a class="social-icon" href="index.html"><i class="fab fa-twitter"></i></a>
                      <a class="social-icon" href="index.html"><i style="width: 24px !important; text-align: center;"
                          class="fab fa-facebook-f"></i></a>
                      <a class="social-icon" href="index.html"><i class="fab fa-youtube"></i></a>
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
  <!--End subcribe banner-->





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
          <img src="assets/img/logo-payment.png" alt="">
        </div>
      </div>
    </div>
  </footer>
  <!--End footer-->




  <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fas fa-angle-up" style="margin:0; padding: 0; width: 34px;"></i></button>
  <script src="assets/js/jquery-3.3.1.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src='https://cdn.rawgit.com/matthieua/WOW/1.0.1/dist/wow.min.js'></script>
  <script>
    //  Time counter
    const countDownDate = new Date("Jan 10, 2019 20:00:00").getTime();
    let countSecond = setInterval(function () {
      let now = new Date().getTime();
      let distance = countDownDate - now;
      let days = Math.floor(distance / (1000 * 60 * 60 * 24));
      let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      let seconds = Math.floor((distance % (1000 * 60)) / 1000);
      document.getElementById("countdownEvent").innerHTML = days + "d " + hours + "h " +
        minutes + "m " + seconds + "s ";
      if (distance < 0) {
        clearInterval(x);
        document.getElementById("countdownEvent").innerHTML = "EXPIRED";
      }
    }, 1000);
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
    new WOW().init();
    // call ajax
            var ajax = new XMLHttpRequest();
            var method = "GET";
            var url = "./assets/common/display.php";
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
                        var id = data[i].PRO_ID;
                        var img = data[i].PRO_IMG;
                        var name = data[i].PRO_NAME;
                        var price = data[i].PRO_PRICE;
                        var cate = data[i].CATE_NAME;
                        var description = data[i].PRO_DESCRIPTION;
                        var season = data[i].PRO_SEASON;
                        var gender = data[i].PRO_GENDER;

                        html += `                       <a href="index.html" class="product-item">
            <div class="col-md-3 col-xs-6 mx-auto">
              <img class="img-thumbnail img-fluid border-0 no-gutters " src="${img}" alt="">
              <div class="text-card-item">
                <p class="item-text">${name}</p>
                <p class="item-text item-text-light">${cate}</p>
              </div>
              <div style="display:flex; justify-content: space-between;">
                <div class="price-item">
                  <strike class="price-sale">19.99$</strike>
                  <span class="price">${price}</span>
                </div>
                <a href="#"><i class="fas fa-shopping-cart cart-icon"></i></a>
              </div>
            </div>
          </a>
                                                                        
                                                `
                    }
                    document.getElementById("data").innerHTML = html;
                    
                }
            }
  </script>
</body>

</html>