<?php 

namespace App\system;

use App\system\RouterManager;
use App\system\ConfigManager;
use App\system\db as DatabaseManager;
use App\system\Session;

/** Objeto principal do framework Singleton */
class Boot {
    
    private static $instance = null;

    private function __construct(){

    }
    public static function getInstance(){
         if(self::$instance == null){
            self::$instance = new Boot();
         } 
         return self::$instance;
    }

    /** Inicia a instancia e atende as requisicoes do projeto */
    public static function start(){
       try{
        Session::InitSession();
        Self::RegisterDatabaseManager();
        RouterManager::ProcessRouter();
        
       }catch(\Exception $e){
           echo $e->getMessage();
       }
    }

    /** Registra o Manager de banco de dados */
    private static function RegisterDatabaseManager(){
        $db = new db;
        $app = ConfigManager::GetApplicationConfig();
        $db->addConnection(ConfigManager::GetDatabaseConfig($app->default_connection));
        $db->setAsGlobal();
    }

}