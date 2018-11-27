<?php
include_once '../common/connect.php';

?>
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
         <link href='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css' rel='stylesheet' type='text/css'>
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
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" aria-haspopup="true"
                               aria-expanded="false">
                                Shop
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="product-detail.html">Clothes</a>
                                <a class="dropdown-item" href="product-detail.html">Shoes</a>
                                <a class="dropdown-item" href="product-detail.html">Something else here</a>
                            </div>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="">About</a></li>
                        <!-- ul here -->
                        <li class="nav-item"><a class="nav-link" href="cart.html"><i class="fas fa-shopping-bag"></i></a></li>
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
                        <h2 style="font-family: 'Montserrat';font-weight: 700" ;>Shop</h2>
                    </div>
                    <div class="col-md-4 title-bar mr-auto">
                        <span class="home-item"><a href="../../index.html">Home</a></span>
                        <span class="separator">></span>
                        <span class="current-item">Products</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="wrapper-product">
            <div class="container-fluid ">
                <div class="container entry-container mx-auto">
                    <div class="row" style="padding-bottom: 45px;">
                        <div class="col-md-3">
                            <label class="search-area">
                                <input type="text" placeholder="Search products" name="search_text" class="search-field" id="search_text">
                                <button type="submit" class="search-submit form"> <i class="fas fa-search " aria-hidden="true"
                                                                                     aria-required="true"></i></button>
                            </label>

                        </div>
                        <div class="col-md-9 justify-content-between" style="display:flex;">
                            <form style="display: inline;" action="" method="get" role="button" aria-expanded="true">
                                <select name="orderby" id="" class="select-form sort_by_price">
                                    <option value="menu-order" selected="selected">Default ordering</option>
                                    <option value="hight_price" class="hight_price"> Sort by price: Hight to low</option>
                                    <option value="low_price" class="low_price">Sort by price: Low to hight</option>
                                </select>
                            </form>
                            <p class="result-count">Showing <strong>1-9 </strong>of <strong>10</strong> </p>
                        </div>
                    </div>
                    <!--End row-->
                    <div class="row">
                        <div class="col-md-3 column-left product-category">
                            <h3>Price</h3>
                            <input type="hidden" id="hidden_minimum_price" value="0" />
                            <input type="hidden" id="hidden_maximum_price" value="300" />
                            <p id="price_show">10 - 300</p>
                                 <div id="price_range"></div>

                            <?php
                            $query = "SELECT DISTINCT CATE_NAME"
                             . " FROM category"
                            // . " WHERE product.CATE_ID = category.CATE_ID"
                             . " ORDER BY CATE_ID  DESC ";
                            $statement = $connect->prepare($query);
                            $statement->execute();
                            $result = $statement->fetchAll();
                            foreach ($result as $row) {
                                ?>
                                <div class="list-group-item checkbox">
                                    <label><input type="checkbox" class="common_selector category" value="<?php echo $row['CATE_NAME']; ?>"  > <?php echo $row['CATE_NAME']; ?></label>
                                </div>
                                <?php
                            }
                            ?>                      
                            <h3 class="widget-title">Top Rated Products</h3>
                            <ul class="list-group-flush">
                                <li class="list-group-item d-flex align-items-center justify-content-between">
                                    <a href=""><img src="../img/itemlist/asset 3.jpeg" alt="" class="img-list-group"></a>
                                    <span>Fantasy pants</span>
                                    <span>$9.99</span>
                                </li>
                                <ul class="list-group-flush">
                                    <li class="list-group-item d-flex align-items-center justify-content-between">
                                        <a href=""><img src="../img/itemlist/asset 4.jpeg" alt="" class="img-list-group"></a>
                                        <span>Striped Watch</span>
                                        <span>$19.99</span>
                                    </li>
                                    <ul class="list-group-flush">
                                        <li class="list-group-item d-flex align-items-center justify-content-between">
                                            <a href=""><img src="../img/itemlist/asset 2.jpeg" alt="" class="img-list-group"></a>
                                            <span>black glass</span>
                                            <span>$20.99</span>
                                        </li>
                                        <ul class="list-group-flush">
                                            <li class="list-group-item d-flex align-items-center justify-content-between">
                                                <a href=""><img src="../img/itemlist/asset 13.jpeg" alt="" class="img-list-group"></a>
                                                <span>Simple hat</span>
                                                <span>$15.99</span>
                                            </li>
                                        </ul>
                                        </div>    
                                        <div class="col-md-9 column-right">
                                            <div class="row filter_data" id="pagination_data">
                                            </div>
                                           
                                        </div>
                                        </div>

                                        </div>
                                        </div>
                                        <!--Container-->
                                        </div>
                                        <!--wrapper container-->
                                        </div>
                                        <!--End products-->



                                        <!--Relate products-->












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
                                        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
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


//                                            $(document).ready(function () {
//                                                load_data();
//                                                function load_data(page)
//                                                {
//                                                    $.ajax({
//                                                        url: "data.filter.php",
//                                                        method: "POST",
//                                                        data: {page: page},
//                                                        success: function (data) {
//                                                            $('.filter_data').html(data);
//                                                        }
//                                                    })
//                                                }
//                                                $(document).on('click', '.pagination_link', function () {
//                                                    var page = $(this).attr("id");
//                                                    load_data(page);
//                                                });
//                                            });
                                        
$(document).ready(function(){

    filter_data();

    function filter_data(page)
    { 
        $('.filter_data').html('<div id="loading" style="width:100%;" ></div>');
        var action = 'data.filter';
        var minimum_price = $('#hidden_minimum_price').val();
        var maximum_price = $('#hidden_maximum_price').val();
        var hight_price =  get_filter('hight_price');
        var low_price = get_filter('low_price');;
        var category = get_filter('category');
        var search_text = $('#search_text').val();
        $.ajax({
            url:"data.filter.php",
            method:"POST",
            data:{page:page, action:action, minimum_price:minimum_price, maximum_price:maximum_price, category:category, hight_price:hight_price,low_price:low_price,search_text:search_text},
            success:function(data){
                $('.filter_data').html(data);
            }
        });
    }

    function get_filter(class_name)
    {
        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
        });
        return filter;
    }
   
    $('.common_selector').click(function(){
        filter_data();
    });
    $('.sort_by_price').on('change',function(){
        filter_data();
    });
    $('#price_range').slider({
        range:true,
        min:5,
        max:300,
        values:[10, 300],
        step:5,
        stop:function(event, ui)
        {
            $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
            $('#hidden_minimum_price').val(ui.values[0]);
            $('#hidden_maximum_price').val(ui.values[1]);
            filter_data();
        }
    });
    $(document).on('click', '.pagination_link', function () {
         var page = $(this).attr("id");
            filter_data(page);
     });
    $('#search_text').keyup(function(){
       var txt = $(this).val();
       if(txt !== '')
       {
            filter_data();
       } else 
       {
          return false;
       }
    });
});

                                        </script>
                                        </body>

                                        </html>