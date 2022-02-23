<?php
namespace Model;

use Core\Model;
use \PDO;

class Contact extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getAllContacts( $searchByTags )
    {
    
        $child_query='';
        if( $searchByTags){
            $child_query=' HAVING';
            $query_set =[];
            foreach($searchByTags as $tags){
                $query_set[]= ' FIND_IN_SET("'.$tags.'",d.tag_name) ';
            }

            $child_query .= implode(' OR ', $query_set );

        }
   
       $sql = 'SELECT contact.*,city.name,c.group_name,d.tag_name FROM contact LEFT JOIN city ON contact.city_id = city.id 
        LEFT JOIN ( SELECT contact_id,GROUP_CONCAT(`contact_in_group`.group_id) as group_name 
        FROM contact_in_group GROUP BY contact_in_group.contact_id) AS c ON c.contact_id=contact.id 
        LEFT JOIN ( SELECT contact_id,GROUP_CONCAT(`contact_in_tag`.tag_id) as tag_name 
        FROM contact_in_tag GROUP BY contact_in_tag.contact_id) AS d ON d.contact_id=contact.id '.$child_query .'
        order by contact.first_name';

        $statement = $this
            ->db
            ->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);

    }

    public function getAllContactsById()
    {
        $sql = 'SELECT  id,CONCAT_WS(" ", `first_name`, `last_name`) AS `name` from contact';

        $statement = $this
            ->db
            ->prepare($sql);
        $statement->execute();
        $sql = $statement->fetchAll(PDO::FETCH_ASSOC);

        $data=[];
        foreach( $sql as $sql){
            
            $data += [$sql['id'] => $sql];
        }
    
        return $data;

    }

    public function getContactById($id)
    {
        $sql = 'SELECT contact.*,city.name,c.group_name,d.tag_name FROM contact LEFT JOIN city ON contact.city_id = city.id 
                LEFT JOIN ( SELECT contact_id,GROUP_CONCAT(`contact_in_group`.group_id) as group_name 
                FROM contact_in_group GROUP BY contact_in_group.contact_id) AS c ON c.contact_id=contact.id 
                LEFT JOIN ( SELECT contact_id,GROUP_CONCAT(`contact_in_tag`.tag_id) as tag_name 
                FROM contact_in_tag GROUP BY contact_in_tag.contact_id) AS d ON d.contact_id=contact.id
                WHERE contact.id = :id';

        $statement = $this
            ->db
            ->prepare($sql);
        $statement->execute([':id' => $id]);
        return $statement->fetch();

    }

    public function addContact($data)
    {
        $sql = 'INSERT INTO contact(
            first_name,
            last_name,
            email_address,
            street, 
            zip_code, 
            city_id
            ) 
            VALUES(
                :first_name, 
                :last_name, 
                :email_address, 
                :street,
                :zip_code, 
                :city_id
                )';

        $statement = $this
            ->db
            ->prepare($sql);

        $statement->execute([':first_name' => $data['firstName'], ':last_name' => $data['lastName'], ':email_address' => $data['emailAddress'], ':street' => $data['street'], ':zip_code' => $data['zipCode'], ':city_id' => $data['cityID'], ]);

        return $this
            ->db
            ->lastInsertId();
    }

    public function updateContact($data)
    {

        $sql = 'UPDATE contact 
                SET 
                first_name = :first_name, 
                last_name = :last_name, 
                email_address = :email_address, 
                street = :street,
                zip_code = :zip_code, 
                city_id = :city_id
                WHERE id = :id';

        $statement = $this
            ->db
            ->prepare($sql);

        $statement->execute([':first_name' => $data['firstName'], ':last_name' => $data['lastName'], ':email_address' => $data['emailAddress'], ':street' => $data['street'], ':zip_code' => $data['zipCode'], ':city_id' => $data['cityID'], ':id' => $data['id']]);

        return $statement->rowCount();
    }

    public function deleteContact($id)
    {
        $sql = 'DELETE FROM contact WHERE id = :id';
        $statement = $this
            ->db
            ->prepare($sql);
        $statement->execute([':id' => $id]);
        return $statement->rowCount();

    }

}

