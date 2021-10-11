
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Css -->
     <link rel="stylesheet" href="css/styles.css?<?php echo time(); ?>">

    <!-- Bootsrap Css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Bootsrap JavaScript Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Fontawsome -->
    <script src="https://kit.fontawesome.com/d54712eab9.js" crossorigin="anonymous"></script>
    <title>ChatCodeE -About</title>
</head>
<body>

<header><?php include('view/header.php') ?></header>



<!--  About Section Cerousal-->
<section>


<div class="container-fluid">
    <div class="row">
            <div  class="carousel slide" style="margin-top: 50px;" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active" data-bs-interval="2000">
                    <img src="https://source.unsplash.com/1600x600/?coding,python" class="img-fluid d-block w-100" alt="image">
                    </div>
                    <div class="carousel-item" data-bs-interval="1500">
                    <img src="https://source.unsplash.com/1600x600/?coding,flask" class="img-fluid d-block w-100" alt="image">
                    </div>
                    <div class="carousel-item">
                    <img src="https://source.unsplash.com/1600x600/?coding, JavaScript" class="img-fluid d-block w-100" alt="image">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
                </div>
    </div>
</div>

</section>

<div class="container" id="about">
    <div class="about-us">
        <p></p>
    </div>
    <div class="about-us">
        <p></p>
    </div>
</div>

<section>
    <h2 class="text-center my-3" style="color: orange;">About Us</h2>
</section>




<?php include('view/footer.php') ?>

    
</body>
</html>




