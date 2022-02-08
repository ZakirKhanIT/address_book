<?php

namespace Model;

use Core\Model;
use \PDO;

class City extends Model
{
        
    public function __construct()
    {
        parent::__construct();
    }
    
    public function getAllCity()
    {
        $sql = 'SELECT * FROM city';
        $statement = $this->db->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    
}