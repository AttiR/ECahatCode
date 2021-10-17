<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Css -->
    <link rel="stylesheet" href="css/styles.css?<?php echo time(); ?>">

    <!-- Bootsrap Css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Bootsrap JavaScript Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- Fontawsome -->
    <script src="https://kit.fontawesome.com/d54712eab9.js" crossorigin="anonymous"></script>
    <title>ChatCodeE -About</title>
</head>

<body>

    <header><?php include 'view/header.php'?></header>
    <div class="container-fluid">
        <img class="about-img1" src="./view/images/About1.jpg" alt="image">
    </div>

    <!---............................About Us...................-->
    <section class="about-section" id="about">
        <div class="container">

            <div class="title">
                <h2 class="u-mb-medium">
                    About us
                </h2>
            </div>

            <div class="about">
                <div class="about-text">
                    <p class="u-mb-medium">

                        EChatCode, a disscussion forum where one can share, ask the question and ideas.
                        The aim is to serves as aresource to help developers of all skillsets.
                        Our mission is to help each other learn, build and share using code. Lets share and helpeach
                        others.
                    </p>

                </div>
                <div class="about-image">
                    <img src="./view/images/about.png" alt="image">
                </div>
            </div>

        </div>
    </section>
    <?php include 'view/footer.php'?>
</body>

</html>