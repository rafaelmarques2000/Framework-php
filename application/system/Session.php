<?php 

namespace App\system;

class Session{

    public static function InitSession(){
         if(session_status() != PHP_SESSION_ACTIVE){
             session_start();
         }
     }

     public static function SetData(Array $data){
        if(!is_array($data)){
           throw new \Exception("O parametro informado não e um array");
        }else{
            foreach($data as $key=>$value){
                $_SESSION[$key] = $value;
            }
        }
     }

     public static function GetData($key){
        if(!isset($_SESSION[$key])){
            return null;
        }else{
            return $_SESSION[$key];
        }
     }


     public static function FlushData(){
         if(session_status() == PHP_SESSION_ACTIVE){
             unset($_SESSION);
             session_destroy();
         }
     }

}