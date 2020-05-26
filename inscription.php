<?php

include('db-connection.php');

$errorMessage = '';

if(isset($_POST['submit'])) {

  if($_POST['pseudo'] && $_POST['email'] && $_POST['password']) {

    $statement = $pdo->prepare('INSERT INTO users (name, email, password) VALUES (:name, :email, :password)');

    $insertedRows = $statement->execute(array(
      'name' => $_POST['pseudo'],
      'email' => $_POST['email'],
      'password' => $_POST['password']
    ));

    if($insertedRows) {

      session_start();
      $_SESSION['pseudo'] = $_POST['pseudo'];
      header('Location: chat.php');

    } else {

      $errorMessage = "Erreur lors de l'enregistrement de l'utilisateur";

    }

  } else {

    $errorMessage = "Vous n'avez pas renseigné tous les champs";

  }

}

 ?>

 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>Messenger - Inscription</title>
     <link rel="stylesheet" href="/style/bootstrap.min.css">
     <link rel="stylesheet" href="/style/style.css">
   </head>
   <body>
     <div class="container">
       <header>
         <h2 class="site-title text-primary">Messenger</h2>
         <hr>
       </header>

       <h3>Inscription</h3>

       <form class="inscription" method="post">
         <label class="form-el" for="pseudo">Pseudo</label>
         <br>
         <input class="form-el" type="text" name="pseudo" id="pseudo">
         <br>


         <label class="form-el" for="email">Email</label>
         <br>
         <input class="form-el" type="email" name="email" id="email">
         <br>


         <label class="form-el" for="password">Mot de passe</label>
         <br>
         <input class="form-el" type="password" name="password" id="password">
         <br>

         <input class="btn btn-primary" type="submit" name="submit" value="S'inscrire">
       </form>

       <div class="col-md-12 text-danger text-center"><?= $errorMessage ? $errorMessage : '' ?></div>

     </div>
   </body>
 </html>
