<?php 

use App\system\ConfigManager;

function route_url($uri){
    $appConfig = ConfigManager::GetApplicationConfig();
    return $appConfig->url_base."/".$uri;
}