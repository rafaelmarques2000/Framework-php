<?php 

namespace App\system;

class ConfigManager{
     public static function GetApplicationConfig(){
         $object = new \stdClass();
         $configApp = require("../application/config/application.php");
         foreach($configApp as $key=>$value){
             $object->$key = $value;
         }
         return $object;
     }
}

