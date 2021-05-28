<?php

use App\Controller\CatalogueController;

class Router
{
    function process(){
        $URI =  $_SERVER['REQUEST_URI'];
        $controller = "";
        $json = file_get_contents("routes.json");

        $parsed_json = json_decode($json,true);

        foreach($parsed_json as $v){
            if($URI == $v['path']){
                $controller = $v['controller'];
            }
        }

        if($controller == ""){
            echo "404";
        }

        if($controller == "CatalogueController@view"){
            $catController = new CatalogueController();
            $catController ->view();
        }elseif($controller == "HomeController@home"){
            $homController = new \App\Controller\HomeController();
            $homController ->home();
        }
    }
}