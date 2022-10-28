<?php 
include_once '../model/codigo.php';
$codigo=new codigo();
if($_POST['funcion']=='crear'){
    $codigo = $_POST['codigo'];
    $nombre = $_POST['nombre_codigo'];
    $codigo->crear($codigo, $nombre);
}

if($_POST['funcion']=='buscar'){
    $codigo->buscar();
    $json=array();
    foreach ($codigo->objetos as $objeto) {
        $json[]=array(
            'id'=>$objeto->id_des,
            'codigo'=>$objeto->codigo,
            'nombre'=>$objeto->des_nombre
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}

if($_POST['funcion']=='rellenar_codigos'){
    $codigo->rellenar_codigos();
    $json = array();
    foreach ($codigo->objetos as $objeto) {
       $json[]=array(
           'id'=>$objeto->id_des,
           'nombre'=>$objeto->des_nombre
       );
    }
    $jsonstring=json_encode($json);
    echo $jsonstring;
}

?>