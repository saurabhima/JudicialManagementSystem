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




        <?php
        session_start();
        $ip_address = "localhost";
        $dbusername = "sierra";
        $dbpassword = "NETSCAPE1";
        $database = "judicial_database";
        // Create connection
        $conn = new mysqli($ip_address, $dbusername, $dbpassword, $database);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $query = "SELECT CIN,litigant_name,litigant_address,litigant_city,litigant_state,litigant_zip,litigant_phone,defendent_name,defendant_address,defendant_city,defendant_state,defendant_zip,defendant_phone,crime_type,congizable_crime,date_of_commitment,crime_loc,other_details FROM case_details WHERE case_status='Fresh' ORDER BY CIN ASC LIMIT 0,1";
        $result = $conn->query($query);
        $judge_query = "SELECT judge_name,total_current_cases FROM judge_details WHERE current_availability='Present' ORDER BY total_current_cases,judge_name ASC ";

        $row = mysqli_fetch_array($result);
        $cin = $row[0];
        $litigant_name = $row[1];
        $litigant_address = $row[2] . ',' . $row[3] . ',' . $row[4] . '-' . $row[5];
        $litigant_phone = $row[6];
        $defendant_name = $row[7];
        $defendant_address = $row[8] . ',' . $row[9] . ',' . $row[10] . '-' . $row[11];
        $defendant_phone = $row[12];
        $crime_type = $row[13];
        if ($row[14] == 0) {
            $cog = 'No';
        } else {
            $cog = 'Yes';
        }
        $date_of_commitment = $row[15];
        $crime_loc = $row[16];
        $other_details = $row[17];

        $result = $conn->query($judge_query);


        $conn->close();





        echo '
<div class="container">

    <form class="well form-horizontal" action="register_presiding_judge_db.php" method="post"  id="contact_form" name="contact_form">
        <fieldset>

            <!-- Form Name -->
            <legend align="center">Judge Allotment</legend>

            <!-- Text input-->

            <div class="form-group">
                <label class="col-md-4 control-label">Case Identification Number(CIN)</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input  name="cin" id="cin" readonly value="' . $cin . '"  placeholder="Case Identification Number" class="form-control"  type="text">
                    </div>
                </div>
            </div>
          
            <div class="form-group">
                <label class="col-md-4 control-label">Litigant Name</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input  name="litigant_name"  readonly value="' . $litigant_name . '" placeholder="Litigant Name" class="form-control"  type="text">
                    </div>
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label">Litigant Address</label>
                <div class="col-md-6 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                        <input name="litigant_address" readonly value="' . $litigant_address . '" placeholder="Litigant Address" class="form-control" type="text">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Litigant Number</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                        <input name="litigant_phone" readonly value="' . $litigant_phone . '" placeholder="(845)555-1212" class="form-control" type="text">
                    </div>
                </div>
            </div>
            
       
            <div class="form-group">
                <label class="col-md-4 control-label" >Defendant Name</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input name="defendant_name" readonly value="' . $defendant_name . '" placeholder="Defendant Name" class="form-control"  type="text">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">Defendant Address</label>
                <div class="col-md-6 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                        <input name="defendant_address" readonly value="' . $defendant_address . '" placeholder="Defendant Address" class="form-control" type="text">
                    </div>
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label">Defendant Number</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                        <input name="defendant_phone" readonly value="' . $defendant_phone . '"placeholder="(845)555-1212" class="form-control" type="text">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">Type of Crime</label>
                <div class="col-md-5 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span>
                        <input name="crime_type" placeholder="Type of Crime" readonly value="' . $crime_type . '" class="form-control" type="text">
                    </div>
                </div>
            </div>
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label">Date of Crime</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                        <input name="crime_date" placeholder="Date of Crime" readonly value="' . $date_of_commitment . '" class="form-control" type="text">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">Crime Location</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                        <input name="crime_location" placeholder="Crime Location" readonly value="' . $crime_loc . '" class="form-control"  type="text">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Cognizable Offence</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                        <input name="cognizable_check" placeholder="" readonly value="' . $cog . '" class="form-control" type="text">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Any Other Detail</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                        <textarea class="form-control" name="other_details" readonly value ="' . $other_details . '" placeholder="Other Details"></textarea>
                    </div>
                </div>
            </div>
            <div class="form-group">
                    <label class="col-md-4 control-label">Judge Name</label>
                    <div class="col-md-4 selectContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                            <select name="judge_name" id="judge_name" class="form-control selectpicker" >
                                <option value=" " >Please select Presiding Judge</option>';
        while ($row = mysqli_fetch_array($result)) {
            echo '<option>' . $row[0] . '</option>';
        }


        echo '</select>
                        </div>
                    </div>
                </div>

           

            <!-- Button -->
            <div class="form-group">
                <label class="col-md-4 control-label"></label>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-warning" >Allot Judge<span class="glyphicon glyphicon-send"></span></button>
                </div>
            </div>

        </fieldset>
    </form>
</div>';
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