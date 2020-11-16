<?php

// conecta mongodb localhost
$db = new MongoDB\Driver\Manager("mongodb://localhost:27017");

//pega número de votos do azul
$query = new MongoDB\Driver\Query(array('cor' => 'azul'));
$result = $db->executeQuery('votos.candidatos', $query);
$result = $result->toArray();
$azul = $result[0]->votos;

//pega número de votos do vermelho
$query = new MongoDB\Driver\Query(array('cor' => 'vermelho'));
$result = $db->executeQuery('votos.candidatos', $query);
$result = $result->toArray();
$vermelho = $result[0]->votos;

//pega número de votos do cinza
$query = new MongoDB\Driver\Query(array('cor' => 'cinza'));
$result = $db->executeQuery('votos.candidatos', $query);
$result = $result->toArray();
$cinza = $result[0]->votos;

?>






<html>
    <head>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../styles/styles.css">
        <title>Votação</title>

    </head>

<body>

  <header>
    <a style="text-decoration:none; color:black" href="http://localhost/mongoDBproject/"><p class="title">Votação do Krupp</p></a>
    <a href="http://localhost/mongoDBproject/screens/login.php"><img class="UserIcon" src="../images/userIcon.png"></a>
  </header>

  <body>
    <p class="subtitle">Obrigado pelo seu voto!</p>
    <p class="description">Seu voto foi confirmado e contado à votação</p>
    
    <form action="index.php" method="POST">
      <div class="votes2">
        <button class="candidato" name="1" disabled>
          <div>
            <div class="foto">
              <div id="first"></div>
            </div>
            <div class="nome">
              <p class="nomeText"><?php echo $azul ?></p>
            </div>
          </div>
        </button>
        <button class="candidato" id="center" name="2" disabled>
          <div>
            <div class="foto">
              <div id="second"></div>
            </div>
            <div class="nome">
              <p class="nomeText"><?php echo $vermelho ?></p>
            </div>
          </div>
        </button>
        <button class="candidato" id="right" name="3" disabled>
          <div>
            <div class="foto">
              <div id="third"></div>
            </div>
            <div class="nome">
              <p class="nomeText"><?php echo $cinza ?></p>
            </div>
          </div>
        </button>
      </div>
    </form>
  </body>

</html>