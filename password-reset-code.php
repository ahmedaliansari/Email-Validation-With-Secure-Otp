<?php

include('dbcon.php');

function send_password_reset($get_name,$get_email,$token){
    
}

if(isset($_POST['password_reset_link'])){

    $email = mysqli_real_escape_string($con, $_POST['email']);
    $token = md5(rand());

    $check_email = "SELECT email FROm users WHERE email = '$email' LIMIT 1";
    $check_email__run = mysqli_query($con,$check_email);

    if(mysqli_num_rows($check_email_run) > 0) 
    {
        $row = mysqli_fetch_array($check_email_run);
        $get_name = $row['name']; 
        $get_email = $row['email']; 

        $update_token = "UPDATE users SET verify_token WHERE email = '$get_email' LIMIT 1";
        $update_token_run = mysqli_query($con, $update_token);

        if($update_token_run)
        {
            send_password_reset($get_name,$get_email,$token);
            $_SESSION['status'] = "We Email You a Password Reset Link... Please Check Your E-Mail...";
        header('location:password-reset.php');
        exit(0);

        }

       else
    {
        $_SESSION['status'] = "Something Went Wrong... #1";
        header('location:password-reset.php');
        exit(0);
    }


    }

    else
    {
        $_SESSION['status'] = "NO Email Found";
        header('location:password-reset.php');
        exit(0);
    }


}


?>