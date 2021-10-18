<?php
   ob_start();
   include 'lib/session.php';
   Session::init();
   ?>
<?php
   include 'lib/database.php';
   include 'helpers/format.php';
   
   spl_autoload_register(function($class){
       include_once "classes/".$class.".php";
   });
       
   
   $db = new Database();
   $fm = new Format();
   $ct = new cart();
   $us = new user();
   $br = new brand();
   $cat = new category();
   $cs = new customer();
   $product = new product();
   $khachhang= new khachhang();      
   ?>
<?php
   header("Cache-Control: no-cache, must-revalidate");
   header("Pragma: no-cache"); 
   header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
   header("Cache-Control: max-age=2592000");
   
   ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="css/index12.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/body123.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/menu.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/code213.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/phonedt12.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/btn12.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/boloc12.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/codecss.css" rel="stylesheet" type="text/css" media="all" />
    <script src="js/jquerymain.js"></script>
    <link rel="stylesheet" href="css/stylelogin1.css">
    <link href="css/stype1233.css" rel="stylesheet" type="text/css" media="all" />
    <link href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" rel="stylesheet" type="text/css" media="all" />
    <!-- <script src="js.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
        integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
    $(function() {
        $("#datepicker").datepicker();
    });
    </script>`

    <title>Document</title>
    <style>
    .navbar-light .navbar-nav .nav-link {
        color: #000;
    }
    </style>
</head>

<body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js"></script>
    <div class></div>
    <div class="super_container">
        <!-- Header -->
        <header class="header">
            <!-- Top Bar -->
            <div class="top_bar">
                <div class="container">
                    <div class="row">
                        <div class="col d-flex flex-row">
                            <div class="top_bar_contact_item">
                                <div class="top_bar_icon"><img
                                        src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560918577/phone.png"
                                        alt=""></div>
                                +91 9823 132 111
                            </div>
                            <div class="top_bar_contact_item">
                                <div class="top_bar_icon"><img
                                        src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560918597/mail.png"
                                        alt=""></div>
                                <a href="mailto:fastsales@gmail.com">contact@bbbootstrap.com</a>
                            </div>
                            <div class="top_bar_content ml-auto">
                                <div class="top_bar_menu">
                                    <ul class="standard_dropdown top_bar_dropdown">
                                        <li>
                                            <a href="#">English<i class="fas fa-chevron-down"></i></a>
                                            <ul>
                                                <li><a href="#">Italian</a></li>
                                                <li><a href="#">Spanish</a></li>
                                                <li><a href="#">Japanese</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">$ US dollar<i class="fas fa-chevron-down"></i></a>
                                            <ul>
                                                <li><a href="#">EUR Euro</a></li>
                                                <li><a href="#">GBP British Pound</a></li>
                                                <li><a href="#">JPY Japanese Yen</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <div class="top_bar_user">
                                    <div class="user_icon"><img
                                            src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560918647/user.svg"
                                            alt=""></div>

                                    <?php 
                                 if(isset($_GET['customer_id'])){
                                     $customer_id = $_GET['customer_id'];
                                    //  $delCart = $ct->del_all_data_cart();
                                     $delCompare = $ct->del_compare($customer_id);
                                     Session::destroy();
                                 }
                                 ?>

                                    <?php
                                    $login_check = Session::get('customer_login'); 
                                    if($login_check==false){
                                        echo '<div><a href="dangki.php">Đăng kí</a></div><div><a href="login1.php">Đăng nhập</a></div>';
                                    }else{
                                       //  echo '<div><a href="?customer_id='.Session::get('customer_id').'">Đăng xuất</a></div><div></div> ';
                                       echo '<div class="btn-group" role="group">
                                       <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                         Xin chào 
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                        <li><a class="dropdown-item" href="profile.php">Tài khoản</a></li>
                                        <li><a class="dropdown-item"
                                                href="?customer_id='.Session::get('customer_id').'">Đăng xuất</a></li>
                                    </ul>
                                </div>';
                                }
                                ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Header Main -->
            <div class="header_main">
                <div class="container">
                    <div class="row">
                        <!-- Logo -->
                        <div class="col-lg-4 col-sm-3 col-3 order-1">
                            <div class="logo_container">
                                <div class="logo"><a href="index.php"><img style="height:100px;" src="images/login1.png"
                                            alt=""></a></div>
                            </div>
                        </div>
                        <!-- Search -->
                        <div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
                            <div class="header_search">
                                <div class="header_search_content">
                                    <div class="header_search_form_container">
                                        <form action="#" class="header_search_form clearfix">
                                            <input type="search" required="required" class="header_search_input"
                                                placeholder="Search for products...">
                                            <div class="custom_dropdown" style="display: none;">
                                                <div class="custom_dropdown_list">
                                                    <span class="custom_dropdown_placeholder clc">All Categories</span>
                                                    <i class="fas fa-chevron-down"></i>
                                                    <ul class="custom_list clc">
                                                        <li><a class="clc" href="#">All Categories</a></li>
                                                        <li><a class="clc" href="#">Computers</a></li>
                                                        <li><a class="clc" href="#">Laptops</a></li>
                                                        <li><a class="clc" href="#">Cameras</a></li>
                                                        <li><a class="clc" href="#">Hardware</a></li>
                                                        <li><a class="clc" href="#">Smartphones</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <button type="submit" class="header_search_button trans_300"
                                                value="Submit"><img
                                                    src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560918770/search.png"
                                                    alt=""></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Wishlist -->
                        <div class="col-lg-2 col-9 order-lg-3 order-2 text-lg-left text-right">
                            <div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
                                <!-- Cart -->
                                <div class="cart">
                                    <div class="cart_container d-flex flex-row align-items-center justify-content-end">
                                        <div class="cart_icon">

                                            <img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560918704/cart.png"
                                                alt="">

                                            <div class="cart_count">
                                                <?php
                                       $check_cart = $ct->check_cart();
                                       if($check_cart){
                                          $sum = Session::get("sum");
                                          $qty = Session::get("qty"); ?>
                                                <span><?php echo $qty?></span>
                                            </div><?php }else{
                                             echo '0';
                                          }?>
                                        </div>

                                    </div>
                                    <div class="cart_content">
                                        <div class="cart_text"><a href="cart.php?id=live">Cart</a></div>
                                        <div class="cart_price">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <!-- <?php
                                             $check_cart = $ct->check_cart();
                                             if($check_cart){
                                                $sum = Session::get("sum");
                                                $qty = Session::get("qty");
                                             echo "<br>".'Tổng :'.$fm->format_currency($sum).' '.'đ'.'-';
                                             }else{
                                             echo 'Empty';
                                          }

                                       ?> -->

    </div>
    <!-- Main Navigation -->
    <nav class="main_nav">
        <div class="container">
            <div class="row">
                <div class="col " style="padding:0px;">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item active">
                                    <a class="nav-link" href="index.php">Trang chủ</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Dòng điện thoại
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <?php
                                          $cate = $cat->show_category();
                                          if($cate){
                                          while($result_new = $cate->fetch_assoc()){
                                          ?>
                                        <a class="dropdown-item"
                                            href="productbycat.php?catid=<?php echo $result_new['catId'] ?>"><?php echo $result_new['catName'] ?></a>
                                        <?php
                                          }
                                          } 
                                          ?>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Sản phẩm
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <?php
                                          $brand = $br->show_brand_home();
                                          if($brand){
                                          while($result_new = $brand->fetch_assoc()){
                                          
                                          ?>
                                        <a class="dropdown-item"
                                            href="topbrands.php?brandid=<?php echo $result_new['brandId'] ?>"><?php echo $result_new['brandName'] ?></a>
                                        <?php
                                          }
                                          } 
                                          ?>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="cart.php">Giỏ hàng</a>
                                </li>
                                <!-- <?php
                                    $login_check = Session::get('customer_login'); 
                                    if($login_check==false){
                                    	echo '';
                                    }else{
                                    	echo '<li class="nav-item"><a class="nav-link" href="profile.php">Tài khoản</a></li>';
                                    }
                                     ?> -->
                                <?php
                                    $login_check = Session::get('customer_login'); 
                                    if($login_check){
                                    	echo '<li class="nav-item"><a class="nav-link" href="compare.php">So sánh</a></li>';
                                    }
                                    	
                                    ?>
                                <?php
                                    $login_check = Session::get('customer_login'); 
                                    if($login_check){
                                    	echo '<li class="nav-item"><a class="nav-link" href="wishlist.php">Yêu thích</a></li>';
                                    }		
                                    ?>
                                <?php
                                    $login_check = Session::get('customer_login'); 
                                    if($login_check==false){
                                    	echo '';
                                    }else{
                                    	echo '<li class="nav-item"><a class="nav-link" href="orderdetails.php">Hàng hóa</a></li>';
                                    }
                                     ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="contact.php">Liên hệ</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </nav>



    <!-- Menu -->
    </header>
    </div>
</body>

</html>