<?php require('db-connection.php'); ?>

<?php
//initie la session avec le pseudo utilisateur
$pseudo = '?';
session_start();
if(isset($_SESSION['pseudo'])) $pseudo = $_SESSION['pseudo'];
?>

<?php
//Enregistre le message
if(isset($_POST['submit']) && !empty($_POST['body'])) {
  $statement = $pdo->prepare("INSERT INTO messages (author, body) VALUES (:author, :body)");
  $statement->execute(array(
    'author' => $_SESSION['pseudo'],
    'body' => $_POST['body']
  ));
}
?>

<?php
//Charge les messages
$statement = $pdo->prepare('SELECT * FROM messages ORDER BY sent_at');
$statement->execute();
$messages = $statement->fetchAll();
?>




<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Messenger - Chat</title>
    <link rel="stylesheet" href="/style/bootstrap.min.css">
    <link rel="stylesheet" href="/style/style.css">
  </head>
  <body>
    <div class="container">
      <header>
        <h2 class="site-title text-primary">Messenger - Welcome <?= $pseudo ?></h2>
        <hr>
      </header>


      <div class="chat-box">

        <div class="chat-conv">

        <?php foreach($messages as $message) { ?>

              <?php if($message['author'] === $_SESSION['pseudo']) { ?>

                    <div class="message-container sent">
                      <div class="message">
                        <p><?= $message['body'] ?></p>
                        <span class="date"><?= $message['sent_at'] ?></span>
                      </div>
                      <span class="author text-primary">Me</span>
                    </div>

              <?php } else { ?>

              <div class="message-container received">
                <div class="message">
                  <p><?= $message['body'] ?></p>
                  <span class="date"><?= $message['sent_at'] ?></span>
                </div>
                <span class="author"><?= $message['author'] ?></span>
              </div>

            <?php } ?>

        <?php } ?>

      </div><!-- .chat-conv -->

      <div class="col-md-12 chat-form-container">

        <form class="chat-form" method="post">
          <textarea name="body" class="textarea" name="body" rows="3" cols="80"></textarea>
          <input class="btn btn-primary" type="submit" name="submit" value="Envoyer">
        </form>

      </div><!-- .chat-form -->


    </div><!-- .chat-box -->


    </div>
  </body>
  <script src="script.js" type="text/javascript"></script>
</html>
