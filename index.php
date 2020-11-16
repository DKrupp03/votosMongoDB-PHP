<?php

//se não tiver session iniciada
if (session_status() == PHP_SESSION_NONE)
  session_start();

//se tiver logado
if(isset($_SESSION['email']) && $_SESSION['email'] != null){
  //define atributos da página
  $img = "./images/userIcon.png";
  $link = "http://localhost/mongoDBproject/screens/login.php";
  $title = "Clique aqui para sair";
  $form = "./php/index.php";

  // conecta mongodb localhost
  $db = new MongoDB\Driver\Manager("mongodb://localhost:27017");

  //verifica se usuário já votou
  $query = new MongoDB\Driver\Query(array('email' => $_SESSION['email'], 'senha' => $_SESSION['senha']));
  $result = $db->executeQuery('votos.usuario', $query);
  $result = $result->toArray();
  $votou = $result[0]->votou;

  //se sim, vai para página de resultados
  if($votou == 1){
    header("location: http://localhost/mongoDBproject/screens/result.php");
  }
}
else{ //se não tiver logado
  //define atributos da página
  $img = "./images/loginIcon.png";
  $form = "./screens/login.php";
  $link = "http://localhost/mongoDBproject/screens/login.php";
  $title = "Clique aqui para realizar login";
}

?>






<html>
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./styles/styles.css">
        <title>Votação</title>
    </head>

<body>

  <header>
    <a style="text-decoration:none; color:black" href="http://localhost/mongoDBproject/"><p class="title">Votação do Krupp</p></a>
    <a href="<?php echo $link ?>" title="<?php echo $title ?>"><img class="UserIcon" src="<?php echo $img ?>"/></a>
  </header>

  <body>
    <p class="subtitle">Escolha a sua cor preferida</p>
    <p class="description">Vote na sua cor favorita para representar a info</p>
    
    <form action="<?php echo $form ?>" method="POST" id="login">
      <div class="votes">
        <button class="candidato" name="azul">
          <div>
            <div class="foto">
              <div id="first"></div>
            </div>
            <div class="nome">
              <p class="nomeText">Azul</p>
            </div>
          </div>
        </button>
        <button class="candidato" id="center" name="vermelho">
          <div>
            <div class="foto">
              <div id="second"></div>
            </div>
            <div class="nome">
              <p class="nomeText">Vermelho</p>
            </div>
          </div>
        </button>
        <button class="candidato" id="right" name="cinza">
          <div>
            <div class="foto">
              <div id="third"></div>
            </div>
            <div class="nome">
              <p class="nomeText">Cinza</p>
            </div>
          </div>
        </button>
      </div>
    </form>
  </body>

</html>