<?php
include('dbcon.php');
if(!isset($_SESSION['authenticated']))
{
    $_SESSION['status'] = "Please Login To Access User Dashboard";
    header("location:login.php");
    exit(0);

}

?>