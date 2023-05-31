<?php
include('./config/db.php');
error_reporting(E_ERROR | E_PARSE);
$msg;

$username = $_POST['username'];
$password = $_POST['password'];


$findOne = "SELECT * FROM tbl_users WHERE username = '$username' AND password = '$password'";

$query = $mysqli->query($findOne) or die("Falha na execução da busca: " . $mysqli->error);

$finds = $query->num_rows;



if ($finds == 1) {
    $user = $query->fetch_assoc();

    if (!isset($_SESSION)) {
        session_start();
    }

    $_SESSION['userId'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['email'] = $user['email'];

    header("Location: home.php");
} else {
    if (isset($username) && isset($password)) {
        $msg = "Credencias erradas";
    };
}

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./resources/global.css">
    <title>Login</title>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
</head>

<body>
    <main>
        <lottie-player class="lottie" src="https://assets7.lottiefiles.com/packages/lf20_gzexbdcx.json"
            background="transparent" speed="1" style="width: 300px; height: 300px;" autoplay></lottie-player>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

            <h2>Shop Cursos</h2>
            <p>Login 📚</p>
            <input placeholder="Usuário" name="username" type="text" required>
            <input placeholder="Senha" name="password" type="password" required>

            <button type="submit">Entrar</button>
            <a href="./register.php">Cadastrar</a>
            <i class="error-msg">

                <?php
                echo $msg
                ?>
            </i>
        </form>
    </main>

    <style>
    body {
        flex-direction: row;
        gap: 32px;
        background-color: #fff;
        padding: 12px;
    }

    main {

        display: flex;
        justify-content: space-evenly;
        align-items: center;

        max-width: 800px;
        height: 600px;
        width: 100%;
        padding: 24px;
        background-color: #f1f1f1;

        border-radius: 24px;
        box-shadow: rgb(155, 155, 155) 6px 6px 6px;
    }



    .error-msg {
        color: red;
    }


    @media (max-width:768px) {

        .lottie {
            display: none;
        }

        main {
            background-color: #fff;
            box-shadow: none
        }

    }
    </style>


</body>

</html>