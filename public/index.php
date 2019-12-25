<?php 

/** Inicializar Autoload */
require_once('../vendor/autoload.php');
use App\system\Boot;
$app = Boot::getInstance();
$app::start();

