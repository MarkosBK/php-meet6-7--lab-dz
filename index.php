<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Aclonica&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body style="background-color: #eee; height: 2000px">
    <div class="row">
        <nav class="navbar navbar-expand-lg navbar-light bg-light col">
            <div class="container">
                <a class="navbar-brand logoGradient mr-5" href="index.php?page=1">
                    MARKOSBK creation
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <?php
                        include_once("pages/menu.php");
                        include_once("pages/functions.php");
                        ?>

                    </ul>
                    <?php
                    if (!checkAuthorization()) {
                    ?>
                    <div class="d-flex ml-auto">
                        <a href="index.php?page=5" class="signLink mr-3">Sign
                            in</a>
                        <a href="index.php?page=4" class="signLink">Sign
                            up</a>
                    </div>
                    <?php
                    } else {
                    ?>
                    <form method="POST" class="d-flex ml-auto">
                        <input type="button" class="btn btn-dark" style="border-radius: 10px 0 0 10px;"
                            value=<?php echo $_SESSION["userLogin"]; ?>>
                        <input type="submit" class="logoutBtn" value="Logout">
                    </form>
                    <?php
                    }
                    ?>

                </div>
            </div>

        </nav>




    </div>

    <div class="row">
        <div class="container">
            <section class="col" id="section1">
                <?php
                if (isset($_GET["page"])) {
                    $page = $_GET["page"];
                    switch ($page) {
                        case 1:
                            include_once("pages/home.php");
                            break;

                        case 2:
                            include_once("pages/addImage.php");
                            break;

                        case 3:
                            include_once("pages/gallery.php");
                            break;

                        case 4:
                            include_once("pages/registration.php");
                            break;
                        case 5:
                            include_once("pages/authorization.php");
                            break;
                    }
                }
                ?>
            </section>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>