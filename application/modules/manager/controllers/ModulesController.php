<?php 

namespace App\modules\manager\controllers;

use App\system\Controller;

class ModulesController extends Controller{

      public function index(){
         $dirList = $this->GetModules();
         $this->View("modules",'manager',["directorys"=>$dirList]);
      }


      private function GetModules(){
          $dirList = dir("../application/modules");
          $arrayDirList = [];
          while (false !== ($entry = $dirList->read())) {
             if($entry == '.' || $entry == '..')
                continue;
             else
                $arrayDirList[] = $entry;
          }
         $dirList->close();
         return $arrayDirList;
      }

      public function CreateModule(){
        $data = $_POST;

        if(count($data) == 0){
            $this->View("msg","manager",[
                "info"=>"Nenhum nome foi informado para o modulo",
                "link"=>"/Framework-php/public/manager/modules"
            ]);
        }else{
             
            $dir_exists = is_dir("../application/modules/".$data['nome_modulo']);
            if(!$dir_exists === true){
                
                /** Cria a pasta do modulo com suas estruturas */
                if(mkdir("../application/modules/".$data['nome_modulo'])){
                    mkdir("../application/modules/".$data['nome_modulo']."/controllers");
                    mkdir("../application/modules/".$data['nome_modulo']."/models");
                    mkdir("../application/modules/".$data['nome_modulo']."/routes");
                    mkdir("../application/modules/".$data['nome_modulo']."/views");
                }

                /** Da permissão a pasta do modulo */
                chmod("../application/modules/".$data['nome_modulo'],0777);

                /** Criar o arquivo de rotas do modulo */
                $routeFile = fopen("../application/modules/".$data['nome_modulo']."/routes/routes.php","w+");

        fwrite($routeFile,trim(preg_replace('/\t+/','',"
        <?php 
        return [
            \"/\"=>array(
                \"module\"=>\"\",
                \"controller\"=>\"\",
                \"action\" =>\"\",
                \"request_type\"=>\"\"
            )
        ];
                ")));

                fclose($routeFile);

                /** Da permissão ao arquivo de routes */
                chmod("../application/modules/".$data['nome_modulo']."/routes/routes.php",0777);

                $this->View("msg","manager",[
                    "info"=>"Modulo criado com sucesso.",
                    "link"=>"/Framework-php/public/manager/modules"
                ]);


            }else{
                $this->View("msg","manager",[
                    "info"=>"O modulo já foi criado.",
                    "link"=>"/Framework-php/public/manager/modules"
                ]);
            }
            

        }
      }

      public function DeleteModule(){
          try{
              rmdir("../application/modules/".$_GET['module']);
              $this->View("msg","manager",[
                "info"=>"Modulo deletado com sucesso.",
                "link"=>"/Framework-php/public/manager/modules"
             ]);
              
          }catch(\Exception $e){
            $this->View("msg","manager",[
                "info"=>"Falha ao deletar modulo, tente novamente.",
                "link"=>"/Framework-php/public/manager/modules"
            ]);
          }
      }
}