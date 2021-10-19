<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../css/styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sign in- Echatcode</title>
</head>

<body>

</body>

</html>
<header>
    <?php include 'loginhandeler.php'?>
    <?php include '../view/header.php';?> </header>

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

                    <div class="form-group">
                        <input type="email" class="form-control" name="email_signin" id="email_signin" value=""
                            placeholder="enter your email" />
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control" name="password_signin" id="password_signin" value=""
                            placeholder="enter your password" />

                    </div>



                    <p style="color: #fff;">Forgot Password? <a href="RecoverEmail.php" style="color: orange;">
                            Click
                            Here </a> </p>

                    <div class="form-check">
                        <input class="form-check-input" name="remember" type="checkbox">
                        <label class="form-check-label" />
                        Remember Me
                        </label>
                    </div>

                    <button type="submit" name="login" id="login" class=" user-btn">sign in
                    </button>
                    <p style="color: #fff;">Create Account <a href="signup.php" style="color: orange;"> Click
                            Here </a>
                    </p>

                </form>
            </div>
        </div>
    </div>

</section>
<?php include '../view/footer.php';?>