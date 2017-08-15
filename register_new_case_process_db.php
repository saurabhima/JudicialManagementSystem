<?php
$litigant_name = $_POST['litigant_name'];
$litigant_address = $_POST['litigant_address'];
$defendant_name=$_POST['defendant_name'];
$litigant_city=$_POST['litigant_city'];
$litigant_state=$_POST['litigant_state'];
$litigant_zip=$_POST['litigant_zip'];
$litigant_phone=$_POST['litigant_phone'];

$crime_locaiton=$_POST['crime_locaiton'];
$arresting_offr__name=$_POST['arresting_offr__name'];
$date_of_arrest=$_POST['date_of_arrest'];
$cognizable_check=$_POST['cognizable_check'];
$other_details=$_POST['other_details'];

$defendant_name = $_POST['defendant_name'];
$defendant_address = $_POST['defendant_address'];
$defendant_name=$_POST['defendant_name'];
$defendant_city=$_POST['defendant_city'];
$defendant_state=$_POST['defendant_state'];
$defendant_zip=$_POST['defendant_zip'];
$defendant_phone=$_POST['defendant_phone'];

$crime_type=$_POST['crime_type'];
$date_of_crime=$_POST['date_of_crime'];
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

$query="INSERT INTO case_details(`litigant_name`, `litigant_address`, `litigant_city`, `itigant_state`, `litigant_zip`, `litigant_phone`, `defendent_name`, `defendant_address`, `defendant_city`, `defendant_state`, `defendant_zip`, `defendant_phone`, `crime_type`, `date_of_commitment`, `crime_loc`, `arresting_officer_name`, `date_of_arrest`, `congizable_crime`, `other_details`) VALUES ('".$litigant_name."','".$litigant_address."','".$litigant_city."','".$litigant_state."','".$litigant_zip."','".$litigant_phone."','".$defendant_name."','".$defendant_address."','".$defendant_city."','".$defendant_state."','".$defendant_zip."','".$defendant_phone."','".$crime_type."','".$date_of_crime."','".$crime_locaiton."','".$arresting_offr__name."','".$date_of_arrest."','".$cognizable_check."','".$other_details."')";



if ($conn->query($query) === TRUE) {


    $query="SELECT CIN FROM case_details WHERE litigant_name='".$litigant_name."' AND defendent_name='".$defendant_name."' AND crime_type='".$crime_type."' AND date_of_commitment='".$date_of_crime."'";

    $result=$conn->query($query);
    if ($result->num_rows > 0) {
        $row = $retval->fetch_assoc();
        $cin=$row["CIN"];
        echo $cin;

    }
    echo '<script language="javascript">';
    echo 'alert("Your Case has been Registered with CIN:"'.$cin.')';
    echo '</script>';
    header("Refresh: 20; url=register_new_case.php");


}

else {
    echo '<script language="javascript">';
    echo 'alert("Error in Case Registration..Please Try Again")';
    echo '</script>';

    header('Location: register_new_case.php');
}

$conn->close();

?>
