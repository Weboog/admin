<?php

require_once 'config.php';

abstract class Database {

    private static $LIMIT = 30;
    private static $dpo = null;
    private $_table;

    private static $DEFAULT_COLUMN = 'id';
    private static $DEFAULT_ORDER_BY = 'id';
    private static $DEFAULT_SENSE = 'ASC';
    private static $LIMIT = 'limit';
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
        $req = sprintf('select * from %s order by %s %s %s %d,%d', $this->_table,$order_by, $sense, $limit_start, $limit_count);
        $stm = $pdo->query($req);
        return $stm->fetchAll(PDO::FETCH_ASSOC);
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
        }else {
          $limit = '';
          $limit_start = '';
          $limit_count = '';
        }
        $pdo = $this->getInstance();
        $req = sprintf('select * from %s where %s = :val order by %s %s %s %d,%d', $this->_table, $column, $order_by, $sense, $limit, $limit_start, $limit_count);
        $stm = $pdo->prepare($req);
        $stm->bindParam(':val', $column_value, PDO::PARAM_STR);
        $stm->execute();
        return $stm->fetch(PDO::FETCH_ASSOC);
    }

    protected function exists($column, $value){

        $pdo = $this->getInstance();
        $req = sprintf('select %s from %s where %s = :val', $column, $this->_table, $column);
        $stm = $pdo->prepare($req);
        $stm->bindParam(':val', $value, PDO::PARAM_STR);
        $stm->execute();
        return $stm->rowCount();
    }


    protected function where(array $columns, array $params){
        $wheres = 'select %s from %s where';
        $cols = '';
        foreach ($columns as $value) {
          $cols .= $value.',';
        }
        foreach ($params as $key => $value){
            $wheres .= ' '.$key;
            if (is_numeric($value)){
                $wheres .= ' = '.$value;
            }else{
                $wheres .= ' = '."'$value'";
            }
            $wheres .= ' and';
        }
        $cols = preg_replace('/(,)*$/', '', $cols);
        $wheres = preg_replace('/( and)*$/', '', $wheres);
        $pdo = $this->getInstance();
        $req = sprintf($wheres, $cols, $this->_table);
        $stm = $pdo->query($req);
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $result;
        //echo $req;
    }

    public function insert(array $columns, array $values){
        $pdo = $this->getInstance();
        $req = sprintf('insert into %s (%s) values (%s)', $this->_table, join(', ', $columns), join(', ', $values));
        $stm = $pdo->prepare($req);
        $stm->execute();
        return $pdo->lastInsertId();
    }

    ////////////////////////////////////////////////////
    ///Function out of architecture. to be revised

    public function ext(){

        $pdo = $this->getInstance();
        $base_sql = 'SELECT a.id, a.serial, p.type, a.pieces, a.rooms, a.surface, a.price, c.city, o.name FROM appartments as a
                      LEFT JOIN products p ON a.type = p.id
                      LEFT JOIN cities c ON a.city = c.id
                      LEFT JOIN owners o ON a.owner = o.id
                      ORDER BY a.id DESC';
        //$num = 1;
        //$sql = $base_sql . ' LIMIT :s,:c';
        $stm = $pdo->prepare($base_sql/*$sql*/);
        //$offset = self::$LIMIT * ($num-1);
        //$stm->bindParam(':s', $offset, PDO::PARAM_INT);
        //$stm->bindParam(':c', self::$LIMIT, PDO::PARAM_INT);
        $stm->execute();
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $result;

    }

    public function wholeApart($id){

        $pdo = $this->getInstance();
        $sql = 'SELECT a.id, a.serial, a.address, a.borough as b_index, a.pieces, a.rooms, a.surface, a.price, a.views, a.description, a.external, a.internal, a.conditions,
                            o.name, o.phone, p.type, c.city, d.district, d.borough
                      FROM appartments as a
                      LEFT JOIN products p ON a.type = p.id
                      LEFT JOIN cities c ON a.city = c.id
                      LEFT JOIN owners o ON a.owner = o.id
                      LEFT JOIN districts d on a.zone = d.id
                      WHERE a.id = :id';
        $stm = $pdo->prepare($sql);
        $stm->bindParam(':id', $id, PDO::PARAM_INT);
        $stm->execute();
        $result = $stm->fetch(PDO::FETCH_ASSOC);
        return $result;

    }
    /////////////////////////////////////////////////////

    public static function pre(array $array){
        echo '<pre>';
        print_r($array);
        echo '</pre>';
    }

}
