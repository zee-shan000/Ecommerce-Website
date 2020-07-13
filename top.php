    <?php
    require ('connection.inc.php');
    require ('functions.inc.php');
    require ('add_to_cart.inc.php');
    $cat_res=mysqli_query($con, "select * from categories where status=1 order by categories asc");
    $cat_arr=array();
    while ($row=mysqli_fetch_assoc($cat_res)){
    $cat_arr[]=$row;
    }

    $obj=new add_to_cart();
    $totalProduct=$obj->totalProduct();
    ?>
    <!doctype html>
    <html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Panda</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/owl.carousel.min.css">
        <link rel="stylesheet" href="css/owl.theme.default.min.css">
        <link rel="stylesheet" href="css/core.css">
        <link rel="stylesheet" href="css/shortcode/shortcodes.css">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="css/responsive.css">
        <link rel="stylesheet" href="css/custom.css">
        <script src="js/vendor/modernizr-3.5.0.min.js"></script>
    </head>

    <body>
        <!-- Body main wrapper start -->
        <div class="zeeshan">Zeeshan Siddique</div>
        <div class="wrapper">
            <!-- Start Header Style -->
            <header id="htc__header" class="htc__header__area header--one">
                
                <div id="sticky-header-with-topbar" class="mainmenu__wrap sticky__header">
                    <div class="container">
                        <div class="row">
                            <div class="menumenu__container clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5"> 
                                    <div class="logo">
                                        <a href="index.php"><img src="images/logo/logo.png" alt="logo images" class="img-fluid logoo"></a>
                                    </div>
                                </div>
                                <div class="col-md-7 col-lg-8 col-sm-5 col-xs-3">
                                    <nav class="main__menu__nav hidden-xs hidden-sm">
                                        <ul class="main__menu">
                                            <li class="drop"><a href="index.php">Home</a></li>
                                            <?php
                                            foreach($cat_arr as $list){
                                                ?>
                                                <li><a href="categories.php?id=<?php echo $list['id']?>"><?php echo $list['categories']?></a></li>
                                                <?php
                                            }
                                            ?>
                                            <li><a href="contact.php">Contact</a></li>
                                        </ul>
                                    </nav>

                                    <div class="mobile-menu clearfix visible-xs visible-sm">
                                        <nav id="mobile_dropdown">
                                            <ul>
                                                <li><a href="index.php">Home</a></li>
                                                <?php
                                            foreach($cat_arr as $list){
                                                ?>
                                                <li><a href="categories.php?id=<?php echo $list['id']?>"><?php echo $list['categories']?></a></li>
                                                <?php
                                            }
                                            ?>
                                                <li><a href="contact.php">Contact</a></li>
                                            </ul>
                                        </nav>
                                    </div>  
                                </div>
                                <div class="col-md-3 col-lg-2 col-sm-4 col-xs-4">
                                    <div class="header__right">
                                        <div class="header__account">
                                            <?php if(isset($_SESSION['USER_LOGIN'])){
                                                 echo '<a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i></a>';
                                            }else{
                                                echo '<a href="login.php"><i class="fa fa-user" aria-hidden="true"></i></a>';
                                            }
                                            ?>
                                        </div>
                                         <div class="header__search search search__open">
                                         <div class=" header_account order">
                                           <a href="my_order.php"><i class="icon-magnifier icons" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                        <div class="htc__shopping__cart">
                                            <a class="cart__menu" href="#"><i class="icon-handbag icons"></i></a>
                                            <a href="cart.php"><span class="htc__qua"><?php echo $totalProduct?></span></a>
                                        </div>
                                        <h3 class="line">|</h3>
                                        <div class="header__order">
                                    <a href="my_order.php"><i class="fa fa-cart-arrow-down fa-2x"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mobile-menu-area"></div>
                    </div>
                </div>
            </header>

            <div class="body__overlay"></div>
            <div class="offset__wrapper">
            <div class="search__area">
            <div class="container">
            <div class="row">
            <div class="col-md-12">
            <div class="search__inner">
            <form action="search.php" method="get">
            <input placeholder="Search" type="text" name="str">
            <button type="submit"></button>
            </form>
            <div class="search__close__btn">
            <span class="search__close__btn__icon"><i class="zmdi zmdi-close"></i></span>
            </div>
            </div>
            </div>
            </div>
            </div>
            </div>
            </div>