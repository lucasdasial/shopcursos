<?php

if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION["userId"])) {
    die("<p>
    Você não tem permissão porque não esta logado
    <a href=\"/shopcursos/login.php\">Entrar</a>
    </p>");
}
