<?php

namespace Model;

use Core\Model;
use \PDO;

class City extends Model
{
    public $table_name = 'city';
        
    public function __construct()
    {
        parent::__construct();
    }
    
    public function getAllCity()
    {
        $sql = 'SELECT * FROM '.$this->table_name.'';
        $statement = $this->db->query($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllCitiesById()
    {
        $data=[];
        $sql = $this->getAllCities();
        foreach( $sql as $sql){
            
            $data += [$sql['id'] => $sql];
        }
    
        return $data;

    }

    public function add($data)
    {
        try{
        $sql = 'INSERT INTO '.$this->table_name.' (
            name
            ) 
            VALUES(
                :name
                )';

        $statement = $this
            ->db
            ->prepare($sql);
        $statement->execute([':name' => $data['cityName']]);


        return $this
            ->db
            ->lastInsertId();
        }
        catch (\PDOException $err) {
            print_r($err);
            exit;
         }
    }

    public function getCitiesById($id)
    {
        $sql = 'SELECT * from  '.$this->table_name.'
        WHERE id = :id';
        $statement = $this
            ->db
            ->prepare($sql);
        $statement->execute([':id' => $id]);
        return $statement->fetch();

    }

    public function update($data)
    {
        $sql = 'UPDATE '.$this->table_name.' 
                SET 
                name = :name
                WHERE id = :id';

        $statement = $this
            ->db
            ->prepare($sql);

        $statement->execute([':name' => $data['cityName'], ':id' => $data['id']]);

        return $statement->rowCount();
    }

    public function delete($id)
    {
        $sql = 'DELETE FROM '.$this->table_name.' WHERE id = :id';
        $statement = $this
            ->db
            ->prepare($sql);
        $statement->execute([':id' => $id]);
        return $statement->rowCount();

    }
    
}