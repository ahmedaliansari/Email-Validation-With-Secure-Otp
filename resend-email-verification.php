<?php
include('dbcon.php');
$page_title = "Login Page";
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <?php
                if (isset($_SESSION["status"])) {
                    echo "<h4>" . $_SESSION["status"] . "</h4>";
                    unset($_SESSION["status"]);
                }
                ?>
                <div class="card shadow">
                    <div class="card-header">
                        <h5>Resend Email Verification</h5>

                    </div>

                    <div class="card-body">
                        <form action="resend_code.php" method="POST">

                            <div class="form-group mb-3">
                                <label for="">Email</label>
                                <input type="text" class="form-control" name="email">
                            </div>

                            <div class="form-group mb-3">
                                <button type="submit" name="resend_email_verify_btn" class="btn btn-primary">Send Code</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php include('includes/footer.php') ?>