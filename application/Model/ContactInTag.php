<?php
namespace Model;

use Core\Model;
use \PDO;

class ContactInTag extends Model
{

    public $table_name = 'contact_in_tag';

    public function __construct()
    {
        parent::__construct();
    }

    public function add($data)
    {
        $formatted_query=[];
        foreach($data['tagID'] as $tagID){
            $formatted_query[]=[
                ':contact_id'=>$data['id'],
                ':tag_id' => $tagID
            ];
        }

        try{
        $sql = 'INSERT INTO '.$this->table_name.' (
            contact_id,
            tag_id
            ) 
            VALUES(
                :contact_id,
                :tag_id
                )';

        $statement = $this
            ->db
            ->prepare($sql);

            foreach($formatted_query as $row) {
                $statement->execute($row); 
            }


        return $this
            ->db
            ->lastInsertId();
        }
        catch (\PDOException $err) {
            print_r($err);
            exit;
         }
    }

    public function update($data)
    { 
        $this->bulkDeleteById($data['id']);
        $this->add($data);

    }

    public function bulkDeleteById($id)
    {

        $sql = 'DELETE FROM '.$this->table_name.' WHERE contact_id = :id';
        $statement = $this
            ->db
            ->prepare($sql);

            $statement->execute([':id' => $id]);
        return $statement->rowCount();

    }

}

