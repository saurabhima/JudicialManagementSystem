<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Rex : Home</title>
    <!-- Favicon -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.js"></script>
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
    <?php
    session_start();
    $account_type=$_SESSION["account_type"];
    $userID=$_SESSION["UserID"];
    $login_status=$_SESSION["login"];
    if ($login_status=='True') {
        if ($account_type != 'Registrar') {

            $log  = "User: ".$userID.' - '.date("F j, Y, g:i a").PHP_EOL.
                "Attempted to Access account Type:Registrar ".PHP_EOL.
                "Webpage:".basename($_SERVER['PHP_SELF']).PHP_EOL.
                "-------------------------".PHP_EOL;
            //Save string to log, use FILE_APPEND to append.
            file_put_contents('./error_logs/log_'.date("j.n.Y").'.txt', $log, FILE_APPEND);

            header('Location:invalid_user.php');
        }
    }
    else
    {
        header('Location:nonlogged_user.php');
    }
    ?>
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
                    <li><a href="index.php">Home</a></li>
                    <li><a href="login_page.html">Login Area</a></li>
                    <li><a href="case_registry.php">Case Registry</a></li>
                    <li class="active"><a href="registrar_page.php">Registrar Login</a></li>
                    <li><a href="#portfolio">Billing</a></li>
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
        $account_type=$_SESSION["account_type"];
        $userID=$_SESSION["UserID"];
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
    </h4>
</div>

<div class="container">

    <section id="service">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="service-area">
                        <div class="title-area">
                            <h2 class="tittle">Registrar Page</h2>
                            <span class="tittle-line"></span>
                            <p>Welcome to the Registrar Modules. Use the required hyperlink for various Court House Functions</p>
                        </div>
                        <!-- service content -->
                        <div class="service-content">
                            <ul class="service-table">
                                <a href="register_new_case.php" target="_self">
                                    <li class="col-md-3 col-sm-6">
                                    <div class="single-service wow slideInUp">
                                        <span class="fa fa-edit service-icon"></span>
                                        <h4 class="service-title">Register New Case</h4>
                                        <p>Make entry for a new case for obtaining CIN</p>
                                    </div>
                                </li></a>
                                <a href="allot_judge_to_fresh_case.php" target="_self">
                                <li class="col-md-3 col-sm-6">
                                    <div class="single-service wow slideInUp">
                                        <span class="fa fa-sort-amount-asc service-icon"></span>
                                        <h4 class="service-title">Allot Presiding Judge</h4>
                                        <p>Allot a Presiding Judge to a Fresh Case</p>
                                    </div>
                                </li></a>

                                <li class="col-md-3 col-sm-6">
                                    <div class="single-service wow slideInUp">
                                        <span class="fa fa-map-o service-icon"></span>
                                        <h4 class="service-title">Allot Next Date<br><br></h4>
                                        <p>Allot Next Hearing Date to a Current Case</p>
                                    </div>
                                </li>
                                <a href="close_case.php" target="_self">
                                <li class="col-md-3 col-sm-6">
                                    <div class="single-service wow slideInUp">
                                        <span class="fa fa-rocket service-icon"></span>
                                        <h4 class="service-title">Close Current Case</h4>
                                        <p>Close Current Case and move to archive</p>
                                    </div>
                                </li></a>
                                <a href="insert_registrar_comments.php" target="_self">
                                <li class="col-md-3 col-sm-6">
                                    <div class="single-service wow slideInUp">
                                        <span class="fa fa-car service-icon"></span>
                                        <h4 class="service-title">Comment on Case</h4>
                                        <p>Enter Comment on a case for records</p>
                                    </div>
                                </li></a>
                                <a href="retrieve_registrar_comments.php" target="_self">
                                <li class="col-md-3 col-sm-6">
                                    <div class="single-service wow slideInUp">
                                        <span class="fa fa-bank service-icon"></span>
                                        <h4 class="service-title">View Previous Comments</h4>
                                        <p>View previous comments on a case</p>
                                    </div>
                                </li></a>
                                <li class="col-md-3 col-sm-6">
                                    <div class="single-service wow slideInUp">
                                        <span class="fa fa-user-secret service-icon"></span>
                                        <h4 class="service-title">Statistics<br><br></h4>
                                        <p>View statistics of the Court House</p>
                                    </div>
                                </li>
                                <li class="col-md-3 col-sm-6">
                                    <div class="single-service wow slideInUp">
                                        <span class="fa fa-support service-icon"></span>
                                        <h4 class="service-title">Support<br><br></h4>
                                        <p>View all In House Support Details</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End service section -->


</div>





    <!-- initialize jQuery Library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
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