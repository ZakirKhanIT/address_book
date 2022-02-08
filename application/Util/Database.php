<?php

namespace Util;
use mysqli;

class Database
{
    private $connection;
    
    public function __construct()
    {
        $this->connection =  new mysqli(DB_HOST, DB_USER ,DB_PASSWORD ,DB_NAME);

        if ($this->connection->connect_errno) {
            if( $this->connection -> connect_error == "Unknown database '".DB_NAME."'"){
                include_once PATH_VIEWS . 'errors/set_up_error.php';
                $error_type = 'dnf';
           }
            exit();
        }
        $this->setup();

    }
    
    public function connect()
    {
        return $this->connection;
    }

    public function getAllTables()
    {
        $sql = 'SHOW TABLES IN '.DB_NAME.'';
        if ($this
            ->connection
            ->query($sql))
        {
            return $this
                ->connection
                ->query($sql)->fetch_all(MYSQLI_ASSOC);
        }
        return;
    }

    public function setUp()
    {
        $tableList = $this->getAllTables();
        $key = array_search('contact', array_column($tableList, 'Tables_in_'.DB_NAME.''));
        if(! is_numeric($key) ){
        $sql = "CREATE TABLE IF NOT EXISTS `contact` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `first_name` varchar(255) NOT NULL,
            `last_name` varchar(255) NOT NULL,
            `zip_code` varchar(11) NOT NULL,
            `street` varchar(255) NOT NULL,
            `city_id` int(11) NOT NULL,
            `email_address` varchar(255) NOT NULL DEFAULT '',
            `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
            `updated_date` timestamp NOT NULL DEFAULT current_timestamp(),
            PRIMARY KEY(`id`)
            ) ";
        if ($this
            ->connection
            ->query($sql))
        {
          $sql = 'INSERT INTO contact(
                    first_name,
            last_name,
            email_address,
            street, 
            zip_code, 
            city_id 
                    ) 
                    VALUES
                    ("Sam","Wallace","same@gmail.com","street 49","23456",1),
                    ("Tom","Vetter","tom@gmail.com","street 49","23456",2),
                    ("Mike","Graves","mike@gmail.com","street 49","23456",3),
                    ("Zack","Rohe","zack@gmail.com","street 49","23456",4)';
            $this
                ->connection
                ->query($sql);

        }
    }

     $key = array_search('city', array_column($tableList, 'Tables_in_'.DB_NAME.''));
    if( ! is_numeric($key) ){
        $sql = " CREATE TABLE IF NOT EXISTS `city` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `name` varchar(100) NOT NULL,
                `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
                `updated_date` timestamp NOT NULL DEFAULT current_timestamp(),
                PRIMARY KEY(`id`)
              ) ";

        if ($this
            ->connection
            ->query($sql))
        {
            $sql = 'INSERT INTO city(
                        name
                        ) 
                        VALUES("Mumbai"),("Delhi"),("Bengluru"),("Chennai")';
            $this
                ->connection
                ->query($sql);

        }

    }
}
}