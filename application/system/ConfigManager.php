<?php 

namespace App\system;

class ConfigManager{
     
    /**
     * Este metodo tem como objetivo recuperar as configurações do arquivo application.php
     * @return object com as configurações da aplicacão
     */
    public static function GetApplicationConfig(){
         $object = new \stdClass();
         $configApp = require("../application/config/application.php");
         foreach($configApp as $key=>$value){
             $object->$key = $value;
         }
         return $object;
     }

     /**
      * Este metodo tem como objetivo Obter as configurações de banco de dados que será passada ao Facade Illuminata/Database 
      * @param string $driver deve ser passado o nome do driver a ser utilizado (mysql,pgsql,sqlvr) 
      * @return array Retorna um array com as configurações de banco criadas n
      */

     public static function GetDatabaseConfig($driver){
        $configDB = require("../application/config/database.php");
        return $configDB[$driver];
     }

    public static function CheckDisabledModule($name){
        $configModules = require("../application/config/modules.php");
        $disabledModules = $configModules['disabled'];
        if(in_array($name,$disabledModules))
            return true;
        else
            return false;
        
    }
}

