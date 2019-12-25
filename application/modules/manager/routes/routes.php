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
    ),
    "manager/controllers"=>array(
        "module"=>"manager",
        "controller"=>"ManagerControllers",
        "action" =>"index",
        "request_type"=>"GET"
    ),
    "manager/controllers/create"=>array(
        "module"=>"manager",
        "controller"=>"ManagerControllers",
        "action" =>"CreateController",
        "request_type"=>"POST"
    ),
    "manager/controllers/delete"=>array(
        "module"=>"manager",
        "controller"=>"ManagerControllers",
        "action" =>"DeleteController",
        "request_type"=>"GET"
    ),
    "manager/controllers/filter/{module}"=>array(
        "module"=>"manager",
        "controller"=>"ManagerControllers",
        "action" =>"FilterListControllers",
        "request_type"=>"GET"
    ),
];