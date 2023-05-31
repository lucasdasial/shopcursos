<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./resources/global.css">
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <title>Cadastro</title>
</head>

<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <h2>Shop cursos</h2>
        <p>Cadastrar 📚</p>
        <input placeholder="Email" name="email" type="email" required>
        <input placeholder="Usuário" name="username" type="text" required>
        <input placeholder="Senha" name="password" type="password" required>

        <p class="msg">

            <?php
            include('./config/db.php');
            error_reporting(E_ERROR | E_PARSE);

            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];

            $createOne = "INSERT into tbl_users (username, password, email) VALUES( '$username', '$password', '$email')";

            $findOne = "SELECT * FROM tbl_users WHERE username = '$username'";

            if (isset($username)) {

                $finds = $mysqli->query($findOne) or die("Falha na execução da busca: " . $mysqli->error);

                if ($finds->num_rows == 1) {
                    echo 'Usuário ja existe!';
                } else {

                    if ($mysqli->query($createOne) == TRUE) {

                        header("Location: login.php");
                    }
                }
            };
            ?>
        </p>

        <button type="submit">Cadastrar</button>
        <a href="./login.php">Ja possuo conta</a>
    </form>
    <lottie-player class="lottie" src="https://assets2.lottiefiles.com/packages/lf20_uhdM1CSwYf.json" background="transparent" speed="1" style="width: 300px; height: 300px;" autoplay></lottie-player>

</body>


<style>
    body {
        flex-direction: row;
        gap: 32px
    }

    @media (max-width:768px) {

        .lottie {
            display: none;
        }

    }

    .msg {
        color: red;
    }
</style>

</html>