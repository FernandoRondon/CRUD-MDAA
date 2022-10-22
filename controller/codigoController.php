<?php 
include_once '../model/codigo.php';
$codigo=new codigo();
// if($_POST['funcion']=='crear'){
//     $nombre = $_POST['nombre_codigo'];
//     $codigo->crear($nombre);
// }

if($_POST['funcion']=='buscar'){
    $codigo->buscar();
    $json=array();
    foreach ($codigo->objetos as $objeto) {
        $json[]=array(
            'id'=>$objeto->id,
            'nombre'=>$objeto->nombre           
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}

?>