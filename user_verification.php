<?php include './view/header.php'?>

<?php

include './config/dbcon.php';

global $email_verified, $email_already_verified, $activation_error;

// GET the token = ?token
if (!empty($_GET['token'])) {
    $token = $_GET['token'];
} else {
    $token = "";
}

if ($token != "") {
    $sqlQuery = mysqli_query($connect, "SELECT * FROM code_users WHERE token = '$token' ");
    $countRow = mysqli_num_rows($sqlQuery);

    if ($countRow == 1) {
        while ($rowData = mysqli_fetch_array($sqlQuery)) {
            $is_active = $rowData['is_active'];
            if ($is_active == 0) {
                $update = mysqli_query($connect, "UPDATE code_users SET is_active = '1' WHERE token = '$token' ");
                if ($update) {
                    $email_verified = '<div class="alert alert-success">
    User email successfully verified!
</div>
';
                }
            } else {
                $email_already_verified = '<div class="alert alert-danger">
    User email already verified!
</div>
';
            }
        }
    } else {
        $activation_error = '<div class="alert alert-danger">
    Activation error!
</div>
';
    }
}
?>
<section>

    <div class="container" style="margin: 50px auto">
        <div class="jumbotron text-center">
            <h1 class="display-4">User Email Verification</h1>
            <div class="col-12 mb-5 text-center">
                <?php echo $email_already_verified; ?>
                <?php echo $email_verified; ?>
                <?php echo $activation_error; ?>
            </div>
            <p class="lead">If user account is verified then click on the following button to login.</p>
            <a class="btn btn-lg" style="background: orange; color:#fff" href="./userManagement/login.php">Click to
                Login
            </a>
        </div>
    </div>
</section>
<?php
include './view/footer.php'?>