<?php 
include_once '../model/consulta.php';
$consulta=new consulta();

// if($_POST['funcion']=='rellenar_categorias'){
//     $consulta->rellenar_categorias();
//     $json = array();
//     foreach ($consulta->objetos as $objeto) {
//        $json[]=array(
//            'id'=>$objeto->id_categoria,
//            'nombre'=>$objeto->categoria_nombre
//        );
//     }
//     $jsonstring=json_encode($json);
//     echo $jsonstring;
// }

// DROPDOWN CASCADA
// if($_POST['funcion']=='rellenar_codigos'){
//   $categoria = $_POST['categoria'];
//   $consulta->rellenar_codigos($categoria);
//   $json = array();
//   foreach ($consulta->objetos as $objeto) {
//      $json[]=array(
//          'id'=>$objeto->id_des,
//          'nombre'=>$objeto->nombre
//      );
//   }
//   $jsonstring=json_encode($json);
//   echo $jsonstring;
// }

if($_POST['funcion']=='crear'){
    $usuario = $_POST['usuario'];
    $categoria = $_POST['categoria'];
    $codigo = $_POST['codigo'];
    $fecha_hora = $_POST['fecha_hora'];
    $observacion = $_POST['observacion'];
    $consulta->crear($usuario,$categoria,$codigo,$fecha_hora,$observacion);
}

if($_POST['funcion']=='rellenar_codigos'){
    $consulta->rellenar_codigos();
    $json = array();
    foreach ($consulta->objetos as $objeto) {
       $json[]=array(
        //    'id'=>$objeto->id_des_categoria,
           'id'=>$objeto->id_des,
           'code'=>$objeto->des_codigo,
           'nombre'=>$objeto->nombre
       );
    }
    $jsonstring=json_encode($json);
    echo $jsonstring;
}

// DROPDOWN CASCADA
if($_POST['funcion']=='rellenar_categorias'){
  $codigo = $_POST['codigo'];
  $consulta->rellenar_categorias($codigo);
  $json = array();
  foreach ($consulta->objetos as $objeto) {
     $json[]=array(
         'id'=>$objeto->id_categoria,
         'nombre'=>$objeto->categoria_nombre
     );
  }
  $jsonstring=json_encode($json);
  echo $jsonstring;
}



?>