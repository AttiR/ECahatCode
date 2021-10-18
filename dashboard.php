<body>
    <?php
include './config/dbcon.php';?>
    <section>
        <?php include './view/header.php';
?>
    </section>



    <div class="container" style="max-width: 90%;">
        <div class="vertical-center">
            <div class="enter-form" id="dashboard-id" style="width:100%">

                <h1>Welcome to ChatCodeE</h1>
                <hr style="border: 1px solid;">
                <p>Start the thread and share your ideas <a href="./index.php" style="text-decoration: none;">
                        <small style="color: orange;">start thread</small>
                    </a>
                </p>
            </div>
        </div>
    </div>






    <?php
include './view/footer.php';
?>