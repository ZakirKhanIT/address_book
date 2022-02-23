<?php
namespace Controller;

use Core\View;
use Model\City;

class CityController
{
    private $view;
    private $city;
    private $data = [];

    public function __construct()
    {
        $this->view = new View();
        $this->city = new City();
        $this->data['pageName'] = 'Citys';
    }

    public function index()
    {
        $this->data['cities'] = $this
            ->city
            ->getAllCity(); 

        $this
            ->view
            ->render('city/index',  $this->data );
    }

    public function add()
    { 
        if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'GET')
        {
            $this
                ->view
                ->render('city/add', $this->data);
            return;
        }

        if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST')
        { 
            $data= getPostData($_POST);

            $id = $this
                ->city
                ->add($data);
                $this
                    ->view
                    ->redirect(PATH_ADDRESS.'?action=city');
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
            $this->data['citys'] = $this
                ->city
                ->getCitiesById($id);   
 
            $this
                ->view
                ->render('city/edit',  $this->data);
            return;
        }

        if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST')
        {
            $data=getPostData($_POST);
            $updated = $this
                ->city
                ->update($data);
                $this
                    ->view
                    ->redirect(PATH_ADDRESS.'?action=city');
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
                ->city
                ->delete($id) >= 1)
            {
                $this
                    ->view
                    ->redirect(PATH_ADDRESS.'?action=city');
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
            ->city
            ->getAllCity();

        $data = json_encode($data);

        file_put_contents("./assets/files/all_city_" . time() . ".json", $data);

        exportData('./assets/files/all_city_' . time() . '.json', 'json');

    }

    public function exportInXml()
    {
        $data = $this
            ->city
            ->getAllCity();

        $xml = arrayToXml($data, $root_node = 'address_book', $child_node = 'contact_info');

        $all_city_xml = 'all_city_xml_' . time() . '.xml';
        $xml->save('./assets/files/' . $all_city_xml);
        exportData('./assets/files/' . $all_city_xml, 'xml');
    }
}
