<?php

class Router {
    private $routes;
    
    public function __construct() {
        $routesPath=ROOT.'/config/routes.php';
        $this->routes= include $routesPath;
    }
    private function getURI(){
        //получить строку запроса
        if(!empty($_SERVER['REQUEST_URI'])){
         return trim($_SERVER['REQUEST_URI'],'/');
        }
    }

    public function run(){
      $uri=$this->getURI();//получить строку запроса
      foreach ($this->routes as $uriPattern=>$path){//проверить наличие такого запроса в роутах
        //сравнить URI и роуты
          if(preg_match("~$uriPattern~",$uri)){
              $internalRoute = preg_replace("~$uriPattern~", $path, $uri);//ЧПУ
             $segmens=explode('/',$internalRoute);
             $controllerName= array_shift($segmens).'Controller';
             $controllerName= ucfirst($controllerName);
            $actionName='action'.ucfirst(array_shift($segmens));
            $parameters=$segmens;
           
         //подключить файл класса-контроллера
            $controllerFile=ROOT.'/controller/'.$controllerName.'.php';
            if(file_exists($controllerFile)){
                include_once $controllerFile;                
            }
            //создать объект, вызвать метод
            $controllerObject=new $controllerName;
            $result= call_user_func_array(array($controllerObject,$actionName), $parameters);
            if($result != NULL){
                break;
            }
          }
      }
       
    }
}
