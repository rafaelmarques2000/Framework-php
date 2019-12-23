# Framework-php
Projeto que visa a criação de um framework em php, qual utilizarei em meus projetos pessoais e para estudo de engenharia de software.
O projeto pode ser utilizado como base para uma noção de como deve ser estruturado um framework em php, mas sempre deve-se levar em consideração utilizar Frameworks de ampla utilização como Laravel, Synfony entre outros afim de de maior agilidade no processo mas se necessario 


#### Estrutura Projeto
- Application - Contem toda aplicação 
- Frontend - Pasta para compilação de frameworks frontend (React ou Vue)
- Public - Pasta publica onde o browser tera acesso a aplicação

#### Estrutura Pasta Application

- cache - Armazena toda a compilação do template engine
- config - Contem todos os arquivos de configuração
- core - modulo principal do sistema 
- modules - Armazena novos modulos criados para a aplicação
- system - Armazena todas as Classes de logica do sistema

#### Estrutura de modulos
Todo modulo do sistema seja o Core(principal) ou criados pelo usuario na pasta modules Devem ter a seguinte estrutura:
 - Controllers - Contem todos os controllers do sistema
 - Models - Contem todos os models do sistema
 - Routes - Contem o arquivo de rotas do modulo
 - View - Contem todas as views do modulo
 
 #### Arquivos da pasta system
 Este pasta contem todas as classes que fazem o sistema funcionar os arquivos são:
 
 - Boot.php - Singleton responsavel por iniciar o processamento de requisições.
 - ConfigManager - Class Responsavel por Gerenciar os arquivos de configuração da pasta config
 - Controller - Controller padrão do sistema contem todas as funcionalidades necessaria para o controller do sistema
 - Model Class Model padrão do sistema contem todas as rotinas de acesso a banco de dados necessarias ao model
 - RouterManager - Class Para processamento das requisições enviadas pelo browser e direcionando para o controller correto
 - TemplateEngine - Class Para processamento de template do sistema.
 
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
 
 
 ## Recursos Já desenvolvidos
  - Estrutura basica 
 - RouteManager 
 - TemplateEngine
 
 ## Recursos Em desenvolvimento
 - QueryBuilder
 - Middleware
 - CSRF Protection
 - SQL Injection Protection
 - Interface Web para criação de controllers
 - Estrutura para utilização de Vuejs + Webpack
 
 
 
 
 
