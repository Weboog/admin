<?php


class Message {

    private static $ERRORS = array();
    private static $SUCESS = array();


    public static function error(array $error){

        foreach ($error as $key => $value){
            self::$ERRORS[$key] = $value;
        }

    }

    public static function success(array $success){

        foreach ($success as $key => $value){
            self::$SUCESS[$key] = $value;

        }

    }

    public static function getErrors(){

        return self::$ERRORS;

    }

    public static function getSuccess(){

        return self::$SUCESS;

    }

    public static function showError($key){
      if (array_key_exists( $key, self::$ERRORS)) {
        return self::$ERRORS[$key];
      }
    }

    public static function showSuccess($key){
      if (array_key_exists( $key, self::$SUCESS)) {
        return self::$SUCESS[$key];
      }
    }

    public static function errorClean(){

        return (count(self::$ERRORS) === 0) ? true : false;

    }


}
