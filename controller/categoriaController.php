<?php 
include_once '../model/categoria.php';
$categoria=new categoria();
if($_POST['funcion']=='crear'){
    $nombre = $_POST['nombre_categoria'];
    $categoria->crear($nombre);
}
// if($_POST['funcion']=='editar'){
//     $nombre = $_POST['nombre_categoria'];
//     $id_editado=$_POST['id_editado'];
//     $categoria->editar($nombre,$id_editado);
// }

if($_POST['funcion']=='buscar'){
    $categoria->buscar();
    $json=array();
    foreach ($categoria->objetos as $objeto) {
        $json[]=array(
            'id'=>$objeto->id,
            'nombre'=>$objeto->nombre
            
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}

// if($_POST['funcion']=='borrar'){
//     $id=$_POST['id'];
//     $tipo->borrar($id);
// }
// if($_POST['funcion']=='rellenar_tipos'){
//     $tipo->rellenar_tipos();
//     $json = array();
//     foreach ($tipo->objetos as $objeto) {
//        $json[]=array(
//            'id'=>$objeto->id_tip_prod,
//            'nombre'=>$objeto->nombre
//        );
//     }
//     $jsonstring=json_encode($json);
//     echo $jsonstring;
// }
?>