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
                <input class="form-el" id="pseudo" type="text" name="pseudo">
                <br>
                <label class="form-el" for="pseudo">Entrez votre pseudo</label>
                <br>
                <input class="form-el btn btn-primary" type="submit" name="submit" value="Connexion au chat">
          </form>
        </div>

      <div class="connexion-btn">
        <button class="btn btn-primary" type="button" name="button">Rejoindre le chat</button>
      </div>


    </div>
  </body>
  <script src="script.js" type="text/javascript"></script>
</html>
