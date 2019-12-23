<?php 
//Lista de rotas padrao
return [
    "/"=>array(
        "module"=>"core",
        "controller"=>"HomeController",
        "action" =>"index",
        "request_type"=>"GET"
    ),
    "produtos"=>array(
        "module"=>"core",
        "controller"=>"ProdutosController",
        "action"=>"home",
        "request_type"=>"GET"
    ),
    "teste"=>array(
        "module"=>"core",
        "controller"=>"ProdutosController",
        "action"=>"teste",
        "request_type"=>"GET"
    ),
    "produtos/{id}"=>array(
        "module"=>"core",
        "controller"=>"ProdutosController",
        "action"=>"Individual",
        "request_type"=>"GET"
    ),
    "produtos/{id}/teste/{nome}"=>array(
      "module"=>"core",
      "controller"=>"ProdutosController",
      "action"=>"index",
      "request_type"=>"POST"
    ),

    "produtos/details/{id}"=>array(
        "module"=>"core",
        "controller"=>"ProdutosController",
        "action"=>"details",
        "request_type"=>"GET"
    ),


];