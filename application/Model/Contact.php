<?php
namespace Model;

use Core\Model;

class Contact extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getAllTables()
    {
        $sql = 'SHOW TABLES IN '.DB_NAME.'';
        if ($this
            ->db
            ->query($sql))
        {
            return $this
                ->db
                ->query($sql)->fetch_all(MYSQLI_ASSOC);
        }
        return;
    }

    public function getAllContacts()
    {
        $sql = 'SELECT contact.*,city.name FROM contact LEFT JOIN city ON contact.city_id = city.id';
        if ($this
            ->db
            ->query($sql))
        {
            return $this
                ->db
                ->query($sql)->fetch_all(MYSQLI_ASSOC);
        }
        return;
    }

    public function getContactById($id)
    {
        $sql = 'SELECT contact.*,city.name FROM contact LEFT JOIN city ON contact.city_id = city.id WHERE contact.id = ' . $id . '';
        if ($this
            ->db
            ->query($sql))
        {
            return $this
                ->db
                ->query($sql)->fetch_assoc();
        }
        return;
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
                "' . $data['firstName'] . '",
                "' . $data['lastName'] . '",
                "' . $data['emailAddress'] . '", 
                "' . $data['street'] . '", 
                "' . $data['zipCode'] . '",
                "' . $data['cityID'] . '"
                )';

        $this
            ->db
            ->query($sql);

        return  $this
            ->db->insert_id;
    }

    public function updateContact($data)
    {

        $sql = 'UPDATE contact 
                SET 
                first_name = "' . $data["firstName"] . '",
                last_name = "' . $data['lastName'] . '",
                email_address = "' . $data['emailAddress'] . '",
                street ="' . $data['street'] . '", 
                zip_code = "' . $data['zipCode'] . '",
                city_id= "' . $data['cityID'] . '"
                WHERE 
                id = ' . $data['id'] . '';

        return $this
            ->db
            ->query($sql);
    }

    public function deleteContact($id)
    {
        $sql = 'DELETE FROM contact WHERE id = ' . $id . '';
        return $this
            ->db
            ->query($sql);
    }

    
}

