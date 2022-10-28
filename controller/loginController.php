<?php
include_once '../model/usuario.php';
session_start();
$user = $_POST['user'];
$pass = $_POST['pass'];
$usuario = new usuario();

if(!empty($_SESSION['id_tip_user'])){
    switch ($_SESSION['id_tip_user']) {
        case 1:
            header('Location: ../view/adm_inicio.php');
            break;
        case 2:
            header('Location: ../view/adm_consulta.php');
            break;
        case 3:
            header('Location: ../view/adm_consulta.php');
            break;    
    }
}
else
{
    if(!empty($usuario->loguearse($user,$pass)=="logueado")){
        $usuario->obtener_dato_logueo($user);
        foreach ($usuario->objetos as $objeto) {
            $_SESSION["id"] = $objeto->id;
            $_SESSION["id_tip_user"] = $objeto->id_tip_user;
            $_SESSION["nombre"]= $objeto->nombre;
            $_SESSION['consultor']=$objeto->consultor;
        }
        switch ($_SESSION["id_tip_user"]) {
            case 1:
              header("Location: ../view/adm_inicio.php");
              break;
            case 2:
              header("Location: ../view/adm_consulta.php");
              break;
            case 3:
              header('Location: ../view/adm_consulta.php');
              break;
        }
    }
    else
    {
        header('Location: ../index.php');
    }
}
?>