<?php 

namespace Core;

class Core{

    public function run(){
        //Cria a URL para que se o usuário não digitar nada ele inicie com '/'
        // for example : meusite.com.br <-- sendo assim, ele entraria no último else ficando com os valores de
        // default homeController e index
        $url = '/';
        $params = array();
        // Já aqui casso o usuário digite algo depois do barra conctenamos com a variavel acima
        // for example: meusite.com.br/galeria
        if(isset($_GET['url'])){
            $url .= $_GET['url'];
        } 

        //Caso a váriavel url não seja '/' entro no if
        if(!empty($_GET['url']) && $url != '/'){
        
            //Vou explidindo e guardando os valores de acordo pois sei que sempre a url será enviada de acordo 
        //com o padrão mvc.
        // for example: meusite.com.br/controller/action/params


            $url = explode('/',$url);
            array_shift($url);
         
            $currentController = $url[0].'Controller';
            array_shift($url);

            if(isset($url[0]) && !empty($url[0])){
                $currentAction = $url[0];
                array_shift($url);
            }else{
                $currentAction = 'index';
            }
            
            if(count($url) > 0){
                $params = $url;
            }
            //array_shift($url);
           // $params = $url;
        }else{
            
            $currentController = 'HomeController';
            $currentAction = 'index';
        }
        

        $currentController = ucfirst($currentController);
        $prefix='\Controllers\\';
        
        if(!file_exists('Controllers/'.$currentController.'.class.php') 
        ||!method_exists($prefix.$currentController, $currentAction)){
               
            $currentController = 'NotFoundController';
            $currentAction = 'index';
        }

        $newController = $prefix.$currentController;
        $c = new $newController();
        call_user_func_array(array($c, $currentAction), $params);
    }

    
}