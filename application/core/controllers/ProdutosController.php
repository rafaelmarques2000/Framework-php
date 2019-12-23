<?php 

namespace App\core\controllers;

use App\system\Controller;

class ProdutosController extends Controller{
    public function index($params){
        echo "produtos controller";
        
    }

    public function home($params){
        echo "Seria a home do produto";
    }

    public function details($params){
        
        echo "Detalhes do produto";
    }

    public function Individual(){
        echo "produto com um id";
    }

    public function Teste($params){
        $this->View("teste","administracao",['teste'=>"Rafael"]);
    }

}