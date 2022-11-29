<?php
include "verify.php";
include "connect.php";
if($_GET["receita"] != ""){
    $id = $_GET["receita"];
    $query = $mysqli->query("SELECT * FROM Receita WHERE id = '$id'") or die("deu erro aqui fml");
    $receita = $query->fetch_assoc();
    $passos = $receita["passos"];
    $corte = strpos($passos, ",");
    $num_passos = substr_count($passos, ",");
    $corte = substr($passos, 0, $corte);
    //for($i = 0; $id <= strlen)
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
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <title>Receita | Healthy Food</title>

    <link type="text/css" rel="stylesheet" href="./assets/stylerec.css">
    <link type="text/css" rel="stylesheet" href="./assets/media.css">
</head>
<body>
    <section class="receita">
        <div class="opts">
            <a href="https://hf22.000webhostapp.com"><img id="back-icon" src="./assets/imgs/voltar-icon.png"></a>
            <img src="./assets/imgs/favoritar-icon.png" alt="Botão de favoritar">
            <img id="share-icon" src="./assets/imgs/share-icon.png" alt="Botão de compartilhar">
        </div>
        <aside>
              
            <div class="rec-img"><img src="./assets/imgs/Salada Caesar - IMAGEM.png"></div>

            <h2><?php echo $receita["nome"];?></h2>
                
            <div class="autor">
                <div id="autor-img"></div>
                <p id="autor-name"><?php echo $receita["autor"]; ?></p>
            </div>

            <div class="rec-info">
                    <div class="info2">
                        <p class="info-title">Tempo de Preparo</p>
                        <p><span><?php echo $receita["tempo"]." Min."; ?></span></p>
                    </div>
                    <div class="info2">
                        <p  class="info-title" >Rendimento</p>
                        <p><span><?php echo $receita["porcao"]." porções"; ?></span></p>
                    </div>
                    <div class="info2" class="margin">
                        <p class="info-title" >Calorias</p class="info-title">
                        <p><span><?php echo $receita["calorias"]." kcal"; ?></span></p>
                    </div>
                    <div class="info2">
                        <p  class="info-title" >Avaliação</p>
                        <p><span>(Proximamente!)</span></p>
                    </div>
            </div>
                
            <div class="categorias">
                    <p class="categ2"><?php echo $receita["categoria"]; ?></p>
                    <p class="categ2"><?php echo $receita["dieta_especial"]; ?></p>
            </div>

            <div class="etp">
                <div id="ing" >
                    <h3 class="etapas">Ingredientes</h3> 
                    
                    <details open>
                        <!--<summary>Salada</summary>
                        <div class="ing-desc"> 
                            <p>Alface</p><p><span>X unidade</span></p>
                        </div>
                        <div class="ing-desc"> 
                            <p>Croutons</p><p><span>X xícara de chá</span></p>
                        </div>
                    </details>
                    <details open>
                        <summary>Molho</summary>
                        <div class="ing-desc"> 
                            <p>Maionese</p><p><span>X unidade</span></p>
                        </div>
                        <div class="ing-desc"> 
                            <p>Alho</p><p><span>X dente(s)</span></p>
                        </div>
                        <div class="ing-desc"> 
                            <p>Sal</p><p><span>X/X colher de chá</span></p>
                        </div>                      
                    </details>
                    <details open>
                        <summary>Frango</summary>-->
                        <div class="ing-desc"> 
                            <p><?php echo $receita["ingrediente"]; ?></p>
                        </div>                    
                    </details>
                </div>  
                <div id="mode">
                    <h3 class="etapas">Modo de Preparo</h3 class="etapas">     
                    
                    <div class="passos">
                        <p class="pass"><?php echo "1 primeiro corte: ".$corte;?></p>
                        <p class="pass">2 Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet quidem dolorum sint fugit ducimus, aliquam eaque, numquam reiciendis maiores optio cum, voluptatibus autem omnis suscipit velit blanditiis cupiditate sed reprehenderit?</p>
                        <p class="pass">3 Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque autem magni commodi molestiae possimus, exercitationem voluptate. Nulla, est repellendus quaerat rerum obcaecati quod maxime doloremque vel cum odio accusantium corrupti?</p>
                    </div>
                </div>
            </div>                
        </aside>
    </section>
</body>
</html>