<?php 

namespace App\system;

use App\system\ConfigManager as Config;
use Optimus\Onion\Onion;
use \Closure;

class RouterManager{
    /**
     * Processa a requisição para efetuar o direcionamento a um controller
     */
    private static $routeMatch = false;
    
    /**
     * Metodo chamado pela classe de boot para efetuar o processamento da URI solicitada
     */
    public static function ProcessRouter(){
        $path = "";
        //se for vazio sempre ira redirecionar para rota default
        if(sizeof($_GET) == 0){
           $path = "/";
           $coreRoutes = require('../application/core/routes/routes.php');
           self::ExecController($coreRoutes[$path],[],false);
        }else{
            //SE NAO FOR VAZIO IRA VERIFICA SE E UM MODULO OU UMA ROTA NORMAL DO CORE
            $isModule = self::CheckIsModule($_GET);
            if(!$isModule){
               self::ProcessRouterRequest(false);
            }else{
                if(self::CheckAccessModule($_GET)){
                    //se for verdadeiro o modulo esta desabilitado
                    throw new \Exception("Este modulo não pode ser acessado no momento.");
                }else{
                    //se for em um modulo
                    self::ProcessRouterRequest(true);
                }
            }
        }
    }

    /** 
     * Verifica se o modulo a ser acessado está habilitado(pode ser acessado)
    */

    private static function CheckAccessModule($path){
        $module = explode("/",$path['uri'])[0];      
        if(Config::CheckDisabledModule($module))
            return true;
        else    
            return false;
    }

    
    /**
     * Metodo Chamado pelo processeRouter afim de efeutar o processamento da rota internament e instanciar o controller correto com suas devidas dependencias 
     * @param $isModule Verifica se a chamada efetuada contem o nome de um modulo 
     * @return void 
     */
    private static function ProcessRouterRequest($isModule){
         //no modulo padrao
                //verifica se a rota existe no array
                $routes = "";
                $path = explode('/',$_GET['uri']);
                $routeMatch = false;
                if(!$isModule){
                    $routes = require('../application/core/routes/routes.php');
                }
                else{
                    $routes = require('../application/modules/'.$path[0].'/routes/routes.php');
                }

                foreach($routes as $route => $config){
                    
                    
                    //OBTEM PARAMETROS DE DEFINICAO DA ROTA;
                    preg_match_all("/{(.*?)}/",$route,$match);

                    if(sizeof($match[0]) === 0){
                       /** 
                        * Se na definicao da rota nao precisar de parametro verificar se a url e igual
                        */
                        if($route === $_GET['uri']){
                            unset($_GET['uri']);
                            $routeMatch = true;
                            /** Verifica se o tipo da requisição feita e igual ao do tipo setado na configuração */
                            if($_SERVER['REQUEST_METHOD'] == $config['request_type']){
                                
                                self::ExecController($config,[],$isModule);
                                
                                break;
                            }else{
                                throw new \Exception("O metodo de acesso solicitado não e permitido.");
                            }
                        }
                    }else{
                        /** Obtem o indice dos parametros na definicao */
                        $indexParams = [];
                        $routeDef = explode("/",$route);
                        foreach($routeDef as $key => $value){
                            for($i = 0;$i<sizeof($match[0]);$i++){
                                if($value == $match[0][$i])
                                    $indexParams[] = $key;
                            }
                        }

                        /** Variaveis para Analise da rota */
                        $params = [];
                        $refRouter = explode("/",$route);
                        
                        
                      /** Coleta os parametros da rota e os substitui no array de referencia da rota */
                        foreach($path as $key => $segment){
                            foreach($indexParams as $pkey){
                                if($key == $pkey){
                                   $params[] = $segment;
                                   $refRouter[$pkey] = $segment;
                                }
                            }
                        }
                        
                        /** Rota formada do processamento das urls de referencia e da url do sistema */
                        $refRouterString = implode("/",$refRouter);
                        
                         
                        /** Compara se a url processada e igual a url do browser */
                        if($refRouterString === $_GET['uri']){
                            unset($_GET['uri']);
                            $routeMatch = true;
                            /** Verifica se o tipo da requisição feita e igual ao do tipo setado na configuração */
                            if($_SERVER['REQUEST_METHOD'] == $config['request_type']){
                                self::ExecController($config,self::ProcessParams($match[1],$params),$isModule);
                                break;
                            }else{
                                throw new \Exception("O metodo de acesso solicitado não e permitido.");
                            }
                        }

                    }
                                     
                }
                
                if($routeMatch === false)
                    throw new \Exception("Rota não encontrada.");
                
    }

    /** Processa os parametros vinculando nome com o valor
     * @param $refParams parametros coletado da referencia 
     * @param $params parametros coletado pela url
     * @return array lista de parametros
    */
    private static function ProcessParams($refParams,$params){
        $arrayParams = [];
        for($i=0;$i<count($refParams);$i++){
            $arrayParams[$refParams[$i]] = $params[$i];
        }
        return $arrayParams;
    }
  
    /** Verificar se a rota esta dentro de um modulo ou dentro do core 
     * @param $routePath parametros que recebe a rota do browser
     * @return boolean Se a url informada tiver um modulo returna true se nao false
    */
    private static function CheckIsModule($routePath){
        $path = explode("/",$routePath['uri']);
        if(is_dir("../application/modules/".$path[0])){
            return true;
        }else{
            return false;
        }
    }

    /** Executa o controller solicitado 
     * @param array $config parametro recebe os dados da rota
     * @param array $params parametro que recebe os dados coletados na url
     * @param boolean $isModule parametro que recebe se a execução aponta para um modulo ou para o padrão(Core)
    */
    private static function ExecController($config,$params,$isModule){
           
        /** Namespaces do controller encontrado */
           $ns = "";
           if(!$isModule){
              $ns = "App\\".$config['module']."\\".'controllers\\'.$config['controller'];
           }else{
              $ns = "App\\modules\\".$config['module']."\\".'controllers\\'.$config['controller'];
           }

           /** Criação das instancias dos middlewares da rota */
           $middlewareList = self::GenerateMiddlewaresLayers($config['middlewares']);
           
           /** Implementação sistema de middleware */
           $onion = new Onion();
           $object = new \stdClass();
           $onion->layer($middlewareList)->peel($object,function($object) use($ns,$config,$params){
                    
            
            $reflectionClass = new \ReflectionClass($ns);
            $instance = $reflectionClass->newInstance();
            $action = $config['action'];
            
            if(!method_exists($instance,$action)){
                throw new \Exception("Action não encontrada no controller.");
            }else{
                $instance->$action($params);
            }

            return $object;
           });
        /** Implementação sistema de middleware */
    }

    /**
     * Este metodo gera o array com as instancias do middlewares encontrados setado na rota encontrada
     * @param $middlewareList lista com nomes dos middlewares
     * @return Array Retorna um array com as instancias dos middlewares
     */
    private static function GenerateMiddlewaresLayers($middlewareList){
        $layers = [];
        foreach($middlewareList as $middleware){
           $ns = "App\\middlewares\\".$middleware;
           $RefClass = new \ReflectionClass($ns);
           $layers[] = $RefClass->newInstance();
        }
        return $layers;
    }

    
 
}