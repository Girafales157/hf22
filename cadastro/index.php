<?php
session_start();
include "connect.php";

if (isset($_POST["user"]) && isset($_POST["email"]) && isset($_POST["senha"])){
    $nome = $mysqli->real_escape_string(trim($_POST["user"]));
    $email = $mysqli->real_escape_string(trim($_POST["email"]));
    $senha = $mysqli->real_escape_string(trim(md5($_POST["senha"])));
    
    $verif = "select * from Usuario where user = '$nome' or email = '$email'";
    $query = $mysqli->query($verif) or die("Falha no momento de verificar a existência das credenciais.");
    
    $linhas = $query->num_rows;
    
    if ($linhas == 1){
        header("Location: index.php");
        exit;
    }
    
    if ($con->query("INSERT INTO Usuario (user, email, senha) VALUES ('$nome', '$email', '$senha')") === TRUE){
        $_SESSION["usuario"] = $nome;
    }
    
    $con->close();
    
    header("Location: https://hf22.000webhostapp.com/login/feed.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">

    <title>Cadastrar | Healthy Food</title>

    <link type="text/css" rel="stylesheet" href="assets/style.css">
    <script>
    function Miguel(){
    var senha = document.cad.senha.value;
    window.alert("Senha: "+senha);
    }
    </script>
</head>

<body class="fundo">
    <main class="cd">
        <div>
            <img src="assets/img/bg-image.png" alt="">
        </div>
        <div class="conteudo">
            <div class="option">
                <a href="https://hf22.000webhostapp.com/login/index.php"><h2 id="login">Login</h2></a>
                <h2 id="reg">Cadastrar</h2>
            </div>
        <!--FORMULÁRIO -->
            <form name="cad" action="" method="post">
                <div id="user" class="campo space">
                    <img src="assets/img/User-icon.png">
                    <input type="text" name="user" placeholder="Nome de Usuário" autofocus required>
                </div>
                <div id="email" class="campo space">
                    <img src="assets/img/email-icon.png">
                    <input type="email" name="email" placeholder="Email" required>
                </div>
                <div id="senha" class="campo">
                    <img src="assets/img/senha-icon.png">
                    <input type="password" name="senha" placeholder="Senha (0-8 Dígitos)" min="4" max="8" step="1" required>
                    <img id="view" src="assets/img/view-icon.png">
                    <img id="no-view" src="assets/img/no-view-icon.png" onclick="Miguel();">
                </div>
                <div class="other">
                    <div id="progress"></div>
                </div>
                
                <button id="login-btn" type="submit" name="cadastrar">Cadastrar</button>
            </form>

            <div class="app">
                <p id="legend">OU CONECTE-SE COM</p>
                
                <div class="conts">
                    <a id="facebook" href=""><img src="assets/img/Facebook.png"></a>
                    <a id="google" href=""><img src="assets/img/Google.png"></a>
                    <a id="apple" href=""><img src="assets/img/Apple-app.png"></a>
                </div>
            </div>
        </div>
    </main>
</body>
</html>