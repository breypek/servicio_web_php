<?php


if(!empty($_GET['controlador'])){
    $controllerName= $_GET['controlador']. 'controller';
}
else{

    $controllerName= 'ProductosController';
}




if(!empty($_GET['accion'])){
    $actionName= $_GET['accion'];
}
else{

    $actionName= 'index';
}


$controllerPath= 'Controllers/'.$controllerName.'.php';

require $controllerPath;

$controller= new $controllerName();
$controller->$actionName();


?>