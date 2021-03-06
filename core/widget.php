<?php


class Widget
{

    private $_value = '';
    private $_type;
    public static $TYPE_EMAIL ='email';
    public static $TYPE_PASSWORD = 'password';
    public static $TYPE_NAME = 'name';
    public static $TYPE_PHONE = 'phone';

    public function __construct($type, $value)
    {
        $this->_value = $value;
        $this->_type = $type;
    }

    /**
     * @return bool|string
     */
    public function is_valid(){

        switch ($this->_type){

            case self::$TYPE_EMAIL:
                if (preg_match('#^[a-z0-9._-]{2,}@[a-z0-9\.\_\-]{2,}\.[]a-z]{2,4}$#i', $this->_value)){
                    return $this->_value;
                }else{
                    return false;
                }
                break;

            case self::$TYPE_PASSWORD:
                if (preg_match('#^([a-z0-9](-._)*){6,}$#i', $this->_value)){
                    return $this->_value;
                }else{
                    return false;
                }
                break;
            case self::$TYPE_NAME:
                if (preg_match('#[a-zA-Z]( )*#i', $this->_value)){
                    return $this->_value;
                }else{
                    return false;
                }
                break;
            case self::$TYPE_PHONE:
                if (preg_match('#0[6|7]{1,}([0-9]{2,}( )?){4,}#', $this->_value)){
                    return $this->_value;
                }else{
                    return false;
                }
                break;
        }
    }

    //Getter
    public function getValue(){
        return $this->_value;
    }

}