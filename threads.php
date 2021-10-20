<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="./css/styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        threads-deatils
    </title>
</head>

<body>

</body>

</html><?php include './config/dbcon.php';?>
<header><?php include './view/header.php'?></header>
<?php

// fetching the data from a particular category , the category id passed from index.php
$insert = false;
$categoryid = (int) $_GET['categryid']; // getting 'categryid' via $_GET user clicks on explore more and we get id
$categoryid = mysqli_real_escape_string($connect, $categoryid);
$sql = "SELECT * FROM `code_categories` WHERE `code_category_id` = $categoryid";
$query = mysqli_query($connect, $sql);
while ($row = mysqli_fetch_assoc($query)) {

    $categoryname = $row['code_category_name'];
    $categorydesc = $row['code_category_description']; // this data will be used to show values according to the id

}
$row = $connect->query($sql) or die('insert failed<br>' . $sql . '<br>' . mysqli_error($connect));

?>


<section>


    <!-- Jumbotron Bootsrap 5  for category intro and lead-->
    <div class="container" style="width: 80%;">
        <div class="bg-light p-5 rounded-lg m-3">
            <h1 class="my-4">
                <?php echo $categoryname ?> Forum</h1>
            <!-- displaying data dynamically-->
            <p class=" lead">
                <?php echo $categorydesc ?> </p>
            <!-- displaying data dynamicaaly -->
            <hr class="my-4">
            <p>This is a peer to peer code chat forum. No Spam / Advertising / Self-promote in the forums is not
                allowed. Do
                not post copyright-infringing material. Do not post “offensive” posts, links or images. Do
                not cross
                post questions. Remain respectful of other members at all times.
            </p>
            <a style="background:orange; color:#fff" class="btn btn-lg" href="../about.php" role="button">Learn
                more</a>
        </div>

    </div>


    <!--Detecing Request type in phpt-->

    <?php $method = $_SERVER['REQUEST_METHOD'];
if ($method == "POST") {

    // we will insert question/ information in codethreads table
    // changing html <>.. in to special charecters avoid xxs attackes
    $thread_title = htmlspecialchars($_POST['title']);
    $thread_desc = htmlspecialchars($_POST['desc']);

    $thread_user_id = (int) $_POST['uid'];

    $sql = "INSERT INTO code_threads (code_thread_title, code_thread_desc, code_category_id, code_thread_user_id, timestamp)
    VALUES ('$thread_title', '$thread_desc', '$categoryid', '$thread_user_id', current_timestamp())";
    if ($connect->query($sql) == true) {
        // echo "Successfully inserted";

        // Flag for successful insertion
        $insert = true;
    } else {
        echo "ERROR: $sql <br> $connect->error";
    }
    //$result = $connect->query($sql) or die('insert failed<br>' . $sql . '<br>' . mysqli_error($connect));
}
?>

    <!--We will create a  form to get question and idea from user and will store info in table coding-threads-->
    <!-- User Questions, Ideas, tech information--->
    <!------------- form for getting the questions and information from the users-------------------->

    <div class="container" style="width:80%">
        <h2 class="my-5" style="margin-left: 15px;">Start New Conversation</h2>
        <?php
if ($insert == true) {
    echo "<p style= 'color: green'> your thread has been sucessfully started</p>";
}
?>
        <!---------Restricting the starting conversation to only Login users ------>
        <?php
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
    echo '
        <div div class="bg-light p-5 rounded-lg m-3">



            <form action="' . $_SERVER["REQUEST_URI"] . '" method="post">
        <!-- getting post on same page or where u require-->
        <div class="mb-3">
            <label class="form-label">Thread Title</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="enter precise title" required>
        </div>
         <input type="hidden" name="uid" value="' . $_SESSION["uid"] . '">
         <!----hidden input seession from loggedin handler----->
        <div class="mb-3">
            <label class="form-label">Explain your Thread</label>
            <textarea class="form-control" id="desc" name="desc" rows="3" required></textarea>
        </div>
        </p>
        <button type="submit" style=" background: orange; margin-top: 13px; color:#fff" class="btn btn-lg">Start
            Thread</button>
                 </form>

    </div>';
} else {
    echo '<p class= "lead" style= "margin-left:15px">You are Not Logged in, please Log in to start a conversation!</p>';
}

?>
    </div>
    <!-- User Questions, Ideas, tech information--->
    <!-----Fetching data from coding-threads and dispalyed in Media object---->

    <div class="container" style="width: 80%;">
        <h2 class="my-5" style="margin-left:15px;">Browse Threads</h2>

        <?php
if (isset($_GET['categryid'])) {
    $categoryid = (int) $_GET['categryid'];
    $nothread = true;

    $sql = "SELECT * FROM `code_threads` WHERE `code_category_id` = $categoryid";
    $query = mysqli_query($connect, $sql);
    while ($row = mysqli_fetch_assoc($query)) {

        $id = $row['code_thread_id'];
        $threadname = $row['code_thread_title'];
        $threaddesc = $row['code_thread_desc'];
        $time_date = $row['timestamp'];
        $thread_userid = $row['code_thread_user_id'];
        $sql2 = "SELECT username FROM `code_users` WHERE `id` = $thread_userid";
        $query2 = mysqli_query($connect, $sql2);
        $row2 = mysqli_fetch_assoc($query2);
        $nothread = false;

        echo '

        <div class="container mt-3">

             <div class="d-flex ">
                 <img src=data:image/png;base64,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
                      Vn2JcU6dBBwVBdJ2MnI5hx+aKpfUcFw7AwTJ5f6ifqfGpOTWcNHcCcuFLapTpYRUWl5wq6yR8FXc2jOSoNhq7vgZlh4PoO2BFD/xFD/xFD/xFD/xFD/xFD/xFD/xFD/xFD/xFD/+m+4X/C8aeGQJJLlwAAAABJRU5ErkJggg==" alt="John Doe"
                     class=" me-3  rounded-circle" style="width:60px;height:60px;">
                 <div>
                 <h6 class = "fw-bold"> <a class= "text-dark" style="text-decoration:none;" href= "thread-detail.php?threadid= ' . $id . '">' . $threadname . ' </a></h6>
                     <p>' . $threaddesc . '</p>
                     <p style= "line-height:1.5px"> Asked by:  ' . $row2['username'] . '
                 <small class = "text-muted" style="margin-left:10px">' . $time_date . '</small></p>
                 </div>
             </div>
         </div> ';
    }
    if ($nothread) {
        echo '<div class=" bg-light p-5 rounded-lg m-3">
                <h2>No Thread Found</h2><br>
                <p>Start a New Thread</p>
             </div>
             ';
    }

}
$row = $connect->query($sql) or die('insert failed<br>' . $sql . '<br>' . mysqli_error($connect));

?>

    </div>
    </div>



</section>


<?php include './view/footer.php'?>