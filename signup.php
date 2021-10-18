<header>
    <?php include "./view/header.php";?>
</header>

<section id="user-form">

    <div class="user-info">
        <div class="vertical-center">
            <div class="enter-form">
                <form action="" method="post">



                    <img class="user-img"
                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcToZ7e1RiEeyPFKpPgt8sYCuRF-_YLM4noPCrOkN5lCmRTUzQek7CELG6PM4q7SQtHR5nE&usqp=CAU"
                        alt="">

                    <div class="form-group">

                        <input type="text" class="form-control" name="firstname" id="firstName"
                            placeholder="enter first name" />
                    </div>

                    <div class="form-group">

                        <input type="text" class="form-control" name="lastname" id="lastName"
                            placeholder="enter last name" />


                    </div>

                    <div class="form-group">

                        <input type="email" class="form-control" name="email" id="email" placeholder="enter email" />


                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control" name="password" id="password"
                            placeholder="enter passwprd" />
                    </div>

                    <button type="submit" name="submit" id="submit" class="user-btn">Sign up
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
<?php include "./view/footer.php";?>