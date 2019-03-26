<?php

/**
 * Owner class
 */
class Owner extends Controller {

  public function index() {
    $this->render('index', $this->all());
  }

  public function all(){
    return $this->getModel()->getAll();
  }

  public function add(){

      if (isset($_POST['submit'])){

          $name = new Widget(Widget::$TYPE_NAME, $_POST['name']);
          $phone = new Widget(Widget::$TYPE_PHONE, $_POST['phone']);

          if (!$name->is_valid()){
              Message::error(array('noms' => 'Utiliser des alpahbets et des espaces'));
          }

          if (!$phone->is_valid()){
              Message::error(array('telephone' => 'Format incorrect'));
          }

          if (Message::errorClean()){
              $columns = array('name', 'phone');
              $values = array($name, $phone);
              return $this->getModel()->create($columns, $values);
          }
      }

  }

}
