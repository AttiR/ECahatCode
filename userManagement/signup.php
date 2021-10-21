<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../css/styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <!-- FontAwsome -->
    <script src="https://kit.fontawesome.com/d54712eab9.js" crossorigin="anonymous"></script>
    <title>Sign Up - Echatcode</title>
</head>

<body>

    <?php include './registration.php';?>


    <section id="user-form">
        <h2 class="text-center
    " style="color: orange;margin-top:40px">Register Free with Us</h2>
        <p class="text-center" style="color: #fff;margin-bottom:50px">We Valued our Users!</p>
        <div class="user-info">
            <div class=" vertical-center">
                <div class="enter-form">
                    <form action="" method="post">



                        <img class="user-img"
                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcToZ7e1RiEeyPFKpPgt8sYCuRF-_YLM4noPCrOkN5lCmRTUzQek7CELG6PM4q7SQtHR5nE&usqp=CAU"
                            alt="">
                        <?php
if ($insert == true) {echo " <p style= 'color:green;' > Success Fully Register, $email_sent_status </p> ";}
?>

                        <?php echo $email_exist; ?>
                        <?php echo $user_nameexist; ?>
                        <?php echo $password_notmatched; ?>

                        <div class="form-group">

                            <input type="text" class="form-control" name="firstname" id="firstName"
                                placeholder="enter first name" />
                            <?php echo $fNameEmptyErr; ?>
                            <?php echo $fname_error; ?>

                        </div>

                        <div class="form-group">

                            <input type="text" class="form-control" name="lastname" id="lastname"
                                placeholder="enter last name" />
                            <?php echo $lNameEmptyErr; ?>
                            <?php echo $lname_error; ?>


                        </div>
                        <div class="form-group">

                            <input type="text" class="form-control" name="username" id="usertname"
                                placeholder="enter user name" />
                            <?php echo $uNameEmptyErr; ?>
                            <?php echo $uname_error; ?>
                        </div>

                        <div class="form-group">
                            <input type="email" class="form-control" name="email" id="email"
                                placeholder="enter email" />
                            <?php echo $email_error; ?>
                            <?php echo $emailEmptyErr; ?>
                        </div>

                        <div class="form-group">
                            <input type="password" class="form-control" name="password" id="password"
                                placeholder="enterpassword" />
                            <?php echo $password_error; ?>
                            <?php echo $passwordEmptyErr; ?>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="repassword" id="repassword"
                                placeholder="re-enterpassword" />
                            <?php echo $repassword_error; ?>
                            <?php echo $repasswordEmptyErr; ?>
                        </div>


                        <button type="submit" name="submit" id="submit" class="user-btn">Sign up
                        </button>

                        <p style="color: #fff; margin: 15px auto ">Log in <a class="text-dark" href="login.php"
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

</body>

</html>