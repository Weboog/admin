<?php

class adminModel extends Database
{

    public function __construct()
    {
        parent::__construct();
    }

    public function check($email){

        if ($this->exists('email', $email) === 1){
            Session::init();
            Session::set('email', $email);
            return array('input' => 'password');
        }else{
            //return json_encode(['status' => 0, 'message' => 'Adresse email inéxistante']);
            return array('status' => 0, 'message' => 'Adresse Email invalide');
        }
    }

    public function login($pass){
        $params = array('email' => $_SESSION['email'], 'password' => $pass);
        return $this->where($params);
    }

}