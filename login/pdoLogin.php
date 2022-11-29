<?php

    header('Content-Type: application/json');
    header('Character-Encoding: utf-8');
 
    $json_entrada = json_decode(file_get_contents('php://input'));
    $campo1 = $json_entrada->{"email"};
    $senha = $json_entrada->{"senha"};
    
    $pdo = new PDO('mysql:host=localhost;dbname=id19706075_conta; port=3306; charset=utf8','id19706075_joao','NC[LK{U<]n6O)nje');
 
    
    $sql = "SELECT * FROM Usuario WHERE email='$campo1' AND senha=md5('$senha')";
    $statement = $pdo -> prepare($sql);
    $statement -> execute();
    
    if($resultado = $statement-> fetch(PDO::FETCH_ASSOC)){
        $conta = array();
        $conta=(object) $resultado;
        $json = json_encode($conta);
        echo $json;
    }else{
        $json = json_encode("{'erro':'registro não encontrado!}");
        echo $json;
    }
    
?>