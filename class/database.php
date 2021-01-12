<?php
class Brain{

    
    private $Database = 'test';
    private $host = 'localhost';
    private $userLogin = 'root';
    private $userPass = '';

    public $insertTableValues = array();
    public $insertKeyValues = array();
    public $SQLQuery;

    public function __construct(){
        $this->connection();
    }


    private function connection(){
        $dsn = 'mysql:host='.$this->host.';dbname='.$this->Database;
        $pdo = new PDO($dsn,$this->userLogin,$this->userPass);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
    
        return $pdo;
    }







}