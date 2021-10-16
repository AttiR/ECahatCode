<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Css -->
    <link rel="stylesheet" href="../css/styles.css?<?php echo time(); ?>">

    <!-- Bootsrap Css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Bootsrap JavaScript Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- Fontawsome -->
    <script src="https://kit.fontawesome.com/d54712eab9.js" crossorigin="anonymous"></script>


    l <title>
        EchatCode - Thread Details
    </title>
</head>

<body>


    <?php
include '../config/dbcon.php';
?> <header>
        <?php include '../view/header.php';?></header>

    <section>

        <!------------------- we will deal with a particulat thread id, we will fetch threadid from
        $_GET['threadid']----------------------->
        <!--- Lets fetch threadid and display it----->
        <?php
$insert = false;
$id = $_GET['threadid'];
// getting 'categryid' via $_GET user clicks on explore more and we get id

$id = mysqli_real_escape_string($connect, $id);
$sql = "SELECT * FROM `coding_threads` WHERE `code_thread_id` = $id";
$query = mysqli_query($connect,
    $sql);
while ($row = mysqli_fetch_assoc($query)) {
    $threadtitle = $row['code_thread_title'];
    $threaddesc = $row['code_thread_desc']; // this data will be used to show values according to the id

    echo '
    <!-- Jumbotron Bootsrap 5  for the particular thread id intro and lead-->
    <div class="container" style="width: 80%;">
            <div class="bg-light p-5 rounded-lg m-3">
                <h1 class="my-4">' . $threadtitle . '
                </h1>
                <!-- displaying data dynamically-->
                <p class=" lead">
                </p>' . $threaddesc . '
                <!-- displaying data dynamicaaly -->
                <hr class="my-4">
                <p>This is a peer to peer code chat forum. No Spam / Advertising / Self-promote in the forums is not
                    allowed. Do
                    not post copyright-infringing material. Do not post “offensive” posts, links or images. Do
                    not cross
                    post questions. Remain respectful of other members at all times.
                </p>


            </div>

        </div>

';
}
$row = $connect->query($sql) or die('insert failed<br>' . $sql . '<br>' . mysqli_error($connect));

?>







    </section>
    <?php include '../view/footer.php';?>
</body>

</html>