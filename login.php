<?php
include('dbcon.php');

if(isset($_SESSION['authenticated']))
{
    $_SESSION['status'] = "You Are Already Logged In";
    header("location:dashboard.php");
    exit(0);

}


$page_title = "Login Page";
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <?php

                if (isset($_SESSION['status'])) {
                ?>
                    <div class="alert alert-success">
                        <h5><?= $_SESSION['status']; ?></h5>

                    </div>

                    <?php
                    unset($_SESSION['status']);
                    ?>
                <?php

                }

                ?>
                <div class="card shadow">
                    <div class="card-header">
                        <h5>Login Form</h5>

                    </div>

                    <div class="card-body">
                        <form action="login_code.php" method="POST">

                            <div class="form-group mb-3">
                                <label for="">Email</label>
                                <input type="text" class="form-control" name="email">
                            </div>

                            <div class="form-group mb-3">
                                <label for="">Password</label>
                                <input type="text" class="form-control" name="password">
                            </div>


                            <div class="form-group mb-3">
                                <button type="submit" name="login" class="btn btn-primary">Login Now</button>

                                <a href="password-reset.php" class="float-end">Forget Your Password?</a>
                            </div>

                        </form>

                        <hr>
                        <h5>Did Not Get Your Verification Email Code?
                            <a href="resend-email-verification.php">Resend</a>
                        </h5>
                        

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php include('includes/footer.php') ?>