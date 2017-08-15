<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Rex : Home</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/icon" href="assets/images/favicon.ico"/>
    <!-- Font Awesome -->
    <link href="assets/css/font-awesome.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!-- Slick slider -->
    <link rel="stylesheet" type="text/css" href="assets/css/slick.css"/>
    <!-- Fancybox slider -->
    <link rel="stylesheet" href="assets/css/jquery.fancybox.css" type="text/css" media="screen" />
    <!-- Animate css -->
    <link rel="stylesheet" type="text/css" href="assets/css/animate.css"/>
    <!-- Theme color -->
    <link id="switcher" href="assets/css/theme-color/default.css" rel="stylesheet">

    <!-- Main Style -->
    <link href="style.css" rel="stylesheet">

    <!-- Fonts -->
    <!-- Open Sans for body font -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <!-- Raleway for Title -->
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    <!-- Pacifico for 404 page   -->
    <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <script src="assets/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- Bootstrap -->
    <script src="assets/js/bootstrap.js"></script>
    <!--[if lt IE 9]>


    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<!-- BEGAIN PRELOADER -->
<div id="preloader">
    <div class="loader">&nbsp;</div>
</div>
<!-- END PRELOADER -->

<!-- SCROLL TOP BUTTON -->
<a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
<!-- END SCROLL TOP BUTTON -->

<!-- Start header section -->
<header id="header">

</header>
<!-- End header section -->

<!-- Start menu section -->
<section id="menu-area">
    <nav class="navbar navbar-default main-navbar" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <!-- FOR MOBILE VIEW COLLAPSED BUTTON -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- LOGO -->
                <a class="navbar-brand logo" href="index.php"><img src="images/seal.png" alt="logo"></a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul id="top-menu" class="nav navbar-nav main-nav menu-scroll">
                    <li class="active"><a href="index.php">Home</a></li>
                    <li><a href="login_page.html">Login Area</a></li>
                    <li><a href="case_registry.php">Case Registry</a></li>
                    <li><a href="registrar_page.php">Registrar Login</a></li>
                    <li><a href="billing_routing.php">Billing</a></li>
                    <li><a href="#pricing-table">PRICE </a></li>

                    <li><a href="#contact">CONTACT</a></li>
                </ul>
            </div><!--/.nav-collapse -->
            <div class="search-area">
                <form action="">
                    <input id="search" name="search" type="text" placeholder="What're you looking for ?">
                    <input id="search_submit" value="Rechercher" type="submit">
                </form>
            </div>
        </div>
    </nav>
</section>
<!-- End menu section -->

<!-- Start about section -->

<div class="container">
    <h4>
    <?php
    session_start();
    $login_status=$_SESSION["login"];
    if ($login_status=='True')
    {
        $userid=$_SESSION["UserID"];
        echo "Hello ".$userid."<br>";
        echo "<a href=\"logoff.php\">[Logoff]</a>";
    }
    else
    {
        echo "Not Logged";
    }
    ?>
    </h4></div>
    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Start welcome area -->
                    <div class="welcome-area">
                        <div class="title-area">
                            <h2 class="tittle">Welcome to <span>JIS</span></h2>
                            <span class="tittle-line"></span>
                            <p>The Judicial Information System is a model judicial management system which offers all judiciary related services to your doorstep with the power of Internet and Computing</p>
                        </div>
                        <div class="welcome-content">
                            <ul class="wc-table">
                                <li>
                                    <div class="single-wc-content wow fadeInUp">
                                        <a href="login_page.html"><span class="fa fa-user-secret wc-icon"></span></a>
                                        <h4 class="wc-tittle"> Login Area</h4>
                                        <p>Login to Access all features of JIS</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="single-wc-content wow fadeInUp">
                                        <a href=case_registry.php>  <span class="fa fa-briefcase wc-icon"></span></a>
                                        <h4 class="wc-tittle">Case Registry</h4>
                                        <p>Search for Legal Documents in JIS </p>
                                    </div>
                                </li>
                                <li>
                                    <div class="single-wc-content wow fadeInUp">
                                        <a href="registrar_page.php"><span class="fa fa-database wc-icon"></span></a>
                                        <h4 class="wc-tittle">Registrar Corner</h4>
                                        <p>Access to Registrar Module for authorized users</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="single-wc-content wow fadeInUp">
                                        <a href="billing_routing.php"> <span class="fa fa-line-chart wc-icon"></span></a>
                                        <h4 class="wc-tittle">Billing</h4>
                                        <p>Billing and Payment Status of Lawyers</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- End welcome area -->
                </div>
            </div>

    </section>
    <!-- End about section -->








    <!-- Start Pricing Table section -->
    <section id="pricing-table">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="pricing-table-area">
                        <div class="title-area">
                            <h2 class="tittle">Pricing Table</h2>
                            <span class="tittle-line"></span>
                            <p>Access to Legal Documents for Lawyers are payable per view as per the rates given below. Feel free to choose from various subscription plan to avail maximum discounts</p>
                        </div>
                        <!-- service content -->
                        <div class="pricing-table-content">
                            <ul class="price-table">
                                <li class="wow slideInUp">
                                    <div class="single-price">
                                        <h4 class="price-header">Per View</h4>
                                        <span class="price-amount">Rs 20.00/View</span>
                                        <p>Pay as View</p>
                                        <p>-</p>
                                        <p>Advanced Payment</p>
                                        <p>Access to Archived Cases</p>

                                        <p>Forum Support</p>
                                        <a data-text="SIGN UP" class="button button-default" href="#"><span>SIGN UP</span></a>
                                    </div>
                                </li>
                                <li class="wow slideInUp">
                                    <div class="single-price standard-price">
                                        <h4 class="price-header">Monthly</h4>
                                        <span class="price-amount">Rs 1000.00/mo</span>
                                        <p>100 Views/Day</p>
                                        <p>Rs 10/Extra View</p>
                                        <p>Advance Payment</p>
                                        <p>Access to Ongoing Cases</p>

                                        <p>Forum Support</p>
                                        <a data-text="SIGN UP" class="button button-default" href="#"><span>SIGN UP</span></a>
                                    </div>
                                </li>
                                <li class="wow slideInUp">
                                    <div class="single-price">
                                        <h4 class="price-header">Half Yearly</h4>
                                        <span class="price-amount">Rs 6000.00/half yr</span>
                                        <p>1000 Views/Day</p>
                                        <p>Rs 10/Extra View</p>
                                        <p>Advance Payment</p>
                                        <p>Access to Ongoing Cases</p>

                                        <p>Forum Support</p>
                                        <a data-text="SIGN UP" class="button button-default" href="#"><span>SIGN UP</span></a>
                                    </div>
                                </li>
                                <li class="wow slideInUp">
                                    <div class="single-price">
                                        <h4 class="price-header">Yearly</h4>
                                        <span class="price-amount">Rs 10000.00/yr</span>
                                        <p>1000 Views/Day</p>
                                        <p>Rs 10/Extra View</p>
                                        <p>Advance Payment</p>
                                        <p>Access to Ongoing Cases</p>

                                        <p>Forum Support</p>
                                        <a data-text="SIGN UP" class="button button-default" href="#"><span>SIGN UP</span></a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Pricing Table section -->




    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="contact-left wow fadeInLeft">
                        <h2>Contact with us</h2>
                        <address class="single-address">
                            <h4>Postal address:</h4>
                            <p>JIS Project,MTech 2016-18, Computer Science & Engieering Department,Indian Institute of Technology, Kharagpur, West Bengal, Pin-721306, India</p>
                        </address>

                        <address class="single-address">
                            <h4>Phone</h4>
                            <p>Phone Number: (91) 456 7890</p>

                        </address>
                        <address class="single-address">
                            <h4>E-Mail</h4>
                            <p>Support: jissupport@gmail.com</p>
                            <p>Sales: jissales@gmail.com</p>
                        </address>
                    </div>
                </div>
                <div class="col-md-8 col-sm-6 col-xs-12">
                    <div class="contact-right wow fadeInRight">
                        <h2>Send a message</h2>
                        <form action="" class="contact-form">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Enter Email">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control"></textarea>
                            </div>
                            <button type="submit" data-text="SUBMIT" class="button button-default"><span>SUBMIT</span></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Contact section -->

    <!-- Start Footer -->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="footer-top-area">
                            <a class="navbar-brand logo" href="index.php"><img src="images/seal.png" alt="logo"></a>

                            <div class="footer-social">
                                <a class="facebook" href="#"><span class="fa fa-facebook"></span></a>
                                <a class="twitter" href="#"><span class="fa fa-twitter"></span></a>
                                <a class="google-plus" href="#"><span class="fa fa-google-plus"></span></a>
                                <a class="youtube" href="#"><span class="fa fa-youtube"></span></a>
                                <a class="linkedin" href="#"><span class="fa fa-linkedin"></span></a>
                                <a class="dribbble" href="#"><span class="fa fa-dribbble"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </footer>
    <!-- End Footer -->

    <!-- initialize jQuery Library -->
    <script src="assets/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- Bootstrap -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- Slick Slider -->
    <script type="text/javascript" src="assets/js/slick.js"></script>
    <!-- Counter -->
    <script type="text/javascript" src="assets/js/waypoints.js"></script>
    <script type="text/javascript" src="assets/js/jquery.counterup.js"></script>
    <!-- mixit slider -->
    <script type="text/javascript" src="assets/js/jquery.mixitup.js"></script>
    <!-- Add fancyBox -->
    <script type="text/javascript" src="assets/js/jquery.fancybox.pack.js"></script>
    <!-- Wow animation -->
    <script type="text/javascript" src="assets/js/wow.js"></script>

    <!-- Custom js -->
    <script type="text/javascript" src="assets/js/custom.js"></script>

</body>
</html>