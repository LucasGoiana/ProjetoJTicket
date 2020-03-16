<?php

namespace Core;

class Controller{

    public function loadView($viewName, $viewData = array()){
        extract($viewData);
        require 'Views/'.$viewName.'.php';
    }

    public function loadTemplateLogado($viewName, $viewData = array()){
        extract($viewData);
        require 'Views/templateLogado.php';
    }
    public function loadTemplateLogoff($viewName, $viewData = array()){
        extract($viewData);
        require 'Views/templateLogoff.php';
    }

    public function loadViewinTemplate($viewName, $viewData = array()){
        extract($viewData);
        require 'Views/'.$viewName.'.php';
    }   
}
?>