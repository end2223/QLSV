<?php

class lib_dbconnection {

//    test autoload
    function test() {
        echo "Da vao day";
    }

    protected $user = "caongocson";
    protected $password = "a";
    protected $host = "localhost:3307";
    protected $database = "quanlysinhvien";
    protected $tableName;
    protected static $connectionInstance = null;
    protected $querryParans = [];

    public function __construct() {
        $this->connect();
    }

    /**
     * key not database
     * @return new PDO
     */
    public function connect() {
        if (self::$connectionInstance === null) {
            try {
                self::$connectionInstance = new PDO('mysql:host=' . $this->host . ';dbname='
                        . $this->database, $this->user, $this->password);
                //thiet lap bao loi
                self::$connectionInstance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (Exception $ex) {
                echo "ERROR:" . $ex->getMessage();
                die();
            }
        }
        return self::$connectionInstance;
    }

    //chuyen vao paran tranh injection
    public function query($sql, $paran = []) {
        $qr = self::$connectionInstance->prepare($sql);
        if (is_array($paran) && $paran) {
            $qr->execute($paran);
        } else {
            $qr->execute();
        }
        return $qr;
    }

    function builQuerryParans($parans) {
        $default = [
            "select" => "",
            "where" => "",
            "other" => "",
//            "parans" => "",
            "field" => "",
            "value" => [],
        ];
        //gop hai mang
        $this->querryParans = array_merge($default, $parans);
        return $this;
    }

    public function checkwhere($condition) {
        if (trim($condition)) {
            return " where " . $condition;
        }
        return "";
    }

    public function select() {
        $sql = "select " . $this->querryParans["select"] . " from " . $this->tableName
                . $this->checkwhere($this->querryParans["where"]) . " " . $this->querryParans["other"];
        echo $sql;
//        die();
        $querry = $this->query($sql, $this->querryParans["value"]);
        return $querry->fetchAll(PDO::FETCH_ASSOC);
    }

    public function selectOne() {
        $this->querryParans["other"] = "limit 1";
        $data = $this->select();
        if ($data) {
            return $data[0];
        }
        return [];
    }

    public function insert() {
        $sql = "insert into " . $this->tableName . " " . $this->querryParans["field"];
        $result = $this->query($sql, $this->querryParans["value"]);
        if ($result) {
            return self::$connectionInstance->lastInsertId();
        }
        return false;
    }

    public function update() {
        $sql = "update " . $this->tableName . " set " . $this->querryParans["other"] . " "
                . $this->checkwhere($this->querryParans["where"]);
        return $this->query($sql);
    }

    public function delete() {
        $sql = "delete from " . $this->tableName . " " . $this->checkwhere($this->querryParans["where"]) . " " . $this->querryParans["other"];
        return $this->query($sql);
    }

}
