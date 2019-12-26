# Framework-php
O projeto pode ser utilizado como base para uma noção de como deve ser estruturado um framework em php, mas sempre deve-se levar em consideração utilizar Frameworks de ampla utilização como Laravel, Synfony entre outros afim de de maior agilidade no processo mas se necessario o desenvolvimento de estrutura personalizada, este projeto pode ser utilizado ou servir como base de inspiração.

***

#### Estrutura Projeto
- Application - Contem toda aplicação 
- Resource - Pasta para compilação de frameworks frontend (React ou Vue)
- Public - Pasta publica onde o browser tera acesso a aplicação

***

#### Estrutura Pasta Application

- cache - Armazena toda a compilação do template engine
- config - Contem todos os arquivos de configuração
- middlewares - Contem todos os middlewares do sistema
- core - modulo principal do sistema 
- modules - Armazena novos modulos criados para a aplicação
- system - Armazena todas as Classes de logica do sistema

***

#### Estrutura de modulos
Todo modulo do sistema seja o Core(principal) ou criados pelo usuario na pasta modules Devem ter a seguinte estrutura:
 - Controllers - Contem todos os controllers do sistema
 - Models - Contem todos os models do sistema
 - Routes - Contem o arquivo de rotas do modulo
 - View - Contem todas as views do modulo
 
 ***
 #### Estrutura da Pasta Resource
 A pasta resource e responsavel por conter os componentes de frontend que serão compilados via Webpack para serem utilizados  pelo projeto.
**A estrutura e formada por:**
  - components - Contem todos os componentes em geral que não sejam referente a uma View
  - routes - Contem arquivos de configuração refente a rotas SPA do vue-router(não implementado por padrão)
  - store - Contem arquivos relacionados a configuração do vuex(Gerenciador de estados do vue)
  - View - Contem componentes vue referente as telas do sistema.
  - App.js Ponto de entrada do Vue(Onde todos os arquivos devem ser importados)
  
 
 ***
 
 ## Definição de Rotas
 Todos os modulos tem um arquivo Route.php que contem uma estrutura semelhante a seguir:
 
 ```php
   <?php 
   
      return [
          "/"=>array(
              "module"=>"core",
              "controller"=>"HomeController",
              "action" =>"index",
              "request_type"=>"GET",
              "middlewares"=>[]
          ),
          "produtos"=>array(
              "module"=>"core",
              "controller"=>"ProdutosController",
              "action"=>"home",
              "request_type"=>"GET",
              "middlewares"=>[]
          ),
          "teste"=>array(
              "module"=>"core",
              "controller"=>"ProdutosController",
              "action"=>"teste",
              "request_type"=>"GET",
              "middlewares"=>[]
          ),
        ] 
 ```
 Para definição das rotas dos modulos e utilzado um array associativo que é analisado pelo **RouteManager** para definir qual controller deve atender a requisição os parametros que deve ser informado são:
 
 ```php
    
    <?php 
       return [ 
            "nomedarota"=>array(
               "module"=>"Nome do modulo",
               "controller"=>"Nome do controller",
               "action"=>"Nome da action",
               "request_type"=>"Tipo de requisição(POST,GET,PUT,DELETE,PATCH)",
               "middlewares"=>["Nome_da_classe","Nome_da_class"] Obs: Caso nao va usar middlewares na rota deixa vazio o    array 
            )
       ]
   
 ```
 ***
 
 #### Parametros nas rotas
 
 Qualquer parametro a ser passado para a rota deve ser colocado entre chaves, segue abaixo exemplo:
 
  ```php
    
    <?php 
       return [ 
            "nomedarota/{nome_parametro}/..."=>array(
               "module"=>"Nome do modulo",
               "controller"=>"Nome do controller",
               "action"=>"Nome da action",
               "request_type"=>"Tipo de requisição(POST,GET,PUT,DELETE,PATCH)"
            )
       ]
   
 ```

 
 ***
 
 #### Arquivos da pasta system
 Este pasta contem todas as classes que fazem o sistema funcionar os arquivos são:
 
 - **Boot.php** - Singleton responsavel por iniciar o processamento de requisições.
 - **ConfigManager** - Class Responsavel por Gerenciar os arquivos de configuração da pasta config
 - **Controller** - Controller padrão do sistema contem todas as funcionalidades necessaria para o controller do sistema
 - **db** Class Gerenciadora do Illuminate/Database para acesso ao banco de dados
 - **RouterManager** - Class Para processamento das requisições enviadas pelo browser e direcionando para o controller correto
 - **TemplateEngine** - Class Para processamento de template do sistema.
 
 ***
 
 #### Tecnologias e bibliotecas
 
 **Linguagens Backend:**
 PHP 7.3
 
 **Design Patterns:**
 Singleton
 Facade
 
 **Frontend:**
 VueJs 2.6 + Webpack + Babel
 
**PHP Template Engine:**
Blade template by Laravel 1.6.1

**Query Builder**
Illuminate/Database by Laravel 5.8.0
 
*** 
 ## Executando o Projeto
  - O projeto deve ser clonado deste repositorio para dentro de um servidor com nginx ou apache com php 7.3 
 - O ambiente em questão deve conter os seguintes gerenciados de dependencias e recursos:
    - node 12.x ou superior
    - composer 1.7 ou superior
    - Yarn ou npm na ultima versão
 - executade o comando **composer install** para instalar as dependencias do projeto
 - para o frontend execute o comando **npm install** ou **yarn install**(opcional)
 - No navegador acesse a pasta public
 
 ## Executando Frontend
 - no prompt de comando execute o comando **npm run build** para o sistema começar a compilar os componentes do frontend
 ***
 
 ## Framework PHP Manager
 o framework possui um modulo embarcado para construção das estruturas basicas do sistema as estruturas que pode ser construidas pelo Manager são:
 - Modulos
 - Controllers
 - Models
 - Middlewares
 
  Gerando apartir do manager o mesmo já irá gerar os arquivos no formato a ser utilizado na arquitetura do sistema.

***
 ## Recursos Já desenvolvidos
 - Estrutura basica 
 - RouteManager 
 - TemplateEngine (Utilizando Blade 1.6, sistema de templates do laravel)
 - Estrutura para utilização de Vuejs + Webpack
 - QueryBuilder(Utilizando Illuminate/Database 5.8.0 componente usado no laravel)
 - SQL Injection Protection (Recurso já implementado no Illuminate/Database 5.8.0)
 - Interface Web para criação de controllers
 - Middleware(Utilizando a biblioteca onion adaptada ao projeto)
 
 ## Recursos Em desenvolvimento
 - Gerenciador de Sessão
 - CSRF Protection
 - Otimização do sistema rota para contemplar parametros opcionais
 - Helpers para apoio de desenvolvimento
 - Sistema de Bibliotecas Personalizadas
 ***

## Documentações do projeto
 
- **TemplateEngine Blade:** https://laravel.com/docs/5.8/blade 
- **Query Builder:** https://laravel.com/docs/5.8/queries
- **Onion Before/After Middleware** https://github.com/esbenp/onion
 
 
 
