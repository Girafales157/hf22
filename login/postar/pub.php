
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="./assets/stylepub.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');
    </style>

    <title>Publicar | Healthy Food</title>
    <script>
        function Voltar(){
            window.location.href = "http://hf22.000webhostapp.com/login/feed.php";
        }
    </script>

</head>
<body>
    <main>        
        <section class="publicar">
            <div class="topo">
                <h2>Publicar Receita</h2>
                <img src="./assets/imgs/Close-icon (green).png" onclick="Voltar();">
            </div>
        <div class="content"> 
            <div class="arq">
                <h3 id="img" class="tittle">Foto e vídeo</h3>
                <label for="image">Inserir imagem</label>
                <input accept="img/png" accept="img/jpg" class="file" type="file" name="image" id="image" required>
                <label for="video">Inserir vídeo</label>
                <input class="file" type="file" name="video" id="video">
            </div>
            <div class="info">
                <h3 class="tittle">Informações</h3>
                <h4 class="sub-tittle">Nome</h4>
                <input class="input-text" type="text" placeholder="Insira o nome da receita" required>
                <h4 class="sub-tittle">Tempo de Preparo</h4>
                <input class="input-number" type="number" placeholder="0">
                <h4 class="sub-tittle">Porção</h4>
                <input class="input-number" type="number" placeholder="0">
                <h4 class="sub-tittle">Calorias</h4>
                <input class="input-text" type="number" placeholder="Insira as calorias">
            </div>
            <div class="cat">
                <h3 class="tittle">Categorias</h3>
                <h4 class="sub-tittle">Categoria</h4>
                <select class="sel" required>
                    <option>Café da Manhã</option>
                    <option>Almoço</option>
                    <option>Lanche</option>
                    <option>Jantar</option>
                    <option>Vegano</option>
                </select>
                <h4 class="sub-tittle">Dieta Especial</h4>
                <select class="sel">
                    <option>Sem Lactose</option>
                    <option>Diabetico</option>
                </select>
            </div>
            <div class="ing">
                <h3 class="tittle">Ingredientes</h3>
                <h4 class="sub-tittle">Ingrediente</h4>
                <input class="input-text" type="text" name="ing" placeholder="Insira um ingrediente" required>
                <h4 class="sub-tittle">Quantidade</h4>
                <input class="input-number" type="number" name="quant" placeholder="0" required>
            </div>
            <div class="mode">
                <h3 class="tittle">Modo de Preparo</h3>
                <h4 class="sub-tittle">Passo 1</h4>
                <input class="input-text" type="text" name="passo" placeholder="Insira o passo 1 da receita" required>
                <h4 class="sub-tittle">Passo 2</h4>
                <input class="input-text" type="text" name="passo2" placeholder="Insira o passo 2 da receita" required>
            </div>
            <div class="obs">
                <h3 class="tittle">Dica ou Observação</h3>
                <h4 class="sub-tittle">Dica</h4>
                <input class="input-text" type="text" name="dica" placeholder="Insira uma dica">
                <h4 class="sub-tittle">Observação</h4>
                <input class="input-text" type="text" name="obs" placeholder="Insira uma observação">
            </div>
        </section>
        <div id="btn-tela-de-postagem">
            <button><img src="./assets/imgs/Publicar-btn.png"></button>
        </div>
        </div>
        </section>
    </main>
</body>
</html>