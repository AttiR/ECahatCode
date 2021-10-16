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

        <!-------------------All we will play with "threadid" <=> we will deal with a particulat thread id, we will fetch threadid from
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

        <!---------------------- Now we will get comments through Form. We will
        Make a new table wit name "code_comments" and we will store user comments in it
        Then we will fetch particular comments and display them ---------------------->


        <!--------------store data/comments to database "code_comments"-------------------->
        <!--Detecing Request type in phpt-->

        <?php $method = $_SERVER['REQUEST_METHOD'];
if ($method == "POST") {

// we will insert question/ information in codethreads table
    $commentcontent = $_POST['comment'];

    $sql = "INSERT INTO code_comments (code_comment_context, code_thread_id, comment_user_by, code_comment_created )
VALUES ('$commentcontent', '$id', '0', current_timestamp())";
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


        <div class="container" style="width: 80%;">
            <h2 class="my-5" style="margin-left: 15px;">Start Comments on the Thread</h2>

            <!----------We will fetch comments from database------------>
            <div <div div class="bg-light p-5 rounded-lg m-3">
                <?php
if ($insert == true) {
    echo "<p style= 'color: green'> your thread has been sucessfully started</p>";
}
?>
                <form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post">
                    <!-- getting post on same page or where u require-->

                    <div class="mb-3">
                        <label class="form-label">Response to the Thread</label>
                        <textarea class="form-control" id="comment" name="comment" rows="10"
                            placeholder="your comments.." required></textarea>
                    </div>


                    <button type="submit" style=" background: orange; margin-top: 15px;" class="btn btn-lg">Add
                        Comment</button>
                </form>


            </div>
        </div>





        <!------------------ fetch Data from Comments table------------------------->
        <div class="container" style="width:80%">
            <h2 class="my-5" style="margin-left: 15px;">Comments</h2>
            <!-- thread id from url-->
            <?php
$threadid = $_GET['threadid'];
$nothread = true;

$sql = "SELECT * FROM `code_comments` WHERE `code_thread_id` = $threadid";
$query = mysqli_query($connect, $sql);
while ($row = mysqli_fetch_assoc($query)) {

    $comment_id = $row['code_comment_id'];
    $comment_content = $row['code_comment_context'];
    $time_date = $row['code_comment_created'];
    $nothread = false;

    echo ' <div class="container mt-3">
                <div class="d-flex ">
                    <img src=data:image/png;base64,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
                    Vn2JcU6dBBwVBdJ2MnI5hx+aKpfUcFw7AwTJ5f6ifqfGpOTWcNHcCcuFLapTpYRUWl5wq6yR8FXc2jOSoNhq7vgZlh4PoO2BFD/xFD/xFD/xFD/xFD/xFD/xFD/xFD/xFD/xFD/+m+4X/C8aeGQJJLlwAAAABJRU5ErkJggg==" alt="John Doe"
                    class=" me-3  rounded-circle" style="width:60px;height:60px;">
                        <div>
                            <small class = "text-muted">' . $time_date . '</small>
                             <p>' . $comment_content . '</p>
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

$row = $connect->query($sql) or die('insert failed<br>' . $sql . '<br>' . mysqli_error($connect));

?>
        </div>
    </section>
    <?php include '../view/footer.php';?>
</body>

</html>