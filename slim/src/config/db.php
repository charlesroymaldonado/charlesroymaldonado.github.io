<?php
  class db{
    private $dbHost ='localhost';
    private $dbUser = 'User_prueba';
    private $dbPass = 'Ch*3311072';
    private $dbName = 'apiRest';
    //conección 
    public function conectDB(){
      $mysqlConnect = "mysql:host=$this->dbHost;dbname=$this->dbName";
      $dbConnecion = new PDO($mysqlConnect, $this->dbUser, $this->dbPass);
      $dbConnecion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $dbConnecion;
    }
  }
