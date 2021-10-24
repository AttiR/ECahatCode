<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EchatCode</title>
</head>

<?php
include './config/dbcon.php';
?> <header><?php include './view/header.php'?></header>

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

<!--------------Features --------------->

<section style="margin-top:4rem; padding:0" id="features">

    <div class="container">

        <div class="row">
            <div class="feature-box col-lg-4 ">
                <i class="icon fas fa-check-circle fa-4x"></i>
                <h3 class="feature-title">Helping community</h3>
                <p>Share up to date information, ask questions and help others with queries.</p>
            </div>

            <div class="feature-box col-lg-4">
                <i class="icon far fa-file-code fa-4x"></i>
                <h3 class=" feature-title">Web development</h3>
                <p>Ask, share and guide others, Full-stack Web- development.</p>
            </div>

            <div class="feature-box col-lg-4">
                <i class="icon fas fa-database fa-4x"></i>
                <h3 class="feature-title">Database information & queries.</h3>
                <p>Mongodb, MySql, information, queries and solutions.</p>
            </div>
        </div>


    </div>


</section>


<!-- Categories -->


<h2 class="text-center " style="color:#e87c1e;margin:4rem auto">Explore Web-Coding Categories</h2>

<div class="container" style="margin-bottom: 4rem;">
    <div class=" row ">

        <!-- Fetch Gategories form Database-->

        <?php
$sql = "SELECT * FROM `code_categories`";
$query = mysqli_query($connect, $sql);
// while loop to ftech all categories
while ($result = mysqli_fetch_assoc($query)) {

    $category = $result['code_category_name'];
    $categoryid = $result['code_category_id'];
    $description = $result['code_category_description'];

    echo '
                <div class= "col-lg-4 col-md-6 col-xs-12">
                    <div class="card my-3 mx-3" >
                        <img src="https://source.unsplash.com/500x400/?' . $category . ' ,coding" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"> <a class= "text-dark my-3" style="text-decoration:none; letter-spacing:2px" href= "users-threads-pages/threads.php?categryid=  ' . $categoryid . ' "> ' . $category . ' </a> </h5>
                            <p class="card-text" style="text-align:justify">' . substr($description, 0, 100) . '.....</p>
                            <a style= "background:orange; color:#fff" href="threads.php?categryid=  ' . $categoryid . ' " class="btn">Explore category</a>
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