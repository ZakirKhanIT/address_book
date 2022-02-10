<?php
namespace Model;

use Core\Model;
use \PDO;

class Tag extends Model
{
    public $table_name = 'tags';

    public function __construct()
    {
        parent::__construct();
    }

    public function getAllTags()
    {
        $sql = 'SELECT * from '.$this->table_name.' 
        order by name';

        $statement = $this
            ->db
            ->query($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);

    }

    public function getAllTagsById()
    {
        $data=[];
        $sql = $this->getAllTags();
        foreach( $sql as $sql){
            
            $data += [$sql['id'] => $sql];
        }
    
        return $data;

    }

    public function add($data)
    {
        try{
        $sql = 'INSERT INTO `tags` (
            name
            ) 
            VALUES(
                :name
                )';

        $statement = $this
            ->db
            ->prepare($sql);
        $statement->execute([':name' => $data['tagName']]);


        return $this
            ->db
            ->lastInsertId();
        }
        catch (\PDOException $err) {
            print_r($err);
            exit;
         }
    }

    public function getTagsById($id)
    {
        $sql = 'SELECT * from  tags
        WHERE id = :id';
        $statement = $this
            ->db
            ->prepare($sql);
        $statement->execute([':id' => $id]);
        return $statement->fetch();

    }

    public function update($data)
    {
        $sql = 'UPDATE `tags` 
                SET 
                name = :name
                WHERE id = :id';

        $statement = $this
            ->db
            ->prepare($sql);

        $statement->execute([':name' => $data['tagName'], ':id' => $data['id']]);

        return $statement->rowCount();
    }

    public function delete($id)
    {
        $sql = 'DELETE FROM `tags` WHERE id = :id';
        $statement = $this
            ->db
            ->prepare($sql);
        $statement->execute([':id' => $id]);
        return $statement->rowCount();

    }

}

