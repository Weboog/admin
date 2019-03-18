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
    <h1 style="color: tomato">Zone d'accès restreinte</h1>
    <form action="" method="post">
        <input type="email" name="email" placeholder="Adresse E-mail">
        <?php
            if (isset($data['status'])){
                echo $data['message'];
            }elseif (isset($data['input'])){
                foreach ($data as $key => $value){
                    echo sprintf('<input type="%s" name="%s" placeholder="%s">', $value, $value, $value);
                }
            }
        ?>
        <button>Connexion</button>
    </form>
</body>
</html>