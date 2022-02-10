<?php
namespace Controller;

use Core\View;
use Model\Contact;
use Model\Group;
use Model\City;
use Model\ContactInGroup;
use Model\Tag;
use Model\ContactInTag;

class ContactController
{
    private $model;
    private $view;
    private $city;
    private $data = [];

    public function __construct()
    {
        $this->model = new Contact();
        $this->group = new Group();
        $this->city = new City();
        $this->contactInGroup = new ContactInGroup();
        $this->tag = new Tag();
        $this->contactInTag = new ContactInTag();
        $this->view = new View();

        $this->data['pageName'] = 'Contacts';
    }

    public function index( $tagSearch )
    {
        $this->data['contacts'] = $this
            ->model
            ->getAllContacts( $tagSearch );

        $this->data['city'] = $this
            ->city
            ->getAllCity();

        $this->data['groups'] = $this
            ->group
            ->getAllGroupsById();

        $this->data['tags'] = $this
            ->tag
            ->getAllTagsById(); 

        $this->data['allTags'] = $this
            ->tag
            ->getAllTags();  
    
        $this
            ->view
            ->render('contact/index',$this->data);
    }

    public function add()
    {
        if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'GET')
        {
            $this->data['city'] = $this
                ->city
                ->getAllCity();   

            $this->data['groups'] = $this
                ->group
                ->getAllGroups(); 

            $this->data['tags'] = $this
                ->tag
                ->getAllTags();   

            $this
                ->view
                ->render('contact/add',$this->data);
            return;
        }

        if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST')
        {
            $data=getPostData($_POST);

            $id = $this
                ->model
                ->addContact($data);
            if ($id >= 1)
            {
                $this->contactInGroup->add(['id'=>$id,'groupID' => $data['groupID'] ]);
                $this->contactInTag->add(['id'=>$id,'tagID' => $data['tagID'] ]);
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

    public function edit($id = '')
    {
        if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'GET' && $id !== '')
        {
            $this->data['contact'] = $this
                ->model
                ->getContactById($id);
            $this->data['city'] = $this
                ->city
                ->getAllCity();
            $this->data['groups'] = $this
                ->group
                ->getAllGroups(); 
            $this->data['tags'] = $this
                ->tag
                ->getAllTags();    

            $this
                ->view
                ->render('contact/edit',$this->data);
            return;
        }

        if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST')
        {
            $data=getPostData($_POST);
              $updated = $this
                ->model
                ->updateContact($data);
 
                $this->contactInGroup->update(['id'=> $data['id'],'groupID' => $data['groupID'] ]);
                $this->contactInTag->update(['id'=> $data['id'],'tagID' => $data['tagID'] ]);
                $this
                    ->view
                    ->redirect(PATH_ADDRESS);
                return;
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

        exportData('./assets/files/all_contacts_' . time() . '.json', 'json');

    }

    public function exportInXml()
    {
        $data = $this
            ->model
            ->getAllContacts();

        $xml = arrayToXml($data, $root_node = 'address_book', $child_node = 'contact_info');

        $all_contacts_xml = 'all_contacts_xml_' . time() . '.xml';
        $xml->save('./assets/files/' . $all_contacts_xml);
        exportData('./assets/files/' . $all_contacts_xml, 'xml');
    }

    public function search()
    {
        if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST')
        {
            $tagID = isset($_POST['tagID']) ? $_POST['tagID'] : NULL;
            $this->index( $tagID );
        }
        return;
    }

}
