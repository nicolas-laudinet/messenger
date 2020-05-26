<?php

include('db-connection.php');

$errorMessage = '';

if(isset($_POST['submit'])) {
  if(!empty($_POST['pseudo']) && !empty($_POST['password'])) {
    $statement = $pdo->prepare('SELECT * FROM users WHERE name = :pseudo AND password = :password');
    $statement->execute(array(
      'pseudo' => $_POST['pseudo'],
      'password' => $_POST['password']
    ));
    $result = $statement->fetch();

    if($result) {

      session_start();
      $_SESSION['pseudo'] = $_POST['pseudo'];
      header('Location: chat.php');

    } else {

      $errorMessage = 'Mot de passe ou pseudo incorrect';

    }
  }
}

 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Messenger - Connexion</title>
    <link rel="stylesheet" href="/style/bootstrap.min.css">
    <link rel="stylesheet" href="/style/style.css">
  </head>
  <body>
    <div class="container">
      <header>
        <h2 class="site-title text-primary">Messenger</h2>
        <hr>
      </header>


        <div id="main">
          <form method="post">
            <br>
            <input class="form-el" id="pseudo" type="text" name="pseudo">
            <br>
            <label class="form-el" for="pseudo">Entrez votre pseudo</label>
            <br>
            <input class="form-el" id="password" type="password" name="password">
            <br>
            <label class="form-el" for="password">Entrez votre mot de passe</label>
            <br>
            <input class="form-el btn btn-primary" type="submit" name="submit" value="Connexion au chat">
            <br>
            <a class="form-el" href="inscription.php">S'inscrire</a>
            <br>
          </form>
        </div>

      <div class="connexion-btn">
        <button class="btn btn-primary" type="button" name="button">Rejoindre le chat</button>
      </div>

      <div class="text-danger"><?= $errorMessage ? $errorMessage : '' ?></div>


    </div>
  </body>
  <script src="script.js" type="text/javascript"></script>
</html>
