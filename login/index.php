<?php
    include "connect.php";
    $retorno = "Credenciais inválidas.";
    
    if (isset($_POST["email"]) && isset($_POST["senha"])){
        
        $email = $mysqli->real_escape_string(trim($_POST["email"]));
        $senha = $mysqli->real_escape_string(trim(md5($_POST["senha"])));
        
        $sql_log = "SELECT * FROM Usuario WHERE email = '$email' AND senha = '$senha'";
        $query = $mysqli->query("$sql_log") or die("Erro interno do servidor");
        
        $linhas = $query->num_rows;
        if ($linhas == 1){
            $usuario = $query->fetch_assoc();
            
            if (!isset($_SESSION)){
                session_start();
            }
            $_SESSION["usuario"] = $usuario["user"];
            
            
            header("Location: feed.php");
            
        }
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

    <title>Login | Healthy Food</title>
    <!--<script type="text/javascript" src="jquery-3.6.1.js"></script>
    <script>
            $(document).ready(function(e ){
                $('#forget').click(function(){
                $('#modal').fadeIn(500);
            });
    </script>-->

    <link type="text/css" rel="stylesheet" href="style/style.css">
    
    <script>
    /*function Miguel(){
    var senha = document.log.senha.value;
    window.alert("Senha: "+senha);
    }*/
    </script>
    <script type="text/javascript">
      /* exported gapiLoaded */
      /* exported gisLoaded */
      /* exported handleAuthClick */
      /* exported handleSignoutClick */

      // TODO(developer): Set to client ID and API key from the Developer Console
      const CLIENT_ID = '40718063610-04aag52tmpi7vq8do460l7uaaoatd8pa.apps.googleusercontent.com';
      const API_KEY = 'AIzaSyAlVlkY6XpS6Wis8Eu1h5QbAfoNB9S2huM';

      // Discovery doc URL for APIs used by the quickstart
      const DISCOVERY_DOC = 'https://www.googleapis.com/discovery/v1/apis/drive/v3/rest';

      // Authorization scopes required by the API; multiple scopes can be
      // included, separated by spaces.
      const SCOPES = 'https://www.googleapis.com/auth/drive.metadata.readonly';

      let tokenClient;
      let gapiInited = false;
      let gisInited = false;

      document.getElementById('authorize_button').style.visibility = 'hidden';
      document.getElementById('signout_button').style.visibility = 'hidden';

      /**
       * Callback after api.js is loaded.
       */
      function gapiLoaded() {
        gapi.load('client', initializeGapiClient);
      }

      /**
       * Callback after the API client is loaded. Loads the
       * discovery doc to initialize the API.
       */
      async function initializeGapiClient() {
        await gapi.client.init({
          apiKey: API_KEY,
          discoveryDocs: [DISCOVERY_DOC],
        });
        gapiInited = true;
        maybeEnableButtons();
      }

      /**
       * Callback after Google Identity Services are loaded.
       */
      function gisLoaded() {
        tokenClient = google.accounts.oauth2.initTokenClient({
          client_id: CLIENT_ID,
          scope: SCOPES,
          callback: '', // defined later
        });
        gisInited = true;
        maybeEnableButtons();
      }

      /**
       * Enables user interaction after all libraries are loaded.
       */
      function maybeEnableButtons() {
        if (gapiInited && gisInited) {
          document.getElementById('authorize_button').style.visibility = 'visible';
        }
      }

      /**
       *  Sign in the user upon button click.
       */
      function handleAuthClick() {
        tokenClient.callback = async (resp) => {
          if (resp.error !== undefined) {
            throw (resp);
          }
          document.getElementById('signout_button').style.visibility = 'visible';
          document.getElementById('authorize_button').innerText = 'Refresh';
          await listFiles();
        };

        if (gapi.client.getToken() === null) {
          // Prompt the user to select a Google Account and ask for consent to share their data
          // when establishing a new session.
          tokenClient.requestAccessToken({prompt: 'consent'});
        } else {
          // Skip display of account chooser and consent dialog for an existing session.
          tokenClient.requestAccessToken({prompt: ''});
        }
      }

      /**
       *  Sign out the user upon button click.
       */
      function handleSignoutClick() {
        const token = gapi.client.getToken();
        if (token !== null) {
          google.accounts.oauth2.revoke(token.access_token);
          gapi.client.setToken('');
          document.getElementById('content').innerText = '';
          document.getElementById('authorize_button').innerText = 'Authorize';
          document.getElementById('signout_button').style.visibility = 'hidden';
        }
      }

      /**
       * Print metadata for first 10 files.
       */
      async function listFiles() {
        let response;
        try {
          response = await gapi.client.drive.files.list({
            'pageSize': 10,
            'fields': 'files(id, name)',
          });
        } catch (err) {
          document.getElementById('content').innerText = err.message;
          return;
        }
        const files = response.result.files;
        if (!files || files.length == 0) {
          document.getElementById('content').innerText = 'No files found.';
          return;
        }
        // Flatten to string to display
        const output = files.reduce(
            (str, file) => `${str}${file.name} (${file.id}\n`,
            'Files:\n');
        document.getElementById('content').innerText = output;
      }
    </script>
    <script async defer src="https://apis.google.com/js/api.js" onload="gapiLoaded()"></script>
    <script async defer src="https://accounts.google.com/gsi/client" onload="gisLoaded()"></script>
</head>

<body class="fundo">
    <main class="cd">
        <div>
            <img src="style/img/bg-image.png" alt="">
        </div>
        <div class="conteudo">
            <div class="option">
                <h2 id="login">Login</h2>
                <a href="https://hf22.000webhostapp.com/cadastro/index.php"><h2 id="reg">Cadastrar</h2></a>
            </div>
            <form name="log" action="" method="POST">
                <p style="margin-inline: 37%;"><?php if (isset($linhas)){
                    if ($linhas == 0){ echo $retorno; }
                } ?></p>
                <div id="email" class="campo">
                    <img src="style/img/email-icon.png">
                    <input type="email" name="email" placeholder="Email" autofocus required>
                </div>
                <div id="senha" class="campo">
                    <img src="style/img/senha-icon.png">
                    <input type="password" name="senha" placeholder="Senha" required>
                    <!--<img src="style/img/conjutivite.png" onclick="Miguel();">-->
                </div>
                <div class="other">
                    <a id="forget" href="https://hf22.000webhostapp.com/em-obras.php">Esqueci minha senha</a>
                    <button id="login-btn" type="submit">Entrar</button>
                </div>
            </form>

            <div class="app">
                <p id="legend">OU CONECTE-SE COM</p>
                
                <div class="conts">
                    <a id="facebook" href=""><img src="style/img/Facebook.png"></a>
                    <a id="google" href=""><img src="style/img/Google.png" onclick="handleAuthClick();"></a>
                    <a id="apple" href=""><img src="style/img/Apple.png"></a>
                </div>
            </div>
        </div>
    </main>
</body>
</html>