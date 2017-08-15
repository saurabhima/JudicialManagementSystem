<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">



    <title>Rex : Home</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="assets/css/jquery.dynatable.css" rel="stylesheet" type="text/css">
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/jquery.dynatable.js"></script>



</head>
<body>
<div class="container">
    <table class="table table-responsive table-striped" id="case-details-table" style="align-self: center" >

        <thead class="navbar-inverse">

        <th data-dynatable-column="cin">CIN</th>
        <th data-dynatable-column="litigantName">Litigant Name</th>
        <th data-dynatable-column="defendentName">Defendant Name</th>
        <th data-dynatable-column="crimeType">Crime Type</th>
        <th data-dynatable-column="dateofCommitment">Date of Commitment</th>
        <th data-dynatable-column="crimeLoc">Crime Location</th>
        <th data-dynatable-column="caseStatus">Case Status</th>
        <th data-dynatable-column="presidingJudge">Presiding Judge</th>

        </thead>
        <tbody>

        </tbody>
    </table>

</div>
<script type="text/javascript">


    $.ajax({
        url: 'case_details.json',
        success: function(data){


            $('#case-details-table').dynatable({

                dataset: {
                    records: data
                }
            });
        }
    });


</script>

</body>
</html>