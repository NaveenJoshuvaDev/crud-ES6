<?php

class Config{

    private const DBHOST= 'localhost';
    private const DBUSER = 'root';

    private const DBPASS=12345;
    private const DBNAME='fetches6crud';

    //DSN=Data Source Network
    private $dsn ='mysql:host='.self::DBHOST.';dbname='.self::DBNAME.'';
    protected $conn =null;

    //Method __construct using connection to the database

    public function __construct(){
        try{
               $this->conn = new PDO($this->dsn, self::DBUSER, self::DBPASS);
               $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
               //echo 'Success';
        }
        catch(PDOException $e)
        {
           die('Error:' . $e->getMessage());
        }
    }
}

//$ob = new  Config();


?>