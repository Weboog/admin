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

}