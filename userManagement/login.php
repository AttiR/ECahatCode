<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <!-- FontAwsome -->
    <script src="https://kit.fontawesome.com/d54712eab9.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sign in- Echatcode</title>
</head>

<body>

</body>

</html>
<header>
    <?php include 'loginhandeler.php'?>

    <section id="user-form">

        <h1 class="text-center" style="color: orange; margin: 30px auto;">Already have a Account Login!</h1>
        <div class="user-form">
            <div class="vertical-center">
                <div class="enter-form">
                    <img class="user-img"
                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSC-wm6_089pLSBSCkzKLlx6hDkYt1rI-lYMz8-Uglyw_fQPJ3O-zxANjEoMjAx4tFyvBk&usqp=CAU"
                        alt="image">
                    <form action="" method="post">

                        <?php echo $accountNotExistErr; ?>
                        <?php echo $emailPwdErr; ?>
                        <?php echo $verificationRequiredErr; ?>
                        <?php echo $email_empty_err; ?>
                        <?php echo $pass_empty_err; ?>
                        <?php
if (isset($_SESSION['emailsent'])) {
    echo '<p style= color:green>' . $_SESSION['emailsent'] . '</p>';

}
if (isset($_SESSION['updatemessage'])) {
    echo '<p style= color:green>' . $_SESSION['updatemessage'] . '</p>';

}
if (isset($_SESSION['message'])) {
    echo $_SESSION['message'];
}
?>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email_signin" id="email_signin" value=""
                                placeholder="enter your email" />
                        </div>

                        <div class="form-group">
                            <input type="password" class="form-control" name="password_signin" id="password_signin"
                                value="" placeholder="enter your password" />

                        </div>



                        <p style="color: #fff;">Forgot Password? <a class="text-dark" href="recover.php"
                                style="text-decoration:none">
                                click
                                here </a> </p>


                        <input style="margin:13px auto" class="form-check-input" name="remember" type="checkbox" <label
                            class="form-check-label">
                        Remember Me
                        </label>
                        <button type="submit" name="login" id="login" class=" user-btn ">sign in
                        </button>


                        <p style="color: #fff; margin: 15px auto ">Create Account <a class="text-dark" href="signup.php"
                                style="text-decoration:none">
                                click
                                here </a>
                        </p>
                        <p style="color: #fff;">Home: <a class="text-dark" href="../index.php"
                                style="text-decoration:none">
                                click
                                here </a>
                        </p>

                    </form>
                </div>
            </div>
        </div>
    </section>