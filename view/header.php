<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Css -->
    <link rel="stylesheet" href="./css/styles.css?<?php echo time(); ?>">

    <!-- Bootsrap Css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Bootsrap JavaScript Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- Fontawsome -->
    <script src="https://kit.fontawesome.com/d54712eab9.js" crossorigin="anonymous"></script>

    <title>ChatCodeE- Register</title>
</head>

<body>

    <?php
echo '
    <nav class="navbar navbar-expand-lg navbar-light bg-light  fixed-top">
    <div class=" container-fluid">
        <a class="navbar-brand" href="/Echatcode" style="
          font-weight: bold;
          margin-left: 30px;
          letter-spacing: 3px;
          color: rgb(35, 90, 116);
        ">
            <span style="color: orange">E</span>CHATCODE
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/EChatCode"><i class="fas fa-home"
                            style="color: orange; margin-right: 2px"></i>
                        Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Categories
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li>';

// sql query to fetch categories dynamicaally
$sql = "SELECT code_category_id, code_category_name FROM code_categories";
$query = mysqli_query($connect, $sql);
while ($row = mysqli_fetch_assoc($query)) {

    echo '<a class="dropdown-item" href="threads.php?categryid=' . $row['code_category_id'] . '">' . $row['code_category_name'] . '</a>';
}

echo '</li>


                    </ul>
             </li>
                <li class="nav-item">
                    <a class="nav-link" href="./contact.php">Contact</a>
                </li>
            </ul>

            <form  action= "search.php" method = "gET" class="d-flex">
                <input class="form-control me-2" type="search" name = "search" placeholder="Search" aria-label="Search" />
                <button class="btn btn-outline-success" type="submit">
                    Search
                </button>
            </form>';

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
    echo '
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0" style="margin-right:20px">
                <li class="nav-item">
<a class= "nav-link" style= "color:orange; margin-right:15px">  ' . $_SESSION['username'] . '</a>
                </li>
<li>
<a  href="view/logout.php" class="btn btn-outline-danger ">Logout</a>
</li>


            </ul>';

} else {
    echo '
    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
            <a class="nav-link" href="./userManagement/login.php">login</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="./userManagement/signup.php" style="margin-right: 20px">signup</a>
        </li>
    </ul>';

}

echo '

        </div>
    </div>
</nav>'; ?>