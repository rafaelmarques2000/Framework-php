<?php 
//Lista de rotas padrao
return [
    "manager"=>array(
        "module"=>"manager",
        "controller"=>"IndexController",
        "action" =>"index",
        "request_type"=>"GET"
    ),
    "manager/modules"=>array(
        "module"=>"manager",
        "controller"=>"ModulesController",
        "action" =>"index",
        "request_type"=>"GET"
    ),
    "manager/modules/create"=>array(
        "module"=>"manager",
        "controller"=>"ModulesController",
        "action" =>"CreateModule",
        "request_type"=>"POST"
    ),
    "manager/modules/delete"=>array(
        "module"=>"manager",
        "controller"=>"ModulesController",
        "action" =>"DeleteModule",
        "request_type"=>"GET"
    )
];