<?php 

namespace App\system;

use App\system\TemplateEngine;

class Controller{
    
    /**
     * Este metodo Permite utilizar o blade templates apartir de uma instancia de controller herdando esta classe
     * @param $page view a ser carregado de dentro do modulo
     * @param $module Modulo onde a view se encontra se não for informado sera null
     * @param $params Parametros que podem ser fornecido para o contexto da view
     * @return void não ha retorno o sistema irá renderizar a view apartir da class TemplateEngine
     */
    public function View($page,$module = null,$params){
       try{
            $template = new TemplateEngine($module);
            $template->Render($page,$params);
       }catch(\Exception $e){
           throw new \Exception("View solicitada não encontrada");
       }
    }
    

}