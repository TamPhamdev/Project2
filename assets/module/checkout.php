<?php
include_once '../../assets/common/connect.php';
session_start();



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
  
  <script type="text/javascript">
       var baseurl = "/Ahihi_final/assets/common/";
       
        function clicksubmit(){
            return confirm('Are you sure you want to buy?');
            
        }
  </script>
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



  <div class="title-level col-xs-6">
    <div class="container">
      <div class="row align-item-center ">
        <div class="col-md-8 col-xs-6">
          <h2 style="font-family: 'Montserrat';font-weight: 700" ;>Shop</h2>
        </div>
        <div class="col-md-4 title-bar mr-auto">
          <span class="home-item"><a href="../../index.php">Home</a></span>
          <span class="separator">></span>
          <span class="current-item">Checkout</span>
        </div>
      </div>
    </div>
  </div>


  <div class="wrapper-checkout">
    <div class="container member-login">
      <div class="row">
        <div class="col-md-12 col-xs-6">
          <div id="accordion">
            <div class="card">
              <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                  <a class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                    aria-controls="collapseOne">
                    Are you a member ? Click here to <b>login</b>
                  </a>
                </h5>
              </div>

              <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body">
                  <form action="" class="form-login">
                    <p> If you have shopped with us before, please enter your details below. If you are a new customer,
                      please proceed to the Billing & Shipping section.</p>
                    <div class="container">
                      <div class="row">
                        <div class="col-md-6">
                          <label for="username">Email or Username&nbsp;<i class="far fa-check-circle"></i></label>
                          <input type="email">
                        </div>
                        <div class="col-md-6">
                          <label for="password">Password&nbsp;<i class="far fa-check-circle"></i></label><br>
                          <input type="password">
                        </div>
                      </div>
                      <button type="submit" class="submit">Login</button>
                      <span><a href="#" style="text-decoration: none; color: #eb5541; font: 400 16px/30px 'Raleway'; padding-left: 20px;">Lost
                          your password?</a></span>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
      <!--Toai-->
    <div class="container">
          <div class="row">
            <div class="col-md-12">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col" class="">Product</th>
                    <th scope="col" class="">Total</th>
                  </tr>
                </thead>
      <?php 
      
            if(isset($_SESSION["shopping_cart"]))
            {
                $total = 0;
                $cart_items = 0;
                foreach ($_SESSION["shopping_cart"] as $k => $cart_itm)
                {
                   $product_id = $cart_itm["item_id"];
                   $results = $cn->query("SELECT * FROM product WHERE PRO_ID ='$product_id'");
                   $obj = $results->fetch_object();

                   $html = '<tbody>
                            <tr>
                              <td class="product-name">'.$obj->PRO_NAME.' x '.$cart_itm["item_amount"].'</td>
                              <td class="product-price">'.$cart_itm["item_price"].'$</td>
                            </tr>';
                   
                    $subtotal = ($cart_itm["item_amount"] * $cart_itm["item_price"]);
                    
                    $total = ($total + $subtotal);

                    $cart_items++;
                    


                    echo $html;
                }
                    

                echo ' <tr>
                          <td scope="row">Total</th>';
                echo '<td colspan="2" class="total-price">'.number_format($total).'$</td>
                        </tr>
                      </tbody>';

                
            }else{
                echo 'Giỏ hàng trống';
            }       
          
            
//            echo $data;
    ?>
                
    </table></div></div></div>
        
    <div class="container field-container">
      <div class="row">
        <div class="col-md-6">
          <h3>Billing details</h3>
          <div class="bill-fill-info">
              <form action="../common/addorder.php" name="" method="post">
              <?php 
                  include '../common/addorder.php';
              ?>    
              <div class="container-fluid px-0">
                <div class="row">
                  <div class="col-md-6">
                    <label for="firstname">First Name &nbsp;<i class="far fa-check-circle"></i></label>

                    <input type="text" name="f_name" required>
                  </div>
                  <div class="col-md-6">
                    <label for="firstname">Last Name &nbsp;<i class="far fa-check-circle"></i></label>
                    <input type="text" name="l_name" required>
                  </div>
                </div>
                <label for="firstname">Company Name</label>
                <input type="text" name="c_name">
                <label for="firstname">Address &nbsp;<i class="far fa-check-circle"></i></label>
                <input type="text" name="address" required>
                <label for="firstname">Phone number &nbsp;<i class="far fa-check-circle"></i></label><br>
                <input type="text" pattern="[0-9]*" name="phone" required> <br>
                <label for="firstname">Email &nbsp;<i class="far fa-check-circle"></i></label>
                <input type="email" name="email" required>
                
                <input type="hidden" name="hidden_total" value="" />
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="" id="" value="checkedValue" data-target="#collapseCreateAccount"
                      aria-controls="collapseOne" data-toggle="collapse">
                    Create an account?
                  </label>
                  <div id="collapseCreateAccount" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                    <label for="firstname">Create account password <i class="far fa-check-circle"></i> </label>
                    <input type="password" placeholder="Password">
                  </div>
                    

                </div>
                <div class="text-right mt-4">
                    <button type="submit" name="btnbuy"  class="btn-order">Order</button>
                </div>
                  
              </div>
                  
                       
            </form>
          </div>
        </div>
        <div class="col-md-6">
          <h3>Additional information</h3>
          <div class="bill-fill-info">
            <form action="#">
              <label for="">Order notes (optional)</label>
              <input type="text" style="width:100%; height: 120px;">
            </form>
          </div>
<!--          <button type="submit" name="btnMua" id="btnMua" class="btn-order" style="bottom: 0px;position:absolute;right:0px;">Order</button>-->
        </div>
          
      </div>
    </div>
  </div>










  <footer>
<!--    Footer -->
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
  <script type="text/javascript">
   
   $(document).ready(function () {
       var get_total = $(".table .total-price").text();
       $('input[name=hidden_total]').val(parseInt(get_total));
   })
      
   </script>
</body>



</html>

