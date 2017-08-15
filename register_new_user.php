<?php
/**
 * Created by PhpStorm.
 * User: saurabhima
 * Date: 23/3/17
 * Time: 7:02 AM
 */
$date = date('Y-m-d');
date_default_timezone_set('Asia/Kolkata');

$ip_address = "localhost";
$dbusername = "sierra";
$dbpassword = "NETSCAPE1";
$database = "judicial_database";
// Create connection
$conn = new mysqli($ip_address, $dbusername, $dbpassword,$database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



$firstname= $_POST['first_name'];
$lastname= $_POST['last_name'];
$accounttype=$_POST['account_type'];
$username = $_POST['registeremailid'];
$password=$_POST['registerpasswd'];

$query="INSERT INTO pending_user_login_details(userid, passwd, first_name, last_name, user_type, date_of_register) VALUES ('".$username."','".$password."','".$firstname."','".$lastname."','".$accounttype."','".$date."')";
//$result = mysqli_query($conn, $query);


if ($conn->query($query) === TRUE) {
    echo '<script language="javascript">';
    echo 'alert("Request Made for New Login,Please Check Your Email")';
    echo '</script>';
    header("Refresh: 5; url=index.php");


}

else {
    echo '<script language="javascript">';
    echo 'alert("Error in New User Registration..Please Try Again")';
    echo '</script>';

    header('Location: register_new_user.php');
}

$conn->close();



?>

