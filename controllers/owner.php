<?php

/**
 * Owner class
 */
class Owner extends Controller {

  public function index() {
    $this->add();
    $this->render('index', array($this->all()));
  }

  public function all(){
    return $this->getModel()->getAll();
  }

  public function add(){

      if (isset($_POST['submit'])){

          $name = new Widget(Widget::$TYPE_NAME, $_POST['name']);
          $phone = new Widget(Widget::$TYPE_PHONE, $_POST['phone']);

          if (!$name->is_valid()){
              Message::error(array('name' => 'Utiliser des alpahbets et des espaces'));
          }

          if (!$phone->is_valid()){
              Message::error(array('phone' => 'Format de numero incorrect'));
          }

          if (Message::errorClean()){
              $columns = array('name', 'phone');
              $values = array(
                $this->quote($name->getValue()),
                $this->quote($phone->getValue())
              );
              $id = $this->getModel()->create($columns, $values);
              if ($id > 0) {
                Message::success(array('owner' => 'Proprietaire ajoute avec succes'));
              }
          }
      }

  }

}
