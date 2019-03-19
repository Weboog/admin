<?php


class Admin extends Controller {

    public function index(){

        //Let's fetch all data according to email stored in session and the posted password
        if (isset($_POST['email']) && isset($_POST['password'])){

          //Validate posts
          $email = new Widget(Widget::$TYPE_EMAIL, $_POST['email']);
          $password = new Widget(Widget::$TYPE_PASSWORD, $_POST['password']);


          if ($email->is_valid() && $password->is_valid()){

              $admin = $this->getModel();
              $res = $admin->login($email->getValue(), $password->getValue());

              if ($res[0]){
                  Session::init();
                  Session::set('names', $res[0]['names']);
                  Session::set('level', $res[0]['level']);
                  Session::set('email', $res[0]['email']);
                  header('Location: appartment');

              }else{

                  Message::error(array('login' => 'Email ou mot de passe incorrect'));

              }
          }

        }

        $this->render('index');
    }

    public function logout(){
      Session::init();
      if(Session::destroy()){
        header('Location: /admin');
      }
    }
}
