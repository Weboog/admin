<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/admin/public/css/style.css">
    <script src="/admin/public/js/main.js" type="text/javascript"></script>
    <title>LOCATIA</title>
</head>
<body>

<?php require_once './inc/aside.php' ?>
<?php require_once './inc/header.php' ?>

    <main class="content">
            <?php
            if (count($data['fail']) > 0) {
                $status = 'fail';
                echo '<ul class="message '.$status.'">';
                echo '<li>'.count($data['fail']).' Erreurs</li>';
                for ($i = 0; $i < count($data['fail']); $i++) {
                    echo '<li>&raquo; '.$data['fail'][$i].'</li>';
                }
                echo '</ul>';
            }
            if (count($data['success']) > 0) {
                $status = 'success';
                echo sprintf('<p class="message %s">%s</p>', $status, $data['success'][0]);
            }
            ?>
        <section class="appart_form">
            <h2 class="head_form">Ajouter un nouvel appartement</h2>
            <form action="" method="post" name="new_appart" enctype="multipart/form-data">
                <div class="owner">
                    <h3 class="group_label">Propriétaire</h3>
                    <select name="owner" id="owner">
                        <option value="0">Propriétaire</option>
                        <option value="1">Abell</option>
                        <option value="2">Joseph</option>
                    </select>
                    <a href="owners" class="add_owner">Nouveau propriétaire</a>
                </div>
                <div class="address">
                    <h3 class="group_label">Adresse</h3>
                    <select name="type" id="type">
                        <option value="0">Type du bien</option>
                        <option value="1">Appartement</option>
                        <option value="2">Maison</option>
                    </select>
                    <select name="city" id="city">
                        <option value="0">Ville</option>
                        <option value="1">Rabat</option>
                        <option value="2">Salé</option>
                        <option value="3">Témara</option>
                    </select>
                    <select name="zone" id="district">
                        <option value="0">Zone</option>
                        <option value="1">Zone 1</option>
                        <option value="2">Zone 2</option>
                        <option value="3">Zone 3</option>
                        <option value="4">Zone 4</option>
                        <option value="5">Zone 5</option>
                    </select>
                    <select name="borough" id="borough">
                        <option value="0">Quartier</option>
                        <option value="1">Quartier 1</option>
                        <option value="2">Quartier 2</option>
                        <option value="3">Quartier 3</option>
                        <option value="4">Quartier 4</option>
                        <option value="5">Quartier 5</option>
                    </select>
                    <textarea name="address" id="address" placeholder="Addresse complète"></textarea>
                </div>
                <div class="infos">
                    <h3 class="group_label">Informations</h3>
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
                    <input type="text" name="surface" placeholder="Surface">
                    <input type="text" name="price" placeholder="Prix">
                </div>
                <div class="details">
                    <h3 class="group_label">Détails</h3>
                    <textarea name="description" id="description" placeholder="Decription"></textarea>
                    <textarea name="external" id="external" placeholder="à l'éxtérieur"></textarea>
                    <textarea name="internal" id="internal" placeholder="à l'intérieur"></textarea>
                    <textarea name="conditions" id="conditions" placeholder="Conditions à remplir"></textarea>
                </div>
                <!--<div class="thumbs">
                    <h3 class="group_label">Miniatures</h3>
                    <label for="thumb">Sélectionnez des images</label>
                    <input type="file" id="thumb" name="thumb[]" accept="image/jpeg" multiple>
                    <div class="sample_images"></div>
                </div>-->


                <div class="gallery">
                    <h3 class="group_label">Miniatures</h3>
                    <label for="thumbs">Sélectionnez des miniatures</label>
                    <input type="file" class="browse" id="thumbs" name="thumbs[]" accept="image/jpeg" multiple>
                    <div class="sample_images"></div>
                </div>


                <div class="gallery">
                    <h3 class="group_label">Gallerie</h3>
                    <label for="gallery">Sélectionnez des images</label>
                    <input type="file" class="browse" id="gallery" name="gallery[]" accept="image/jpeg" multiple>
                    <div class="sample_images"></div>
                </div>
                <input type="submit" name="submit" value="Enregistrer">
            </form>
        </section>
    </main>
</body>
</html>
