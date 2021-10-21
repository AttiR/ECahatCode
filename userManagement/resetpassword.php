<?php
include '../config/dbcon.php';

// fteching New Password
if (isset($_POST['submit'])) {

    if (isset($_GET['token'])) {

        $token = $_GET['token'];

        $newPassword = $_POST['password'];
        $cPassword = $_POST['c_password'];

        // hashing the passwords

        $newPass = password_hash($newPassword, PASSWORD_BCRYPT);
        $cPass = password_hash($cPassword, PASSWORD_BCRYPT);

        if ($newPassword === $cPassword) {

            // updateQuery
            $updatequery = "update code_users set password = '$newPass' where token = '$token'";
            $uquery = mysqli_query($connect, $updatequery);

            if ($updatequery) {

                $_SESSION['updatemessage'] = "Your Passowrd has been updated";
                header('location:login.php');

            } else {
                $_SESSION['nupdate'] = "Your password has not been updated";
                header('location:resetpassword.php');
            }

        } else {
            echo "password not mached";
        }

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


    <title>ReseetPassword - EchatCode</title>
</head>

<body>

    <section id="user-form">
        <div class="user-formm">
            <div class="vertical-center">
                <div class="enter-form">
                    <h3>Resset Password</h3>
                    <p style="color: #fff; text-align:center">Enter new Password</p>
                    <?php
if (isset($_SESSION['nupdate'])) {

    echo $_SESSION['nupdate'];

}
?>
                    <form action="" method="post">

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" />
                        </div>

                        <div class="form-group">
                            <label>Retype-Password</label>
                            <input type="password" class="form-control" name="c_password" />
                        </div>

                        <button type="submit" name="submit" id="submit" style="margin-bottom: 15px;"
                            class="btn btn-outline-primary btn-lg btn-block"> Resset
                        </button>

                        <p style="color:#fff">Have an Accoount? <a style="color: orange;" href="login.php">Log In</a>
                        </p>
                    </form>
                </div>

            </div>
        </div>

    </section>

</body>

</html>