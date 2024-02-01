<?php
session_start();

include('dbcon.php');

if(isset($_GET['token'])){
    $token = $_GET['token'];
    $verify_token = "SELECT verify_token,verify_status FROM users WHERE verify_token = '$token' LIMIT 1";
    $verify_token_run = mysqli_query($con,$verify_token);

    if(mysqli_num_rows($verify_token_run) > 0){

        $row = mysqli_fetch_array($verify_token_run);
        if($row['verify_status'] == '0'){

            $clicked_token = $row['verify_token'];
            $update_query = "UPDATE users SET verify_status = '1' WHERE verify_token = '$clicked_token' LIMIT 1";
            $update_query_run = mysqli_query($con,$update_query);

            if($update_query_run){
                $_SESSION['status'] = "Your Account Has Been Verified Successfully...";
                header('location:login.php');
                exit(0);
            }

            else{
                $_SESSION['status'] = "Ooop's !!! Verification Failed...";
                header('location:login.php');
                exit(0);
            }
            

        }

        else{
            $_SESSION['status'] = "Email Already Verified..! Please Go To Login...";
            header('location:login.php');
            exit(0);
        }
        
    }

    else{
        $_SESSION['status'] = "This Token Does Not Exists";
        header('location:login.php');
    }


}

else{
    $_SESSION['status'] = "You Are Not Allowed";
    header('location:login.php');
}
?>