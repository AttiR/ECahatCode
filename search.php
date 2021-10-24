<?php
include './config/dbcon.php';
?>


</d<header>
<?php include './view/header.php'?>
</header>




<div class="container" style="margin-top:10rem; height:60vh">
    <h1 class="my-3">Search Result for <em style="color: orange;">
            <?php echo $_GET['search'] ?> </em>
    </h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">
                    S.No
                </th>
                <th scope="col">Thread Title</th>
                <th scope="col">Thread Description</th>
            </tr>
        </thead>
        <?php

$nosearchresult = true;
$search = $_GET['search'];            
$search = mysqli_real_escape_string($connect, $search);
$sql = "SELECT * FROM code_threads where code_thread_title like '$search%' OR
code_thread_desc LIKE '$search%'";
// slso check Full_text Search Technique
//$sql = "select * from code_threads where match (code_thread_title, code_thread_desc) against ('$search')";
$result = mysqli_query($connect, $sql);
$sno = 0;

     while ($row = mysqli_fetch_assoc($result)) {

    $title = $row['code_thread_title'];
    $desc = $row['code_thread_desc'];
    $thread_id = $row['code_thread_id'];
    $nosearchresult = false;
    $sno = $sno + 1;

    echo '

    <tr>
        <td style="width: 20%;">' . $sno . '
        </td>
        <td style="width:30%"><a class="text-dark" style="text-decoration:none;"
                href="thread-detail.php?threadid= ' . $thread_id . '">
                ' . $title . '
            </a></td>
        <td style="width: 50%;">' . $desc . '</td>
    </tr>
    ';
    }?>


        <?php
    if ($nosearchresult) {

    echo '<div class="bg-light p-5 rounded-lg m-3"">
                <div class=" container">
        <p class="display-5">No Results Found</p>
        <p class="lead"> Suggestions:
        <ul>
            <li>Make sure that all words are spelled correctly.</li>
            <li>Try different keywords combinations.</li>
            <li>Try general keywords. </li>
        </ul>
        </p>
    </div>
</div>';

}
?>


    </table>

</div>

<?php include './view/footer.php'?>