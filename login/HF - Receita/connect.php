<?php
    //conexão com o mysql
    $host = "localhost";
    $banco = "id19706075_conta";
    $root = "id19706075_joao";
    $senha = "NC[LK{U<]n6O)nje";
    
    $mysqli = new mysqli($host, $root, $senha, $banco);
    
    $con = mysqli_connect($host, $root, $senha, $banco);
    
    if ($mysqli->error){ die("Erro de conexão."); }
?>