<?php

require_once 'config.php';

abstract class Database {

    private static $dpo = null;
    private $_table;

    private static $DEFAULT_COLUMN = 'id';
    private static $DEFAULT_ORDER_BY = 'id';
    private static $DEFAULT_SENSE = 'ASC';
    private static $DEFAULT_LIMIT_START = 0;
    private static $DEFAULT_LIMIT_COUNT = 100;

    protected function __construct()
    {
        $this->_table = preg_replace('/Model$/', 's', get_class($this));
    }

    protected function getInstance(){

        if(is_null(self::$dpo)){
            try{
                $dsn = 'mysql:dbname='.DB.';host='.HOST;
                self::$dpo = new PDO($dsn, USER, PASS);
                return self::$dpo;
            }catch (PDOException $e){
                echo $e->getMessage();
            }
        }else{
            return self::$dpo;
        }

    }

    protected function all(array $options){

        $order_by = self::$DEFAULT_ORDER_BY;
        $sense = self::$DEFAULT_SENSE;
        $limit_start = self::$DEFAULT_LIMIT_START;
        $limit_count = self::$DEFAULT_LIMIT_COUNT;

        if (isset($options['order_by'])){
            $order_by = $options['order_by'];
        }

        if (isset($options['sense'])){
            $sense = $options['sense'];
        }
        if (isset($options['limit'])){
            $limit_start = $options['limit']['start'];
            $limit_count = $options['limit']['count'];
        }
        $pdo = $this->getInstance();
        $req = sprintf('select * from %s order by %s %s limit %d,%d', $this->_table,$order_by, $sense, $limit_start, $limit_count);
        $stm = $pdo->query($req);
        print_r($stm->fetchAll(PDO::FETCH_ASSOC));
    }

    protected function find(array $options){

        $column = self::$DEFAULT_COLUMN;
        $order_by = self::$DEFAULT_ORDER_BY;
        $sense = self::$DEFAULT_SENSE;
        $limit_start = self::$DEFAULT_LIMIT_START;
        $limit_count = self::$DEFAULT_LIMIT_COUNT;

        if (isset($options['column'])){
            $column = $options['column']['name'];
            $column_value = $options['column']['value'];
        }

        if (isset($options['order_by'])){
            $order_by = $options['order_by'];
        }

        if (isset($options['sense'])){
            $sense = $options['sense'];
        }
        if (isset($options['limit'])){
            $limit_start = $options['limit']['start'];
            $limit_count = $options['limit']['count'];
        }
        $pdo = $this->getInstance();
        $req = sprintf('select * from %s where %s = :val order by %s %s limit %d,%d', $this->_table, $column, $order_by, $sense, $limit_start, $limit_count);
        $stm = $pdo->prepare($req);
        $stm->bindParam(':val', $column_value, PDO::PARAM_STR);
        $stm->execute();
        print_r($stm->fetch(PDO::FETCH_ASSOC));
    }

    protected function exists($column, $value){

        $pdo = $this->getInstance();
        $req = sprintf('select %s from %s where %s = :val', $column, $this->_table, $column);
        $stm = $pdo->prepare($req);
        $stm->bindParam(':val', $value, PDO::PARAM_STR);
        $stm->execute();
        return $stm->rowCount();
    }


    protected function where(array $params){
        $wheres = 'select * from %s where';
        foreach ($params as $key => $value){
            $wheres .= ' '.$key;
            if (is_numeric($value)){
                $wheres .= ' = '.$value;
            }else{
                $wheres .= ' = '."'$value'";
            }
            $wheres .= ' and';
        }
        $wheres = preg_replace('/( and)*$/', '', $wheres);
        $pdo = $this->getInstance();
        $req = sprintf($wheres, $this->_table);
        $stm = $pdo->query($req);
        $result = $stm->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function insert(array $columns, array $values){
        $pdo = $this->getInstance();
        $req = sprintf('insert into %s (%s) values (%s)', $this->_table, join(', ', $columns), join(', ', $values));
        $stm = $pdo->prepare($req);
        $stm->execute();
        return $pdo->lastInsertId();
    }

    public static function pre(array $array){
        echo '<pre>';
        print_r($array);
        echo '</pre>';
    }

}