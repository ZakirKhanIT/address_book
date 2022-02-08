<?php

namespace Core;

class Application
{
    private $routes = [];
    
    public function addRoute($path, $controller, $action)
    {
        $this->routes[] = [$path, $controller, $action];
    }
    
    public function run()
    {
        parse_str($_SERVER['QUERY_STRING'], $output);
        $id = $output['id']?? '' ;
        $methodAction = $output['action']??'';

        foreach ($this->routes as $route) {
            list($path, $controller, $action) = $route;     
 
            if($methodAction == $path || $methodAction == '' ){
                break;
                }
 
        }

        if(is_callable($controller, $action))
        {
  
            $controller = new $controller();
            call_user_func_array([$controller, $action],[ $id ] ); 
        } 
        else 
        {
            include_once PATH_VIEWS . 'errors/error_page_not_found.php';
        }
    }
}