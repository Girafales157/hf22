<?php

if (!isset($_SESSION)){
    session_start();
}

if (!isset($_SESSION["usuario"])){
    die("Acesso negado. Você precisa iniciar sessão!\nPara iniciar sessão <a href=\"index.php\">clique aqui</a>");
}

?>