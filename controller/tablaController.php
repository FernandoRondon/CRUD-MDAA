<?php 
    include_once '../model/tabla.php';
    $tabla = new tabla();

    if($_POST['funcion']=='listar'){
        $tabla->buscar();
        $json=array();
        foreach ($tabla->objetos as $objeto) {
            $json['data'][]=$objeto;
        }
        $jsonstring = json_encode($json);
        echo $jsonstring;
    }

    
?>