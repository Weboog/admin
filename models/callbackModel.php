<?php
/**
 * Created by PhpStorm.
 * User: YOOSF
 * Date: 03/01/2019
 * Time: 11:06
 */

class callbackModel extends Database
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAll(){
        $this->all();
    }

    public function getBy($options){
        $this->find($options);
    }

}