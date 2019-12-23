<?php 
//Lista de rotas padrao
return [

    "administracao/clientes"=>array(
        "module"=>"administracao",
        "controller"=>"ClientesController",
        "action" =>"index"
    ),
    "administracao/cliente/{id}"=>array(
        "module"=>"administracao",
        "controller"=>"ClientesController",
        "action" =>"details"
    )
];