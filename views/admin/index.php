<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PANNEAU D'ADMINISTRATION</title>
</head>
<body>
<section class="login">
    <header>
        <h1>Zone d'accès restreinte</h1>
    </header>
    <?php
        if (count($errors = message::getErrors()) > 0){
            foreach ($errors as $error){
                echo $error.'<br>';
            }
        }
    ?>
    <form action="" method="post">
        <input type="email" name="email" placeholder="E-mail">
        <input type="password" name="password" placeholder="password">
        <button>Connexion</button>
    </form>
</section>
</body>
</html>
