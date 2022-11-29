<?php
include "verify.php";
include "connect.php";
$query = $mysqli->query("SELECT email FROM Usuario WHERE user='".$_SESSION["usuario"]."';");
$conta = $query->fetch_assoc();

if(isset($_GET["nome"])){
    
    /*IMAGEM NÃO IMPLEMENTADA
    $nomeIMG = $file['name'];
    $novonome = uniqid(md5($nomeIMG));
    $path = "./upload/";
    $extensao = strtolower(pathinfo($nomeIMG, PATHINFO_EXTENSION));
    $IMG_DIR = $path.$novonome.".".$extensao;*/
    
    //DADOS DA POSTAGEM
    $nome = $_GET["nome"];
    $tempo = $_GET["tempo"];
    $porcao = $_GET["porcao"];
    $calorias = $_GET["calorias"];
    $categoria = $_GET["categoria"];
    $dieta = $_GET["dieta"];
    $autor = $_SESSION["usuario"];
    $ing = $_GET["ing"];
    //passos
    $passos = $_GET["passoA"];
    if($_GET["passoB"] != "") $passos = $passos.", ".$_GET["passoB"];
    if($_GET["passoC"] != "") $passos = $passos.", ".$_GET["passoC"];
    if($_GET["passoD"] != "") $passos = $passos.", ".$_GET["passoD"];
    if($_GET["passoE"] != "") $passos = $passos.", ".$_GET["passoE"];
    if($_GET["passoF"] != "") $passos = $passos.", ".$_GET["passoF"];
    if($_GET["passoG"] != "") $passos = $passos.", ".$_GET["passoG"];
    if($_GET["passoH"] != "") $passos = $passos.", ".$_GET["passoH"];
    if($_GET["passoI"] != "") $passos = $passos.", ".$_GET["passoI"];
    if($_GET["passoJ"] != "") $passos = $passos.", ".$_GET["passoJ"];
    if($_GET["passoK"] != "") $passos = $passos.", ".$_GET["passoK"];
    if($_GET["passoL"] != "") $passos = $passos.", ".$_GET["passoL"];
    if($_GET["passoM"] != "") $passos = $passos.", ".$_GET["passoM"];
    if($_GET["passoN"] != "") $passos = $passos.", ".$_GET["passoN"];
    if($_GET["passoO"] != "") $passos = $passos.", ".$_GET["passoO"];
    $passos = $passos.".";
    if($_GET["dica"] != ""){ $dica = $_GET["dica"]; } else { $dica = ""; }
    if($_GET["obs"] != ""){ $obs = $_GET["obs"]; } else { $obs = ""; }
    
    //CONSULTA
    //$confere = move_uploaded_file($file['tmp_name'], $IMG_DIR);
    
    $sql = "INSERT INTO Receita(imagem, nome, tempo, porcao, calorias, categoria, dieta_especial, autor, ingrediente, passos, dica, observacao) VALUES ('PLACEHOLDER', '$nome', '$tempo', '$porcao', '$calorias', '$categoria', '$dieta', '$autor', '$ing', '$passos', '$dica', '$obs')";
    $resultado = $mysqli->query($sql);
    
    if ($resultado){
        header("Location: feed.php");
    } else {
        echo var_dump($nome)."<br /><br />";
        echo var_dump($tempo)."<br /><br />";
        echo var_dump($porcao)."<br /><br />";
        echo var_dump($calorias)."<br /><br />";
        echo var_dump($categoria)."<br /><br />";
        echo var_dump($dieta)."<br /><br />";
        echo var_dump($autor)."<br /><br />";
        echo var_dump($ing)."<br /><br />";
        echo var_dump($passos)."<br /><br />";
        die();
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="assets/stylefeed.css">
    <link rel="stylesheet" href="assets/media.css">
    <link rel="stylesheet" href="assets/postagem.css">
    <link rel="stylesheet" href="assets-pfm/stylefeed.css">
    <link rel="stylesheet" href="assets-pfm/media.css">
    <link rel="stylesheet" href="postar/assets/stylepub.css">
    <!--tem alguma coisa nesses dois ultimos q tá dando pau-->
    <link type="text/css" rel="stylesheet" href="HF - Receita/assets/stylerec.css">
    <link type="text/css" rel="stylesheet" href="HF - Receita/assets/media.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');
        #modal-pub {
            position: fixed;
            top: 0px;
            left: 0px;
            background: #000;
            width: 100%;
            height: 100%;
            opacity: 20%;
            display: none;
        }
    </style>
        

    <title>Feed | Healthy Food</title>
    <!--type="text/javascript" src="scripts.js"-->
    <script type="text/javascript" src="scripts.js"></script>
</head>
<body>
    <header class="cabecalho">
        <div class="logo">
            <img id="apple-img" src="assets/img/apple.png" alt="green_apple">
            <img id="name-img" src="assets/img/Healthy food 1.png">
        </div>
        <div class="buscar">
            <input class="search" type="search" placeholder="Buscar receita...">
            <img class="search" id="lupa" src="assets/img/Pesquisar.png">
        </div>
    </header>
                <!--MENU-->
                <div class="profile" id="modal-pfp">
            <div>
                <img id="profile-photo" src="./assets/img/apple.png">
                <img id="stud-icon" src="./assets-pfm/img/student-icon.png">
            </div>
            <p id="nivel">Usuário comum</p>
            <p id="nome"><?php echo $_SESSION["usuario"]; ?></p>
            <div class="user-info">
                <p id="username"><?php echo $conta["email"];?></p>
                <!--<div id="line"></div>
                <p>Cuiabá, MT</p>-->
            </div>
            <button id="edit-profile">Editar Perfil <br />(Proximamente!)</button>
        </div>
    <main>
        
        <div class="menu">
            <nav>
                <ul>
                    <li class="menu-img"><img src="./assets/img/Home-icon.png"></li>
                    <li class="menu-img"><img src="./assets/img/Minhas Receitas-icon.png"></li>
                    <li class="menu-img"><img src="./assets/img/Notificação-icon.png"></li>
                    <li class="menu-img"><img src="./assets/img/Message-icon.png"></li>
                    <li class="menu-img" id="photo"><input type="image" src="./assets/img/Profile.png" onclick="Display()"></li>
                </ul>
            </nav>
        </div>
        
        <section class="categ">
            <div id="title">
                <h2>Olá, <span><?php echo $_SESSION["usuario"]; ?>!</span></h2>
                <p>O que quer cozinhar hoje?</p>
            </div>

            <div class="cards">
                <div class="card" id="coffee">
                    <img src="assets/img/Coffee-icon.png">
                    <p>Café da Manhã</p>
                </div>
                <div class="card" id="almoço">
                    <img src="assets/img/Almoço-icon.png">
                    <p>Almoço</p>
                </div>
                <div class="card" id="lanche">
                    <img src="assets/img/Lanche-icon.png">
                    <p>Lanche</p>
                </div>
                <div class="card bot" id="jantar">
                    <img src="assets/img/Jantar-icon.png">
                    <p>Jantar</p>
                </div>
                <div class="card bot" id="vegan">
                    <img src="assets/img/Vegano-icon.png">
                    <p>Vegano</p>
                </div>
            </div>
        </section>

        <input id="btn-verde" type="image" src="./assets/img/Publicar-btn.png" onclick="Postar();">

        <section class="posts">
            <div class="receitas">
                <div class="rec"></div>
                <div class="rec"></div>
                <div class="rec"></div>
                <div class="rec"></div>
            </div>     

            <h3 id="pop-tittle">Popular</h3>

            <div class="pop">
                <div class="post"></div>
                <div class="post"></div>
                <div class="post"></div>
                <div class="post"></div>
                <div class="post"></div>
                <div class="post"></div>
                <div class="post"></div>
                <div id="more-btn"><img src="./assets/img/More - btn.png"></div>
            </div>

            <h3 id="ult-tittle">Novidades</h3>
            <form name="escolha" action="HF - Receita/pub.php" method="get">
            <div class="ult">
                <?php
                //SAÍDA DE DADOS: NOVIDADES
                $query = $mysqli->query("SELECT nome, autor, id FROM Receita");
                for ($i = $query->num_rows - 1; $i >= 0; $i--) {
                    if (!$query->data_seek($i)) {
                        echo "Não pude achar a linha $i: " . mysql_error() . "\n";
                        continue;
                    }
                
                    if (!($linha = $query->fetch_assoc())) {
                        continue;
                    }
                
                    echo "<div class=\"post\"><button type=\"submit\" name=\"receita\" value=".$linha['id'].">".$linha['nome']."</input><br /></div>";
                }
                ?>
                <!--<div class="post">$linha['nome']<br />$linha['autor']</div>  -->  
                <div id="more-btn"><img src="./assets/img/More - btn.png"></div>
            </div></form>
        </section>
        
        <!--***********************PUBLICAR**********************************************-->
        
        <div id="modal-pub" onclick="Postar(), ClosePostMenu();">
        </div>
        <!--enctype="multidata/form-data"-->
        <form name="Receita" action="" method="get">
            <section class="publicar" id="publicar">
                <div class="topo">
                <h2>Publicar Receita</h2>
                <img src="postar/assets/imgs/Close-icon (green).png" onclick="ClosePostMenu();">
            </div>
                <div class="content"> 
            <div class="arq">
                <h3 id="img" class="tittle">Foto e vídeo</h3>
                <!--<label for="image">Inserir imagem</label>
                
                <input accept="img/png" accept="img/jpg" class="file" type="file" name="image" id="image" required>
                <label for="video">Inserir vídeo</label>
                <input class="file" type="file" name="video" id="video">-->
            </div>
            <div class="info">
                <h3 class="tittle">Informações</h3>
                <h4 class="sub-tittle">Nome</h4>
                <!--CAMPO: NOME-->
                <input class="input-text" name="nome" type="text" placeholder="Insira o nome da receita" required>
                <h4 class="sub-tittle">Tempo de Preparo (em minutos)</h4>
                <!--CAMPO: TEMPO-->
                <input class="input-number" name="tempo" type="number" placeholder="0">
                <h4 class="sub-tittle">Porção</h4>
                <!--CAMPO: PORÇÃO-->
                <input class="input-number" name="porcao" type="number" placeholder="0">
                <h4 class="sub-tittle">Calorias</h4>
                <!--CAMPO: CALORIAS-->
                <input class="input-text" name="calorias" type="number" placeholder="Insira as calorias">
            </div>
            <div class="cat">
                <h3 class="tittle">Categorias</h3>
                <h4 class="sub-tittle">Categoria</h4>
                <!--CAMPO: CATEGORIA-->
                <select class="sel" name="categoria" required>
                    <option value="Café da Manhã">Café da Manhã</option>
                    <option value="Almoço">Almoço</option>
                    <option value="Lanche">Lanche</option>
                    <option value="Jantar">Jantar</option>
                    <option value="Vegono">Vegano</option>
                </select>
                <h4 class="sub-tittle">Dieta Especial</h4>
                <!--CAMPO: ESPECIAL-->
                <select name="dieta" class="sel">
                    <option value="Sem Lactose">Sem Lactose</option>
                    <option value="Diabético">Diabético</option>
                </select>
            </div>
            <div class="ing">
                <h3 class="tittle">Ingredientes</h3>
                <h4 class="sub-tittle">Ingredientes</h4>
                <input class="input-text" name="ing" type="text" name="ing" placeholder="Insira um ingrediente" required>
                <h4 class="sub-tittle">Quantidade</h4>
                <input class="input-number" name="quantidade_ing" type="number" name="quant" placeholder="0" required>
            </div>
            <div class="mode">
                <h3 class="tittle">Modo de Preparo</h3>
                <h4 class="sub-tittle">Passos</h4>
                <!--tomiii-->
                <input class="input-text" type="text" name="passoA" id="passo1" placeholder="Passo 1 (Obrigatório)" required>
                <input class="input-text" type="text" name="passoB" id="passo2" placeholder="Passo 2 (Opcional)">
                <input class="input-text" type="text" name="passoC" id="passo3" placeholder="Passo 3 (Opcional)">
                <input class="input-text" type="text" name="passoD" id="passo4" placeholder="Passo 4 (Opcional)">
                <input class="input-text" type="text" name="passoE" id="passo5" placeholder="Passo 5 (Opcional)">
                <input class="input-text" type="text" name="passoF" id="passo6" placeholder="Passo 6 (Opcional)">
                <input class="input-text" type="text" name="passoG" id="passo7" placeholder="Passo 7 (Opcional)">
                <input class="input-text" type="text" name="passoH" id="passo8" placeholder="Passo 8 (Opcional)">
                <input class="input-text" type="text" name="passoI" id="passo9" placeholder="Passo 9 (Opcional)">
                <input class="input-text" type="text" name="passoJ" id="passo10" placeholder="Passo 10 (Opcional)">
                <input class="input-text" type="text" name="passoK" id="passo11" placeholder="Passo 11 (Opcional)">
                <input class="input-text" type="text" name="passoL" id="passo12" placeholder="Passo 12 (Opcional)">
                <input class="input-text" type="text" name="passoM" id="passo13" placeholder="Passo 13 (Opcional)">
                <input class="input-text" type="text" name="passoN" id="passo14" placeholder="Passo 14 (Opcional)">
                <input class="input-text" type="text" name="passoO" id="passo15" placeholder="Passo 15 (Opcional)">
            </div>
            <div class="obs">
                <h3 class="tittle">Dica ou Observação</h3>
                <h4 class="sub-tittle">Dica</h4>
                <input class="input-text" type="text" name="dica" placeholder="Insira uma dica">
                <h4 class="sub-tittle">Observação</h4>
                <input class="input-text" type="text" name="obs" placeholder="Insira uma observação">
                
            </div><div id="btn-tela-de-postagem">
            <button type="submit" name="postar" onclick="ClosePostMenu()"><img src="postar/assets/imgs/Publicar-btn.png"></button>
        </div>
        </section>
        </div>
        
        </section>
        </form>
    </main>
</body>
</html>