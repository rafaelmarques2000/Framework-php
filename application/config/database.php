<?php 

return [
    "mysql"=>array(
        'driver' => 'mysql', 
        'host' => 'your_db_hostname',
        'database' => 'your_db',
        'username' => 'your_db_username',
        'password' => 'your_db_password',
        'charset' => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix' => '',
    ),
    "pgsql"=>array(
        'driver' => 'pgsql', 
        'host' => 'localhost',
        'database' => 'teste',
        'username' => 'postgres',
        'password' => '1354a52a',
        'charset' => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix' => '',
        'schema'=>'public'
    )
    ];
