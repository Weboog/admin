<?php

class districtModel extends Database {

  public function __construct()
  {
      parent::__construct();
  }

  public function getZones(array $options) {
        return $this->where(array('id', 'district'), $options);
  }

  public function getBoroughs(array $options) {
        return $this->where(array('borough'), $options);
  }

}
