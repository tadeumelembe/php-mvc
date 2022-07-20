<?php

class Database
{

    private $host = DB_HOST;
    private $user = DB_USER;
    private $password = DB_PASS;
    private $db_name = DB_NAME;

    private $dbh;
    private $stmt;

    public function __construct()
    {
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name;
        $options =  array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        try {
            $this->dbh = new PDO($dsn, $this->user, $this->password, $options);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function query($sql){
        $this->stmt = $this->dbh->prepare($sql);
    }

    public function execute()
    {
        return $this->stmt->execute();
    }

    public function result_set(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function single(){
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }
}
