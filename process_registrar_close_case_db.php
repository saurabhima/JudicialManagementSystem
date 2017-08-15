<?php
session_start();
$userID=$_SESSION["UserID"];
$cin=$_POST['cin'];
$registrar_comments=$_POST['registrar_comments'];
//$time_stamp=getdate();
//$time_stamp = date('YYYY:mm:dd h:i:s', time());
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

//$query="INSERT INTO registrar_comments(CIN,datetime,comment,login_name) VALUES ('".$cin."','".$time_stamp."','".$registrar_comments."','".$userID."')";
$query="INSERT INTO registrar_comments(CIN,comment,login_name) VALUES ('".$cin."','".$registrar_comments."','".$userID."')";
if ($conn->query($query) === TRUE) {


    $query="UPDATE case_details SET case_status='Archived' WHERE CIN='".$cin."' AND case_status='Current'";

    if ($conn->query($query) === TRUE) {

        echo '<script language="javascript">';
        echo "alert('Success Case has been Archived.')";
        echo '</script>';
        header("Refresh: 5; url=close_case.php");

}
}

else {
    echo '<script language="javascript">';
    echo "alert('Error in Comment Registration..Please Try Again')";
    echo '</script>';

    header("Refresh: 5,Location: close_case.php");
}

$conn->close();

?>
