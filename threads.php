<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="./css/styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        threads- EchatCode
    </title>
</head>

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
    <div class="container" style=" margin-top:5rem">
        <div class="p-5 rounded-lg m-4 thread-intro">
            <h1 class=" text-center my-4" style="letter-spacing: 0.1em;">
                Lets Disscuss <?php echo $categoryname ?> </h1>
            <!-- displaying data dynamically-->
            <p class=" lead" style="letter-spacing: 0.1em;">
                <?php echo $categorydesc ?> </p>
            <!-- displaying data dynamicaaly -->
            <hr class="my-4">
            <p style="letter-spacing: 0.1em;">This is a Code chat forum.
                Remain respectful to other members at all times.<em>Lets help each
                    others.</em>
            </p>
            <center> <a style="background:orange; color:#fff;margin-top:2rem;letter-spacing: 0.1em;" class="btn btn-lg"
                    href="./about.php" role="button">Learn
                    more</a></center>

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

    <div class="container">
        <h2 style="margin:4rem auto 4rem 1.5rem">Start New Conversation</h2>
        <?php
if ($insert == true) {
    echo "<p style= 'color: green'> your thread has been sucessfully started</p>";
}
?>
        <!---------Restricting the starting conversation to only Login users ------>
        <?php
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
    echo '
        <div  class="p-5 rounded-lg m-3 thread-intro" style="border-bottom:none">



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

    <div class="container" style="margin-bottom:5rem">
        <h2 style="margin:4rem auto 4rem 1.5rem;line-height:1.5px; letter-spacing:0.1em">Browse Threads</h2>

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
        // user name fetching
        $sql2 = "SELECT username FROM `code_users` WHERE `id` = $thread_userid";
        $query2 = mysqli_query($connect, $sql2);
        $row2 = mysqli_fetch_assoc($query2);
        $username = $row2['username'];
        $nothread = false;

        echo '

        <div class="container mt-3">

             <div class="d-flex ">
               
              <img src="https://www.clipartmax.com/png/full/255-2556971_computer-icons-user-management-clip-art-default-profile-picture-green.png" alt="image"
                     class=" me-3  rounded-circle" style="width:60px;height:60px;">
                 <div>
                 <h6 style= "letter-spacing:0.1em" class = "fw-bold"> <a class= "text-dark" style="text-decoration:none;" href= "thread-detail.php?threadid= ' . $id . '">' . $threadname . ' </a></h6>
                     <p style= "letter-spacing:0.1em>' . $threaddesc . '</p>';
        //logic to check when username does not exit
        if ($username) {
            echo ' <p style= "line-height:1.5px"> Asked by:  ' . $username . '';

        } else {

            echo ' <p style= "line-height:1.5px"> Asked by: Anonymouse';

        }

        echo '<small class = "text-muted" style="margin-left:10px">' . $time_date . '</small>
        </p>';

        /// Logic for icons, subject them to login or random users.
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
            if ($thread_userid == $_SESSION['uid']) {
                echo '<a class="text-dark" style= "text-decoration: none; margin-right: 30px" href= "thread-detail.php?threadid= ' . $id . '"><i class="far fa-comment"></i><a/>
                <a class= text-dark href= "./view/delete.php?delid=' . $id . '"><i style = "margin: auto 30px;" class="far fa-trash-alt"></i></a>
                <a class= "text-dark" style= "textdecoration:none" href="./view/update.php?update_thid=' . $id . '">
                <i style = "margin: auto 30px" class="far fa-edit"> </i></a>';
            } else {
                echo '
                <a class="text-dark" style= "text-decoration: none; margin-right:30px" href= "thread-detail.php?threadid= ' . $id . '"><i class="far fa-comment"></i></a>';
            }

        }
        echo '</div>
             </div>
         </div> ';
    }
    if ($nothread) {
        echo '<div class=" bg-light p-5 rounded-lg m-3">
                <h2>No Thread Found</h2><br>
                <p>Start a New Thread</p>
             </div>           ';
    }

}
$row = $connect->query($sql) or die('insert failed<br>' . $sql . '<br>' . mysqli_error($connect));

?>
    </div>
    </div>
</section>
<?php include './view/footer.php'?>