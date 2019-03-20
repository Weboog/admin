<?php
Session::init();
if (Session::get('email') === null) {
  header('Location: /');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./public/css/style.css">
    <script src="./public/js/main.js" type="text/javascript"></script>
    <title>LOCATIA</title>
</head>
<body>

<?php require_once './inc/aside.php' ?>
<?php require_once './inc/header.php' ?>

<main class="content">
    <nav class="navigation">
        <ul class="navigation__items">
            <li>
                <a href="#add_newsletter" class="button anchor">
                    <svg class="button__icon">
                        <use href="public/img/sprite.svg#add"></use>
                    </svg>
                    Ajouter
                </a>
            </li>
        </ul>
        <div class="search">
            <!-- //////////////////////////////////////////////// -->
            <div class="select">
                <div class="selected">
                    <span data-value="1" class="label_selected">TITRE</span>
                    <svg class="arrow">
                        <use href="public/img/sprite.svg#down"></use>
                    </svg>
                    <ul id="select" class="hide_options">
                        <li><a class="option_item" data-id="1" href="#"><span>Titre</span></a></li>
                        <li><a class="option_item" data-id="2" href="#"><span>Contenu</span></a></li>
                        <li><a class="option_item" data-id="3" href="#"><span>Date</span></a></li>
                    </ul>
                </div>
            </div>
            <form>
                <input type="search" class="input_text" name="search" placeholder="">
                <button class="btn">
                    <svg>
                        <use href="public/img/sprite.svg#search"></use>
                    </svg>
                </button>
            </form>
        </div>
    </nav>
</main>
<div id="options" class="popup">
    <div class="popup__closer">
        <a href="#">&times;</a>
    </div>
    <div class="popup__content">
        <p class="popup__names">Abell Raffick</p>
        <ul class="popup__options">
            <li><a href="#">Profil</a></li>
            <li><a href="#">Messages<span class="count">21</span></a></li>
            <li><a href="#">Déconnexion</a></li>
        </ul>
    </div>
</div>
</body>
</html>
