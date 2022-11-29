<?php

if (!isset($SESSION)){
    session_start();
}

session_destroy();

header("Location: https://hf22.000webhostapp.com/index.php");

?>