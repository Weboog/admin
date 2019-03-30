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
                    <a href="#add" class="button anchor">
                        <svg class="button__icon">
                            <use href="public/img/sprite.svg#add"></use>
                        </svg>
                        Ajouter
                    </a>
                </li>
            </ul>
            <!-- <div class="search">
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
            </div> -->
        </nav>
        <h2 class="head-2">Affichage de 30 / 125 appartements</h2>
        <section class="data">
            <div class="table">
                <!--/////////////////////////////////////////////  -->
                <h3 class="thead">Id</h3>
                <h3 class="thead">Type</h3>
                <h3 class="thead">Pièces</h3>
                <h3 class="thead">Chambres</h3>
                <h3 class="thead">Surface</h3>
                <h3 class="thead">Prix</h3>
                <h3 class="thead">Ville</h3>
                <h3 class="thead">Propriétaire</h3>
                <h3 class="thead">Actions</h3>
                <!--/////////////////////////////////////////////  -->

                <?php
                $types = array(
                        'appartement' => 'Apt',
                        'maison' => 'Mas'
                );
                $row = '
                <div class="trow trow__id"><a href="http://locatia.ma/appartments/details/%d%d" target="_blank">#%d%d</a></div>
                <div class="trow">%s</div>
                <div class="trow">%s</div>
                <div class="trow">%s</div>
                <div class="trow">%d m<sup>2</sup></div>
                <div class="trow">%d dh</div>
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
                  foreach ($data[1] as $arr) {
                    echo sprintf(
                      $row,
                      $arr['serial'],
                      $arr['id'],
                      $arr['serial'],
                      $arr['id'],
                      $types[$arr['type']],
                      str_pad($arr['pieces'], 2, '0', STR_PAD_LEFT),
                      str_pad($arr['rooms'], 2, '0', STR_PAD_LEFT),
                      $arr['surface'],
                      $arr['price'],
                      utf8_encode($arr['city']),
                      utf8_encode($arr['name']),
                      $arr['id'],
                      $arr['id'],
                      $arr['id'],
                      $arr['id']
                    );
                  }
                 ?>
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

<div id="add" class="popup">
<div class="popup__content">
  <section class="add_form">
      <form action="" method="post" name="new_appart" enctype="multipart/form-data">
        <h2 class="head_form">Ajouter un nouvel appartement</h2>
        <?php
        if (isset($data)) {
          if (count($data[0]['fail']) > 0) {
              $status = 'fail';
          }
          if (count($data[0]['success']) > 0) {
              $status = 'success';
              echo sprintf('<p class="message %s">%s</p>', $status, $data[0]['success'][0]);
          }
        }
        ?>
        <div>
          <div class="owner">
              <h3 class="group_label">Propriétaire</h3>
              <?php
                if (array_key_exists('owner', $data[0]['fail'])) {
                  echo '<p class="fail">Choisissez un propriétaire</p>';
                }
              ?>
              <select name="owner" id="owner">
                  <option value="0">Propriétaire</option>
                  <?php
                    foreach ($data[2] as $arr) {
                        echo sprintf('<option value="%d">%s</option>', $arr['id'], $arr['name']);
                    }
                  ?>
              </select>
              <a href="/owner#add" class="add_owner">Nouveau propriétaire</a>
          </div>
          <div class="address">
              <h3 class="group_label">Adresse</h3>
              <div class="sub">
                <?php
                  if (array_key_exists('type', $data[0]['fail'])) {
                    echo '<p class="fail">Choisissez le type</p>';
                  }
                ?>
                <select name="type" id="type">
                    <option value="0">Type du bien</option>
                    <option value="1">Appartement</option>
                    <option value="2">Maison</option>
                </select>
              </div>
              <div class="sub">
                <?php
                  if (array_key_exists('city', $data[0]['fail'])) {
                    echo '<p class="fail">Choisissez une ville</p>';
                  }
                ?>
                <select name="city" id="city">
                    <option value="0">Ville</option>
                    <option value="1">Rabat</option>
                    <option value="2">Salé</option>
                    <option value="3">Témara</option>
                </select>
              </div>
              <div class="sub">
                <?php
                  if (array_key_exists('zone', $data[0]['fail'])) {
                    echo '<p class="fail">Choisissez une zone</p>';
                  }
                ?>
                <select name="zone" id="district">
                    <option value="0">Zone</option>
                </select>
              </div>
              <div class="sub">
                <?php
                  if (array_key_exists('borough', $data[0]['fail'])) {
                    echo '<p class="fail">Choisissez un quartier</p>';
                  }
                ?>
                <select name="borough" id="borough">
                    <option value="0">Quartier</option>
                </select>
              </div>
              <div class="sub">
                <?php
                  if (array_key_exists('address', $data[0]['fail'])) {
                    echo '<p class="fail">Saisissez une adresse</p>';
                  }
                ?>
                <textarea name="address" id="address" placeholder="Addresse complète"></textarea>
              </div>
          </div> <!-- 1st wrapper close tag -->
          <!-- Start second wrapper -->
          <div class="infos">
              <h3 class="group_label">Informations</h3>
              <div class="sub">
                <?php
                  if (array_key_exists('pieces', $data[0]['fail'])) {
                    echo '<p class="fail">Choisir nombre de pièces</p>';
                  }
                ?>
                <select name="pieces" id="pieces">
                    <option value="0">Pièces</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>
              </div>
              <div class="sub">
                <?php
                  if (array_key_exists('rooms', $data[0]['fail'])) {
                    echo '<p class="fail">Choisir nombre de chambres</p>';
                  }
                ?>
                <select name="rooms" id="pieces">
                    <option value="0">Chambres</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>
              </div>
              <div class="sub">
                <?php
                  if (array_key_exists('surface', $data[0]['fail'])) {
                    echo '<p class="fail">Spécifiez la surface</p>';
                  }
                ?>
                <input type="text" name="surface" placeholder="Surface">
              </div>
              <div class="sub">
                <?php
                  if (array_key_exists('price', $data[0]['fail'])) {
                    echo '<p class="fail">Spécifiez le prix</p>';
                  }
                ?>
                <input type="text" name="price" placeholder="Prix">
              </div>

          </div>
        </div>
        <div>
          <div class="details">
              <h3 class="group_label">Détails</h3>
              <div class="sub">
                <?php
                  if (array_key_exists('description', $data[0]['fail'])) {
                    echo '<p class="fail">Faite une description</p>';
                  }
                ?>
                <textarea name="description" id="description" placeholder="Decription"></textarea>
              </div>
              <div class="sub">
                <?php
                  if (array_key_exists('external', $data[0]['fail'])) {
                    echo '<p class="fail">Décrire l\'extérieur</p>';
                  }
                ?>
                <textarea name="external" id="external" placeholder="à l'éxtérieur"></textarea>
              </div>
              <div class="sub">
                <?php
                  if (array_key_exists('internal', $data[0]['fail'])) {
                    echo '<p class="fail">Décrire l\'intérieur</p>';
                  }
                ?>
                <textarea name="internal" id="internal" placeholder="à l'intérieur"></textarea>
              </div>
              <div class="sub">
                <?php
                  if (array_key_exists('conditions', $data[0]['fail'])) {
                    echo '<p class="fail">Listez des conditions</p>';
                  }
                ?>
                <textarea name="conditions" id="conditions" placeholder="Conditions à remplir"></textarea>
              </div>

          </div>
          <div class="two">
            <div class="gallery">
                <h3 class="group_label">Miniatures</h3>
                <?php
                  if (array_key_exists('thumbs', $data[0]['fail'])) {
                    echo '<p class="fail">Aucune image</p>';
                  }
                ?>
                <label for="thumbs">Parcourir</label>
                <input type="file" class="browse" id="thumbs" name="thumbs[]" accept="image/jpeg" multiple>
                <div class="sample_images"></div>
            </div>
            <div class="gallery">
                <h3 class="group_label">Gallerie</h3>
                <?php
                  if (array_key_exists('gallery', $data[0]['fail'])) {
                    echo '<p class="fail">Aucune image</p>';
                  }
                ?>
                <label for="gallery">Parcourir</label>
                <input type="file" class="browse" id="gallery" name="gallery[]" accept="image/jpeg" multiple>
                <div class="sample_images"></div>
            </div>
          </div>
        </div>
        <div class="buttons">
          <div>
            <a href="#" class="reset">Annuler</a>
            <input type="submit" class="submit" name="submit" value="Enregistrer">
          </div>
        </div>
      </form>
  </section>
</div>
</div>

    <div id="blank" class="popup">
        <div class="popup__content">

        </div>
    </div>

    <!--///////////////////////////////////////////-->
    <!-- <div class="element" id="delete_appart">
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
    </div> -->
</body>
</html>
