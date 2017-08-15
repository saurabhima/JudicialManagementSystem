<html>
<body>
<div class="container"> <h3>Hello</h3></div>
<?php
/**
 * Created by PhpStorm.
 * User: saurabhima
 * Date: 31/3/17
 * Time: 9:19 AM
 */

$dbusername = "sierra";
$dbpassword = "NETSCAPE1";
$database = "judicial_database";
$conn = new mysqli($ip_address, $dbusername, $dbpassword,$database);


if (mysqli_connect_errno($conn))
{
    echo "Failed to connect to DataBase: " . mysqli_connect_error();
}else {


    $query = "SELECT case_text.CIN,case_text.text_file_path FROM case_text WHERE 1 ";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($result)) {
        $cin = $row['CIN'];
        $file_path = './case_records/' . $cin . '.pdf';
//       $casetext_file=$row['text_file_path'];
        if (file_exists($file_path))
        {
            $query="UPDATE case_text SET case_text.text_file_path='".$cin.".pdf'  WHERE CIN='".$cin."'";

            $conn->query($query);
        }


    }
    mysqli_close($con);
}

?>
</body>
</html>