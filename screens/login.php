<?php
/**
 * página acessada quando
 * -> tiver deslogado
 * -> deslogar e quiser logar
 */

//se não tiver session iniciada
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//marca session como nula
$_SESSION['email'] = null;

?>




<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../styles/styles.css">
    </head>

<body>

  <header>
    <a style="text-decoration:none; color:black" href="http://localhost/mongoDBproject/"><p class="title">Votação do Krupp</p></a>
    <a href="http://localhost/mongoDBproject/screens/login.html"><img class="UserIcon" src="../images/loginIcon.png"></a>
  </header>

    <p class="subtitle">Entre em sua conta</p>
    <form method="POST" action="http://localhost/mongoDBproject/php/index.php" id="login">
        <div class="form-group">
          <input type="email" class="form-control" id="InputEmail" aria-describedby="emailHelp" placeholder="Seu email" name="email" required>
          <small id="emailHelp" class="form-text text-muted">Nunca vamos compartilhar seu email, com ninguém.</small>
        </div>
        <div class="form-group">
          <input class="form-control" id="InputPassword" placeholder="Senha" name="senha" required>
        </div>
        <button class="btn btn-primary btn-sm" id="submit" name="login">Criar</button>
        <a href="http://localhost/mongoDBproject/screens/create.html"><small id="emailHelp" class="form-text text-muted">Clique aqui para entrar em uma conta</small></a>
    </form>

</body>

</html>