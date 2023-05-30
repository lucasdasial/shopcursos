<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./resources/global.css">
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <title>Login</title>
</head>

<body>
    <form action="./app/register-use-case.php" method="post">
        <h2>Shop cursos</h2>
        <p>Cadastrar 📚</p>
        <input placeholder="Email" name="email" type="email" required>
        <input placeholder="Usuário" name="username" type="text" required>
        <input placeholder="Senha" name="password" type="password" required>

        <button type="submit">Cadastrar</button>
        <a href="./login.php">Ja possuo conta</a>
    </form>
    <lottie-player src="https://assets2.lottiefiles.com/packages/lf20_uhdM1CSwYf.json" background="transparent" speed="1" style="width: 300px; height: 300px;" autoplay></lottie-player>

</body>


<style>
    body {
        flex-direction: row;
        gap: 32px
    }
</style>

</html>