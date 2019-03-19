<?php


class Session
{

    public static function init(){
        if (session_status() !== PHP_SESSION_ACTIVE){
            session_start();
            return true;
        }
    }

    public static function destroy(){
        if (session_status() === PHP_SESSION_ACTIVE){
            session_destroy();
            return true;
        }
    }

    public static function set($key, $value){
        $_SESSION[$key] = $value;
    }

    public static function get($key){
        return $_SESSION[$key];
    }

    public static function delete($key){
        unset($_SESSION[$key]);
    }

}
