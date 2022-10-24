<?php 
include_once '../model/categoria.php';
$categoria=new categoria();

if($_POST['funcion']=='crear'){
    $clave = $_POST['clave'];
    $nombre = $_POST['nombre_categoria'];
    $categoria->crear($clave, $nombre);
}

// if($_POST['funcion']=='editar'){
//     $clave = $_POST['clave'];
//     $nombre = $_POST['nombre_categoria'];
//     $id_editado=$_POST['id_editado'];
//     $categoria->editar($clave,$nombre,$id_editado);
// }

if($_POST['funcion']=='buscar'){
    $categoria->buscar();
    $json=array();
    foreach ($categoria->objetos as $objeto) {
        $json[]=array(
            'id'=>$objeto->id_categoria,
            'nombre'=>$objeto->categoria_nombre,
            'clave'=>$objeto->id_tipo_categoria
        );
    }
    
    $jsonstring = json_encode($json);
    echo $jsonstring;
}

// if($_POST['funcion']=='borrar'){
//     $id=$_POST['id'];
//     $tipo->borrar($id);
// }


if($_POST['funcion']=='rellenar_claves'){
    $categoria->rellenar_claves();
    $json = array();
    foreach ($categoria->objetos as $objeto) {
       $json[]=array(
           'id'=>$objeto->id,
           'nombre'=>$objeto->nombre
       );
    }
    $jsonstring=json_encode($json);
    echo $jsonstring;
  }
?>