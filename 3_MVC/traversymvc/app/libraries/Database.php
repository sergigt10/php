<?php
  /*
   * PDO Database Class
   * Connect to database
   * Create prepared statements
   * Bind values
   * Return rows and results
   */
  class Database {
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;

    // Para manejar la bd con PDO
    private $dbh;
    private $stmt;
    private $error;

    public function __construct(){
      // Set DSN (Preparar la base de datos)
      $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
      // PDO::ATTR_PERSISTENT -> Solo una connexión a la base de datos para mejorar el rendimiento.
      // PDO::ATTR_ERRMODE -> controlar errores
      $options = array(
        PDO::ATTR_PERSISTENT => true,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
      );

      // Create PDO instance
      try{
        $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
      } catch(PDOException $e){
        $this->error = $e->getMessage();
        echo $this->error;
      }
    }

    // Prepare statement with query
    public function query($sql){
      $this->stmt = $this->dbh->prepare($sql);
    }

    // Bind values
    public function bind($param, $value, $type = null){
      if(is_null($type)){
        // switch(true) -> siempre entra dentro del switch
        switch(true){
          case is_int($value):
            $type = PDO::PARAM_INT;
            break;
          case is_bool($value):
            $type = PDO::PARAM_BOOL;
            break;
          case is_null($value):
            $type = PDO::PARAM_NULL;
            break;
          default:
            $type = PDO::PARAM_STR;
        }
      }
      // Vinculamos el valor con el tipo de variable que es. Requisito de PDO.
      $this->stmt->bindValue($param, $value, $type);
    }

    // Execute the prepared statement
    public function execute(){
      return $this->stmt->execute();
    }

    // Get result set as array of objects
    public function resultSet(){
      // Ejecutar sentencia de la base de datos 
      $this->execute();
      // Retornamos como un objeto
      return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // Get single record as object
    public function single(){
      $this->execute();
      return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    // Get row count (cuantos registros tenemos)
    public function rowCount(){
      return $this->stmt->rowCount();
    }
  }