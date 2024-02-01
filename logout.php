<?php

include('dbcon.php');
unset($_SESSION['authenticated']);
unset($_SESSION['auth_user']);

$_SESSION['status'] = "Bye Bye... You Are Logged Out Successfully...";
header('location:login.php');


?>