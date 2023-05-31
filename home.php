<?php



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./resources/global.css">


    <title>Home</title>
</head>

<body>
    <header>
        <div class="content  content__header">
            <h2>Shop cursos 📚</h2>
            <p>
                Bem-vindo,


                <?php
                include('./middleware/protect.php');

                if (!isset($_SESSION)) {
                    session_start();
                }
                echo $_SESSION['username'];
                ?>



            </p>
            <div class="options">

                <?php

                if (!isset($_SESSION)) {
                    session_start();
                }


                if ($_SESSION['username'] == 'admin') {
                    echo "<a href=\"./dashboard.php\">➕ dashboard</a>";
                }

                ?>

                <a href="./middleware/logout.php">👋 sair</a>
            </div>

        </div>

    </header>

    <main class="content content__main">

        <?php
        include('./config/db.php');

        $query = $mysqli->query('SELECT * FROM tbl_courses');

        $courses = $query->fetch_all();


        foreach ($courses as $c) {


            echo "<div class='card'>
                <img class='card__img' src=\"$c[3]\"/>
                <p>$c[1]</p>
                <p class='card__price'> R$ $c[2]</p>
                <a href=\"./buy.php/?id=$c[0]\">
                <button>🛍️ Comprar</button>
                </a>
                <a href=\"./cart.php\">
                <button class='card__add-cart'>🛒 ADD carrinho</button>
                </a>
            </div>";
        };



        ?>



    </main>

</body>

<style>
    body {
        justify-content: flex-start;
        padding: 0;
    }

    header {
        background-color: #fff;
        width: 100%;
    }

    .content {
        max-width: 1400px;
        width: 100%;
        padding: 24px;
        margin: auto;

    }

    .content__header {

        display: flex;
        justify-content: space-between;

    }

    .content__main {
        background-color: #e4e4e4;
        height: 100%;
        display: flex;

        flex-wrap: wrap;
        justify-content: space-around;
        align-items: flex-start;
    }

    .card {
        max-width: 23.5%;
        min-width: 250px;
        width: 100%;

        padding: 12px;
        margin: 8px;
        border-radius: 12px;

        background-color: #fff;
    }

    .card__img {
        width: 100%;

    }

    .card__price {
        font-size: 34px;
        font-weight: bold;
    }

    .card__add-cart {
        background-color: transparent;
        border: 2px solid #dfc329;
        color: grey;
    }

    .options {
        display: flex;
        gap: 18px;
    }
</style>

</html>