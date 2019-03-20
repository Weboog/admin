<?php
Session::init();
if (Session::get('email') !== null) {
  header('Location: /appartment');
}
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/public/css/style.css">
    <title>PANNEAU D'ADMINISTRATION</title>
</head>
<body id="login">
<section class="login">
    <header>
      <h1 class="login_logo"></h1>
      <h2>Accès administrateurs</h2>
    </header>
    <?php
        if (count($errors = message::getErrors()) > 0){
            foreach ($errors as $error){
                echo '<p class="message error">'.$error.'<p>';
            }
        }
    ?>
    <form action="" method="post">
      <div class="widget">
        <label for="email">Email</label>
        <input id="email" type="email" name="email">
      </div>
      <div class="widget">
        <label for="password">Mot de passe</label>
        <input id="password" type="password" name="password">
      </div>
        <button>Connexion</button>
    </form>
</section>
</body>
</html>
