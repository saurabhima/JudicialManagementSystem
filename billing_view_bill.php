<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="" rel="shortcut icon">

    <title>List of Student</title><!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
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
    <link rel="stylesheet" href="assets/css/jquery.fancybox.css" type="text/css" media="screen"/>
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
        if ($account_type != 'Billing Clerk') {

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
<div class="container">

    <form class="well form-horizontal" action=""  method="post"  id="cin_search" name="cin_search">
        <fieldset>

            <!-- Form Name -->
            <legend align="center">Search by lawyer UserID</legend>

            <!-- Text input-->

            <div class="form-group">
                <label class="col-md-4 control-label">Lawyer UserID</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span>
                        <input  name="userID" placeholder="UserID" class="form-control"  type="text">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label"></label>
                <div class="col-md-4">
                    <button type="submit" name="submit"  class="btn btn-warning" >Find Access Details <span class="glyphicon glyphicon-send"></span></button>
                </div>
            </div>

        </fieldset>
    </form>
</div>
<div class="container" style="align-content: center">




    <?php
    $username="";
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {


        if (isset($_POST['submit'])) {
            $userid = $_POST['userID'];
            echo '<table class="table table-responsive table-bordered" id="lawyer_case_views">
  <thead class="navbar-inverse">
            <th style="text-align: center">Serial Stamp</th>
            <th style="text-align: center">Filename</th>
            <th style="text-align: center">Date of Access</th>
            </thead>
            <tbody>';
            $ip_address = "localhost";
            $dbusername = "sierra";
            $dbpassword = "NETSCAPE1";
            $database = "judicial_financial_database";
            // Create connection

            $conn = new mysqli($ip_address, $dbusername, $dbpassword, $database);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $username=$userid;
            $query = "SELECT serial,docid,access_timestamp  FROM user_access_details WHERE userid='" . $userid . "' AND access_payed!='Yes' ORDER BY access_timestamp DESC";
            $result = mysqli_query($conn, $query);
              $total_access=0;

            while ($row = mysqli_fetch_array($result)) {
                $total_access=$total_access+1;
                $serial = $row['serial'];
                $docid = $row['docid'];
                $access_timestamp = $row['access_timestamp'];
                echo '<tr style="text-align: center">';
                echo '<td>' . $serial . '</td>';
                echo '<td>' . $docid . '</td>';
                echo '<td>' . $access_timestamp . '</td>';
                echo '</tr>';

            }
            $total_amount=$total_access*20;
            echo'</tbody>



  </table>



</div>';
            echo '<div class="container">

    <form class="well form-horizontal" action=""  method="post"  id="make_payment" name="make_payment">
        <fieldset>

            <!-- Form Name -->
            <legend align="center">Process Payment</legend>

            <!-- Text input-->

            <div class="form-group">
                <label class="col-md-4 control-label">Total Amount</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span>
                        <input  name="total_amount" placeholder="Total Due Amount" readonly value="'.$total_amount.'" class="form-control"  type="text">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label"></label>
                <div class="col-md-4">
                    <button type="submit" name="payment"  class="btn btn-warning" >Make Payment <span class="glyphicon glyphicon-send"></span></button>
                </div>
            </div>

        </fieldset>
    </form>
</div>';
            mysqli_close($con);

            $conn->close();
        }

        if ($serial != null) {
            echo '<style type="text/css">#cin_search{
            display:none;
        }</style>';

        }
    }
    if (isset($_POST['payment'])) {
        $ip_address = "localhost";
        $dbusername = "sierra";
        $dbpassword = "NETSCAPE1";
        $database = "judicial_financial_database";
        // Create connection

        $conn = new mysqli($ip_address, $dbusername, $dbpassword, $database);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $query = "UPDATE user_access_details SET access_payed='Yes' WHERE userid='".$username. "' AND access_payed!='Yes'";

        if ($conn->query($query) === TRUE) {

            echo '<script language="javascript">';
            echo "alert('Payment Successful.')";
            echo '</script>';
            header("Refresh: .5; url=index.php");

        }

    }

 ?>




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