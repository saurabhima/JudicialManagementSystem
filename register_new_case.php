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
    <link href="css/bootstrap-theme.css" rel="stylesheet">
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

    <link href="assets/css/case_registration_form.css" type="text/css" rel="stylesheet"/>
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
    <script src="assets/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- Bootstrap -->
    <link href='cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/css/bootstrapValidator.min.css' rel='stylesheet' type='text/css'>

    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <script src="assets/js/jquery.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js" type="text/javascript"></script>
    <script src="http://s.codepen.io/assets/libs/modernizr.js" type="text/javascript"></script>

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
    </h4>



    <div class="container">

        <form class="well form-horizontal" action="register_new_case_process_db.php" method="post"  id="contact_form" name="contact_form">
            <fieldset>

                <!-- Form Name -->
                <legend align="center">New Case Registration</legend>

                <!-- Text input-->

                <div class="form-group">
                    <label class="col-md-4 control-label">Litigant Name</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input  name="litigant_name" placeholder="Litigant Name" class="form-control"  type="text">
                        </div>
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label">Litigant Address</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                            <input name="litigant_address" placeholder="Litigant Address" class="form-control" type="text">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Litigant City</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                            <input name="litigant_city" placeholder="Litigant City" class="form-control"  type="text">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Litigant State</label>
                    <div class="col-md-4 selectContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                            <select name="litigant_state" class="form-control selectpicker" >
                                <option value=" " >Please select your state</option>
                                <option>JAMMU & KASHMIR</option>
                                <option>HIMACHAL PRADESH</option>
                                <option>PUNJAB</option>
                                <option>CHANDIGARH #</option>
                                <option>UTTARAKHAND</option>
                                <option>HARYANA</option>
                                <option>NCT OF DELHI #</option>
                                <option>RAJASTHAN</option>
                                <option>UTTAR PRADESH</option>
                                <option>BIHAR</option>
                                <option>SIKKIM</option>
                                <option>ARUNACHAL PRADESH</option>
                                <option>NAGALAND</option>
                                <option>MANIPUR </option>
                                <option>MIZORAM</option>
                                <option>TRIPURA</option>
                                <option>MEGHALAYA</option>
                                <option>ASSAM</option>
                                <option>WEST BENGAL</option>
                                <option>JHARKHAND</option>
                                <option>ORISSA</option>
                                <option>CHHATTISGARH</option>
                                <option>MADHYA PRADESH</option>
                                <option>GUJARAT</option>
                                <option>DAMAN & DIU #</option>
                                <option>DADRA & NAGAR HAVELI #</option>
                                <option>MAHARASHTRA</option>
                                <option>ANDHRA PRADESH</option>
                                <option>KARNATAKA</option>
                                <option>GOA</option>
                                <option>LAKSHADWEEP #</option>
                                <option>KERALA</option>
                                <option>TAMIL NADU</option>
                                <option>PUDUCHERRY #</option>
                                <option>A & N ISLANDS #</option>

                            </select>
                        </div>
                    </div>
                </div>

                <!-- Text input-->

                <div class="form-group">
                    <label class="col-md-4 control-label">Litigant Zip Code</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                            <input name="litigant_zip" placeholder="Litigant Zip Code" class="form-control"  type="text">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Litigant Number</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                            <input name="litigant_phone" placeholder="(845)555-1212" class="form-control" type="text">
                        </div>
                    </div>
                </div>
                <div class="form-group"><hr></div>
                <div class="form-group">
                    <label class="col-md-4 control-label" >Defendant Name</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input name="defendant_name" placeholder="Defendant Name" class="form-control"  type="text">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Defendant Address</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                            <input name="defendant_address" placeholder="Defendant Address" class="form-control" type="text">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Defendant City</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                            <input name="defendant_city" placeholder="Defendant City" class="form-control"  type="text">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Defendant State</label>
                    <div class="col-md-4 selectContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                            <select name="defendant_state" class="form-control selectpicker" >
                                <option value=" " >Please select your state</option>
                                <option>JAMMU & KASHMIR</option>
                                <option>HIMACHAL PRADESH</option>
                                <option>PUNJAB</option>
                                <option>CHANDIGARH #</option>
                                <option>UTTARAKHAND</option>
                                <option>HARYANA</option>
                                <option>NCT OF DELHI #</option>
                                <option>RAJASTHAN</option>
                                <option>UTTAR PRADESH</option>
                                <option>BIHAR</option>
                                <option>SIKKIM</option>
                                <option>ARUNACHAL PRADESH</option>
                                <option>NAGALAND</option>
                                <option>MANIPUR </option>
                                <option>MIZORAM</option>
                                <option>TRIPURA</option>
                                <option>MEGHALAYA</option>
                                <option>ASSAM</option>
                                <option>WEST BENGAL</option>
                                <option>JHARKHAND</option>
                                <option>ORISSA</option>
                                <option>CHHATTISGARH</option>
                                <option>MADHYA PRADESH</option>
                                <option>GUJARAT</option>
                                <option>DAMAN & DIU #</option>
                                <option>DADRA & NAGAR HAVELI #</option>
                                <option>MAHARASHTRA</option>
                                <option>ANDHRA PRADESH</option>
                                <option>KARNATAKA</option>
                                <option>GOA</option>
                                <option>LAKSHADWEEP #</option>
                                <option>KERALA</option>
                                <option>TAMIL NADU</option>
                                <option>PUDUCHERRY #</option>
                                <option>A & N ISLANDS #</option>

                            </select>
                        </div>
                    </div>
                </div>

                <!-- Text input-->

                <div class="form-group">
                    <label class="col-md-4 control-label">Defendant Zip Code</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                            <input name="defendant_zip" placeholder="Defendant Zip Code" class="form-control"  type="text">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Defendant Number</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                            <input name="defendant_phone" placeholder="(845)555-1212" class="form-control" type="text">
                        </div>
                    </div>
                </div>
                <div class="form-group"><hr></div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Type of Crime</label>
                    <div class="col-md-4 selectContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                            <select name="crime_type" class="form-control selectpicker" >
                                <option value=" " >Please select type of crime</option>
                                <option>1 - Murder (Section 302 IPC)</option>
                                <option>2 - Attempt to commit Murder (Section 307 IPC)</option>
                                <option>3 - Culpable Homicide not amounting to Murder (Section 304 IPC)</option>
                                <option>4 - Attempt to commit Culpable Homicide (Section 308 IPC)</option>
                                <option>5 - Rape (Section 376 IPC)</option>
                                <option>5.1 - Custodial Rape</option>
                                <option>5.1.1 - Gang Rape</option>
                                <option>5.1.2 - Other Rape</option>
                                <option>5.2 - Rape other than Custodial</option>
                                <option>5.2.1 - Gang Rape</option>
                                <option>5.2.2 - Other Rape</option>
                                <option>6 - Attempt to commit Rape (Section 376/511 IPC)</option>
                                <option>7 - Kidnapping & Abduction_Total (Section 3,364,364A, 366-369 IPC)</option>
                                <option>7.1 - Kidnapping & Abduction (Section 363 IPC)</option>
                                <option>7.2 - Kidnaping & Abduction in order to Murder (Section 364 IPC)</option>
                                <option>7.3 - Kidnapping for Ransom (Section 364A IPC)</option>
                                <option>7.4 - Kidnapping & Abduction of Women to compel her for marriage (Section 366 IPC)</option>
                                <option>7.5 - Other Kidnapping</option>
                                <option>8 - Dacoity (Section 395,396-398 IPC)</option>
                                <option>8.1 - Dacoity with Murder (Section 396 IPC)</option>
                                <option>8.2 - Other Dacoity</option>
                                <option>9 - Making Preparation and Assembly for committing Dacoity (Section 399 & 402 IPC)</option>
                                <option>10 - Robbery (Section 392 to 394, 397 and 398 IPC)</option>
                                <option>11 - Criminal Trespass/Burglary_Total (Section 453 to 460 IPC)</option>
                                <option>11.1 - Criminal Trespass/Burglary (Section 455, 457 & 458 IPC)</option>
                                <option>11.2 - House Trespass & House Breaking (Section 453,454,456,459 & 460 IPC)</option>
                                <option>12 - Theft (Section 379 to 382 IPC)</option>
                                <option>12.1 - Auto Theft</option>
                                <option>12.2 - Other Thefts</option>
                                <option>13 - Unlawful Assembly (Section 143,144 & 145)</option>
                                <option>14 - Riots (Section 147, 148, 149, 150 & 151 IPC)</option>
                                <option>14.1 - Communal</option>
                                <option>14.2 - Industrial</option>
                                <option>14.3 - Political</option>
                                <option>14.4 - Caste Conflict</option>
                                <option>14.4.1 - SC/STs Vs. Non-SCs/STs</option>
                                <option>14.4.2 - Other Caste Riots</option>
                                <option>14.5 - Agrarian</option>
                                <option>14.6 - Students</option>
                                <option>14.7 - Sectarian</option>
                                <option>14.8 - Other Riots</option>
                                <option>15 - Criminal Breach of Trust (Section 406 to 409 IPC)</option>
                                <option>16 - Cheating (Section 420 IPC)</option>
                                <option>17 - Forgery (Section 465, 468 & 471 IPC)</option>
                                <option>18 - Counterfeiting (Section 231-235,237-240, 242-243, 255 and 489-A to 489-E IPC)</option>
                                <option>18.1 - Offences related to Counterfeit Coin (Section 231-235,237, 238-240 & 242-243 IPC)</option>
                                <option>18.2 - Counterfeiting Government Stamp (Section 255 IPC)</option>
                                <option>18.3 - Counterfeit currency & Bank notes (Section 489-A to 489-E IPC)</option>
                                <option>18.3.1 - Counterfeiting currency notes or Bank notes (Section 489A IPC)</option>
                                <option>18.3.2 - Using forged or counterfeit currency/Bank notes (Section 489B IPC)</option>
                                <option>18.3.3 - Possession of forged or counterfeiting currency / Bank notes (Section 489C IPC)</option>
                                <option>18.3.4 - Make/Possess materials for forging or counterfeiting currency/Bank notes (Section 489D IPC)</option>
                                <option>18.3.5 - Make/Use documents resembling currency notes/Bank notes (Section 489 E IPC)</option>
                                <option>19 - Arson (Section 435-436 & 438 IPC)</option>
                                <option>20 - Grievous Hurt (Section 325,326,326A & 326 B IPC)</option>
                                <option>20.1 - Grievous Hurt (Section 325 & 326 IPC)</option>
                                <option>20.2 - Acid attack (Section 326A IPC)</option>
                                <option>20.3 - Attempt to Acid Attack (Section 326B IPC)</option>
                                <option>21 - Dowry Deaths (Section 304-B IPC)</option>
                                <option>22 - Assault on women with intent to outrage her Modesty (Section 354 IPC)</option>
                                <option>22.1 - Sexual Harassment (Section 354A IPC)</option>
                                <option>22.2 - Assault on women with intent to Disrobe (Section 354B IPC)</option>
                                <option>22.3 - Voyeurism (Section 354C IPC)</option>
                                <option>22.4 - Stalking (Section 354D IPC)</option>
                                <option>22.5 - Others</option>
                                <option>23 - Insult to the Modesty of Women (Section 509 IPC)</option>
                                <option>23.1 - At Office premises</option>
                                <option>23.2 - Places related to work other than Office</option>
                                <option>23.3 - In Public Transport system</option>
                                <option>23.4 - in Other Places</option>
                                <option>24 - Cruelty by Husband or his Relatives (Section 498-A IPC)</option>
                                <option>25 - Importation of Girls from Foreign Country (Section 366-B IPC)</option>
                                <option>26 - Causing Death by Negligence (Section 304-A IPC)</option>
                                <option>26.1 - Deaths due to negligent driving/act</option>
                                <option>26.2 - Deaths due to Other Causes</option>
                                <option>27 - Offences against State (Section 121, 121A, 122, 123, 124-A IPC)</option>
                                <option>27.1 - Sedition (Section 124A IPC)</option>
                                <option>27.2 - Other offences against State</option>
                                <option>28 - Offences promoting enmity between different groups (Section 153A & 153B IPC)</option>
                                <option>28.1 - Promoting enmity on ground of religion race and place of Birth (Section 153A IPC)</option>
                                <option>28.2 - Imputation & assertions prejudicial to national integration (Section 153B IPC)</option>
                                <option>29 - Extortion (Section 384 - 389 IPC)</option>
                                <option>30 - Disclosure of Identity of Victims (Section 228 A IPC)</option>
                                <option>31 - Incidence of Rash Driving (Section 279 IPC Read with 337 & 338)</option>
                                <option>32 - Human Trafficking (Section 370 & 370A IPC)</option>
                                <option>33 - Unnatural Offences U/s 377 IPC</option>
                                <option>34 - Other IPC crimes</option>

                            </select>
                        </div>
                    </div>
                </div>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label">Date of Crime</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                            <input name="date_of_crime" placeholder="Crime Date" class="form-control"  type="date">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Crime Location</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                            <input name="crime_location" placeholder="Crime Location" class="form-control"  type="text">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Arresting Officer's Name</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input  name="arresting_offr__name" placeholder="Arresting Officer's Name" class="form-control"  type="text">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Date of Arrest</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                            <input name="date_of_arrest" placeholder="Date of Arrest" class="form-control"  type="date">
                        </div>
                    </div>
                </div>

                <!-- radio checks -->
                <div class="form-group">
                    <label class="col-md-4 control-label">Whether Cognizable Offence?</label>
                    <div class="col-md-4">
                        <div class="radio">
                            <label>
                                <input type="radio" name="cognizable_check" value="yes" /> Yes
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="cognizable_check" value="no" /> No
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Text area -->

                <div class="form-group">
                    <label class="col-md-4 control-label">Any Other Detail</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                            <textarea class="form-control" name="other_details" placeholder="Other Details"></textarea>
                        </div>
                    </div>
                </div>

                <!-- Success message -->
                <div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Thanks for contacting us, we will get back to you shortly.</div>

                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label"></label>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-warning" >Register <span class="glyphicon glyphicon-send"></span></button>
                    </div>
                </div>

            </fieldset>
        </form>
    </div>
</div>


<!-- initialize jQuery Library -->

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
<script type="text/javascript">
    $(document).ready(function() {
        $('#contact_form').bootstrapValidator({
            // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                litigant_name: {
                    validators: {
                        stringLength: {
                            min: 5,
                        },
                        notEmpty: {
                            message: 'Please supply Litigant name'
                        }
                    }
                },
                defendant_name: {
                    validators: {
                        stringLength: {
                            min: 5,
                        },
                        notEmpty: {
                            message: 'Please supply Defendant name'
                        }
                    }
                },
                litigant_address: {
                    validators: {
                        stringLength: {
                            min: 8,
                        },
                        notEmpty: {
                            message: 'Please supply Litigant Address'
                        }
                    }
                },
                defendant_address: {
                    validators: {
                        stringLength: {
                            min: 8,
                        },
                        notEmpty: {
                            message: 'Please supply Defendant Address'
                        }
                    }
                },





                email: {
                    validators: {
                        notEmpty: {
                            message: 'Please supply your email address'
                        },
                        emailAddress: {
                            message: 'Please supply a valid email address'
                        }
                    }
                },
                litigant_phone: {
                    validators: {
                        notEmpty: {
                            message: 'Please supply Litigant phone number'
                        },
                        phone: {
                            country: 'IN',
                            message: 'Please supply a vaild phone number with area code'
                        }
                    }
                },
                defendant_phone: {
                    validators: {
                        notEmpty: {
                            message: 'Please supply Defendant phone number'
                        },
                        phone: {
                            country: 'IN',
                            message: 'Please supply a vaild phone number with area code'
                        }
                    }
                },

                litigant_city: {
                    validators: {
                        stringLength: {
                            min: 4,
                        },
                        notEmpty: {
                            message: 'Please supply Litigant city name'
                        }
                    }
                },
                defendant_city: {
                    validators: {
                        stringLength: {
                            min: 4,
                        },
                        notEmpty: {
                            message: 'Please supply Defendant city name'
                        }
                    }
                },
                litigant_state: {
                    validators: {
                        notEmpty: {
                            message: 'Please select Litigant state'
                        }
                    }
                },
                defendant_state: {
                    validators: {
                        notEmpty: {
                            message: 'Please select Defendant state'
                        }
                    }
                },
                crime_type: {
                    validators: {
                        notEmpty: {
                            message: 'Please select Crime Type'
                        }
                    }
                },
                date_of_crime: {
                    validators: {
                        notEmpty: {
                            message: 'Please supply Date of Commitment'
                        }
                    }
                },
                crime_location: {
                    validators: {
                        notEmpty: {
                            message: 'Please supply Crime Commitment Location'
                        }
                    }
                },

                cognizable_check: {
                    validators: {
                        notEmpty: {
                            message: 'Please select Cognizable Crime Check'
                        }
                    }
                },

            }
        })
            .on('success.form.bv', function(e) {
                $('#success_message').slideDown({ opacity: "show" }, "slow") // Do something ...
                $('#contact_form').data('bootstrapValidator').resetForm();

                // Prevent form submission
                e.preventDefault();

                // Get the form instance
                var $form = $(e.target);

                // Get the BootstrapValidator instance
                var bv = $form.data('bootstrapValidator');

                // Use Ajax to submit form data
                $.post($form.attr('action'), $form.serialize(), function(result) {
                    console.log(result);
                }, 'json');
            });
    });


</script>
</body>
</html>