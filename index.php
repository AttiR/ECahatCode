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
  <title>ChatCodeE- codeDisscuss</title>
</head>
<body>

<?php include('view/header.php') ?>

  <!-- INTRO SECTION -->
  <section class="intro-section">
    <div class="container intro-content">
      <div class="intro-text">
        <h1 class="u-mb-small"> <span class="first-span">Welcome to ChatCodeE</span>
          For
          <span class="second-span"></span>
        </h1>
        <p class="u-mb-large text-white">
          Sahre your Ideas, ask questions and helps the community to grow. There are different coding categories to explore:
            Python, JavaScript, PHP .....
        </p>
        <a href="#" class="btn">Get a quote</a>
      </div>
    </div>

    <div class="video-container">
      <div class="video-overlay"></div>
      <video autoplay loop muted>
        <source src="view/Design-large.mp4" type="video/mp4">
      </video>
    </div>
  </section>
  
  
  <section class="categories">

  <h2 class="text-center my-3">Explore Categories</h2>

    
   <div class="container">

   <div class="row">
        <div class="category-box col-md-4">

          <div class="card my-2" style="width: 18rem;">
            <img src="https://source.unsplash.com/500x400/?coding,python" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">Explore category</a>
            </div>
         </div>         
        </div>


        <div class="category-box col-md-4">
        <div class="card my-2" style="width: 18rem;">
            <img src="https://source.unsplash.com/500x400/?coding,python" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">Explore category</a>
            </div>
         </div>         
        </div>


        <div class="category-box col-md-4">
        <div class="card my-2" style="width: 18rem;">
            <img src="https://source.unsplash.com/500x400/?coding,python" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">Explore category</a>
            </div>
         </div>         
        </div>


    </div>



   </div>
    
  
  </section>

  <?php include('view/footer.php')?>
  
</body>
</html>


