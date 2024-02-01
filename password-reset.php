<?php
include('dbcon.php');

$page_title = "Password Reset Form";
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
                        <h5>Reset Password</h5>

                    </div>

                    <div class="card-body">
                        <form action="password-reset-code.php" method="POST">

                            <div class="form-group mb-3">
                                <label for="">Email</label>
                                <input type="text" class="form-control" name="email">
                            </div>

                            <div class="form-group mb-3">
                                <button type="submit" name="password_reset_link" class="btn btn-primary">Sent Password Reset Link</button>

                            </div>

                        </form>
                        

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php include('includes/footer.php') ?>