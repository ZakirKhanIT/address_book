<?php

namespace Core;

use Util\Database;

class Model
{
    protected $db;
    
    public function __construct()
    {
        $connection = new Database();
        $this->db = $connection->connect();     
    }
    
}