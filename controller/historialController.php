<?php
include_once '../model/historial.php';
$historial = new historial();
session_start();
if($_POST['funcion']=='listar'){
    $historial->listar();
    $cont=0;
    foreach ($historial->objetos as $objeto) {
       $cont++;
       $json[]= array(
           'numeracion'=>$cont,
           'usuario'=>$objeto->consulta_usuario,
           'fecha'=>$objeto->consulta_fecha,
           'categoria'=>$objeto->consulta_categoria,
           'codigo'=> $objeto->consulta_codigo,
           'observacion'=>$objeto->consulta_obs
       );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}

if($_POST['funcion']=='mostrar'){
    $historial->cantidad_categoria();
    foreach ($historial->objetos as $objeto) {
        $cantidad_categoria=$objeto->cantidad_categoria;
    }
    $historial->cantidad_codigo();
    foreach ($historial->objetos as $objeto) {
        $cantidad_codigo=$objeto->cantidad_codigo;
    }
    $historial->cantidad_consulta();
    foreach ($historial->objetos as $objeto) {
        $cantidad_consulta=$objeto->cantidad_consulta;
    }

    $json=array();
    foreach ($historial->objetos as $objeto) {
        $json[]= array(
            'cantidad_categoria'=>$cantidad_categoria,
            'cantidad_codigo'=>$cantidad_codigo,
            'cantidad_consulta'=>$cantidad_consulta,
        );
    }
    $jsonstring = json_encode($json[0]);
    echo $jsonstring;
}

?>
