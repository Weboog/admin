<?php


class Controller
{

    public function render($file_name, $data = array()) {
        if (isset($data)) extract($data);
        ob_start();
        require ROOT . DS . 'views' . DS . strtolower(get_class($this)) . DS . $file_name . '.php';
        $content = ob_get_clean();
        echo $content;
    }

    public function getModel($name = null) {

        if (is_null($name)) {
            $model = strtolower(get_class($this)) . 'Model';
        }else{
            $model = $name . 'Model';
        }
        require_once MODELS . DS . $model . '.php';
        return new $model();
    }

    protected function quote($variable){
        return "'$variable'";
    }

    public static function pre(array $array){
        echo '<pre>';
        print_r($array);
        echo '</pre>';
    }

}
