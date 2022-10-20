<?php
include_once 'conexion.php';
class usuario {
    var $objetos;
    public function __construct(){
        $db = new Conexion();
        $this->acceso = $db->pdo;
    }
    function loguearse($correo,$pass){
        $sql="SELECT * FROM usuario inner join tipo_ususario on us_tipo=id_tipo_us where correo_us=:correo and visible_usu='S'";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':correo' => $correo));
        $objetos = $query->fetchAll();
        foreach ($objetos as $objeto) {
            $contrasena_actual = $objeto->contrasena_us;
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
        $sql="SELECT * FROM usuario join tipo_us on us_tipo=id_tipo_us and correo_us=:correo";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':correo'=>$correo));
        $this->objetos= $query->fetchall();
        return $this->objetos;
    } 
}

?>