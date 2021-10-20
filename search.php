<?php
include './config/dbcon.php';
?>
<header>
    <?php include './view/header.php'?>
</header>
<section>
    <div class="container" style="min-height: 60vh;">
        <h1 class="my-3">Search Result for <?php echo $_GET['search'] ?></h1>
        <?php
$search = $_GET['search'];
/*$sql = "SELECT * FROM code_threads where code_thread_title like '$search%' OR
code_thread_desc LIKE '$search%'";*/
// We will use Full_text Search Technique
$sql = "select * from code_threads where match (code_thread_title, code_thread_desc) against ('$search')";
$result = mysqli_query($connect, $sql);
while ($row = mysqli_fetch_assoc($result)) {

    $title = $row['code_thread_title'];
    $desc = $row['code_thread_desc'];
    $thread_id = $row['code_thread_id'];

    echo ' <div>
            <h3>
            <a href="thread-detail.php?threadid= ' . $thread_id . '">
            ' . $title . '
            </a>
            </h3>
            <p>
            ' . $desc . '
            </p>
            </div>';

}
//$row = $connect->query($sql) or die('insert failed<br>' . $sql . '<br>' . mysqli_error($connect));
?>


    </div>

</section>


<?php include './view/footer.php'?>