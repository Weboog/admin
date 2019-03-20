<?php


class Appartment extends Controller
{

    private static $DIR = '../locatia/public/img/gallery/large/';
    private static $THUMB = '../locatia/public/img/thumb/';
    private static $EXTENSIONS = array('jpg', 'jpeg');
    private static $MAX_SIZE = 3584000;

    public function index(){
      $status = $this->add();
      $apparts = $this->all();
      $this->render('index', array($status, $apparts));
    }

    public function all(){
        $model = $this->getModel();
        $options = array('order_by' => 'created_at', 'sense' => 'desc');
        return $model->getAll($options);
    }

    public function get($id){
        $model = $this->getModel();
        $options = array('column' => array('name' => 'id', 'value' => $id), 'order_by' => 'id', 'sense' => 'ASC', 'limit' => array('start' => 0, 'count' => 100));
        $model->getBy($options);
    }

    public function add(){

        $status = array('success' => array(), 'fail' => array());

        if (isset($_POST['submit']) and isset($_FILES['gallery']) and isset($_FILES['thumbs'])) {

            //Verify whole form entries
            foreach ($_POST as $key => $value) {
                if ($value === '0') {
                    $status['fail'][$key] = 'Sélectionnez un '.$key.'.';
                }
                if (empty($value)) {
                    $status['fail'][$key] = 'Le champs '.$key.' est vide.';
                }
            }
            //Verify if submitted gallery is not empty
            if ($_FILES['gallery']['name'][0] === '') {
                $status['fail']['gallery'] = 'Vous n\'avez sélectionné aucune image de gallerie.';
            }
            //Verify if submitted thumbs is not empty
            if ($_FILES['thumbs']['name'][0] === '') {
                $status['fail']['thumbs'] = 'Vous n\'avez sélectionné aucune miniature.';
            }

            //Verify each file to match size and type
            for ($i = 0; $i < count($_FILES['thumbs']['name']); $i++) {
                //$full_target = self::$DIR . basename($_FILES['gallery']['name'][$i]);
                $ext = pathinfo($_FILES['thumbs']['name'][$i], PATHINFO_EXTENSION);
                $size = $_FILES['thumbs']['size'][$i];

                if (!in_array($ext, self::$EXTENSIONS)) {
                    $status['fail']['thumb'] = 'Image : ' . pathinfo($_FILES['gallery']['name'][$i], PATHINFO_FILENAME) . ' de type ' . strtoupper($ext) . '. Types autorisés : JPG ou JPEG.';
                }
                if ($size > self::$MAX_SIZE) {
                    $status['fail']['thumb'] = 'Image volumineuse : '.pathinfo($_FILES['gallery']['name'][$i], PATHINFO_FILENAME).', taille : '.(floor($size / 1024)).' Ko. Taille max '.(floor(self::$MAX_SIZE/1024)).' Ko.';
                }
            }

            //Verify each file to match size and type
            for ($i = 0; $i < count($_FILES['gallery']['name']); $i++) {
                //$full_target = self::$DIR . basename($_FILES['gallery']['name'][$i]);
                $ext = pathinfo($_FILES['gallery']['name'][$i], PATHINFO_EXTENSION);
                $size = $_FILES['gallery']['size'][$i];

                if (!in_array($ext, self::$EXTENSIONS)) {
                    $status['fail']['gallery'] = 'Image : ' . pathinfo($_FILES['gallery']['name'][$i], PATHINFO_FILENAME) . ' de type ' . strtoupper($ext) . '. Types autorisés : JPG ou JPEG.';
                }
                if ($size > self::$MAX_SIZE) {
                    $status['fail']['gallery'] = 'Image volumineuse : '.pathinfo($_FILES['gallery']['name'][$i], PATHINFO_FILENAME).', taille : '.(floor($size / 1024)).' Ko. Taille max '.(floor(self::$MAX_SIZE/1024)).' Ko.';
                }
            }

            if (count($status['fail']) === 0) {
                $columns = array('serial', 'gallery', 'owner', 'type', 'city', 'zone', 'borough', 'pieces', 'rooms', 'surface', 'price', 'address', 'description', 'external', 'internal', 'conditions');
                $serial = $_POST['city'].$_POST['zone'].$_POST['borough'];
                $gallery = count($_FILES['gallery']['name']);
                $values = array(
                    $serial,
                    $gallery,
                    $_POST['owner'],
                    $_POST['type'],
                    $_POST['city'],
                    $_POST['zone'],
                    $_POST['borough'],
                    $_POST['pieces'],
                    $_POST['rooms'],
                    $_POST['surface'],
                    $_POST['price'],
                    $this->quote($_POST['address']),
                    $this->quote($_POST['description']),
                    $this->quote($_POST['external']),
                    $this->quote($_POST['internal']),
                    $this->quote($_POST['conditions']),
                );

                $last_id = $this->getModel()->create($columns, $values);

                for ($i = 0; $i < count($_FILES['thumbs']['name']); $i++) {

                    $img = imagecreatefromjpeg($_FILES['thumbs']['tmp_name'][$i]);

                    if (imagesy($img) === 415) {
                        move_uploaded_file($_FILES['thumbs']['tmp_name'][$i], self::$THUMB . 'big/' . $serial.$last_id.'.jpg');
                    }else{
                        move_uploaded_file($_FILES['thumbs']['tmp_name'][$i], self::$THUMB . 'small/' . $serial.$last_id.'.jpg');
                    }

                }

                for ($i = 0; $i < count($_FILES['gallery']['name']); $i++) {
                    move_uploaded_file($_FILES['gallery']['tmp_name'][$i], self::$DIR . $serial.$last_id.'-'.($i+1).'.jpg');
                }
                $status['success'][] = 'Appartement ajouté avec succès.';
            }
        }
        //Always render add page
        //$this->render('index', $status);
        //print_r($status);
        return $status;
    }

    private function quote($variable){
        return "'$variable'";
    }

}
