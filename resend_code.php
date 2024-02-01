<?php
include('dbcon.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

function resend_email_verify($name, $email, $verify_token) {

 {
    $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->SMTPAuth   = true;
        $mail->Host       = 'smtp.gmail.com';
        $mail->Username   = 'hafizahmedaliansari123@gmail.com';
        $mail->Password   = 'rmmi khmh zmrl khdk';
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        $mail->setFrom('hafizahmedaliansari123@gmail.com', $name);
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = "Resend - Email Address Verification With Al-Ahmed.Com IT Company";
        
        $email_template = "
        <div style='background-color: #f8f9fa; padding: 20px; font-family: Arial, sans-serif;'>
            <div style='max-width: 600px; margin: 0 auto; background-color: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);'>
                <div style='padding: 20px; text-align: center;'>
                    <h2 style='color: #007bff; margin-bottom: 20px;'>Hello $name,</h2>
                    <p style='font-size: 18px; color: #555;'>You have been registered with Al-Ahmed.Com</p>
                    <hr style='border-top: 1px solid #ddd; margin: 20px 0;'>
                    <p style='font-size: 16px; color: #888;'>Verify your email address to log in with the below given link:</p>
                    <p style='margin: 20px 0;'>
                        <a style='display: inline-block; padding: 10px 20px; background-color: #007bff; color: #fff; text-decoration: none; border-radius: 5px;' href='http://localhost/php/Advanced Signup & Login With Token/verify_email.php?token=$verify_token'>Click Me</a>
                    </p>
                </div>
            </div>
        </div>
    ";
    
        
        $mail->Body = $email_template;

        $mail->send();
        // echo "mail has been sent";
 }

}

if (isset($_POST['resend_email_verify_btn'])) {
    if (!empty(trim($_POST['email']))) {
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $check_email_query = "SELECT email, verify_status FROM users WHERE email = '$email' LIMIT 1";
        $check_email_query_run = mysqli_query($con, $check_email_query);

        if (mysqli_num_rows($check_email_query_run) > 0) {
            $row = mysqli_fetch_array($check_email_query_run);

            if ($row['verify_status'] == '0') {
                
                $name = $row['name'];
                $email = $row['email'];
                $verify_token = $row['verify_token'];

                resend_email_verify($name, $email, $verify_token);
                $_SESSION['status'] = "Verification email resent. Please check your email.";
                header('location:login.php');
                exit(0);
            } 
            
            else {
                $_SESSION['status'] = "Email is already verified. Please login now.";
                header('location:resend-email-verification.php');
                exit(0);
            }

        } else {
            $_SESSION['status'] = "Email is not registered. Please register now.";
            header('location:register.php');
            exit(0);
        }

    }
    
    else
     {
        $_SESSION['status'] = "Please enter the email field.";
        header('location:resend-email-verification.php');
        exit(0);
    }
}
