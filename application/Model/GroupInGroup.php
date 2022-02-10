<?php
namespace Model;

use Core\Model;
use \PDO;

class GroupInGroup extends Model
{

    public $table_name = 'group_in_group';

    public function __construct()
    {
        parent::__construct();
    }

    public function add($data)
    {
        $formatted_query=[];
        foreach($data['groupID'] as $groupID){
            $formatted_query[]=[
                ':group_parent_id'=>$data['id'],
                ':group_child_id' => $groupID
            ];
        }

        try{
         $sql = 'INSERT INTO '.$this->table_name.' (
            group_parent_id,
            group_child_id
            ) 
            VALUES(
                :group_parent_id,
                :group_child_id
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
        try{
        $sql = 'DELETE FROM '.$this->table_name.' WHERE group_parent_id = :id';
        $statement = $this
            ->db
            ->prepare($sql);

            $statement->execute([':id' => $id]);
        return $statement->rowCount();

    } catch (\PDOException $err) {
        exit;
     }
    }

}
