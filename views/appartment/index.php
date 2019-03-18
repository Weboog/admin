<?php session_start() ?>
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
                    <a href="appartment/add" class="button anchor load_content">
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
                        <span data-value="1" class="label_selected">IDENTIFIANT</span>
                        <svg class="arrow">
                            <use href="public/img/sprite.svg#down"></use>
                        </svg>
                        <ul id="select" class="hide_options">
                            <li><a class="option_item" data-id="1" href="#"><span>Identifiant</span></a></li>
                            <li><a class="option_item" data-id="2" href="#"><span>Position</span></a></li>
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
            <div class="table">
                <h3 class="thead">Id</h3>
                <h3 class="thead">Prix</h3>
                <h3 class="thead thead__views">Vues</h3>
                <h3 class="thead">Actions</h3>

                <div class="trow trow__id">#ADC257410</div>
                <div class="trow trow__price">350DH</div>
                <div class="trow trow__views">230</div>
                <div class="trow trow__actions">
                    <ul class="actions_menu">
                    <li><a href="#view_appart">
                        <svg class="actions_icon">
                            <use href="public/img/sprite.svg#details"></use>
                        </svg>
                        <span class="actions_label">Détails</span></a></li>
                    <li><a href="#edit_appart">
                        <svg class="actions_icon">
                            <use href="public/img/sprite.svg#edit"></use>
                        </svg>
                        <span class="actions_label">éditer</span></a></li>
                    <li><a href="#delete_appart">
                        <svg class="actions_icon">
                            <use href="public/img/sprite.svg#trash"></use>
                        </svg>
                        <span class="actions_label">Supprimer</span></a></li>
                </ul>
                </div>

                <div class="trow trow__id">#ADC257410</div>
                <div class="trow trow__price">350DH</div>
                <div class="trow trow__views">230</div>
                <div class="trow trow__actions">
                    <ul class="actions_menu">
                        <li><a href="#view_appart">
                            <svg class="actions_icon">
                                <use href="public/img/sprite.svg#details"></use>
                            </svg>
                            <span class="actions_label">Détails</span></a></li>
                        <li><a href="#edit_appart">
                            <svg class="actions_icon">
                                <use href="public/img/sprite.svg#edit"></use>
                            </svg>
                            <span class="actions_label">éditer</span></a></li>
                        <li><a href="#delete_appart">
                            <svg class="actions_icon">
                                <use href="public/img/sprite.svg#trash"></use>
                            </svg>
                            <span class="actions_label">Supprimer</span></a></li>
                    </ul>
                </div>

                <div class="trow trow__id">#ADC257410</div>
                <div class="trow trow__price">350DH</div>
                <div class="trow trow__views">230</div>
                <div class="trow trow__actions">
                    <ul class="actions_menu">
                        <li><a href="#view_appart">
                            <svg class="actions_icon">
                                <use href="public/img/sprite.svg#details"></use>
                            </svg>
                            <span class="actions_label">Détails</span></a></li>
                        <li><a href="#edit_appart">
                            <svg class="actions_icon">
                                <use href="public/img/sprite.svg#edit"></use>
                            </svg>
                            <span class="actions_label">éditer</span></a></li>
                        <li><a href="#delete_appart">
                            <svg class="actions_icon">
                                <use href="public/img/sprite.svg#trash"></use>
                            </svg>
                            <span class="actions_label">Supprimer</span></a></li>
                    </ul>
                </div>
            </div>
            <div class="table">
                <h3 class="thead">Id</h3>
                <h3 class="thead">Prix</h3>
                <h3 class="thead thead__views">Vues</h3>
                <h3 class="thead">Actions</h3>

                <div class="trow trow__id">#ADC257410</div>
                <div class="trow trow__price">350DH</div>
                <div class="trow trow__views">230</div>
                <div class="trow trow__actions">
                    <ul class="actions_menu">
                        <li><a href="#view_appart">
                            <svg class="actions_icon">
                                <use href="public/img/sprite.svg#details"></use>
                            </svg>
                            <span class="actions_label">Détails</span></a></li>
                        <li><a href="#edit_appart">
                            <svg class="actions_icon">
                                <use href="public/img/sprite.svg#edit"></use>
                            </svg>
                            <span class="actions_label">éditer</span></a></li>
                        <li><a href="#delete_appart">
                            <svg class="actions_icon">
                                <use href="public/img/sprite.svg#trash"></use>
                            </svg>
                            <span class="actions_label">Supprimer</span></a></li>
                    </ul>
                </div>

                <div class="trow trow__id">#ADC257410</div>
                <div class="trow trow__price">350DH</div>
                <div class="trow trow__views">230</div>
                <div class="trow trow__actions">
                    <ul class="actions_menu">
                        <li><a href="#view_appart">
                            <svg class="actions_icon">
                                <use href="public/img/sprite.svg#details"></use>
                            </svg>
                            <span class="actions_label">Détails</span></a></li>
                        <li><a href="#edit_appart">
                            <svg class="actions_icon">
                                <use href="public/img/sprite.svg#edit"></use>
                            </svg>
                            <span class="actions_label">éditer</span></a></li>
                        <li><a href="#delete_appart">
                            <svg class="actions_icon">
                                <use href="public/img/sprite.svg#trash"></use>
                            </svg>
                            <span class="actions_label">Supprimer</span></a></li>
                    </ul>
                </div>

                <div class="trow trow__id">#ADC257410</div>
                <div class="trow trow__price">350DH</div>
                <div class="trow trow__views">230</div>
                <div class="trow trow__actions">
                    <ul class="actions_menu">
                        <li><a href="#view_appart">
                            <svg class="actions_icon">
                                <use href="public/img/sprite.svg#details"></use>
                            </svg>
                            <span class="actions_label">Détails</span></a></li>
                        <li><a href="#edit_appart">
                            <svg class="actions_icon">
                                <use href="public/img/sprite.svg#edit"></use>
                            </svg>
                            <span class="actions_label">éditer</span></a></li>
                        <li><a href="#delete_appart">
                            <svg class="actions_icon">
                                <use href="public/img/sprite.svg#trash"></use>
                            </svg>
                            <span class="actions_label">Supprimer</span></a></li>
                    </ul>
                </div>
            </div>
            <div class="table">
                <h3 class="thead">Id</h3>
                <h3 class="thead">Prix</h3>
                <h3 class="thead thead__views">Vues</h3>
                <h3 class="thead">Actions</h3>

                <div class="trow trow__id">#ADC257410</div>
                <div class="trow trow__price">350DH</div>
                <div class="trow trow__views">230</div>
                <div class="trow trow__actions">
                    <ul class="actions_menu">
                        <li><a href="#view_appart">
                            <svg class="actions_icon">
                                <use href="public/img/sprite.svg#details"></use>
                            </svg>
                            <span class="actions_label">Détails</span></a></li>
                        <li><a href="#edit_appart">
                            <svg class="actions_icon">
                                <use href="public/img/sprite.svg#edit"></use>
                            </svg>
                            <span class="actions_label">éditer</span></a></li>
                        <li><a href="#delete_appart">
                            <svg class="actions_icon">
                                <use href="public/img/sprite.svg#trash"></use>
                            </svg>
                            <span class="actions_label">Supprimer</span></a></li>
                    </ul>
                </div>

                <div class="trow trow__id">#ADC257410</div>
                <div class="trow trow__price">350DH</div>
                <div class="trow trow__views">230</div>
                <div class="trow trow__actions">
                    <ul class="actions_menu">
                        <li><a href="#view_appart">
                            <svg class="actions_icon">
                                <use href="public/img/sprite.svg#details"></use>
                            </svg>
                            <span class="actions_label">Détails</span></a></li>
                        <li><a href="#edit_appart">
                            <svg class="actions_icon">
                                <use href="public/img/sprite.svg#edit"></use>
                            </svg>
                            <span class="actions_label">éditer</span></a></li>
                        <li><a href="#delete_appart">
                            <svg class="actions_icon">
                                <use href="public/img/sprite.svg#trash"></use>
                            </svg>
                            <span class="actions_label">Supprimer</span></a></li>
                    </ul>
                </div>

                <div class="trow trow__id">#ADC257410</div>
                <div class="trow trow__price">350DH</div>
                <div class="trow trow__views">230</div>
                <div class="trow trow__actions">
                    <ul class="actions_menu">
                        <li><a href="#view_appart">
                            <svg class="actions_icon">
                                <use href="public/img/sprite.svg#details"></use>
                            </svg>
                            <span class="actions_label">Détails</span></a></li>
                        <li><a href="#edit_appart">
                            <svg class="actions_icon">
                                <use href="public/img/sprite.svg#edit"></use>
                            </svg>
                            <span class="actions_label">éditer</span></a></li>
                        <li><a href="#delete_appart">
                            <svg class="actions_icon">
                                <use href="public/img/sprite.svg#trash"></use>
                            </svg>
                            <span class="actions_label">Supprimer</span></a></li>
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
    <div class="element" id="delete_appart">
        <div class="markup">
            <h2 class="head-1">Supprimer l'appartement #CDA456389</h2>
            <div class="controls">
                <ul>
                    <li><a href="#" class="button cancel">
                        <svg class="button__icon">
                            <use href="public/img/sprite.svg#cancel"></use>
                        </svg>
                        NON
                    </a></li>
                    <li><a href="#" class="button validate">
                        <svg class="button__icon">
                            <use href="public/img/sprite.svg#valid"></use>
                        </svg>
                        OUI
                    </a></li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>