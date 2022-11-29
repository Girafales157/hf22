<?php

    header('Content-Type: application/json');
    header('Character-Encoding: utf-8');
 
    $json_entrada = json_decode(file_get_contents('php://input'));
    $usuario = $json_entrada->{"usuario"};
    $email = $json_entrada->{"email"};
    $senha = $json_entrada->{"senha"};
    
    
    $pdo = new PDO('mysql:host=localhost;dbname=id19706075_conta; port=3306; charset=utf8','id19706075_joao','NC[LK{U<]n6O)nje');
    
    $sql = "INSERT INTO Usuario(user, email, senha) VALUES ('$usuario', '$email', md5('$senha'))";
    $statement = $pdo -> prepare($sql);
    $statement -> execute();
    
    $cleanUp = array();
    while($resultado = $statement-> fetch(PDO::FETCH_ASSOC)){
        $cleanUp['CleanUp'][]=(object) $resultado;
    }
        $json = json_encode($cleanUp);
        echo $json;
?>