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
    <title>ChatCodeE- codeDisscuss</title>
</head>

<body>

    <?php include './config/dbcon.php';?>
    <header><?php include './view/header.php'?></header>



    <!-- INTRO SECTION -->
    <section class="intro-section">

        <div class="container intro-content">
            <div class="intro-text">
                <h1 class="u-mb-small"> <span class="first-span">Welcome to ChatCodeE</span>
                    For
                    <span class="second-span"></span>
                </h1>
                <p class="u-mb-large text-white">
                    Sahre your Ideas, ask questions and helps the community to grow. There are different coding
                    categories to explore:
                    Python, JavaScript, PHP .....
                </p>

            </div>
        </div>

        <div class="video-container">
            <div class="video-overlay"></div>
            <video autoplay loop muted>
                <source src="./view/images/Design-large.mp4" type="video/mp4">
            </video>
        </div>
    </section>

    <!-- Categories -->


    <h2 class="text-center my-5" style="color:#e87c1e;">Explore Web-Coding Categories</h2>


    <div class="container-fluid" style="width:90%;margin-bottom:40px">
        <div class="row ">

            <!-- Fetch Gategories form Database-->

            <?php
$sql = "SELECT * FROM `code_categories`";
$query = mysqli_query($connect, $sql);
// while loop to ftech all categories
while ($result = mysqli_fetch_assoc($query)) {

    $category = $result['code-category_name'];
    $categoryid = $result['code-category_id'];
    $description = $result['code-category_description'];

    echo '
                <div class= "col-md-4">
                    <div class="card my-3 mx-3" >
                        <img src="https://source.unsplash.com/500x400/?' . $category . ' ,coding" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"> <a class= "text-dark my-3" style="text-decoration:none; letter-spacing:2px" href= "users-threads-pages/threads.php?categryid=  ' . $categoryid . ' "> ' . $category . ' </a> </h5>
                            <p class="card-text" style="text-align:justify">' . substr($description, 0, 100) . '.....</p>
                            <a style= "background:orange; color:#fff" href="users-threads-pages/threads.php?categryid=  ' . $categoryid . ' " class="btn">Explore category</a>
                        </div>
                    </div>
            </div>
            ';
    // substring operation to reduce the string to a specific limit subtsr()
    // fetch category-id, name and description
}
$result = $connect->query($sql) or die('insert failed<br>' . $sql . '<br>' . mysqli_error($connect));

?>

        </div>
    </div>


    <?php include 'view/footer.php'?>

</body>

</html>