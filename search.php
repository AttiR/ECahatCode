<?php
include './config/dbcon.php';
?>


</d<header>
<?php include './view/header.php'?>
</header>

<section>

    <div class="container" style="margin-top:60px">
        <h1 class="my-3">Search Result for <em style="color: orange;">
                <?php echo $_GET['search'] ?> </em>
        </h1>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">
                        s.no
                    </th>
                    <th scope="col">Thread Title</th>
                    <th scope="col">Thread Description</th>
                </tr>
            </thead>


            <?php
$search = $_GET['search'];
$search = mysqli_real_escape_string($connect, $search);
/*$sql = "SELECT * FROM code_threads where code_thread_title like '$search%' OR
code_thread_desc LIKE '$search%'";*/
// We will use Full_text Search Technique
$sql = "select * from code_threads where match (code_thread_title, code_thread_desc) against ('$search')";
$result = mysqli_query($connect, $sql);
while ($row = mysqli_fetch_assoc($result)) {

    $title = $row['code_thread_title'];
    $desc = $row['code_thread_desc'];
    $thread_id = $row['code_thread_id'];

    echo '

            <tr>
                <td style="width: 20%;">' . $thread_id . '
                </td>
                <td style="width:30%"><a class = "text-dark"  style= "text-decoration:none;" href="thread-detail.php?threadid= ' . $thread_id . '">
                ' . $title . '
                </a></td>
                <td style="width: 50%;" >' . $desc . '</td>
            </tr>
        ';
// $row = $connect->query($sql) or die('insert failed<br>' . $sql . '<br>' . mysqli_error($connect));
}?>
        </table>

    </div>
</section>
<?php include './view/footer.php'?>