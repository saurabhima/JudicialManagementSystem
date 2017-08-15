<?php
session_start();
$account_type=$_SESSION["account_type"];
$userID=$_SESSION["UserID"];
$login_status=$_SESSION["login"];
if ($login_status=='True') {
    if ($account_type == 'Billing Clerk') {


        header('Location:billing_view_bill.php');
    }
    else if ($account_type == 'Lawyer')
    {
        header('Location:nonlogged_user.php');
    }
    else
    {
        header('Location:invalid_user.php');
    }
}
else
{
    header('Location:nonlogged_user.php');
}
?>


?>