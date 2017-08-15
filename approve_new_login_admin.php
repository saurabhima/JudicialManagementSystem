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
        if ($account_type != 'Administrator') {

            $log  = "User: ".$userID.' - '.date("F j, Y, g:i a").PHP_EOL.
                "Attempted to Access account Type:Administrator ".PHP_EOL.
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
$query = "SELECT userid,passwd,first_name,last_name,user_type,date_of_register FROM pending_user_login_details WHERE 1 ORDER BY date_of_register ASC LIMIT 0,1";
$result = $conn->query($query);


$row = mysqli_fetch_array($result);
$useremail = $row[0];
$userpasswd = $row[1];
$first_name = $row[2];


$last_name = $row[3];
$user_type = $row[4];
$date_of_register = $row[5];

$conn->close();





echo '
<div class="container">

    <form class="well form-horizontal" action="" method="post"  id="contact_form" name="contact_form">
        <fieldset>

            <!-- Form Name -->
            <legend style="text-align: center">Approve New Users</legend>

            <!-- Text input-->

            <div class="form-group">
                <label class="col-md-4 control-label">User Email</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input  name="userid" id="userid"  value="' . $useremail . '"  placeholder="User Email" class="form-control"  type="email">
                    </div>
                </div>
            </div>
             <div class="form-group">
                <label class="col-md-4 control-label">User Password</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input name="user_password"  placeholder=""  value="' . $userpasswd. '" class="form-control" type="hidden">
                    </div>
                </div>
            </div>
          
            <div class="form-group">
                <label class="col-md-4 control-label">First Name</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input  name="first_name"  value="' . $first_name . '" placeholder="First Name" class="form-control"  type="text">
                    </div>
                </div>
            </div>

           
       
            <div class="form-group">
                <label class="col-md-4 control-label" >Last Name</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input name="last_name"  value="' . $last_name . '" placeholder="Last Name" class="form-control"  type="text">
                    </div>
                </div>
            </div>
           

            
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label">Date of Registration</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                        <input name="registration_date" placeholder="Date of Registration"  value="' . $date_of_register . '" class="form-control" type="text">
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                    <label class="col-md-4 control-label">Account Type</label>
                    <div class="col-md-4 selectContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                            <select name="account_type" id="account_type" class="form-control selectpicker" >
                                <option value=" " >Please select Account Type</option>;
                                <option>Administrator</option>
                                <option>Judge</option>
                                <option>Lawyer</option>
                                <option>Registrar</option>
                                <option>Billing</option>';


echo '</select>
                        </div>
                    </div>
                </div>

           

            <!-- Button -->
            <div class="form-group">
                <label class="col-md-4 control-label"></label>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-warning" name="approve_user" >Approve User<span class="glyphicon glyphicon-send"></span></button>
                </div>
            </div>

        </fieldset>
    </form>
</div>';
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    if(isset($_POST['approve_user'])){
        $useremail = $_POST['userid'];
        $userpasswd = $_POST['user_password'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $date_of_register=$_POST['registration_date'];
        $account_type=$_POST['account_type'];


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
        $query = "INSERT INTO user_login_details(userid,passwd,user_type,date_of_register,account_status) VALUES('".$useremail."','".$userpasswd."','".$user_type."','".$date_of_register."','Active')";

        $result=$conn->query($query);
        $query = "DELETE FROM pending_user_login_details WHERE userid='".$useremail."'";

        $result=$conn->query($query);


        $conn->close();


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