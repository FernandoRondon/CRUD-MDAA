<?php 
    
    include_once '../model/tabla.php';
    $tabla = new tabla();

    if($_POST['funcion']=='buscar'){
        
        $tabla->buscar();
        $cont=0;
        $json=array();
        foreach ($tabla->objetos as $objeto) {
            $cont++;
            $json[]=array(
                'numeracion'=>$cont,
                'id'=>$objeto->id,
                'codigo'=>$objeto->codigo,
                'descripcion'=>$objeto->descripcion,
                'idCategoria'=>$objeto->idcategoria
            );
        }
        $jsonstring = json_encode($json);
        echo $jsonstring;

    }

?>