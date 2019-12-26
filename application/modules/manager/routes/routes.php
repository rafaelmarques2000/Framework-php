<?php 
//Lista de rotas padrao
return [
    "manager"=>array(
        "module"=>"manager",
        "controller"=>"IndexController",
        "action" =>"index",
        "request_type"=>"GET",
        "middlewares"=>[]
    ),
    "manager/modules"=>array(
        "module"=>"manager",
        "controller"=>"ModulesController",
        "action" =>"index",
        "request_type"=>"GET",
        "middlewares"=>[]
    ),
    "manager/modules/create"=>array(
        "module"=>"manager",
        "controller"=>"ModulesController",
        "action" =>"CreateModule",
        "request_type"=>"POST",
        "middlewares"=>[]
    ),
    "manager/modules/delete"=>array(
        "module"=>"manager",
        "controller"=>"ModulesController",
        "action" =>"DeleteModule",
        "request_type"=>"GET",
        "middlewares"=>[]
    ),
    "manager/controllers"=>array(
        "module"=>"manager",
        "controller"=>"ManagerControllers",
        "action" =>"index",
        "request_type"=>"GET",
        "middlewares"=>[]
    ),
    "manager/controllers/create"=>array(
        "module"=>"manager",
        "controller"=>"ManagerControllers",
        "action" =>"CreateController",
        "request_type"=>"POST",
        "middlewares"=>[]
    ),
    "manager/controllers/delete"=>array(
        "module"=>"manager",
        "controller"=>"ManagerControllers",
        "action" =>"DeleteController",
        "request_type"=>"GET",
        "middlewares"=>[]
    ),
    "manager/controllers/filter/{module}"=>array(
        "module"=>"manager",
        "controller"=>"ManagerControllers",
        "action" =>"FilterListControllers",
        "request_type"=>"GET",
        "middlewares"=>[]
    ),
    "manager/models"=>array(
        "module"=>"manager",
        "controller"=>"ModelsController",
        "action" =>"index",
        "request_type"=>"GET",
        "middlewares"=>[]
    ),
    "manager/models/create"=>array(
        "module"=>"manager",
        "controller"=>"ModelsController",
        "action" =>"CreateModel",
        "request_type"=>"POST",
        "middlewares"=>[]
    ),
    "manager/models/delete"=>array(
        "module"=>"manager",
        "controller"=>"ModelsController",
        "action" =>"DeleteModel",
        "request_type"=>"GET",
        "middlewares"=>[]
    ),
    "manager/middlewares"=>array(
        "module"=>"manager",
        "controller"=>"MiddlewaresController",
        "action" =>"index",
        "request_type"=>"GET",
        "middlewares"=>[]
    ),
    "manager/middlewares/create"=>array(
        "module"=>"manager",
        "controller"=>"MiddlewaresController",
        "action" =>"CreateMiddleware",
        "request_type"=>"POST",
        "middlewares"=>[]
    ),
    "manager/middlewares/delete"=>array(
        "module"=>"manager",
        "controller"=>"MiddlewaresController",
        "action" =>"DeleteMiddleware",
        "request_type"=>"GET",
        "middlewares"=>[]
    ),
];