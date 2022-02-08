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
        return $statement = $this->db->query($sql);
    }
    
}