<?php
namespace Controller;

use Core\View;
use Model\Tag;

class TagController
{
    private $view;
    private $tag;
    private $data = [];

    public function __construct()
    {
        $this->view = new View();
        $this->tag = new Tag();
        $this->data['pageName'] = 'Tags';
    }

    public function index()
    {
        $this->data['tags'] = $this
            ->tag
            ->getAllTags(); 

        $this
            ->view
            ->render('tag/index',  $this->data );
    }

    public function add()
    { 
        if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'GET')
        {
            $this
                ->view
                ->render('tag/add', $this->data);
            return;
        }

        if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST')
        { 
            $data= getPostData($_POST);

            $id = $this
                ->tag
                ->add($data);
                $this
                    ->view
                    ->redirect(PATH_ADDRESS.'?action=tag');
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
            $this->data['tags'] = $this
                ->tag
                ->getTagsById($id);   
 
            $this
                ->view
                ->render('tag/edit',  $this->data);
            return;
        }

        if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST')
        {
            $data=getPostData($_POST);
            $updated = $this
                ->tag
                ->update($data);
                $this
                    ->view
                    ->redirect(PATH_ADDRESS.'?action=tag');
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
                ->tag
                ->delete($id) >= 1)
            {
                $this
                    ->view
                    ->redirect(PATH_ADDRESS.'?action=tag');
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
            ->tag
            ->getAllTags();

        $data = json_encode($data);

        file_put_contents("./assets/files/all_tags_" . time() . ".json", $data);

        exportData('./assets/files/all_tags_' . time() . '.json', 'json');

    }

    public function exportInXml()
    {
        $data = $this
            ->tag
            ->getAllTags();

        $xml = arrayToXml($data, $root_node = 'address_book', $child_node = 'contact_info');

        $all_tags_xml = 'all_tags_xml_' . time() . '.xml';
        $xml->save('./assets/files/' . $all_tags_xml);
        exportData('./assets/files/' . $all_tags_xml, 'xml');
    }
}
