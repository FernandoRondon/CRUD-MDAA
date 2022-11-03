<?php
include_once '../model/usuario.php';
$usuario = new usuario();
session_start();
$id_usuario= $_SESSION['id'];
$tipo_usuario=$_SESSION['id_tip_user'];

// if($_POST['funcion']=='buscar_usuario'){
//     $json=array();
//     $fecha_actual = new DateTime();
//     $usuario->obtener_datos($_POST['dato']);
//     foreach ($usuario->objetos as $objeto) {
//         $nacimiento = new DateTime($objeto->edad);
//         $edad = $nacimiento->diff($fecha_actual);
//         $edad_years = $edad->y;
//         $json[]=array(
//             'nombre'=>$objeto->nombre_us,
//             'apellidos'=>$objeto->apellidos_us,
//             'edad'=>$edad_years,
//             'dni'=>$objeto->dni_us,
//             'tipo'=>$objeto->nombre_tipo,
//             'telefono'=>$objeto->telefono_us,
//             'residencia'=>$objeto->residencia_us,
//             'correo'=>$objeto->correo_us,
//             'sexo'=>$objeto->sexo_us,
//             'avatar'=>'../img/'.$objeto->avatar,

//         );
//     }
//     $jsonstring = json_encode($json[0]);
//     echo $jsonstring;
// }

// if($_POST['funcion']=='capturar_datos'){
//     $json=array();
//     $id_usuario=$_POST['id_usuario'];
//     $usuario->obtener_datos($id_usuario);
//     foreach ($usuario->objetos as $objeto) {
//         $json[]=array(
//             'nombre'=>$objeto->nombre_us,
//             'apellidos'=>$objeto->apellidos_us,
//             'telefono'=>$objeto->telefono_us,
//             'residencia'=>$objeto->residencia_us,
//             'correo'=>$objeto->correo_us,
//             'sexo'=>$objeto->sexo_us,
//         );
//     }
//     $jsonstring = json_encode($json[0]);
//     echo $jsonstring;
// }

if($_POST['funcion']=='editar_usuario'){
    $id_usuario=$_POST['id_usuario'];
    $nombre=$_POST['nombre'];
    $apellidos=$_POST['apellidos'];
    $telefono=$_POST['telefono'];
    $residencia=$_POST['residencia'];
    $correo=$_POST['correo'];
    $usuario->editar($id_usuario,$nombre,$apellidos,$telefono,$residencia,$correo);
}

if($_POST['funcion']=='editar'){
    $id=$_POST['id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $residencia = $_POST['residencia'];
    $telefono = $_POST['telefono'];
    $contrasena = $_POST['contrasena'];
    $estado = $_POST['estado'];
    $usuario->editar_usuario($id,$nombre,$apellido,$residencia,$telefono,$contrasena,$estado);
}


// if($_POST['funcion']=='cambiar_contra'){
//     $id_usuario=$_POST['id_usuario'];
//     $oldpass=$_POST['oldpass'];
//     $newpass=$_POST['newpass'];
//     $usuario->cambiar_contra($id_usuario,$oldpass,$newpass);
// }
// if($_POST['funcion']=='cambiar_foto'){
//     if(($_FILES['photo']['type']=='image/jpeg')||($_FILES['photo']['type']=='image/png')||($_FILES['photo']['type']=='image/gif')){
//         $nombre=uniqid().'-'.$_FILES['photo']['name'];
//         $ruta='../img/'.$nombre;
//         move_uploaded_file($_FILES['photo']['tmp_name'],$ruta);
//         $usuario->cambiar_photo($id_usuario,$nombre);
//         foreach ($usuario->objetos as $objeto) {
//             unlink('../img/'.$objeto->avatar);
//         }
//         $json= array();
//         $json[]=array(
//             'ruta'=>$ruta,
//             'alert'=>'edit'
//         );
//         $jsonstring = json_encode($json[0]);
//         echo $jsonstring;
//     }
//     else{
//         $json= array();
//         $json[]=array(
//             'alert'=>'noedit'
//         );
//         $jsonstring = json_encode($json[0]);
//         echo $jsonstring;
//     }
   
// }

if($_POST['funcion']=='buscar_usuarios_adm'){
    $json=array();
    $fecha_actual = new DateTime();
    $usuario->buscar();
    foreach ($usuario->objetos as $objeto) {
        $nacimiento = new DateTime($objeto->edad);
        $edad = $nacimiento->diff($fecha_actual);
        $edad_years = $edad->y;
        $json[]=array(
            'id'=>$objeto->id,
            'nombre'=>$objeto->nombre,
            'apellidos'=>$objeto->apellido,
            'edad'=>$edad_years,
            'dni'=>$objeto->dni,
            'contrasena'=>$objeto->contrasena,
            'tipo'=>$objeto->tipo_user,
            'telefono'=>$objeto->telefono,
            'residencia'=>$objeto->residencia,
            'correo'=>$objeto->correo,
            'tipo_usuario'=>$objeto->id_tip_user,
            'estado'=>$objeto->estado_nombre,
            'avatar'=>'../asset/img/'.$objeto->avatar,
            'estado_id'=>$objeto->id_estado,
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}

if($_POST['funcion']=='crear_usuario'){
    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $edad=$_POST['edad'];
    $dni = $_POST['dni'];
    $residencia = $_POST['residencia'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $pass = $_POST['pass'];
    $tipo=2;
    $estado=1;
    $usuario_visibilidad = 1;
    $avatar='user_default.jpg';
    $usuario->crear($nombre,$apellido,$edad,$dni,$residencia,$telefono,$correo,$pass,$tipo,$estado,$usuario_visibilidad,$avatar);
}

if($_POST['funcion']=='rellenar_estados'){
  $usuario->rellenar_estados();
  $json = array();
  foreach ($usuario->objetos as $objeto) {
     $json[]=array(
         'id'=>$objeto->id_estado,
         'nombre'=>$objeto->estado_nombre,
     );
  }
  $jsonstring=json_encode($json);
  echo $jsonstring;
}


if($_POST['funcion']=='borrar_usuario'){
    $pass=$_POST['pass'];
    $id_borrado=$_POST['id_usuario'];
    $usuario->borrar($pass,$id_borrado,$id_usuario);
}
?>