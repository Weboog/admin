<?php
/**
 * Created by PhpStorm.
 * User: YOOSF
 * Date: 03/01/2019
 * Time: 11:07
 */

class Newsletter extends Controller
{
    public function index(){
        $this->render('index');
    }

    public function all(){
        $model = $this->getModel();
        $model->getAll();
    }

    public function get($id){
        $model = $this->getModel();
        $options = array('column' => array('name' => 'id', 'value' => $id), 'sense' => 'ASC', 'limit' => array('start' => 0, 'count' => 1));
        $model->getBy($options);
    }

}