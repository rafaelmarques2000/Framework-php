<?php

namespace App\modules\manager\controllers;

use App\system\Controller;

class ManagerControllers extends Controller{

      public function index(){
         $dirList = $this->GetModules();
         $controllersList = $this->ListControllers();
         $this->View("controllers",'manager',["directorys"=>$dirList,"controllers"=>$controllersList]);
      }


      private function GetModules(){
          $dirList = dir("../application/modules");
          $arrayDirList = [];
          while (false !== ($entry = $dirList->read())) {
             if($entry == '.' || $entry == '..' || $entry == "manager")
                continue;
             else
                $arrayDirList[] = $entry;
          }
         $dirList->close();
         return $arrayDirList;
      }

      private function ListControllers(){
        $dirList = dir("../application/modules");
        $arrayControllers = [];
        while (false !== ($entry = $dirList->read())) {
           if($entry == '.' || $entry == '..' || $entry == "manager"){
              continue;
           }else{
              $module = $entry;
              $ControllersDir = dir("../application/modules/".$module."/controllers");
              while(false !==($controller = $ControllersDir->read())){
                if($controller == '.' || $controller == '..'){
                    continue;
                }else{
                    $object = new \stdClass();
                    $object->module = $module;
                    $object->controller = explode(".",$controller)[0];
                    $arrayControllers[] = $object;
                }
              }
              $ControllersDir->close();
           }
        }
       $dirList->close();
       return $arrayControllers;
      }

      public function CreateController(){
          $data = $_POST;
          $dir = "../application/modules/".$data['module_list']."/controllers/".$data['name_controller']."Controller.php";
         try{

          if(file_exists($dir)){

            $this->View("msg","manager",[
                "info"=>"O controller já foi criado.",
                "link"=>"/Framework-php/public/manager/controllers"
            ]);


          }else{

            $controllerFile = fopen($dir,'w+');

            $template = "<?php
    {namespace};

    use App\system\Controller;

    class {controller} extends Controller{
        public function index(){

        }
    }
                     ";
        $tplRender = strtr($template,
        array(
            "{namespace}"=>"namespace App\\modules\\".$data['module_list']."\\controllers",
            "{controller}" =>$data['name_controller']."Controller"
        ));



        fwrite($controllerFile,$tplRender);

        fclose($controllerFile);
        
        chmod($dir,0777);

        $this->View("msg","manager",[
            "info"=>"Controller criado com sucesso.",
            "link"=>"/Framework-php/public/manager/controllers"
        ]);

      }
       
     
    }catch(\Exception $e){
            $this->View("msg","manager",[
                "info"=>"Falha ao cria controller, tente novamente.",
                "link"=>"/Framework-php/public/manager/controllers"
            ]);
        }
    }

    public function DeleteController(){
      try{
       $data =  $_GET;
       
       unlink("../application/modules/".$data['module']."/controllers/".$data['controller'].".php");

       $this->View("msg","manager",[
        "info"=>"Controller Deletado com sucesso.",
        "link"=>"/Framework-php/public/manager/controllers"
      ]);

      }catch(\Exception $e){
        $this->View("msg","manager",[
          "info"=>"Falha ao deletar controller, tente novamente.",
          "link"=>"/Framework-php/public/manager/controllers"
        ]);
      }
    }

    public function FilterListControllers($params){
     try{
          $module = dir("../application/modules/".$params['module']);
          $arrayControllers = [];
    
            
            $ControllersDir = dir("../application/modules/".$params['module']."/controllers");
            while(false !==($controller = $ControllersDir->read())){
              if($controller == '.' || $controller == '..'){
                  continue;
              }else{
                  $object = new \stdClass();
                  $object->module = $params['module'];
                  $object->controller = explode(".",$controller)[0];
                  $arrayControllers[] = $object;
              }
            }
            $ControllersDir->close();

            $dirList = $this->GetModules();
            $this->View("controllers",'manager',["directorys"=>$dirList,"controllers"=>$arrayControllers]);
          }catch(\Exception $e){
            $this->View("msg","manager",[
              "info"=>"Modulo não encontrado.",
              "link"=>"/Framework-php/public/manager/controllers"
            ]);
          }
          
    }


}