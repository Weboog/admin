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
    <script src="./public/js/owner.js" type="text/javascript"></script>
    <title>LOCATIA</title>
</head>
<body>

<?php require_once './inc/aside.php' ?>
<?php require_once './inc/header.php' ?>

<main class="content">
    <nav class="navigation">
        <ul class="navigation__items">
            <li>
                <a href="#add" class="button anchor">
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
    <h2 class="head-2">Liste des proprietaires</h2>
    <section class="data">
        <div class="table owner_list">

            <!--/////////////////////////////////////////////  -->
            <h3 class="thead">Id</h3>
            <h3 class="thead">Noms</h3>
            <h3 class="thead">Telephone</h3>
            <h3 class="thead">Actions</h3>
            <!--/////////////////////////////////////////////  -->

            <?php
            $types = array(
                    'appartement' => 'Apt',
                    'maison' => 'Mas'
            );
            $row = '
            <div class="trow trow__id">%d</div>
            <div class="trow">%s</div>
            <div class="trow">%s</div>
            <div class="trow">
                <ul class="actions_menu">
                <li><a href="#blank" class="actions_menu_button" data-id="%d">
                    <svg class="actions_icon">
                        <use href="public/img/sprite.svg#details"></use>
                    </svg>
                    <span class="actions_label">Détails</span></a></li>
                <li><a href="#edit_appart" class="actions_menu_button data-id="%d">
                    <svg class="actions_icon">
                        <use href="public/img/sprite.svg#edit"></use>
                    </svg>
                    <span class="actions_label">éditer</span></a></li>
                <li><a href="#delete_appart" class="actions_menu_button data-id="%d">
                    <svg class="actions_icon">
                        <use href="public/img/sprite.svg#trash"></use>
                    </svg>
                    <span class="actions_label">Supprimer</span></a></li>
            </ul>
            </div>';
               foreach ($data[0] as $arr) {
                 echo sprintf(
                   $row,
                   $arr['id'],
                   utf8_encode($arr['name']),
                   $arr['phone'],
                     $arr['id'],
                     $arr['id'],
                     $arr['id']
                 );
                 //print_r($arr);
               }
             ?>
        </div>
    </section>
</main>
<div id="add" class="popup">
  <div class="popup__content">
    <section class="add_form">
        <form action="" method="post" name="new_owner" enctype="multipart/form-data">
          <h2 class="head_form">Ajouter un nouveau proprietaire</h2>
          <?php
            if ( array_key_exists( 'owner', Message::getSuccess() )) {
              echo sprintf('<p class="message success">%s</p>', Message::showSuccess('owner'));
            }
          ?>
          <div>
            <div class="sub">
              <?php
                if (array_key_exists('name', Message::getErrors())) {
                  echo sprintf('<p class="fail">%s</p>', Message::showError('name'));
                }
              ?>
              <input type="text" name="name" placeholder="Nom et prenom">
            </div>
          </div>
          <div>
              <div class="sub">
                  <?php
                  if (array_key_exists('phone', Message::getErrors())) {
                    echo sprintf('<p class="fail">%s</p>', Message::showError('phone'));
                  }
                  ?>
                  <input type="tel" name="phone" placeholder="Ex: 0700272700">
              </div>
          </div>
            <div class="buttons">
                <div>
                    <a href="#" class="reset">Annuler</a>
                    <input type="submit" class="submit" name="submit" value="Enregistrer">
                </div>
            </div>
        </form>
  </div>
</div>
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
