<?php

//pega arquivos das classes utilizadas
require "voto.php";
require "create.php";
require "login.php";

//pega os clicques dos botões e instancia classe
if(isset($_POST["azul"]))
    new voto("azul");
else if(isset($_POST["vermelho"]))
    new voto("vermelho");
else if(isset($_POST["cinza"]))
    new voto("cinza");
else if(isset($_POST["cadastro"]))
    new cadastro();
else if(isset($_POST["login"]))
    new login();

?>