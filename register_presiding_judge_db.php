<?php
/**
 * Created by PhpStorm.
 * User: saurabhima
 * Date: 5/4/17
 * Time: 1:15 AM
 */
$dbusername = "sierra";
$dbpassword = "NETSCAPE1";
$database = "judicial_database";
$conn = new mysqli($ip_address, $dbusername, $dbpassword,$database);
$cin = $_POST['cin'];
$presiding_judge=$_POST['judge_name'];
if (mysqli_connect_errno($conn))
{
    echo "Failed to connect to DataBase: " . mysqli_connect_error();
}else {

    $query="UPDATE case_details SET presiding_judge='".$presiding_judge."',case_status='Current' WHERE CIN='".$cin."'";

    $conn->query($query);
    $result = mysqli_query($conn, "SELECT total_current_cases FROM judge_details WHERE judge_name='".$presiding_judge."'");

    $row = mysqli_fetch_array($result);
    $judge_load=$row[0];
    $new_judge_load=$judge_load+1;
    $query="UPDATE judge_details SET total_current_cases='".$new_judge_load."' WHERE judge_name='".$presiding_judge."'";

    $conn->query($query);
    $conn->close();
    header('Location: allot_judge_to_fresh_case.php');

}
$conn->close();
?>