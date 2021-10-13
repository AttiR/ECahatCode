<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Css -->
    <link rel="stylesheet" href="./css/styles.css?<?php echo time(); ?>">

    <!-- Bootsrap Css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <!-- Bootsrap JavaScript Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
    <!-- Fontawsome -->
    <script src="https://kit.fontawesome.com/d54712eab9.js" crossorigin="anonymous"></script>

    <title>ChatCodeE- Register</title>
</head>
<body>

<header>
    <?php include("./view/header.php"); ?>
</header>

<section id="user-form">
   
    <div class="user-info">
        <div class="vertical-center">
            <div class="enter-form">
                <form action="" method="post">
                    
       

                <img class= "user-img" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcToZ7e1RiEeyPFKpPgt8sYCuRF-_YLM4noPCrOkN5lCmRTUzQek7CELG6PM4q7SQtHR5nE&usqp=CAU" alt="">

                    <div class="form-group">
                        
                        <input type="text" class="form-control" name="firstname" id="firstName" placeholder="enter first name" />   
                    </div>

                    <div class="form-group">
                        
                        <input type="text" class="form-control" name="lastname" id="lastName" placeholder="enter last name"/>

                       
                    </div>

                    <div class="form-group">
                        
                        <input type="email" class="form-control" name="email" id="email" placeholder="enter email" />

                      
                    </div>

                    <div class="form-group">       
                        <input type="password" class="form-control" name="password" id="password" placeholder="enter passwprd"/>  
                    </div>

                    <button type="submit" name="submit" id="submit" class="user-btn">Sign up
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
<?php include("./view/footer.php"); ?>
    
</body>
</html>