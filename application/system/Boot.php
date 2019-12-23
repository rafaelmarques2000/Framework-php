<?php 

namespace App\system;

use App\system\RouterManager;

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
         RouterManager::ProcessRouter();
       }catch(\Exception $e){
           echo $e->getMessage();
       }
    }
}