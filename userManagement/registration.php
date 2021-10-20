<?php
// Database connection
include '../config/dbcon.php';

use PHPMailer\PHPMailer\PHPMailer;

// Error & success messages
global $email_exist, $password_notmatched, $user_nameexist, $fname_error, $lname_error, $uname_error, $email_error, $password_error, $repassword_error;
global $fNameEmptyErr, $lNameEmptyErr, $uNameEmptyErr, $emailEmptyErr, $passwordEmptyErr, $repasswordEmptyErr, $email_sent_status;

// Set empty form vars for validation mapping
$_first_name = $_last_name = $_user_name = $_email = $_password = $_repassword = "";
$insert = false;

if (isset($_POST["submit"])) {

    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $repassword = $_POST["repassword"];

    // check if email already exist
    $email_check_query = mysqli_query($connect, "SELECT * FROM code_users WHERE email = '{$email}' ");
    $rowemail = mysqli_num_rows($email_check_query);

    // check if user name already exit

    $user_check_query = mysqli_query($connect, "SELECT * FROM code_users WHERE username = '{$username}' ");
    $rowuser = mysqli_num_rows($user_check_query);

    // PHP validation
    // Verify if form values are not empty
    if (!empty($firstname) && !empty($lastname) && !empty($username) && !empty($email) && !empty($password) && !empty($repassword)) {

        // check if user email already exist
        if ($rowemail > 0) {
            $email_exist = '
                <div class="alert alert-danger" role="alert">
                    User with email already exist!
                </div>
            ';
        }
        if ($rowuser > 0) {
            $user_nameexist = '
                <div class="alert alert-danger" role="alert">
                    User anme already exist, choose new!
                </div>
            ';
        }

        if ($password != $repassword) {
            $password_notmatched = '
            <div class="alert alert-danger" role="alert">
                password do not matched!
            </div>
        ';

        } else {
            // clean the form data before sending to database
            $_first_name = mysqli_real_escape_string($connect, $firstname);
            $_last_name = mysqli_real_escape_string($connect, $lastname);
            $_user_name = mysqli_real_escape_string($connect, $lastname);
            $_email = mysqli_real_escape_string($connect, $email);
            $_password = mysqli_real_escape_string($connect, $password);
            $_repassword = mysqli_real_escape_string($connect, $repassword);

            // perform validation
            if (!preg_match("/^[a-zA-Z ]*$/", $_first_name)) {
                $fname_error = '<div class="alert alert-danger">
                        Only letters and white space allowed.
                    </div>';
            }
            if (!preg_match("/^[a-zA-Z ]*$/", $_last_name)) {
                $lname_error = '<div class="alert alert-danger">
                        Only letters and white space allowed.
                    </div>';
            }
            if (!preg_match("/^[a-zA-Z ]*$/", $_user_name)) {
                $uname_error = '<div class="alert alert-danger">
                        Only letters and white space allowed.
                    </div>';
            }
            if (!filter_var($_email, FILTER_VALIDATE_EMAIL)) {
                $email_error = '<div class="alert alert-danger">
                        Email format is invalid.
                    </div>';
            }

            if (!preg_match("/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{7,15}$/", $_password)) {
                $password_error = '<div class="alert alert-danger">
                         Password should be between 7 to 15 charcters long, contains atleast one special chacter, lowercase, uppercase and a digit.
                    </div>';
            }
            if (!preg_match("/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{7,15}$/", $_repassword)) {
                $repassword_error = '<div class="alert alert-danger">
                         Password should be between 7 to 15 charcters long, contains atleast one special chacter, lowercase, uppercase and a digit.
                    </div>';
            }

            // Store the data in db, if all the preg_match condition met
            if ((preg_match("/^[a-zA-Z ]*$/", $_first_name)) && (preg_match("/^[a-zA-Z ]*$/", $_last_name)) && (preg_match("/^[a-zA-Z ]*$/", $_user_name)) &&
                (filter_var($_email, FILTER_VALIDATE_EMAIL)) &&
                (preg_match("/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{7,15}$/", $_password))
            ) {

                // Generate random activation token (it does not depends on  any plugin)
                $token = md5(rand() . time());

                // Password hash
                $password_hash = password_hash($password, PASSWORD_BCRYPT);
                $repassword_hash = password_hash($repassword, PASSWORD_BCRYPT);

                // Query
                $sql = "INSERT INTO code_users (firstname, lastname, email, username, password, token, is_active,
                date_time) VALUES ('{$firstname}', '{$lastname}', '{$email}', '{$username}', '{$password_hash}',
                '{$token}', '0', current_timestamp())";

                // Create mysql query
                $sqlQuery = mysqli_query($connect, $sql);
                /*$sqlQuery = $connect->query($sql) or die('insert failed<br>' . $sql . '<br>' . mysqli_error($connect));*/

                if (!$sqlQuery) {
                    die("MySQL query failed!" . mysqli_error($connect));
                } else {

                    $insert = true;

                }

                if ($sqlQuery) {
                    $msg = 'Click on the activation link to verify your email. <br><br>
                      <a href="http://localhost:8080/EChatCode/user_verification.php?token=' . $token . '"> Click here to verify email</a>
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
                    $mail->Password = "xxxxxxxx";

                    // Email Subject body etc

                    $mail->Subject = "Test Email Using PHP";
                    $mail->setFrom('attirehman388@gmail.com');
                    $mail->Body = $msg;

                    // Add recipient

                    $mail->addAddress($email);

                    if ($mail->send()) {

                        $_SESSION['emailsent'] = "A verification email has been sent to you,
                        please verify the link to complete the registration";
                        header('location: login.php');

                    } else {
                        $_SESSION['emailsent'] = "Registration Not succeeded, Email send Failure.";
                        header('location: login.php');
                    }

                    // closing smtp connection
                    $mail->smtpClose();

                }

            }
        }
    } else {
        if (empty($firstname)) {
            $fNameEmptyErr = '<div class="alert alert-danger">
                First name can not be blank.
            </div>';
        }
        if (empty($lastname)) {
            $lNameEmptyErr = '<div class="alert alert-danger">
                Last name can not be blank.
            </div>';
        }
        if (empty($username)) {
            $uNameEmptyErr = '<div class="alert alert-danger">
                Last name can not be blank.
            </div>';
        }
        if (empty($email)) {
            $emailEmptyErr = '<div class="alert alert-danger">
                Email can not be blank.
            </div>';
        }
        if (empty($password)) {
            $passwordeEmptyErr = '<div class="alert alert-danger">
                Mobile number can not be blank.
            </div>';
        }
        if (empty($repassword)) {
            $repasswordEmptyErr = '<div class="alert alert-danger">
                Password can not be blank.
            </div>';
        }
    }
}