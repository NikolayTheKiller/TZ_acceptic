<?php
//фронт-контроллер

session_start();


//2. подключение файлов системы
define('ROOT', dirname(__FILE__));
require_once(ROOT.'/components/Autoload.php');




//4. вызов роутер
$router=new Router();
$router->run();