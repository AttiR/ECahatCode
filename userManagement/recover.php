<?php

include '../config/dbcon.php';
use PHPMailer\PHPMailer\PHPMailer;

global $email_sent_srror;
global $email_empty_error, $email_notexit;

//fetch Email

if (isset($_POST["submit"])) {

    $email = $_POST["email"];
    // clean data
    $user_email = filter_var($email, FILTER_SANITIZE_EMAIL);

    // check if email already exit
    $email_check_query = "SELECT * FROM code_users WHERE email = '{$user_email}' ";
    $query = mysqli_query($connect, $email_check_query);
    $emailcount = mysqli_num_rows($query);

    if (!$query) {
        die("SQL query failed: " . mysqli_error($connect));
    }
    if (!empty($user_email)) {

        if ($emailcount > 0) {

            $userdata = mysqli_fetch_array($query); // we can fetch all desire values
            $token = $userdata['token'];
            $active = $userdata['is_active'];
            if ($active == '1') {

                // Send email to a user who enters the email for recovery

                $msg = 'Click on the activation link to verify your email. <br><br>
                            <a href="http://localhost:8080/EChatCode/userManagement/resetpassword.php?token=' . $token . '"> Click here Reset Password!</a>
                            ';

                require '../lib/Exception.php';
                require '../lib/PHPMailer.php';
                require '../lib/SMTP.php';

                // Create Instance of PHPMailer
                $mail = new PHPMailer();

                // set mailer to use SMTP

                $mail->isSMTP();

                // define smtp host
                $mail->Host = "smtp.gmail.com";

                //enable smtp authentication

                $mail->SMTPAuth = "true";

                // set type of encryption (ssl/tls)

                $mail->SMTPSecure = "tls";

                // set port to connect smtp

                $mail->Port = "587";

                // username

                $mail->Username = "attirehman388@gmail.com";
                $mail->Password = "Access@@899";

                // Email Subject body etc

                $mail->Subject = "Reset Password";
                $mail->setFrom('attirehman388@gmail.com');
                $mail->Body = $msg;

                // Add recipient

                $mail->addAddress($email);

                if ($mail->send()) {

                    $_SESSION['message'] = "check ur email for password resset link";
                    header('location: login.php');

                } else {
                    $email_sent_srror = "<div class='alert alert-danger email_alert'>
                Email not sent.
                 </div>";
                }

                // closing smtp connection
                $mail->smtpClose();

            } else {
                $email_notexit = "<div class='alert alert-danger email_alert'>
                Email not verified.
                 </div>";
            }

        } else {
            $email_empty_error = "<div class='alert alert-danger email_alert'>
            Email not exit.
             </div>";
        }

    } else {
        $email_empty_error = "<div class='alert alert-danger email_alert'>
        Email not provided.
         </div>";
    }

}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <!-- FontAwsome -->
    <script src="https://kit.fontawesome.com/d54712eab9.js" crossorigin="anonymous"></script>


    <title>Recover Email - EchatCode</title>
</head>

<body>

    <section id="user-form">
        <div class="user-formm">
            <div class="vertical-center">
                <div class="enter-form">
                    <h3 class="text-center" style="color: #e87c1e;">Recover Email</h3>
                    <p style="color: #fff; text-align:center">Enter correct email to recover the password</p>
                    <?php echo $email_empty_error; ?>
                    <?php echo $email_notexit; ?>
                    <?php echo $email_sent_srror; ?>

                    <form action="" method="post">

                        <div class="form-group">
                            <input type="email" class="form-control" name="email" />
                        </div>
                        <button type="submit" name="submit" id="submit"
                            style="margin-bottom: 15px;background: orange; color:#fff" class="btn btn-lg btn-block">
                            Send Email
                        </button>

                        <p style=" color:#fff">Have an Accoount? <a style="text-decoration:none " href="login.php">Log
                                In</a>
                        </p>
                        <p style=" color:#fff">Back to Home! <a style="text-decoration:none "
                                href="../index.php">Home</a>
                        </p>
                    </form>
                </div>

            </div>
        </div>

    </section>

</body>

</html>