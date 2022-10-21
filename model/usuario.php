<?php
include_once 'conexion.php';
class usuario {
    var $objetos;
    public function __construct(){
        $db = new conexion();
        $this->acceso = $db->pdo;
    }
    function loguearse($correo,$pass){
        $sql="SELECT * FROM usuario INNER JOIN tipo_usuario ON id_tip_user = tipo_usuario.id WHERE correo=:correo AND usuario.estado=1";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':correo' => $correo));
        $objetos = $query->fetchAll();
        foreach ($objetos as $objeto) {
            $contrasena_actual = $objeto->contrasena;
        }
        if(strpos($contrasena_actual,'$2y$10$')===0){
            if(password_verify($pass,$contrasena_actual)){
                return "logueado";
                
            }
        }
        else
        {
            if($pass==$contrasena_actual){
                return "logueado";
            }
        }
    }

    function obtener_dato_logueo($correo){
        $sql="SELECT * FROM usuario join tipo_usuario on id_tip_user=tipo_usuario.id and correo=:correo";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':correo'=>$correo));
        $this->objetos= $query->fetchall();
        return $this->objetos;
    } 
}

?>