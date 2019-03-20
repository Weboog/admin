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
    <h2 class="head-2">Affichage de 30 / 125 appartements</h2>
    <section class="data">
        <div class="table newsletter">
            <h3 class="thead">Id</h3>
            <h3 class="thead">Titre</h3>
            <h3 class="thead">Date</h3>
            <h3 class="thead">Actions</h3>
            <div class="trow trow__id">1</div>
            <div class="trow trow__id">Nouvelle fonctionnalité de service VIP</div>
            <div class="trow trow__price">25/07/2018</div>
            <div class="trow trow__actions">
                <ul class="actions_menu">
                    <li><a href="#view_news">
                        <svg class="actions_icon">
                            <use href="public/img/sprite.svg#details"></use>
                        </svg>
                        <span class="actions_label">Détails</span></a></li>
                    <li></li>
                    <li></li>
                </ul>
            </div>
        </div>
        <div class="table newsletter">
            <h3 class="thead">Id</h3>
            <h3 class="thead">Titre</h3>
            <h3 class="thead">Date</h3>
            <h3 class="thead">Actions</h3>
            <div class="trow trow__id">1</div>
            <div class="trow trow__id">Nouvelle fonctionnalité de service VIP</div>
            <div class="trow trow__price">25/07/2018</div>
            <div class="trow trow__actions">
                <ul class="actions_menu">
                    <li><a href="#view_news">
                        <svg class="actions_icon">
                            <use href="public/img/sprite.svg#details"></use>
                        </svg>
                        <span class="actions_label">Détails</span></a></li>
                    <li></li>
                    <li></li>
                </ul>
            </div>
        </div>
        <div class="table newsletter">
            <h3 class="thead">Id</h3>
            <h3 class="thead">Titre</h3>
            <h3 class="thead">Date</h3>
            <h3 class="thead">Actions</h3>
            <div class="trow trow__id">1</div>
            <div class="trow trow__id">Nouvelle fonctionnalité de service VIP</div>
            <div class="trow trow__price">25/07/2018</div>
            <div class="trow trow__actions">
                <ul class="actions_menu">
                    <li><a href="#view_news">
                        <svg class="actions_icon">
                            <use href="public/img/sprite.svg#details"></use>
                        </svg>
                        <span class="actions_label">Détails</span></a></li>
                    <li></li>
                    <li></li>
                </ul>
            </div>
        </div>
    </section>
    <!--<section class="test">
        <h2>FIRST TEXT</h2>
        <div class="locatia">
        </div>
        <h2>LAST TEXT</h2>
        <div class="map">MAP</div>
    </section>-->
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

<!--///////////////////////////////////////////-->
<div class="element" id="add_newsletter">
    <div class="markup">
        <h2 class="head-1">Ajouter une Newsletter</h2>
        <form action="">
            <label for="title">Titre :</label>
            <input type="text" name="title" id="title" placeholder="Titre comme idée générale">
            <label for="body">Contenu :</label>
            <textarea name="body" class="big" id="body" placeholder="Composez un message en détails"></textarea>
        </form>
        <div class="controls">
            <ul>
                <li><a href="#" class="button cancel">
                    <svg class="button__icon">
                        <use href="public/img/sprite.svg#cancel"></use>
                    </svg>
                    Annuler
                </a></li>
                <li><a href="" class="button validate">
                    <svg class="button__icon">
                        <use href="public/img/sprite.svg#valid"></use>
                    </svg>
                    Enregistrer
                </a></li>
            </ul>
        </div>
    </div>
</div>
<!--///////////////////////////////////////////-->
<!--///////////////////////////////////////////-->
<div class="element" id="view_news">
    <div class="markup">
        <h2 class="head-1">Newsletter #1</h2>
        <div class="show">
            <div>
                <ul>
                    <li>
                        <p><span>Id : </span><strong>1</strong></p>
                    </li>
                    <li>
                        <p><span>Titre : </span><strong>Prendre en main les nouvelle foncionnalités</strong></p>
                    </li>
                    <li>
                        <p><span>Date de diffusion : </span><strong>23/05/2019 à 08:00</strong></p>
                    </li>
                    <li>
                        <p class="news_body"><span>Contenu : </span>
                            <strong>
                                Nous somme excités de vous annoncer le lancement du
                                programme LOCATIA VIP&reg; qui tient compte de tout vos besoins
                                de service de transport de suivi et bien plus d'autre facilités
                                bénéfiques tout ça à un prix à la porté et adapté.
                            </strong>
                        </p>
                    </li>
                </ul>
            </div>
            <div></div>
        </div>
        <div class="controls">
            <ul>
                <li><a href="#" class="button validate">
                    <svg class="button__icon">
                        <use href="public/img/sprite.svg#valid"></use>
                    </svg>
                    OK
                </a></li>
            </ul>
        </div>
    </div>
</div>
</body>
</html>
