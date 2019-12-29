<?php 

namespace App\modules\manager\controllers;

use App\system\Controller;

class IndexController extends Controller{
      public function index(){
         $this->View("home",'manager',[]);
      }
}