<?php
namespace Controller;

use Core\View;
use Model\Contact;
use Model\City;

class ContactController
{
    private $model;
    private $view;
    private $city;

    public function __construct()
    {
        $this->model = new Contact();
        $this->city = new City();
        $this->view = new View();
    }

    public function index()
    {
        $data['contacts'] = $this
            ->model
            ->getAllContacts();
        $data['city'] = $this
            ->city
            ->getAllCity();
        $this
            ->view
            ->setAttribute('applicationName', APPLICATION_NAME);
        $this
            ->view
            ->setAttribute('pageName', 'Contacts');
        $this
            ->view
            ->setAttribute('contacts', $data['contacts']);
        $this
            ->view
            ->setAttribute('city', $data['city']);
        $this
            ->view
            ->render('contact/index');
    }

    public function add()
    {
        if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'GET')
        {
            $this
                ->view
                ->setAttribute('applicationName', APPLICATION_NAME);
            $data['city'] = $this
                ->city
                ->getAllCity();
            $this
                ->view
                ->setAttribute('pageName', 'Contacts');
            $this
                ->view
                ->setAttribute('city', $data['city']);
            $this
                ->view
                ->render('contact/add');
                return;
        }

        if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST')
        {
            $firstName = isset($_POST['firstName']) ? $_POST['firstName'] : NULL;
            $lastName = isset($_POST['lastName']) ? $_POST['lastName'] : NULL;
            $emailAddress = isset($_POST['emailAddress']) ? $_POST['emailAddress'] : NULL;
            $street = isset($_POST['street']) ? $_POST['street'] : NULL;
            $zipCode = isset($_POST['zipCode']) ? $_POST['zipCode'] : NULL;
            $cityID = isset($_POST['cityID']) ? $_POST['cityID'] : NULL;

            $data = ['firstName' => $firstName, 'lastName' => $lastName, 'emailAddress' => $emailAddress, 'street' => $street, 'zipCode' => $zipCode, 'cityID' => $cityID];

            if ($this
                ->model
                ->addContact($data) >= 1)
            {
                $this
                    ->view
                    ->redirect(PATH_ADDRESS);
                    return;
            }
        }

        $this
        ->view
        ->redirect($_SERVER['REQUEST_URI']);
    }

    public function view($id)
    {
        $data['contact'] = $this
            ->model
            ->getContactById($id);
        $data['city'] = $this
            ->city
            ->getAllCity();
        $this
            ->view
            ->setAttribute('applicationName', APPLICATION_NAME);
        $this
            ->view
            ->setAttribute('pageName', 'Contacts');
        $this
            ->view
            ->setAttribute('contact', $data['contact']);
        $this
            ->view
            ->setAttribute('city', $data['city']);
        $this
            ->view
            ->render('contact/view');
    }

    public function edit($id = '')
    {
        if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'GET' && $id !== '')
        {
            $data['contacts'] = $this
                ->model
                ->getContactById($id);
            $data['city'] = $this
                ->city
                ->getAllCity();
            $this
                ->view
                ->setAttribute('applicationName', APPLICATION_NAME);
            $this
                ->view
                ->setAttribute('pageName', 'Contacts');
            $this
                ->view
                ->setAttribute('contact', $data['contacts']);
            $this
                ->view
                ->setAttribute('city', $data['city']);
            $this
                ->view
                ->render('contact/edit');
                return;
        }

        if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST')
        {
            $id = isset($_POST['id']) ? $_POST['id'] : NULL;
            $firstName = isset($_POST['firstName']) ? $_POST['firstName'] : NULL;
            $lastName = isset($_POST['lastName']) ? $_POST['lastName'] : NULL;
            $emailAddress = isset($_POST['emailAddress']) ? $_POST['emailAddress'] : NULL;
            $street = isset($_POST['street']) ? $_POST['street'] : NULL;
            $zipCode = isset($_POST['zipCode']) ? $_POST['zipCode'] : NULL;
            $cityID = isset($_POST['cityID']) ? $_POST['cityID'] : NULL;

            $data = ['id' => $id, 'firstName' => $firstName, 'lastName' => $lastName, 'emailAddress' => $emailAddress, 'street' => $street, 'zipCode' => $zipCode, 'cityID' => $cityID];

            if ($this
                ->model
                ->updateContact($data) >= 1)
            {
                $this
                    ->view
                    ->redirect(PATH_ADDRESS);
                    return;
            }
        }

            $this
                    ->view
                    ->redirect($_SERVER['REQUEST_URI']);
    }

    public function delete($id)
    {
        if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'GET' && $id !== '')
        {
            if ($this
                ->model
                ->deleteContact($id) >= 1)
            {
                $this
                    ->view
                    ->redirect(PATH_ADDRESS);
                    return;
            }
        
        }

        $this
                    ->view
                    ->redirect($_SERVER['REQUEST_URI']);
    }

    public function exportInJson()
    {
        $data = $this
            ->model
            ->getAllContacts();

            $data = json_encode($data);

            file_put_contents("./assets/files/all_contacts_" . time() . ".json", $data);

            exportData( './assets/files/all_contacts_' . time() . '.json', 'json' );

    }

    public function exportInXml()
    {
        $data = $this
            ->model
            ->getAllContacts();

        $xml = arrayToXml($data, $root_node = 'address_book', $child_node = 'contact_info');

        $all_contacts_xml = 'all_contacts_xml_' . time() . '.xml';
        $xml->save('./assets/files/'.$all_contacts_xml);
        exportData( './assets/files/'.$all_contacts_xml, 'xml' );
    }
}

