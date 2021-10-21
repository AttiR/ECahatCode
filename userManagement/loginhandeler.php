<?php
include '../config/dbcon.php';

global $wrongPwdErr, $accountNotExistErr, $emailPwdErr, $verificationRequiredErr, $email_empty_err, $pass_empty_err;

if (isset($_POST['login'])) {
    $email_signin = $_POST['email_signin'];
    $password_signin = $_POST['password_signin'];

    // clean data
    $user_email = filter_var($email_signin, FILTER_SANITIZE_EMAIL);
    $pswd = mysqli_real_escape_string($connect, $password_signin);

    // Query if email exists in db
    $sql = "SELECT * From code_users WHERE email = '{$user_email}' ";
    $query = mysqli_query($connect, $sql);
    $rowCount = mysqli_num_rows($query);

    // If query fails, show the reason
    if (!$query) {
        die("SQL query failed: " . mysqli_error($connect));
    }

    if (!empty($user_email) && !empty($password_signin)) {
        if (!preg_match("/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{7,15}$/", $pswd)) {
            $wrongPwdErr = '<div class="alert alert-danger">
                        Password should be between 7 to 15 charcters long, contains atleast one special chacter, lowercase, uppercase and a digit.
                    </div>';
        }
        // Check if email exist
        if ($rowCount <= 0) {
            $accountNotExistErr = '<div class="alert alert-danger">
                        User account does not exist.
                    </div>';
        } else {
            // Fetch user data and store in php session

            // here we need only email, password
            while ($row = mysqli_fetch_array($query)) {
                $id = $row['id'];
                $firstname = $row['firstname'];
                $lastname = $row['lastname'];
                $email = $row['email'];
                $username = $row['username'];
                $is_active = $row['is_active'];
                $pass_word = $row['password'];
                $joined_date = $row['date_time'];

            }

            // Verify password
            $password = password_verify($password_signin, $pass_word);

            // Allow only verified user
            if ($is_active == '1') {
                if ($email_signin == $email && $password_signin == $password) {

                    $_SESSION['loggedin'] = true;
                    $_SESSION['uid'] = $id; // we will use thsi for userid as logged in
                    $_SESSION['useremail'] = $email;
                    $_SESSION['username'] = $username;
                    $_SESSION['joindate'] = $joined_date;
                    echo "logged in" . $email;

                    header("Location: ../index.php");

                } else {
                    $emailPwdErr = '<div class="alert alert-danger">
                                Either email or password is incorrect.
                            </div>';
                }
            } else {
                $verificationRequiredErr = '<div class="alert alert-danger">
                            Account verification is required for login.
                        </div>';
            }

        }

    } else {
        if (empty($user_email)) {
            $email_empty_err = "<div class='alert alert-danger email_alert'>
                            Email not provided.
                    </div>";
        }

        if (empty($password_signin)) {
            $pass_empty_err = "<div class='alert alert-danger email_alert'>
                            Password not provided.
                        </div>";
        }
    }

}