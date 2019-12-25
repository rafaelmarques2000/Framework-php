<?php

namespace App\modules\manager\controllers;

use App\system\Controller;

class ModelsController extends Controller{

      public function index(){
         $dirList = $this->GetModules();
         $modelsList = $this->ListModels();
         $this->View("models",'manager',["directorys"=>$dirList,"models"=>$modelsList]);
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

      private function ListModels(){
        $dirList = dir("../application/modules");
        $arrayControllers = [];
        while (false !== ($entry = $dirList->read())) {
           if($entry == '.' || $entry == '..' || $entry == "manager"){
              continue;
           }else{
              $module = $entry;
              $ModelsDir = dir("../application/modules/".$module."/models");
              while(false !==($model = $ModelsDir->read())){
                if($model == '.' || $model == '..'){
                    continue;
                }else{
                    $object = new \stdClass();
                    $object->module = $module;
                    $object->model = explode(".",$model)[0];
                    $arrayControllers[] = $object;
                }
              }
              $ModelsDir->close();
           }
        }
       $dirList->close();
       return $arrayControllers;
      }

      public function CreateModel(){
          $data = $_POST;
          $dir = "../application/modules/".$data['module_list']."/models/".$data['name_model']."Model.php";
         try{

          if(file_exists($dir)){

            $this->View("msg","manager",[
                "info"=>"O model já foi criado.",
                "link"=>"/Framework-php/public/manager/models"
            ]);

          }else{

            $ModelFile = fopen($dir,'w+');

            $template = "<?php
    {namespace};

    use App\system\db as DB;

    class {model} {
        

    }
                     ";
        $tplRender = strtr($template,
        array(
            "{namespace}"=>"namespace App\\modules\\".$data['module_list']."\\models",
            "{model}" =>$data['name_model']."Model"
        ));



        fwrite($ModelFile,$tplRender);

        fclose($ModelFile);

        chmod($dir,0777);

        $this->View("msg","manager",[
            "info"=>"Model criado com sucesso.",
            "link"=>"/Framework-php/public/manager/models"
        ]);

      }
       
    }catch(\Exception $e){
        $this->View("msg","manager",[
            "info"=>"Falha ao cria model, tente novamente.",
            "link"=>"/Framework-php/public/manager/models"
        ]);
     }
    }

    public function DeleteModel(){
      try{
       $data =  $_GET;
       
       unlink("../application/modules/".$data['module']."/models/".$data['model'].".php");

       $this->View("msg","manager",[
        "info"=>"Model Deletado com sucesso.",
        "link"=>"/Framework-php/public/manager/models"
      ]);

      }catch(\Exception $e){
        $this->View("msg","manager",[
          "info"=>"Falha ao deletar model, tente novamente.",
          "link"=>"/Framework-php/public/manager/models."
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
              "link"=>"/Framework-php/public/manager/models"
            ]);
          }
          
    }


}