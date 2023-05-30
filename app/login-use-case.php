<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../resources/global.css">
    <title>Document</title>
</head>

<body>
    <?php
    



    $username = $_POST['username'];
    $password = $_POST['password'];
    $msg;


    if ($username == "admin" && $password == '123') {
        $msg = "Login correto";

        header('Location: ../home.php');
    } else {
        $msg = "erradas";
    }
    ?>

    <div>
        <h1>
            Credencias

            <?php
            echo $msg
            ?>

        </h1>
        <a href="../login.php">
            <button>
                Voltar
            </button>
        </a>
    </div>


    <style>

    </style>

</body>

</html>