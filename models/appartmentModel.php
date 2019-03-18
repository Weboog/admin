<?php
/**
 * Created by PhpStorm.
 * User: YOOSF
 * Date: 03/01/2019
 * Time: 10:54
 */

class appartmentModel extends Database
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAll(array $options){
        $this->all($options);
    }

    public function getBy(array $options){
        $this->find($options);
    }

    public function create(array $columns, array $params){
        return $this->insert($columns, $params);
    }

}