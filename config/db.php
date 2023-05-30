<?php

$DB_USER = "root";
$DB_PASS = "";
$DB_NAME = "shopcursos";
$DB_HOST = "localhost";

$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);


if ($mysqli->error) {
    die("Falha ao conectar com a base de dados: " . $mysqli->error);
}
