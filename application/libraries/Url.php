<?php 

namespace App\libraries;

class Url{

    public function GetModuleName(){
        if(!isset($_GET['uri'])){
           return null;
        }else{
            
            $uri = explode("/",$_GET['uri']);
            if(!file_exists("../application/modules/".$uri[0]))
                return null;
            else 
                return $uri[0];
        } 
    }

    public function GetSegment(int $index){
        
        if(!isset($_GET['uri'])){
            return null;
        }else{
            $uri = explode("/",$_GET['uri']);
            return $uri[$index];
        }
    }

}