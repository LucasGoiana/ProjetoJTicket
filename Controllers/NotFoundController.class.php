<?php 

namespace Controllers;

use \Core\Controller;

class NotFoundController extends Controller{
    public function index(){
        $this->loadTemplateLogoff('404',array());
    }
}