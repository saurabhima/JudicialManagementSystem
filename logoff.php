<?php
/**
 * Created by PhpStorm.
 * User: saurabhima
 * Date: 24/3/17
 * Time: 2:10 AM
 */
session_start();
$_SESSION["login"] = "False";
$_SESSION["UserID"] = "";
$_SESSION["account_type"]="";
header("location: index.php");
?>