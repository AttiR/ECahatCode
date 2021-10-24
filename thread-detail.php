<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styles.css">
    <title>thread - details</title>
</head>

<body>

</body>

</html><?php
include './config/dbcon.php';
?> <header>
    <?php include './view/header.php';?></header>

<section>

    <!-----All we will play with "threadid" <=> we will deal with a particulat thread id, we will fetch threadid from
        $_GET['threadid']----------------------->
    <!--- Lets fetch threadid and display it----->
    <?php
$insert = false;
$id = (int) $_GET['threadid'];

// getting 'categryid' via $_GET user clicks on explore more and we get id

$id = mysqli_real_escape_string($connect, $id);
$sql = "SELECT * FROM `code_threads` WHERE `code_thread_id` = $id";
$query = mysqli_query($connect,
    $sql);
while ($row = mysqli_fetch_assoc($query)) {
    $threadtitle = $row['code_thread_title'];
    $threaddesc = $row['code_thread_desc']; // this data will be used to show values according to the id
    $thread_userid = $row['code_thread_user_id'];
    // ftech username
    $sql2 = "SELECT username FROM `code_users` WHERE `id` = $thread_userid";
    $query2 = mysqli_query($connect, $sql2);
    $row2 = mysqli_fetch_assoc($query2);
    echo '
    <!-- Jumbotron Bootsrap 5  for the particular thread id intro and lead-->
    <div class="container text-center" style="margin-top:5rem; letter-spacing:0.1em">
            <div class=" p-5 rounded-lg m-3 thread-intro">
                <h1 class="my-4" style= "letter-spacing:0.1em">' . $threadtitle . '
                </h1>
                <!-- displaying data dynamically-->
                <p lass=" lead" >
                </p>' . $threaddesc . '
                <!-- displaying data dynamicaaly -->
                <hr class="my-4">
                <p >
                    This is coding chat forum, remain respectful of other members to all times.
                </p>
                <p>Posted by: <small>' . $row2['username'] . '</small></p>



            </div>

        </div>

';
}
$row = $connect->query($sql) or die('insert failed<br>' . $sql . '<br>' . mysqli_error($connect));

?>

    <!-- Now we will get comments through Form. We will Make a new table wit name
         "code_comments" and we will store user
        comments in it Then we will fetch particular comments and display them -->


    <!--store data/comments to database "code_comments"----->
    <!--Detecing Request type in phpt-->

    <?php $method = $_SERVER['REQUEST_METHOD'];
if ($method == "POST") {

    // we will insert question/ information in codethreads table
    $commentcontent = htmlspecialchars($_POST['comment']);
    $comment_user_id = (int) $_POST['uid'];

    $sql = "INSERT INTO code_comments (code_comment_context, code_thread_id, comment_user_by, code_comment_created )
    VALUES ('$commentcontent', '$id', '$comment_user_id', current_timestamp())";
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

    <!-- Form to get comments from users-->


    <div class="container">
        <h2 style="margin: 4rem auto 4rem 1.5rem; letter-spacing:0.1em">Start Comments on the Thread
        </h2>

        <?php
if ($insert == true) {
    echo "<p style= 'color: green'> your thread has been sucessfully started</p>";
}
?>
        <!----------We will fetch comments from database------------>
        <?php
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) { // restricting for only logged in userss
    echo ' <div <div div class=" p-5 rounded-lg m-3 thread-intro" style="border-bottom:none; letter-spacing:0.1em">

        <form action="' . $_SERVER["REQUEST_URI"] . '" method="post">
        <!-- getting post on same page or where u require-->

        <div class="mb-3">
            <label class="form-label" style= "margin-bottom:2rem">Response to the Thread</label>
            <textarea class="form-control" id="comment" name="comment" rows="10"

                required></textarea>
        </div>
        <input type="hidden" name="uid" value="' . $_SESSION["uid"] . '">
        <button type="submit" style=" background: orange; margin-top: 15px;color:#fff; letter-spacing:0.1em" class="btn btn-lg">Add
            Comment</button>
        </form>
    </div>';
} else {
    echo '<p class= "lead" style= "margin-left:15px">No are Not Logged in, Please log in to post a Comment!</p>';
}

?>
    </div>





    <!------------------ fetch Data from Comments table------------------------->
    <div class="container" style="margin-bottom:4rem">
        <h2 style="margin:4rem auto 4rem 1.5rem;letter-spacing:0.1em">Comments</h2>
        <!-- thread id from url-->
        <?php
$threadid = (int) $_GET['threadid'];
$nothread = true;

$sql = "SELECT * FROM `code_comments` WHERE `code_thread_id` = $threadid";
$query = mysqli_query($connect, $sql);
while ($row = mysqli_fetch_assoc($query)) {

    $comment_id = $row['code_comment_id'];
    $comment_content = $row['code_comment_context'];
    $time_date = $row['code_comment_created'];
    $comment_userid = $row['Comment_user_by'];
    $sql2 = "SELECT username FROM `code_users` WHERE `id` = $comment_userid";
    $query2 = mysqli_query($connect, $sql2);
    $row2 = mysqli_fetch_assoc($query2);

    $nothread = false;

    echo ' <div class="container mt-3" style= "letter-spacing:0.1em">
                <div class="d-flex ">
                    <img src="https://www.clipartmax.com/png/full/255-2556971_computer-icons-user-management-clip-art-default-profile-picture-green.png" alt="image"
                    class=" me-3  rounded-circle" style="width:60px;height:60px;">
                        <div>
                              <p style= "line-height:1.5px"> comment by:  ' . $row2['username'] . '
                 <small class = "text-muted" style="margin-left:10px">' . $time_date . '</small></p>
                             <p>' . $comment_content . '</p>';

    //Logic to put conditions on Comments
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
        if ($comment_userid == $_SESSION['uid']) {
            echo '<a class= "text-dark" style= "text-decoration:none" href= "./view/delete.php?comdelid=' . $comment_id . '" ><i style = "margin: auto 30px;" class="far fa-trash-alt"></i></a>
                                    <a class= "text-dark" style= "text-decoration:none" href= "./view/update.php?update_comid=' . $comment_id . '"></i><i style = "margin: auto 30px" class="far fa-edit"> </i></a>';
        }
    }

    echo '</div>
                </div>
            </div> ';
}
if ($nothread) {
    echo '<div class=" bg-light p-5 rounded-lg m-3">

            <h2>No Comments Yet</h2><br>
            <p>Comment on the Thread</p>
                        </div>
                        ';
}

$row = $connect->query($sql) or die('insert failed<br>' . $sql . '<br>' . mysqli_error($connect));

?>
    </div>
</section>
<?php include './view/footer.php';?>