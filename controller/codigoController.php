<?php 
include_once '../model/codigo.php';
$codigo=new codigo();

if($_POST['funcion']=='crear'){
    $categoria = $_POST['categoria'];
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
            'codigo'=>$objeto->des_codigo,
            'nombre'=>$objeto->des_nombre
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}

if($_POST['funcion']=='editar'){
    $num_codigo = $_POST['num_codigo'];
    $nombre = $_POST['des_codigo'];
    $id_editado=$_POST['id_editado'];
    $codigo->editar($num_codigo, $nombre,$id_editado);
}

if($_POST['funcion']=='borrar'){
    $id=$_POST['id'];
    $codigo->borrar($id);
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