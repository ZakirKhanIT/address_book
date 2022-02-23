<?php

namespace Util;
use \PDO;

class Database
{
    private $connection;
    
    public function __construct()
    {
        try 
        {
            $dns = DB_TYPE . ':host=' . DB_HOST . ';port=' . DB_PORT . ';dbname=' . DB_NAME . ';char-set='. DB_CHAR_SET; 
            $this->connection = new PDO($dns, DB_USER, DB_PASSWORD);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (\PDOException $err) {
            if( 1049 === $err->getCode()){
                $error_type = 'dnf';
                include_once PATH_VIEWS . 'errors/set_up_error.php';
           }
            exit;
         }

         $this->setUp();

    }
    
    public function connect()
    {
        return $this->connection;
    }

    public function setUp()
    {
       $sql = 'SHOW TABLES FROM '.DB_NAME.'';
        $statement = $this
            ->connection
            ->query($sql);
        $statement->execute();
        $response = $statement->fetchAll(PDO::FETCH_ASSOC);

        if( ! $response ){
            $sqlFileToExecute = ROOT_PATH .'setup/csv/address_book.sql';
            include_once ROOT_PATH . 'setup/setup.php';
        }
        return;
    }

}