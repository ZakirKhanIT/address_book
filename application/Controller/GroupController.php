<?php
namespace Controller;

use Core\View;
use Model\Contact;
use Model\Group;
use Model\City;
use Model\GroupInGroup;

class GroupController
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
        $this->groupInGroup = new GroupInGroup();
        $this->view = new View();
        $this->data['pageName'] = 'Groups';
    }

    public function index()
    {
        $this->data['groups'] = $this
            ->group
            ->getAllGroups();
        $this->data['groups_by_id'] = $this
            ->group
            ->getAllGroupsById(); 
        $this->data['contacts'] = $this
            ->model
            ->getAllContactsById();       
        $this->data['city'] = $this
            ->city
            ->getAllCity();

        $this
            ->view
            ->render('group/index',  $this->data );
    }

    public function add()
    { 
        if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'GET')
        {
            $this->data['groups'] = $this
            ->group
            ->getAllGroups();
            $this
                ->view
                ->render('group/add', $this->data);
            return;
        }

        if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST')
        { 
            $data= getPostData($_POST);

            $id = $this
                ->group
                ->add($data);
                $this->groupInGroup->add(['id'=>$id,'groupID' => $data['groupID'] ]);
                $this
                    ->view
                    ->redirect(PATH_ADDRESS.'?action=group');
                return;
        }

        $this
            ->view
            ->redirect($_SERVER['REQUEST_URI']);
    }

    public function edit($id = '')
    {
        if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'GET' && $id !== '')
        {
            $this->data['groups'] = $this
                ->group
                ->getById($id);
            $this->data['allGroups'] = $this
                ->group
                ->getAllGroups();     
 
            $this
                ->view
                ->render('group/edit',  $this->data);
            return;
        }

        if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST')
        {
            $data=getPostData($_POST);
            $updated = $this
                ->group
                ->update($data);
                $this->groupInGroup->update(['id'=>$data['id'],'groupID' =>$data['groupID'] ]);
                $this
                    ->view
                    ->redirect(PATH_ADDRESS.'?action=group');
                return;
        }

        $this
            ->view
            ->redirect($_SERVER['REQUEST_URI']);
            return;
    }

    public function delete($id)
    {
        if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'GET' && $id !== '')
        {
            if ($this
                ->group
                ->delete($id) >= 1)
            {
                $this
                    ->view
                    ->redirect(PATH_ADDRESS.'?action=group');
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
            ->group
            ->getAllGroups();

        $data = json_encode($data);

        file_put_contents("./assets/files/all_group_" . time() . ".json", $data);

        exportData('./assets/files/all_contacts_' . time() . '.json', 'json');

    }

    public function exportInXml()
    {
        $data = $this
            ->group
            ->getAllGroups();

        $xml = arrayToXml($data, $root_node = 'address_book', $child_node = 'contact_info');

        $all_contacts_xml = 'all_group_xml_' . time() . '.xml';
        $xml->save('./assets/files/' . $all_contacts_xml);
        exportData('./assets/files/' . $all_contacts_xml, 'xml');
    }
}
