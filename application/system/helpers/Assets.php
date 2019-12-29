<?php 

use App\system\ConfigManager;

function asset($uri){
    $appConfig = ConfigManager::GetApplicationConfig();
    return $appConfig->url_base."/".$uri;
}