<?php
/**
 * Created by PhpStorm.
 * User: saurabhima
 * Date: 22/3/17
 * Time: 4:19 AM
 */
session_start();
$_SESSION["login"] = "False";
$_SESSION["UserID"] = "";
$_SESSION["account_type"]="";
$username = $_POST['emailid'];
$password=$_POST['passwd'];
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
$query="SELECT passwd,user_type FROM user_login_details WHERE userid='".$username."' AND account_status='Active'";
$retval =$conn->query($query);

if(! $retval ) {
    die('Could not get data: ' . mysql_error());
}
$row = $retval->fetch_assoc();
$retpasswd=$row["passwd"];
$account_type=$row["user_type"];
if ($retpasswd==$password)
{
    echo "Login is Successful";
    $_SESSION["login"] = "True";
    $_SESSION["UserID"] = $username;
    $_SESSION["account_type"] = $account_type;
    header('Location: index.php');
}
else
{
    echo "Login Failed";

}


$conn->close();
?>