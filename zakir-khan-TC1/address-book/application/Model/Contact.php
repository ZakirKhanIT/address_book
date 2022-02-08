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

    public function getAllContacts()
    {
        $sql = 'SELECT contact.*,city.name FROM contact LEFT JOIN city ON contact.city_id = city.id';
        $statement = $this
            ->db
            ->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);

    }

    public function getContactById($id)
    {
        $sql = 'SELECT contact.*,city.name FROM contact LEFT JOIN city ON contact.city_id = city.id WHERE contact.id = ' . $id . '';
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

