<?php

namespace Core;

class View 
{ 
    public function redirect($value='')
    {
        if ($value != null)
        {
            header('Location: ' . $value);   
        }
    }
    
    public function render($template , $data ) 
    {
        if (!is_null($data)) 
        {
            extract( $data );
        }       

        
        $file = PATH_VIEWS . $template . '.php';
        if (file_exists($file))
        {
            include_once $file;
        } 
    }

}