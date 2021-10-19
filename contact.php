<?php
include './config/dbcon.php'; // connection to db

$insert = false;
use PHPMailer\PHPMailer\PHPMailer;

// Error and sucess messages
global $emptyname, $emptyemail, $emptymobile, $emptyfeedback;
global $name_error, $email_error, $mobile_error, $feedback_error;
global $email_sent;

// Set empty form vars for validation mapping
$_name = $_email = $_mobile_number = $_feedback = "";

if (isset($_POST["submit"])) {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $mobilenumber = $_POST["mobilenumber"];
    $feedback = $_POST["feedback"];
    //$feedback = str_replace("<", "&lt;", $feedback); preveting from xxs attacks, we can aslo used
    $feedback = htmlspecialchars($_POST['feedback']);
    //$feedback = str_replace("<", "&gt;", $feedback);

    // PHP validation
    // Verify if form values are not empty
    if (!empty($name) && !empty($email) && !empty($mobilenumber) && !empty($feedback)) {

        // clean the form data before sending to database
        $_name = mysqli_real_escape_string($connect, $name);
        $_email = mysqli_real_escape_string($connect, $email);
        $_mobile_number = mysqli_real_escape_string($connect, $mobilenumber);
        $_feedback = mysqli_real_escape_string($connect, $password);

        // perform validation
        if (!preg_match("/^[a-zA-Z ]*$/", $_name)) {
            $name_error = '<div class="alert alert-danger">
                          Only letters and white space allowed.
                      </div>';
        }
        if (!filter_var($_email, FILTER_VALIDATE_EMAIL)) {
            $email_error = '<div class="alert alert-danger">
                          Email format is invalid.
                      </div>';
        }
        if (!preg_match("/^[0-9]{10}+$/", $_mobile_number)) {
            $mobile_error = '<div class="alert alert-danger">
                          Only 10-digit mobile numbers allowed.
                      </div>';
        }

        // Store the data in db, if all the preg_match condition met
        if ((preg_match("/^[a-zA-Z ]*$/", $name)) &&
            (filter_var($_email, FILTER_VALIDATE_EMAIL)) && (preg_match("/^[0-9]{10}+$/", $_mobile_number))

        ) {

            // Query
            $sql = "INSERT INTO `code_feedback` (`name`, `email`, `mobile_number`, `feedback`, `date & time`) VALUES ('$name', '$email', '$mobilenumber', '$feedback', current_timestamp())";

            // Create mysql query
            $sqlQuery = mysqli_query($connect, $sql);

            if (!$sqlQuery) {
                die("MySQL query failed!" . mysqli_error($connect));
            } else {

                $insert = true;

            }

            if ($sqlQuery) {
                $msg = ' Thank you for Your Value able Feedabck, if necessary our representative will contact you.
                ';

                require './lib/Exception.php';
                require './lib/PHPMailer.php';
                require './lib/SMTP.php';

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
                $mail->Password = "xxxxxxxxx";

                // Email Subject body etc

                $mail->Subject = "Test Email Using PHP";
                $mail->setFrom('attirehman388@gmail.com');
                $mail->Body = $msg;

                // Add recipient

                $mail->addAddress($email);

                if ($mail->send()) {

                    $email_sent = '<small>email has been sent you.</small>';

                } else {
                    $email_sent = '<small>Email Not sent.</small>';
                }

                // closing smtp connection
                $mail->smtpClose();

            }

        }
    } else {
        if (empty($name)) {
            $emptyname = '<div class="alert alert-danger">
                   name can not be blank.
              </div>';
        }

        if (empty($email)) {
            $emptyemail = '<div class="alert alert-danger">
                  Email can not be blank.
              </div>';
        }
        if (empty($mobilenumber)) {
            $emptymobile = '<div class="alert alert-danger">
                  Mobile number can not be blank.
              </div>';
        }
        if (empty($feedback)) {
            $emptyfeedback = '<div class="alert alert-danger">
                  feedback can not be blank.
              </div>';
        }

    }
}

?>
<header>
    <?php include 'view/header.php'?>
</header>
<section id="user-form">

    <center>
        <div style="width: 50%; margin:30px auto 30px auto">
            <h1 id="title" class="text-center" style="color: orange;">Contact Us</h1>
            <h4 class="text-center" style="margin-bottom: 40px;">We valued your Feedback</h4>
            <!-- <p id="description" class="description text-center">

            </p>-->
        </div>

    </center>
    <div class="contact-form">




        <form action="contact.php" id="feedback-form" method="post">
            <img class="user-img" src="https://miro.medium.com/max/400/1*3dCx6otO8CKqWVyPjCURFw.png" alt="image">
            <?php
if ($insert == true) {
    echo "<p class='submitMsg'>Thanks for submitting your Feedback. We valued your opinion, a confirmation $email_sent</p>";
}
?>
            <div class="form-group">
                <input type="text" name="name" id="name" class="form-control" placeholder="Enter your full name" />
                <?php echo $emptyname ?>
                <?php echo $name_error ?>
            </div>
            <div class="form-group">
                <input type="email" name="email" id="email" class="form-control" placeholder="Enter your Email" />
                <?php echo $emptyemail ?>
                <?php echo $email_error ?>
            </div>
            <div class="form-group">
                <input type="number" name="mobilenumber" id="mobilenumber" class="form-control"
                    placeholder="mobilenumber" />
                <?php echo $emptymobile ?>
                <?php echo $mobile_error ?>
            </div>



            <div class="form-group">
                <textarea name="feedback" id="feedback" class="input-textarea"
                    placeholder="Enter your comment here..."></textarea>
                <?php echo $emptyfeedback ?>
                <?php echo $feedback_error ?>
            </div>

            <div class="form-group">
                <button type="submit" name="submit" id="submit" class="submit-button">
                    Send Feedback
                </button>
            </div>
        </form>
    </div>
</section>




<div class="vertical-center">
    <div class="enter-form">

        <h2 style="color: orange;">Contact Information</h2>
        <p style="color: #fff;">Adress: Helsinki 234X <br> P.O.Box xx34 <br> Finland
            <br> Email: chatcodee@gmail.com <br>Cell: +3584324xxx2
        </p>

    </div>

</div>

<?php include 'view/footer.php'?>