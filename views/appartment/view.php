<div class="element view_details" id="view_appart">
  <!-- <div class="fields">
    <p>Identifiant</p>
    <p>Type</p>
    <p>Pieces</p>
    <p>Chambres</p>
    <p>Surface</p>
    <p>Prix</p>
    <p>Ville</p>
    <p>Adresse</p>
    <p>Description</p>
    <p>à l'extérieur</p>
    <p>à l'intérieur</p>
    <p>Conditions</p>
    <p>Propriétaire</p>
    <p>Vues</p>
  </div>

  <div class="values">
    <?php
    //print_r($data);
        // echo sprintf('<p>%s</p>', $data['serial'].$data['id']);
        // echo sprintf('<p>%s</p>', $data['type']);
        // echo sprintf('<p>%s</p>', $data['pieces']);
        // echo sprintf('<p>%s</p>', $data['rooms']);
        // echo sprintf('<p>%s</p>', $data['surface']);
        // echo sprintf('<p>%s</p>', $data['price']);
        // echo sprintf('<p>%s</p>', utf8_encode($data['city']));
        // echo sprintf('<p>%s</p>', utf8_encode($data['address']));
        // echo sprintf('<p>%s</p>', utf8_encode($data['description']));
        // ////////////////////////////////////////////////////////////////
        // echo '<p>';
        // $ext = explode(',', $data['external']);
        // foreach ($ext as $value) {
        //   echo sprintf('<span class="list">%s</span>', utf8_encode($value));
        // }
        // echo '</p>';
        //
        // echo '<p>';
        // $int = explode(',', $data['internal']);
        // foreach ($int as $value) {
        //   echo sprintf('<span class="list">%s</span>', utf8_encode($value));
        // }
        // echo '</p>';
        //
        // echo '<p>';
        // $con = explode(',', $data['conditions']);
        // foreach ($con as $value) {
        //   echo sprintf('<span class="list">%s</span>', utf8_encode($value));
        // }
        // echo '</p>';
        //
        // ////////////////////////////////////////////////////////////////
        // echo sprintf('<p>%s</p>', $data['name'] . ' / '. $data['phone']);
        // echo sprintf('<p>%s</p>', $data['views']);
    ?>
  </div> -->
  <table>
    <tr>
      <th>Identifiant</th>
      <?php
        echo sprintf('<td><span class="highlight"># %s</span></td>', $data['serial'].$data['id']);
      ?>
    </tr>
    <tr>
      <th>Type</th>
      <?php
        echo sprintf('<td>%s</td>', $data['type']);
      ?>
    </tr>
    <tr>
      <th>Pièces</th>
      <?php
        echo sprintf('<td>%s</td>', str_pad($data['pieces'], 2, '0', STR_PAD_LEFT));
      ?>
    </tr>
    <tr>
      <th>Chambres</th>
      <?php
        echo sprintf('<td>%s</td>', str_pad($data['rooms'], 2, '0', STR_PAD_LEFT));
      ?>
    </tr>
    <tr>
      <th>Surface</th>
      <?php
        echo sprintf('<td>%s</td>', $data['surface']);
      ?>
    </tr>
    <tr>
      <th>Prix</th>
      <?php
        echo sprintf('<td>%s DH</td>', $data['price']);
      ?>
    </tr>
    <tr>
      <th>Ville</th>
      <?php
        echo sprintf('<td>%s</td>', utf8_encode($data['city']));
      ?>
    </tr>
    <tr>
      <th>Adresse</th>
      <?php
        echo sprintf('<td>%s</td>', utf8_encode($data['address']));
      ?>
    </tr>
    <tr>
      <th>Description</th>
      <?php
        echo sprintf('<td>%s</td>', utf8_encode($data['description']));
      ?>
    </tr>
    <tr>
      <th>A l'extérieur</th>
      <?php
        $ext = explode(',', $data['external']);
        $list = '<ul>';
        foreach ($ext as $value) {
          $list .= sprintf('<li>%s</li>', ucfirst(utf8_encode($value)));
        }
        $list .= '</ul>';
        echo sprintf('<td>%s</td>', $list);
      ?>
    </tr>
    <tr>
      <th>A l'intérieur</th>
      <?php
      $ext = explode(',', $data['internal']);
      $list = '<ul>';
      foreach ($ext as $value) {
        $list .= sprintf('<li>%s</li>', ucfirst(utf8_encode($value)));
      }
      $list .= '</ul>';
      echo sprintf('<td>%s</td>', $list);
      ?>
    </tr>
    <tr>
      <th>Conditions</th>
      <?php
      $ext = explode(',', $data['conditions']);
      $list = '<ul>';
      foreach ($ext as $value) {
        $list .= sprintf('<li>%s</li>', ucfirst(utf8_encode($value)));
      }
      $list .= '</ul>';
      echo sprintf('<td>%s</td>', $list);
      ?>
    </tr>
    <tr>
      <th>Propriétaire</th>
      <?php
        echo sprintf('<td>%s / <span class="highlight">%s</span></td>', $data['name'], $data['phone']);
      ?>
    </tr>
    <tr>
      <th>Vues</th>
      <?php
        echo sprintf('<td>%s</td>', $data['views']);
      ?>
    </tr>
  </table>
    <!-- <div class="controls">
            <ul>
                <li><a href="#" class="button validate">
                        <svg class="button__icon">
                            <use href="public/img/sprite.svg#valid"></use>
                        </svg>
                        OK
                    </a></li>
            </ul>
        </div> -->
</div>
