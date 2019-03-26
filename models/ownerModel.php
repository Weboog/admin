<?php

/**
 * Owner Model
 */
class ownerModel extends Database {

  public function __construct() {
    parent::__construct();
  }

  public function getAll(){
    return $this->all(array());
  }

  public function create($columns, $values){
      return $this->insert($columns, $values);
  }

}
