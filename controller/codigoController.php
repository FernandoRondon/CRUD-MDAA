<?php 
include_once '../model/codigo.php';
$codigo=new codigo();
if($_POST['funcion']=='crear'){
    $categoria = $_POST['categoria_num'];
    $num_codigo = $_POST['num_codigo'];
    $nombre = $_POST['nombre_codigo'];
    $codigo->crear($categoria, $num_codigo, $nombre);
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

if($_POST['funcion']=='rellenar_categorias'){
    $codigo->rellenar_categorias();
    $json = array();
    foreach ($codigo->objetos as $objeto) {
       $json[]=array(
           'id'=>$objeto->id_categoria,
           'nombre'=>$objeto->categoria_nombre
       );
    }
    $jsonstring=json_encode($json);
    echo $jsonstring;
}

?>