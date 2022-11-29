<?php

if (!isset($_SESSION)){
    session_start();
}

if (isset($_SESSION["usuario"])){ header("Location: login/feed.php"); } else { $usuario = "usuário anônimo"; }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="assets/style.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');
    </style>
        

    <title>Healthy Food | Home</title>
    
</head>
<body>
    <header class="cabecalho">
        <div class="logo">
            <img id="apple-img" src="assets/img/apple.png" alt="green_apple">
            <img id="name-img" src="assets/img/Healthy food 1.png">
        </div>
        <div class="buscar">
            <input type="search" placeholder="Buscar receita...">
            <img src="assets/img/Pesquisar.png">
        </div>
    </header>

    <main>
        <section class="home">
            <aside>
                <h2>Corpo <span>saudável</span>, </h2>
                <h2>Mente <span>forte</span>! </h2>

                <p>Publique, favorite e cozinhe pratos <br> saborosos e saudáveis.</p>

                <div class="btn">
                    <a href="login/index.php"><button id="btn-enter">Iniciar Sessão</button></a>
                    <a href="cadastro/index.php"><button id="btn-reg">Cadastrar</button></a>
                </div>
            </aside>
        </section>

        <section class="categ">
            <div id="title">
                <h2>Olá, <span><?php echo $usuario; ?>!</span></h2>
                <p>O que quer cozinhar hoje?</p>
            </div>

            <div class="cards">
                <a href="login/feed.php"><div class="card" id="coffee">
                    <img src="assets/img/Coffee-icon.png">
                    <p>Café da Manhã</p>
                </div></a>
                <a href="login/feed.php"><div class="card" id="almoço">
                    <img src="assets/img/Almoço-icon.png">
                    <p>Almoço</p>
                </div></a>
                <a href="login/feed.php"><div class="card" id="lanche">
                    <img src="assets/img/Lanche-icon.png">
                    <p>Lanche</p>
                </div></a>
                <a href="login/feed.php"><div class="card bot" id="jantar">
                    <img src="assets/img/Jantar-icon.png">
                    <p>Jantar</p>
                </div></a>
                <a href="login/feed.php"><div class="card bot" id="vegan">
                    <img src="assets/img/Vegano-icon.png">
                    <p>Vegano</p>
                </div></a>
            </div>
        </section>
    </main>
</body>
</html>