<?php 

namespace App\middlewares;

use Optimus\Onion\LayerInterface;
use \Closure;
use App\system\Session;

class Login implements LayerInterface{

    public function peel($object, Closure $next){
        
            return $next($object);

    }

}
                