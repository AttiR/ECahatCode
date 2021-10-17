<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Css -->
    <link rel="stylesheet" href="./css/styles.css?<?php echo time(); ?>">
    <!-- Bootsrap Css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Bootsrap JavaScript Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <!-- Fontawsome -->
    <script src="https://kit.fontawesome.com/d54712eab9.js" crossorigin="anonymous"></script>
    <title>Dashboard - Echatcode</title>
</head>

<body>
    <?php
include './config/dbcon.php';?>
    <section>
        <?php include './view/header.php';
?>
    </section>



    <div class="container" style="max-width: 90%;">
        <div class="vertical-center">
            <div class="enter-form" id="dashboard-id" style="width:100%">

                <h1>Welcome to ChatCodeE</h1>
                <hr style="border: 1px solid;">
                <p>Start the thread and share your ideas <a href="./index.php" style="text-decoration: none;">
                        <small style="color: orange;">start thread</small>
                    </a>
                </p>
            </div>
        </div>
    </div>






    <?php
include './view/footer.php';
?>
</body>

</html>