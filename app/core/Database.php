<?php

namespace App\Core;

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
      \PDO::ATTR_PERSISTENT => true,
      \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
    );

    try {
      $this->dbh = new \PDO($dsn, $this->user, $this->password, $options);
    } catch (\PDOException $e) {
      die($e->getMessage());
    }
  }

  public function query($sql)
  {
    $this->stmt = $this->dbh->prepare($sql);
  }

  public function lastInsertId()
  {
    return $this->dbh->lastInsertId();
  }

  public function beginTransaction()
  {
    $this->dbh->beginTransaction();
  }
  public function rollBack()
  {
    $this->dbh->rollBack();
  }

  public function commit()
  {
    $this->dbh->commit();
  }

  // Bind values
  public function bind($param, $value, $type = null)
  {
    if (is_null($type)) {
      switch (true) {
        case is_int($value):
          $type = \PDO::PARAM_INT;
          break;
        case is_bool($value):
          $type = \PDO::PARAM_BOOL;
          break;
        case is_null($value):
          $type = \PDO::PARAM_NULL;
          break;
        default:
          $type = \PDO::PARAM_STR;
      }
    }

    $this->stmt->bindValue($param, $value, $type);
  }

  public function execute()
  {
    return $this->stmt->execute();
  }

  public function result_set()
  {
    $this->execute();
    return $this->stmt->fetchAll(\PDO::FETCH_OBJ);
  }

  public function single()
  {
    $this->execute();
    return $this->stmt->fetch(\PDO::FETCH_OBJ);
  }
}
