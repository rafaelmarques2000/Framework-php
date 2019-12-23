<?php 

namespace App\modules\administracao\controllers;

class ClientesController{
    public function index(){
        echo "teste modulo administracao";
    }

    public function details($params){
        var_dump($params);
        echo "Rota com id do cliente";
    }
}