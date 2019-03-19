<?php

class District extends Controller {

  public function city($city) {
    $options = array('city' => $city);
    $result = $this->getModel()->getZones($options);
    echo json_encode(array('zones' => $result));
  }

  public function zone($zone) {
    $options = array('id' => $zone);
    $result = $this->getModel()->getBoroughs($options);
    echo json_encode(array('borough' => $result));
  }

}
