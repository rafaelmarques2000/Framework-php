<?php 

namespace App\core\controllers;

use App\system\Controller;

class IndexController extends Controller{

      public function index(){
           $this->View("bemvindo",null,[]);
      }
}