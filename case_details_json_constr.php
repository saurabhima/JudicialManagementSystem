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

    $query="SELECT case_details.CIN,case_details.litigant_name,case_details.defendent_name,case_details.crime_type,case_details.date_of_commitment,case_details.crime_loc,case_details.case_status,case_details.presiding_judge,case_text.text_file_path FROM case_details,case_text WHERE case_details.CIN=case_text.CIN  
ORDER BY case_text.text_file_path DESC";
    $result = mysqli_query($conn,$query);

    while($row = mysqli_fetch_array($result))
    {
        $casetext_file=$row['text_file_path'];
        if ($casetext_file!=0)
        {
            $case_text_str='<a href="show_case_details.php?casetext='.$casetext_file.'">'.$row['CIN'].'</a>';

        }
        else
        {
            $case_text_str=$row['CIN'];
        }
        $point = array("cin" => $case_text_str , "litigantName" => $row['litigant_name']
        ,"defendentName"=> $row['defendent_name'],"crimeType"=> $row['crime_type'],"dateofCommitment"=> $row['date_of_commitment'],"crimeLoc"=> $row['crime_loc'],"caseStatus"=> $row['case_status'],"presidingJudge"=> $row['presiding_judge']


        );

        array_push($data_points, $point);
    }

    $fp = fopen('case_details.json', 'w');
    fwrite($fp, json_encode($data_points));
    fclose($fp);
    echo json_encode($data_points, JSON_NUMERIC_CHECK);
}
mysqli_close($con);


?>