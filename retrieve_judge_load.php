<?php
/**
 * Created by PhpStorm.
 * User: saurabhima
 * Date: 31/3/17
 * Time: 9:19 AM
 */
header('Content-Type: application/json');
$dbusername = "sierra";
$dbpassword = "NETSCAPE1";
$database = "judicial_database";
$conn = new mysqli($ip_address, $dbusername, $dbpassword,$database);


if (mysqli_connect_errno($conn))
{
    echo "Failed to connect to DataBase: " . mysqli_connect_error();
}else
{
    $data_points = array();

    $result = mysqli_query($conn, "SELECT judge_name,total_current_cases FROM judge_details WHERE 1");

    while($row = mysqli_fetch_array($result))
    {
        $point = array("label" => $row['judge_name'] , "y" => $row['total_current_cases']);

        array_push($data_points, $point);
    }

    $fp = fopen('judge_load.json', 'w');
    fwrite($fp, json_encode($data_points));
    fclose($fp);
    echo json_encode($data_points, JSON_NUMERIC_CHECK);
}
mysqli_close($con);


?>