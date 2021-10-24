<!DOCTYPE html>
< lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" href="./css/styles.css?<?php echo time(); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Profile - EchatCode</title>
    </head>

    <?php
include './config/dbcon.php';
?>
    <header>
        <?php include './view/header.php'?>
    </header>



    <section>

        <center>

            <div class="card card-prof" style="border:none">
                <div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
                    <div class="card card2">
                        <?php

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
    echo '<div class=" image d-flex flex-column justify-content-center align-items-center">
                        <button class="btn probtn btn-secondary my-4"> <img class="imgpro"
                                src="https://www.pngitem.com/pimgs/m/35-350426_profile-icon-png-default-profile-picture-png-transparent.png"
                                height="100" width="100" />
                        </button>
                        <span class="name mt-3">' . $_SESSION['username'] . '</span> <span class="idd">' . $_SESSION['useremail'] . '</span>
                        <div class="d-flex flex-row justify-content-center align-items-center gap-2"> <span
                                class="idd1">' . $_SESSION['uid'] . '</span> <span><i class="fa fa-copy"></i></span>
                        </div>

                        <div class=" d-flex mt-2"> <a class="btn btn-dark" href="./userManagement/recover.php">
                                Change Password
                            </a>
                        </div>
                        <div class="text mt-3"> <p style = "margin: auto 2opx">Manage profile, basic information we have saved.

                                artwork.<br> Please remember the forum ethics. </p>
                        </div>

                    </div>';
}

?>

                    </div>
                </div>
            </div>
        </center>

    </section>

    <?php include './view/footer.php';?>