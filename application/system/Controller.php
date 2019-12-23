<?php 

namespace App\system;

use App\system\TemplateEngine;

class Controller{
    
    public function View($page,$module = null,$params){
       try{
            $template = new TemplateEngine($module);
            $template->Render($page,$params);
       }catch(\Exception $e){
           throw new \Exception("View solicitada não encontrada");
       }
    }
    

}