<?php
namespace Model;

use Core\Model;
use \PDO;

class Group extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getAllGroups()
    {
        $sql = 'SELECT `group`.*,c.child_group,d.contact FROM `group` LEFT JOIN ( SELECT group_parent_id,GROUP_CONCAT(`group_in_group`.group_child_id) as child_group FROM group_in_group GROUP BY group_in_group.group_parent_id) AS c ON c.group_parent_id=`group`.id LEFT JOIN ( SELECT group_id,GROUP_CONCAT(`contact_in_group`.contact_id) as contact FROM contact_in_group GROUP BY contact_in_group.group_id) AS d ON d.group_id=`group`.id order by `group`.name asc';
        $statement = $this
            ->db
            ->query($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);

    }

    public function getAllGroupsById()
    {
        $data=[];
        $sql = $this->getAllGroups();
        foreach( $sql as $sql){
            
            $data += [$sql['id'] => $sql];
        }
    
        return $data;

    }

    public function getById($id)
    {
        $sql = 'SELECT  `group`.*,c.child_group,d.contact FROM `group`
        LEFT JOIN 
        ( SELECT group_parent_id,GROUP_CONCAT(`group_in_group`.group_child_id) as child_group FROM group_in_group 
        GROUP BY 
        group_in_group.group_parent_id) AS c 
        ON 
        c.group_parent_id=`group`.id 
        LEFT JOIN ( SELECT group_id,GROUP_CONCAT(`contact_in_group`.contact_id) as contact 
        FROM 
        contact_in_group GROUP BY contact_in_group.group_id) AS d ON d.group_id=`group`.id 
        WHERE id = :id';
        $statement = $this
            ->db
            ->prepare($sql);
        $statement->execute([':id' => $id]);
        return $statement->fetch();

    }

    public function add($data)
    {
        try{
        $sql = 'INSERT INTO `group` (
            name
            ) 
            VALUES(
                :name
                )';

        $statement = $this
            ->db
            ->prepare($sql);
        $statement->execute([':name' => $data['groupName']]);


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
        $sql = 'UPDATE `group` 
                SET 
                name = :name
                WHERE id = :id';

        $statement = $this
            ->db
            ->prepare($sql);

        $statement->execute([':name' => $data['groupName'], ':id' => $data['id']]);

        return $statement->rowCount();
    }

    public function delete($id)
    {
        $sql = 'DELETE FROM `group` WHERE id = :id';
        $statement = $this
            ->db
            ->prepare($sql);
        $statement->execute([':id' => $id]);
        return $statement->rowCount();

    }

}

