<?php
session_start();

unset($_SESSION["login"]);
unset($_SESSION["senha"]);
unset($_SESSION['id_doador']);
 header("Location:https://localhost:8080/DeSangue/login.html");
?>