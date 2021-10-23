<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <!-- FontAwsome -->
    <script src="https://kit.fontawesome.com/d54712eab9.js" crossorigin="anonymous"></script>
    <title>Update - EchatCode</title>
</head>

<body>

    <?php
include('../config/dbcon.php');
 // update thread

if(isset($_GET['update_thid'])){
    $th_updateid = (int) $_GET['update_thid'];
    $sql = "SELECT * FROM `code_threads` WHERE `code_thread_id` = $th_updateid";
    $query = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($query);
    $id = $row['code_category_id']; 
    
    // update query for thread
    if(isset($_POST['title'])){

        $thread_title = htmlspecialchars($_POST['title']);
        $thread_desc = htmlspecialchars($_POST['desc']);
        $sql = "UPDATE code_threads SET code_thread_title = '$thread_title', code_thread_desc= '$thread_desc' WHERE 
        code_thread_id= $th_updateid ";
        if ($connect->query($sql) == true) {
           header('Location: ../threads.php?categryid='.$id);
    
        } else {
            echo "ERROR: $sql <br> $connect->error";
        }
        
    }
    ?>

    <h2 class="text-center my-4" style="color: orange;">Update your Thread</h2>
    <div class="user-form">
        <div class="vertical-center">
            <div class="enter-form">
                <form action="" method="post">

                    <div class="form-group">
                        <input type="text" class="form-control" name="title" id="title"
                            placeholder="enter concise title" />
                    </div>
                    <div class="mb-3">

                        <textarea class="form-control" name="desc" id="desc" rows="8"></textarea>
                    </div>

                    <button type="submit" name="submit" id="submit"
                        style="margin-bottom: 15px;background: orange; color:#fff" class="btn btn-lg btn-block">
                        Update thread
                    </button>
                </form>
            </div>
        </div>
    </div>




    <?php
}
if(isset($_GET['update_comid'])){
$com_updateid = (int) $_GET['update_comid'];
$sql = "SELECT * FROM `code_comments` WHERE `code_comment_id` = $com_updateid";
$query = mysqli_query($connect, $sql);
$row = mysqli_fetch_assoc($query);
$id = $row['code_thread_id'];

 // update query for thread
    if(isset($_POST['comment'])){

        $comment_desc = htmlspecialchars($_POST['comment']);
        $sql = "UPDATE code_comments SET code_comment_context ='$comment_desc' WHERE 
        code_comment_id= $com_updateid ";
        if ($connect->query($sql) == true) {
            header('Location: ../thread-detail.php?threadid='.$id);

        } else {
        echo "ERROR: $sql <br> $connect->error";
        }
    
    }

?>

    <h2 class="text-center my-4" style="color: orange;">Update Your Comment</h2>
    <div class="user-form">
        <div class="vertical-center">
            <div class="enter-form">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label"> Updated comment</label>
                        <textarea class="form-control" name="comment" id="comment" rows="10"></textarea>
                    </div>
                    <button type="submit" name="submit" id="submit"
                        style="margin-bottom: 15px;background: orange; color:#fff" class="btn btn-lg btn-block">
                        Update Comment
                    </button>
                </form>
            </div>
        </div>
    </div>
    <?php
}
?>


</body>

</html>