<?php 

namespace App\modules\manager\controllers;

use App\system\Controller;

class MiddlewaresController extends Controller{

      public function index(){
         $middlewares = $this->ListMiddlewares();
         $this->View("middlewares",'manager',["middlewares"=>$middlewares]);
      }

      public function ListMiddlewares(){
        $dirList = dir("../application/middlewares");
        $arrayDirList = [];
        while (false !== ($entry = $dirList->read())) {
            if($entry == '.' || $entry == '..')
                continue;
            else
                $arrayDirList[] = explode(".",$entry)[0];
        }
        $dirList->close();
        return $arrayDirList;
      }

      public function CreateMiddleware(){
        
         try{

           $data = $_POST;
           $dir = "../application/middlewares/".$data['name_middleware'].".php";

           if(file_exists($dir)){
                $this->View("msg","manager",[
                    "info"=>"O middleware já foi criado.",
                    "link"=>"/Framework-php/public/manager/middlewares"
                ]);
           }else{

$template = '<?php 

namespace App\middlewares;

use Optimus\Onion\LayerInterface;

use \Closure;

class {class} implements LayerInterface{

    public function peel($object, Closure $next){
        
        return $next($object);

    }

}
                ';
                $tplRender = strtr($template,array("{class}"=>$data['name_middleware']));

                $middlewareFile = fopen($dir,"w+");
                
                fwrite($middlewareFile,$tplRender);

                fclose($middlewareFile);


                chmod($dir,0777);

                $this->View("msg","manager",[
                    "info"=>"Middleware criado com sucesso.",
                    "link"=>"/Framework-php/public/manager/middlewares"
                ]);
                

           }

         }catch(\Exception $e){

            $this->View("msg","manager",[
                "info"=>"Falha ao criar middleware, tente novamente.",
                "link"=>"/Framework-php/public/manager/middlewares"
            ]);

         }
          
      }

      public function DeleteMiddleware(){
          try{
            
            unlink("../application/middlewares/".$_GET['middleware'].".php");
           
            $this->View("msg","manager",[
                "info"=>"Middleware deletado com sucesso.",
                "link"=>"/Framework-php/public/manager/middlewares"
            ]);

          }catch(\Exception $e){
            $this->View("msg","manager",[
                "info"=>"Falha ao deletar middleware, tente novamente.",
                "link"=>"/Framework-php/public/manager/middlewares"
            ]);
          }
      }
}