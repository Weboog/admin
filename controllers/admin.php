<?php


class Admin extends Controller
{

    public function index(){
        $data = array();
        //Let's check for email presence before redirecting to Admin dashboard
        if (isset($_POST['email'])){
            $admin = $this->getModel();
            $data = $admin->check($_POST['email']);
        }
        //Let's fetch all data according to email stored in session and the posted password
        if (isset($_POST['password']) && isset($_SESSION['email'])){
            $admin = $this->getModel();
            $res = $admin->login($_POST['password']);
            if ($res){
                Session::delete('email');
                Session::set('names', $res['names']);
                Session::set('level', $res['level']);
                Session::set('email', $res['email']);
                header('Location: appartment');
            }else{
                $data = array('status' => '2', 'message' => 'Can not login to database verify your password');
            }
        }
        $this->render('index', $data);
    }

}