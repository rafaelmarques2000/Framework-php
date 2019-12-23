<?php 

namespace App\system;

use Jenssegers\Blade\Blade;
use App\system\ConfigManager;


class TemplateEngine{
      
      private $blade = null;
      private $appConfig = null;

      public function __construct($module){
          $this->appConfig = ConfigManager::GetApplicationConfig();
          if($module === null || $module === "")
            $this->blade = new Blade($this->appConfig->view_default,$this->appConfig->cache_view);
          else
            $this->blade = new Blade(str_replace("{name_module}",$module,$this->appConfig->view_modules),$this->appConfig->cache_view); 
      } 

      public function Render($page,$params){
         echo $this->blade->render($page,$params);
      }
}